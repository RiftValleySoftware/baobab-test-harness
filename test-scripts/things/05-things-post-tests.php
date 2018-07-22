<?php
/***************************************************************************************************************************/
/**
    BASALT Extension Layer
    
    © Copyright 2118, Little Green Viper Software Development LLC.
    
    This code is proprietary and confidential code, 
    It is NOT to be reused or combined into any application,
    unless done so, specifically under written license from Little Green Viper Software Development LLC.

    Little Green Viper Software Development: https://littlegreenviper.com
*/
// ------------------------------ MAIN CODE -------------------------------------------

require_once(dirname(dirname(dirname(__FILE__))).'/php/run_baobab_tests.php');

baobab_run_tests(134, '134-135: THINGS POST TESTS', '');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0134() {
    basalt_run_single_direct_test(134, 'CREATE A SINGLE, BASIC RECORD (JSON)', '', 'things_tests_2');
}

function basalt_test_0134($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Things Test 134A: Try Creating A New Thing With No Login. Should Fail With A 403.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/things/NewThing';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 403;
    $expected_result = '';
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 134, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 134, $title);
    }

    $title = 'Things Test 134B: Try Again, But This Time, Log In. We Do Not Specify A Payload, So We Should Get A 400.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/things/NewThing';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 400;
    $expected_result = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 134, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 134, $title);
    }

    $title = 'Things Test 134C: Try Again, But This Time, Log In, and We Specify A Simple Text Payload.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/things/NewThing/?payload=Hi+Howaya';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"things":{"new_thing":{"id":1752,"name":"NewThing","lang":"en","read_token":0,"write_token":12,"last_access":"1970-01-02 00:00:00","writeable":true,"payload_type":"text\/plain;base64","payload":"SGkgSG93YXlh","key":"NewThing"}}}';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 134, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 134, $title);
    }

    $title = 'Things Test 134D: Try Again. This Time, We Specify A Simple Text Payload That is Base-64-Encoded.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/things/AnotherNewThing/?payload='.base64_encode('Hi Howaya');
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"things":{"new_thing":{"id":1753,"name":"AnotherNewThing","lang":"en","read_token":0,"write_token":12,"last_access":"1970-01-02 00:00:00","writeable":true,"payload_type":"text\/plain;base64","payload":"SGkgSG93YXlh","key":"AnotherNewThing"}}}';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 134, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 134, $title);
    }

    $title = 'Things Test 134E: Try Again. This Time, We Give It An Image File.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/things/AnotherNewThing/';
    $image_data = file_get_contents(dirname(dirname(dirname(__FILE__))).'/images/pass.gif');
    $data = ['data' => $image_data, 'type' => 'image/gif'];
    $expected_result_code = 400;
    $expected_result = '';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 134, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 134, $title);
    }

    $title = 'Things Test 134F: Oops. Chose an Existing Key. Let\'s Try A Unique One.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/things/YetAnotherNewThing/';
    $image_data = file_get_contents(dirname(dirname(dirname(__FILE__))).'/images/pass.gif');
    $data = ['data' => $image_data, 'type' => 'image/gif'];
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/05-things-post-tests-134F.json');
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 134, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 134, $title);
    }

    $title = 'Things Test 134G: Try Again. This Time, We Give It An Image File That We Base-64-Encode.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/things/AndYetAnotherNewThing/';
    $image_data = base64_encode(file_get_contents(dirname(dirname(dirname(__FILE__))).'/images/pass.gif'));
    $data = ['data' => $image_data, 'type' => 'image/gif;base64'];
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/05-things-post-tests-134G.json');
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 134, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 134, $title);
    }

    $title = 'Things Test 134H: This Time, We Specify the Key In The Parameter List.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/things/?key=MyNameIsMyPassword&payload=HelloDere';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"things":{"new_thing":{"id":1756,"name":"MyNameIsMyPassword","lang":"en","read_token":0,"write_token":12,"last_access":"1970-01-02 00:00:00","writeable":true,"payload_type":"text\/plain;base64","payload":"SGVsbG9EZXJl","key":"MyNameIsMyPassword"}}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 134, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 134, $title);
    }

    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0135() {
    basalt_run_single_direct_test(135, 'CREATE A SINGLE, BASIC RECORD (XML)', '', 'things_tests_2');
}

function basalt_test_0135($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Things Test 135A: Try Creating A New Thing With No Login. Should Fail With A 403.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/things/NewThing';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 403;
    $expected_result = '';
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 135, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 135, $title);
    }

    $title = 'Things Test 135B: Try Again, But This Time, Log In. We Do Not Specify A Payload, So We Should Get A 400.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/things/NewThing';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 400;
    $expected_result = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 135, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 135, $title);
    }

    $title = 'Things Test 135C: Try Again, But This Time, Log In, and We Specify A Simple Text Payload.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/things/NewThing/?payload=Hi+Howaya';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('things').'<new_thing><id>1752</id><name>NewThing</name><lang>en</lang><write_token>12</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><payload_type>text/plain;base64</payload_type><payload>SGkgSG93YXlh</payload><key>NewThing</key></new_thing></things>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 135, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 135, $title);
    }

    $title = 'Things Test 135D: Try Again. This Time, We Specify A Simple Text Payload That is Base-64-Encoded.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/things/AnotherNewThing/?payload='.base64_encode('Hi Howaya');
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('things').'<new_thing><id>1753</id><name>AnotherNewThing</name><lang>en</lang><write_token>12</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><payload_type>text/plain;base64</payload_type><payload>SGkgSG93YXlh</payload><key>AnotherNewThing</key></new_thing></things>';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 135, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 135, $title);
    }

    $title = 'Things Test 135E: Try Again. This Time, We Give It An Image File.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/things/AnotherNewThing/';
    $image_data = file_get_contents(dirname(dirname(dirname(__FILE__))).'/images/pass.gif');
    $data = ['data' => $image_data, 'type' => 'image/gif'];
    $expected_result_code = 400;
    $expected_result = '';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 135, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 135, $title);
    }

    $title = 'Things Test 135F: Oops. Chose an Existing Key. Let\'s Try A Unique One.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/things/YetAnotherNewThing/';
    $image_data = file_get_contents(dirname(dirname(dirname(__FILE__))).'/images/pass.gif');
    $data = ['data' => $image_data, 'type' => 'image/gif'];
    $expected_result_code = 200;
    $expected_result = get_xml_header('things').file_get_contents(dirname(__FILE__).'/05-things-post-tests-135F.xml');
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 135, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 135, $title);
    }

    $title = 'Things Test 135G: Try Again. This Time, We Give It An Image File That We Base-64-Encode.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/things/AndYetAnotherNewThing/';
    $image_data = base64_encode(file_get_contents(dirname(dirname(dirname(__FILE__))).'/images/pass.gif'));
    $data = ['data' => $image_data, 'type' => 'image/gif;base64'];
    $expected_result_code = 200;
    $expected_result = get_xml_header('things').file_get_contents(dirname(__FILE__).'/05-things-post-tests-135G.xml');
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 135, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 135, $title);
    }

    $title = 'Things Test 135H: This Time, We Specify the Key In The Parameter List.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/things/?key=MyNameIsMyPassword&payload=HelloDere';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('things').'<new_thing><id>1756</id><name>MyNameIsMyPassword</name><lang>en</lang><write_token>12</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><payload_type>text/plain;base64</payload_type><payload>SGVsbG9EZXJl</payload><key>MyNameIsMyPassword</key></new_thing></things>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 135, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 135, $title);
    }

    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}
?>
