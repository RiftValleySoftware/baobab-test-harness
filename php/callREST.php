<?php
/***************************************************************************************************************************/
/**
    BASALT Extension Layer

    © Copyright 2018, Little Green Viper Software Development LLC/The Great Rift Valley Software Company
    
    LICENSE:
    
*/
global $g_server_secret;

$g_server_secret = CO_Config::server_secret();    // Get the server secret.
    
/****************************************************************************************************************************/
/**
This is the function that is used by the BASALT testing facility to make REST calls to the Greater Rift Valley BAOBAB server.

It is provided as an example of making REST calls to BAOBAB, and to provide guidance for programmers creating their own REST clients.

\returns the resulting transfer from the server, as a string of bytes.
 */
function call_REST_API( $method,                /**< REQUIRED:  This is the method to call. It should be one of:
                                                                - 'GET'     This is considered the default, but should be provided anyway, in order to ensure that the intent is clear.
                                                                - 'POST'    This means that the resource needs to be created.
                                                                - 'PUT'     This means that the resource is to be modified.
                                                                - 'DELETE'  This means that the resource is to be deleted.
                                                */
                        $url,                   ///< REQIRED:   This is the base URL for the call. It should include the entire URI, including query arguments.
                        $data_input = NULL,     ///< OPTIONAL:  Default is NULL. This is an associative array, containing a collection of data, and a MIME type ("data" and "type") to data to be uploaded to the server, along with the URL. This will be Base64-encoded, so it is not necessary for it to be already encoded.
                        $api_key = NULL,        ///< OPTIONAL:  Default is NULL. This is an API key from the BAOBAB server. It needs to be provided for any operation that requires user authentication.
                        &$httpCode = NULL,      ///< OPTIONAL:  Default is NULL. If provided, this has a reference to an integer data item that will be set to any HTTP response code.
                        $display_log = false    ///< OPTIONAL:  Default is false. If true, then the function will echo detailed debug information.
                        ) {
    
    $method = strtoupper(trim($method));            // Make sure the method is always uppercase.
    
    global $g_server_secret;

    // Initialize function local variables.
    $file = NULL;               // This will be a file handle, for uploads.
    $content_type = NULL;       // This is used to signal the content-type for uploaded files.
    $file_size = 0;             // This is the size, in bytes, of uploaded files.
    $temp_file_name = NULL;     // This is a temporary file that is used to hold files before they are sent to the server.
    
    // If data is provided by the caller, we read it into a temporary location, and Base64-encode it.
    if ($data_input) {
        $file_data = base64_encode($data_input['data']);
        
        $temp_file_name = tempnam(sys_get_temp_dir(), 'RVP');
    
        $file = fopen($temp_file_name, 'w');
    
        fwrite($file, $file_data, strlen($file_data));
    
        fclose($file);
    
        $content_type = $data_input['type'].':base64';
        $file_size = filesize($temp_file_name);
    
        $file = fopen($temp_file_name, 'rb');
    }

    $curl = curl_init();                    // Initialize the cURL handle.
    curl_setopt($curl, CURLOPT_URL, $url);  // This is the URL we are calling.
        
    // Different methods require different ways of dealing with any file that has been passed in.
    // The file is ignored for GET and DELETE.
    // We ask the server not to send us EXPECT (HTTP 100) calls for POST and PUT.
    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, true);
            
            // POST sends the file as a standard multipart/form-data item.
            if ($file) {
                curl_setopt($curl, CURLOPT_SAFE_UPLOAD, true);
                curl_setopt($curl, CURLOPT_HTTPHEADER, ['Expect:', 'Content-type: multipart/form-data']);
                $post = Array('payload'=> curl_file_create($temp_file_name, $content_type));
                curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
            } else {
                curl_setopt($curl, CURLOPT_HTTPHEADER, ['Expect:']);
            }
            break;
            
        case "PUT":
            curl_setopt($curl, CURLOPT_HTTPHEADER, ['Expect:']);
            curl_setopt($curl, CURLOPT_PUT, true);
            
            // PUT requires a direct inline file transfer.
            if ($file) {
                curl_setopt($curl, CURLOPT_SAFE_UPLOAD, true);
                curl_setopt($curl, CURLOPT_INFILE, $file);
                curl_setopt($curl, CURLOPT_INFILESIZE, $file_size);
            }
            break;
            
        case "DELETE":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
    }

    $server_secret = CO_Config::server_secret();    // Get the server secret.
    
    // Authentication. We provide the Server Secret and the API key here.
    if (isset($g_server_secret) && isset($api_key)) {
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, "$g_server_secret:$api_key");
    }

    curl_setopt($curl, CURLOPT_HEADER, false);          // Do not return any headers, please.
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);   // Please return to sender as a function response.
    curl_setopt($curl, CURLOPT_VERBOSE, false);         // Let's keep this thing simple.
    
    // This is if we want to see a display log (echoed directly).
    if (isset($display_log) && $display_log) {
        curl_setopt($curl, CURLOPT_HEADERFUNCTION, function ( $curl, $header_line ) {
                                                                                        echo "<pre>$header_line</pre>";
                                                                                        return strlen($header_line);
                                                                                    });
        echo('<div style="margin:1em">');
        echo("<h4>Sending REST $method CALL:</h4>");
        echo('<div>URL: <code>'.htmlspecialchars($url).'</code></div>');

        if ($api_key) {
            echo('<div>API KEY:<pre>'.htmlspecialchars($api_key).'</pre></div>');
        }
    }
    
    $result = curl_exec($curl); // Do it to it.
    
    // If they want a report, we send it.
    if (isset($httpCode)) {
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    }

    curl_close($curl);  // Bye, now.
    
    // If we had a file open for transfer, we close it now.
    if ($file) {
        fclose($file);
    }
    
    // More reportage.
    if (isset($display_log) && $display_log) {
        if (isset($data_file)) {
            echo('<div>ADDITIONAL DATA:<pre>'.htmlspecialchars(print_r($data_file, true)).'</pre></div>');
        }
        if (isset($httpCode) && $httpCode) {
            echo('<div>HTTP CODE:<code>'.htmlspecialchars($httpCode, true).'</code></div>');
        }
        
        if ((1024 * 1024 * 10) <= strlen($result)) {
            $integer = 1;
            $original_file_name = dirname(dirname(__FILE__)).'/text-dump-result';
            $file_name = $original_file_name.'.txt';
            while(file_exists($file_name)) {
                $file_name = $original_file_name.'-'.$integer.'.txt';
                $integer++;
            }
            $file_handle = fopen($file_name, 'w');
            fwrite($file_handle, $result);
            fclose($file_handle);
            echo('<div>RESULT SAVED TO FILE" '.$file_name.'.</div>');
        } else {
            echo('<div>RESULT:<pre>'.htmlspecialchars(print_r(chunk_split($result, 2048), true)).'</pre></div>');
        }
        echo("</div>");
    }

    return $result;
}
