<?php
/***************************************************************************************************************************/
/**
    BASALT Extension Layer

    © Copyright 2018, Little Green Viper Software Development LLC.

    This code is proprietary and confidential code, 
    It is NOT to be reused or combined into any application,
    unless done so, specifically under written license from Little Green Viper Software Development LLC.

    Little Green Viper Software Development: https://littlegreenviper.com
*/

static $s_start_time;

if (!class_exists('CO_Config')) {
    $config_file_path = dirname(dirname(__FILE__)).'/config/s_config.class.php';

    date_default_timezone_set ( 'UTC' );

    if ( !defined('LGV_CONFIG_CATCHER') ) {
        define('LGV_CONFIG_CATCHER', 1);
    }

    require_once($config_file_path);
}

require_once(dirname(__FILE__).'/callREST.php');

function start_log() {
    $logfile = dirname(dirname(__FILE__)).'/test_report.txt';
    
    if (file_exists($logfile)) {
        unlink($logfile);
    }
    
    if (_INCLUDE_TIMING_IN_REPORT_) {
        $logfile_handle = fopen($logfile, 'a');
        $date = new DateTime();
        $log_line = "TEST START: ".$date->format('Y-m-d H:i:s:v')."\n\n";
        fwrite($logfile_handle, $log_line);
        fclose($logfile_handle);
    }
}

function end_log($in_start_time = 0) {
    if (_INCLUDE_TIMING_IN_REPORT_) {
        $logfile = dirname(dirname(__FILE__)).'/test_report.txt';
        $logfile_handle = fopen($logfile, 'a');
        $date = new DateTime();
        $log_line = "\n\nTEST END: ".$date->format('Y-m-d H:i:s:v');
        if ($in_start_time) {
            $start = floatval($in_start_time);
            $end = microtime(true);
            
            $time = $end - $start;

            $days = intval($time / 86400);
            
            $time -= ($days * 86400);
            
            $hours = intval($time / 3600);
            
            $time -= ($hours * 86400);
            
            $minutes = intval($time / 60);
            
            $time -= ($minutes * 60);
            
            $log_line .= "\nThe Entire Test Suite Took $hours Hours, $minutes Minutes, and $time Seconds.";
        }
        $log_line .= "\n";
        fwrite($logfile_handle, $log_line);
        fclose($logfile_handle);
    }
}

function log_entry($in_pass_fail, $in_test_number, $in_test_text) {
    $logfile = dirname(dirname(__FILE__)).'/test_report.txt';
    $logfile_handle = fopen($logfile, 'a');
    $log_line = '';
    
    if ($logfile_handle) {
        if (!$in_pass_fail && _INCLUDE_TIMING_IN_REPORT_) {
            $log_line .= "\n********\n";
        }
        $log_line .= ($in_pass_fail ? 'PASS' : '* FAIL *').','.intval($in_test_number).','.'"'.str_replace('"', '\\"', $in_test_text).'"'."\n";
        if (!$in_pass_fail && _INCLUDE_TIMING_IN_REPORT_) {
            $log_line .= "********\n";
        }
        fwrite($logfile_handle, $log_line);
        fclose($logfile_handle);
    }
}

function load_places_photos() {
    $ret = NULL;
    $st1 = microtime(true);
    $ret = load_photos(dirname(dirname(__FILE__)).'/places-photos', 'places');
    timing_report($st1, 'load the place images');
    return $ret;
}

function load_people_photos() {
    $ret = NULL;
    $st1 = microtime(true);
    $ret = load_photos(dirname(dirname(__FILE__)).'/people-photos', 'people/people');
    timing_report($st1, 'load the people images');
    return $ret;
}

function load_photos($in_dirname, $in_uri_loc) {
    $ret = [];
    
    $process_files = [];
    
    $iterator = new DirectoryIterator($in_dirname);
    
    foreach ($iterator as $fileinfo) {
        if (('.' === substr($fileinfo->getBasename(), 0, 1))) {
            continue;
        } elseif ('jpg' === $fileinfo->getExtension()) {
            $place_index = intval(substr($fileinfo->getBasename(), -8, 4));
            $process_files[] = ['location' => $fileinfo->getPathname(), 'index' => $place_index];
        }
    }
    
    if (count($process_files)) {
        $result_code = '';
        $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
        $method = 'PUT';
        $uri = __SERVER_URI__.'/json/'.$in_uri_loc.'/';
        $image_type = 'image/jpeg';
        
        foreach ($process_files as $image_file) {
            $image_data = file_get_contents($image_file['location']);
            $data = ['data' => $image_data, 'type' => $image_type];
            $result = call_REST_API($method, $uri.$image_file['index'], $data, $api_key, $result_code);

            if (200 != $result_code) {
                echo('<h3 style="color:red">ERROR! Cannot set Image '.$image_file['location'].'!</h3>');
                $ret = NULL;
                break;
            } else {
                $temp_file_name = substr($image_file['location'], 0, -4).'-base64.txt';
                $ret[] = intval($image_file['index']);
                $file = fopen($temp_file_name, 'w');
                $file_data = base64_encode($image_data);
                fwrite($file, $file_data, strlen($file_data));
                fclose($file);
            }
        }
        
        call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    }
    
    return $ret;
}

function clean_last_access_json($in_json, $in_replacement_password = '-PASSWORD-') {
    $in_result = preg_replace('|"last_access":"\d\d\d\d-\d\d-\d\d \d\d:\d\d:\d\d"|', '"last_access":"1970-01-02 00:00:00"', $in_json);
    return preg_replace('|"password":".*?"|', '"password":"'.$in_replacement_password.'"', $in_result);
}

function clean_last_access_xml($in_xml, $in_replacement_password = '-PASSWORD-') {
    $in_result = preg_replace('|\<last_access\>\d\d\d\d-\d\d-\d\d \d\d:\d\d:\d\d|', '<last_access>1970-01-02 00:00:00', $in_xml);
    return preg_replace('|\<password\>.*?\<\/password\>|', '<password>'.$in_replacement_password.'</password>', $in_result);
}

function prettify_xml($xml) {
    $domxml = new DOMDocument('1.0');
    $domxml->preserveWhiteSpace = false;
    $domxml->formatOutput = true;
    $domxml->loadXML($xml);
    $xml = $domxml->saveXML();
    return htmlspecialchars($xml);
}

function prettify_json($json) {
    $json .= "\n";
    $result = '';
    $level = 0;
    $in_quotes = false;
    $in_escape = false;
    $ends_line_level = NULL;
    $json_length = strlen( $json );

    for( $i = 0; $i < $json_length; $i++ ) {
        $char = $json[$i];
        $new_line_level = NULL;
        $post = "";
        if( $ends_line_level !== NULL ) {
            $new_line_level = $ends_line_level;
            $ends_line_level = NULL;
        }
        if ( $in_escape ) {
            $in_escape = false;
        } else if( $char === '"' ) {
            $in_quotes = !$in_quotes;
        } else if( ! $in_quotes ) {
            switch( $char ) {
                case '}': case ']':
                    $level--;
                    $ends_line_level = NULL;
                    $new_line_level = $level;
                    break;

                case '{': case '[':
                    $level++;
                case ',':
                    $ends_line_level = $level;
                    break;

                case ':':
                    $post = " ";
                    break;

                case " ": case "\t": case "\n": case "\r":
                    $char = "";
                    $ends_line_level = $new_line_level;
                    $new_line_level = NULL;
                    break;
            }
        } else if ( $char === '\\' ) {
            $in_escape = true;
        }
        if( ($new_line_level !== NULL) && (0 < $new_line_level) ) {
            $result .= "\n".str_repeat( "  ", $new_line_level );
        }
        $result .= $char.$post;
    }
    
    $result = trim(stripslashes(preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');}, $result)));
    
    return $result;
}

function get_xml_header($in_plugin_name) {
    $ret = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
    $xsd_uri = __SERVER_URI__.'/xsd/'.$in_plugin_name;
    $ret .= '<'.$in_plugin_name." xsi:schemaLocation=\"".__SERVER_URI__." $xsd_uri\" xmlns=\"".__SERVER_URI__."\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\">";
    
    return $ret;
}

function get_xsd($in_plugin_name, $in_dirname = NULL) {
    if (!$in_dirname) {
        $in_dirname = "/plugins/$in_plugin_name";
    }
    
    $xsd_path = dirname(dirname(__FILE__)).'/basalt/'.$in_dirname.'/schema.xsd';
    
    $ret = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
    $server_url = __SERVER_URI__;
    $xsd_uri = $server_url.'/xsd/'.$in_plugin_name;
    $ret .= "<xs:schema xmlns:xs='http://www.w3.org/2001/XMLSchema' xmlns:b='$server_url' elementFormDefault='qualified' targetNamespace='$server_url'>";

    $ret .= file_get_contents($xsd_path);
    $ret .= '</xs:schema>';
    return $ret;
}

function validate_xml($in_xml) {
    $matches = [];
    $ret = false;
    $result = preg_match('|\/xsd\/([^"]+?)"|', $in_xml, $matches);
    if ($result) {
        $plugin_name = $matches[1];
        $schema = get_xsd($plugin_name, ('baseline' == $plugin_name) ? 'main' : NULL);
        $domxml = new DOMDocument('1.0');
        $domxml->preserveWhiteSpace = false;
        $domxml->formatOutput = true;
        $domxml->loadXML($in_xml);
    
        echo('<div class="indent_1">');
        if ($domxml->schemaValidateSource($schema)) {
            $ret = true;
            echo('<h4 style="color:green">XML Is Valid!</h4>');
        } else {
            echo('<h4 style="color:red">XML Is Not Valid!</h4>');
            log_entry(false, 0, 'XML VALIDATION FAIL for plugin: '.$plugin_name);
        }
        echo('</div>');
    }
    
    return $ret;
}

function test_header($in_title, $in_method, $in_uri, $in_result_code) {
    echo('<h3>'.htmlspecialchars($in_title).'</h3><div class="indent_1">');
    echo('<p><em><strong>METHOD:</strong> '.htmlspecialchars($in_method).'</em></p>');
    echo('<p><em><strong>URI:</strong> '.htmlspecialchars($in_uri).'</em></p>');
    echo('<p><em><strong>EXPECTED RESPONSE CODE:</strong> '.htmlspecialchars($in_result_code).'</em></p></div>');
}

function timing_report($in_start, $in_text = 'execute this query') {
    $fetchTime = sprintf('%01.4f', microtime(true) - $in_start);
    if (_INCLUDE_TIMING_IN_REPORT_) {
        $logfile = dirname(dirname(__FILE__)).'/test_report.txt';
        $logfile_handle = fopen($logfile, 'a');
    
        if ($logfile_handle) {
            $log_line = "\tTIME: $fetchTime Seconds to $in_text.\n";
            fwrite($logfile_handle, $log_line);
            fclose($logfile_handle);
        }
    }
    echo("<div class=\"indent_1 timing_report\">It took $fetchTime seconds to $in_text.</div>");
}

function test_result_bad($in_result_code, $in_result, $in_st_1, $in_expected_result) {
    timing_report($in_st_1);
    echo('<div class="indent_1 test_report bad_report"><h3 style="color:red">Did Not Receive Expected Result Code. Got '.intval($in_result_code).', Instead.</h3>');
    if (isset($in_result) && $in_result && $in_expected_result && ($in_expected_result == $in_result)) {
        echo('<div class="indent_1" style="color:green"><strong>Received Expected Result</strong><div>');
        if ($in_result) {
            if (preg_match('|^\<\?xml|', $in_result)) {
                echo('<div id="'.$id.'" class="inner_closed">');
                    echo('<h3 class="inner_header"><a class="display_a" href="javascript:toggle_inner_state(\''.$id.'\')">Display Results</a></h3>');
                    echo('<div class="inner_container">');
                        echo('<div class="container"><pre>');
                            echo(prettify_xml($in_result));
                        echo('</pre></div>');
                    echo('</div>');
                echo('</div>');
            } else {
                echo('<div id="'.$id.'" class="inner_closed">');
                    echo('<h3 class="inner_header"><a class="display_a" href="javascript:toggle_inner_state(\''.$id.'\')">Display Results</a></h3>');
                    echo('<div class="inner_container">');
                        echo('<div class="container"><pre>');
                            echo(prettify_json($in_result));
                        echo('</pre></div>');
                    echo('</div>');
                echo('</div>');
            }
        }
    } elseif ($in_expected_result) {
        log_entry(false, 0, 'BAD Match');
        echo('<div class="indent_1" style="color:red"><strong>Did Not Receive Expected Result!</strong></div>');
        if ($in_result) {
            if (preg_match('|^\<\?xml|', $in_result)) {
                echo('<div id="'.$id.'" class="inner_closed">');
                    echo('<h3 class="inner_header"><a class="display_a" href="javascript:toggle_inner_state(\''.$id.'\')">Display Results</a></h3>');
                    echo('<div class="inner_container">');
                        echo('<div class="container"><pre>');
                            echo(prettify_xml($in_result));
                        echo('</pre></div>');
                    echo('</div>');
                echo('</div>');
            } else {
                echo('<div id="'.$id.'" class="inner_closed">');
                    echo('<h3 class="inner_header"><a class="display_a" href="javascript:toggle_inner_state(\''.$id.'\')">Display Results</a></h3>');
                    echo('<div class="inner_container">');
                        echo('<div class="container"><pre>');
                            echo(prettify_json($in_result));
                        echo('</pre></div>');
                    echo('</div>');
                echo('</div>');
            }
        }
    }
    
    echo('</div>');
}

function extract_payload($in_data) {
    $ret = NULL;
                        
    if (preg_match('|^\<\?xml|', $in_data)) {
        // The reason for this nighmarish bowl of spaghetti, is because preg_match pukes on some base64 image data.
        $payload1 = NULL;
        $payload2 = NULL;
        $matches = explode('<payload>', stripslashes($in_data));
        if (1 < count($matches)) {
            $payload1_array = explode('</payload>', $matches[1]);
            $payload1 = $payload1_array[0];
        }
        
        if (3 < count($matches)) {
            $payload2_array = explode('</payload>', $matches[3]);
            $payload2 = $payload2_array[0];
        }
        
        if ($payload1) {
            $type1 = NULL;
            $type2 = NULL;
            $matches = explode('<payload_type>', stripslashes($in_data));
            if (1 < count($matches)) {
                $payload1_array = explode('</payload_type>', $matches[1]);
                $type1 = $payload1_array[0];
            }
            if (3 < count($matches)) {
                $payload2_array = explode('</payload_type>', $matches[3]);
                $type2 = $payload2_array[0];
            }
            if ($type1) {
                echo('<div class="payload_display">');
                    echo('<h3>PAYLOAD:</h3>');
                    if ($type2) {
                        echo('<h4>BEFORE:</h4>');
                    }
                    echo('<div class="image_display_div"><img src="data:'.$type1.','.$payload1.'" title="Image Payload" alt="Image Payload" style="max-width:100%" /></div>');
                    if ($type2) {
                        echo('<h4>AFTER:</h4>');
                        echo('<div class="image_display_div"><img src="data:'.$type2.','.$payload2.'" title="Image Payload" alt="Image Payload" style="max-width:100%" /></div>');
                    }
                echo("</div>");
            }
        }
    } else {
        // The reason for this nighmarish bowl of spaghetti, is because preg_match pukes on some base64 image data.
        $payload1 = NULL;
        $payload2 = NULL;
        $matches = explode('"payload":"', stripslashes($in_data));
        if (1 < count($matches)) {
            $payload1_array = explode('"', $matches[1]);
            $payload1 = $payload1_array[0];
        }
        
        if (3 < count($matches)) {
            $payload2_array = explode('"', $matches[3]);
            $payload2 = $payload2_array[0];
        }
        
        if ($payload1) {
            $type1 = NULL;
            $type2 = NULL;
            $matches = explode('"payload_type":"', stripslashes($in_data));
            if (1 < count($matches)) {
                $payload1_array = explode('"', $matches[1]);
                $type1 = $payload1_array[0];
            }
            if (3 < count($matches)) {
                $payload2_array = explode('"', $matches[3]);
                $type2 = $payload2_array[0];
            }
            if ($type1) {
                echo('<div class="payload_display">');
                    echo('<h3>PAYLOAD:</h3>');
                    if ($type2) {
                        echo('<h4>BEFORE:</h4>');
                    }
                    echo('<div class="image_display_div"><img src="data:'.$type1.','.$payload1.'" title="Image Payload" alt="Image Payload" style="max-width:100%" /></div>');
                    if ($type2) {
                        echo('<h4>AFTER:</h4>');
                        echo('<div class="image_display_div"><img src="data:'.$type2.','.$payload2.'" title="Image Payload" alt="Image Payload" style="max-width:100%" /></div>');
                    }
                echo("</div>");
            }
        }
    }

    return $ret;
}

function test_result_good($in_result_code, $in_result, $in_st_1, $in_expected_result, $show_payload = true) {
    timing_report($in_st_1);
    $id = uniqid('test-result-');
    echo('<div class="indent_1 test_report good_report"><h3 style="color:green">Received Expected Result Code: '.intval($in_result_code).'</h3>');
    if (isset($in_result) && $in_result && $in_expected_result && ($in_expected_result == $in_result)) {
        echo('<div class="indent_1" style="color:green"><p>Received Expected Result</p></div>');
        $matches = [];
        if (preg_match('|^\<\?xml|', $in_result)) {
            validate_xml($in_result);
            echo('<div id="'.$id.'" class="inner_closed">');
                echo('<h3 class="inner_header"><a href="javascript:toggle_inner_state(\''.$id.'\')">Display Results</a></h3>');
                echo('<div class="inner_container">');
                    echo('<div class="container">');
                        echo('<pre>');
                            echo(prettify_xml($in_result));
                        echo('</pre>');
                        if ($show_payload) {
                            extract_payload($in_result);
                        }
                    echo('</div>');
                echo('</div>');
            echo('</div>');
        } else {
            echo('<div id="'.$id.'" class="inner_closed">');
                echo('<h3 class="inner_header"><a href="javascript:toggle_inner_state(\''.$id.'\')">Display Results</a></h3>');
                echo('<div class="inner_container">');
                    echo('<div class="container">');
                        echo('<pre>');
                            echo(prettify_json($in_result));
                        echo('</pre>');
                        if ($show_payload) {
                            extract_payload($in_result);
                        }
                    echo('</div>');
                echo('</div>');
            echo('</div>');
        }
    } elseif ($in_expected_result || ($in_result && ($in_expected_result != $in_result))) {
        log_entry(false, 0, 'BAD Match');
        echo('<div class="indent_1" style="color:red"><strong>Did Not Receive Expected Result!</strong></div>');
        if ($in_result) {
            if (preg_match_all('|^\<\?xml|', $in_result)) {
                echo('<div id="'.$id.'" class="inner_closed">');
                    echo('<h3 class="inner_header"><a href="javascript:toggle_inner_state(\''.$id.'\')">Display Results</a></h3>');
                    echo('<div class="inner_container">');
                        echo('<div class="container">');
                            echo('<div>');
                                echo('<pre>');
                                    echo(prettify_xml($in_result));
                                echo('</pre>');
                                if ($show_payload) {
                                    extract_payload($in_result);
                                }
                            echo('</div>');
                            echo('<div>');
                                echo('<strong>EXPECTED:</strong>');
                                echo('<pre>');
                                    echo(prettify_xml($in_expected_result));
                                echo('</pre>');
                                if ($show_payload) {
                                    extract_payload($in_result);
                                }
                            echo('</div>');
                        echo('</div>');
                    echo('</div>');
                echo('</div>');
            } else {
                echo('<div id="'.$id.'" class="inner_closed">');
                    echo('<h3 class="inner_header"><a href="javascript:toggle_inner_state(\''.$id.'\')">Display Results</a></h3>');
                    echo('<div class="inner_container">');
                        echo('<div class="container">');
                            echo('<div>');
                                echo('<pre>');
                                    echo(prettify_json($in_result));
                                echo('</pre>');
                                if ($show_payload) {
                                    extract_payload($in_result);
                                }
                            echo('</div>');
                            echo('<div>');
                                echo('<strong>EXPECTED:</strong>');
                                echo('<pre>');
                                    echo(prettify_json($in_expected_result));
                                echo('</pre>');
                                if ($show_payload) {
                                    extract_payload($in_result);
                                }
                            echo('</div>');
                        echo('</div>');
                    echo('</div>');
                echo('</div>');
            }
        }
    }
    
    echo('</div>');
}

function make_andisol($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    if ( !defined('LGV_ANDISOL_CATCHER') ) {
        define('LGV_ANDISOL_CATCHER', 1);
    }

    require_once(CO_Config::andisol_main_class_dir().'/co_andisol.class.php');

    $andisol_instance = new CO_Andisol($in_login, $in_hashed_password, $in_password);

    if (isset($andisol_instance) && ($andisol_instance instanceof CO_Andisol)) {
        echo("<h2 style=\"color:green;font-weight:bold\">The ANDISOL instance is valid!</h2>");
    } elseif (isset($andisol_instance) && ($andisol_instance->error instanceof LGV_Error)) {
        echo("<h2 style=\"color:red;font-weight:bold\">The ANDISOL instance is not valid!</h2>");
        echo('<p style="margin-left:1em;color:red;font-weight:bold">Error: ('.$andisol_instance->error->error_code.') '.$andisol_instance->error->error_name.' ('.$andisol_instance->error->error_description.')</p>');
    } else {
        echo("<h2 style=\"color:red;font-weight:bold\">The ANDISOL instance was not instantiated!</h2>");
    }

    return $andisol_instance;
}

function prepare_databases($in_file_prefix) {
    if ( !defined('LGV_DB_CATCHER') ) {
        define('LGV_DB_CATCHER', 1);
    }

    require_once(CO_Config::db_class_dir().'/co_pdo.class.php');

    if ( !defined('LGV_ERROR_CATCHER') ) {
        define('LGV_ERROR_CATCHER', 1);
    }

    require_once(CO_Config::badger_shared_class_dir().'/error.class.php');
    
    $pdo_data_db = NULL;
    try {
        $pdo_data_db = new CO_PDO(CO_Config::$data_db_type, CO_Config::$data_db_host, CO_Config::$data_db_name, CO_Config::$data_db_login, CO_Config::$data_db_password);
    } catch (Exception $exception) {
// die('<pre style="text-align:left">'.htmlspecialchars(print_r($exception, true)).'</pre>');
                $error = new LGV_Error( 1,
                                        'INITIAL DATABASE SETUP FAILURE',
                                        'FAILED TO INITIALIZE A DATABASE!',
                                        $exception->getFile(),
                                        $exception->getLine(),
                                        $exception->getMessage());
            echo('<h1 style="color:red">ERROR WHILE TRYING TO ACCESS DATABASES!</h1>');
            echo('<pre>'.htmlspecialchars(print_r($error, true)).'</pre>');
    }
    
    if ($pdo_data_db) {
        $pdo_security_db = new CO_PDO(CO_Config::$sec_db_type, CO_Config::$sec_db_host, CO_Config::$sec_db_name, CO_Config::$sec_db_login, CO_Config::$sec_db_password);
        
        if ($pdo_security_db) {
            $data_db_sql = file_get_contents(dirname(dirname(__FILE__)).'/sql/'.$in_file_prefix.'_data_'.CO_Config::$data_db_type.'.sql');
            $security_db_sql = file_get_contents(dirname(dirname(__FILE__)).'/sql/'.$in_file_prefix.'_security_'.CO_Config::$sec_db_type.'.sql');
            
            $error = NULL;
    
            try {
                $pdo_data_db->preparedExec($data_db_sql);
                $pdo_security_db->preparedExec($security_db_sql);
            } catch (Exception $exception) {
// die('<pre style="text-align:left">'.htmlspecialchars(print_r($exception, true)).'</pre>');
                $error = new LGV_Error( 1,
                                        'INITIAL DATABASE SETUP FAILURE',
                                        'FAILED TO INITIALIZE A DATABASE!',
                                        $exception->getFile(),
                                        $exception->getLine(),
                                        $exception->getMessage());
                                                
            echo('<h1 style="color:red">ERROR WHILE TRYING TO OPEN DATABASES!</h1>');
            echo('<pre>'.htmlspecialchars(print_r($error, true)).'</pre>');
            }
        return;
        }
    }
    echo('');
    echo('<h1 style="color:red">UNABLE TO OPEN DATABASE!</h1>');
}

function display_raw_hierarchy($in_hierarchy_array, $modifier) {
    if (isset($in_hierarchy_array) && is_array($in_hierarchy_array) && count($in_hierarchy_array)) {
        $new_mod = 'element_'.$in_hierarchy_array['object']->id().'_'.$modifier;
        if (isset($in_hierarchy_array['children'])) {
            echo('<div id="collection_wrapper_'.$new_mod.'" class="inner_closed">');
                echo('<h3 class="inner_header"><a href="javascript:toggle_inner_state(\''.$new_mod.'\')">');
        } else {
            echo('<h3 class="inner_header">');
        }
        
        echo($in_hierarchy_array['object']->name);
        echo(' (READ: '.$in_hierarchy_array['object']->read_security_id);
        echo(', WRITE: '.$in_hierarchy_array['object']->write_security_id.')');
        
        $child_ids = $in_hierarchy_array['object']->children_ids();
        sort($child_ids);
        $track = [];
        
        if (isset($in_hierarchy_array['children'])) {
            echo(" <em>(".count($in_hierarchy_array['children']).")</em>");
            echo('</a></h3>');
            foreach ($in_hierarchy_array['children'] as $child) {
                if (!in_array($child['object']->id(), $child_ids)) {
                    echo('<h4 style="color:red">ERROR! The ID ('.$child['object']->id().') is not in the child ID array!</h4>');
                } else {
                    $track[] = intval($child['object']->id());
                    echo('<div class="main_div inner_container">');
                        display_raw_hierarchy($child, $new_mod);
                    echo('</div>');
                }
            }
            
            sort($track);
            
            if ($track != $child_ids) {
                echo('<h4 style="color:red">ERROR! It looks like we did not get to every child!</h4>');
                echo('<div class="main_div inner_container" style="color:red">');
                    echo('<strong>What we did:</strong><pre>'.htmlspecialchars(print_r($track, true)).'</pre>');
                    echo('<strong>What we should have done:</strong><pre>'.htmlspecialchars(print_r($child_ids, true)).'</pre>');
                echo('</div>');
            }
            echo('</div>');
        } else {
            echo('</h3>');
        }
    }
}
        
function hierarchicalDisplayRecord($in_record, $in_hierarchy_level = 0, $in_parent_object = NULL, $shorty = false) {
    if ($in_hierarchy_level) {
        echo('<div style="margin-left:'.strval($in_hierarchy_level + 2).'em;margin-top:1em;border:'.strval($in_hierarchy_level + 1).'px dashed black;padding:0.125em">');

        echo("<p>Hierarchy level: $in_hierarchy_level</p>");
        
        if (isset($in_parent_object) && method_exists($in_parent_object, 'id')) {
            $id_no = $in_parent_object->id();
            echo("<p>Parent Object ID: $id_no</p>");
        }
    } else {
        echo("<div>");
    }
    
    display_record($in_record, $in_hierarchy_level, $shorty);
    
    echo('</div>');
}

function display_login_report($in_record_object) {
    $access_object = $in_record_object->get_access_object();
    if ($access_object) {
        $login_item = $access_object->get_login_item();
        if ($login_item) {
            echo('<p style="font-style:italic;margin-top:0.25em;margin-bottom:0.25em">'.'This user ("'.$login_item->name.'"), is logged in as "'.$login_item->login_id.'" ('.implode(', ', $login_item->ids()).').</p>');
            if ($in_record_object->user_can_write()) {
                echo('<p style="color: green;font-weight:bold;font-size:large;font-style:italic;margin-bottom:0.25em">This user can modify this record.</p>');
            }
        }
    }
}

function display_record($in_record_object, $in_hierarchy_level = 0, $shorty = false) {
    echo("<h5 style=\"margin-top:0.5em\">ITEM ".$in_record_object->id().":</h5>");
    if (isset($in_record_object) && $in_record_object) {
        echo('<div class="inner_div">');
            if (!$shorty) {
                display_login_report($in_record_object);
                echo("<p>Class: ".get_class($in_record_object)."</p>");
                if (isset($in_record_object->name)) {
                    echo("<p>Name: ".$in_record_object->name."</p>");
                }
        
                if (isset($in_record_object->login_id)) {
                    echo("<p>Login ID: ".$in_record_object->login_id."</p>");
                }
            
                echo("<p>$in_record_object->class_description</p>");
                echo("<p>$in_record_object->instance_description</p>");
                echo("<p>Read: $in_record_object->read_security_id</p>");
                echo("<p>Write: $in_record_object->write_security_id</p>");
                if (method_exists($in_record_object, 'get_lang')) {
                    echo("<p>Lang: ".$in_record_object->get_lang()."</p>");
                }
        
                if (method_exists($in_record_object, 'owner_id') && intval($in_record_object->owner_id())) {
                    echo("<p>Owner: ".intval($in_record_object->owner_id())."</p>");
                }
        
                if (isset($in_record_object->last_access)) {
                    echo("<p>Last access: ".date('g:i:s A, F j, Y', $in_record_object->last_access)."</p>");
                }
        
                if (isset($in_record_object->distance)) {
                    $distance = sprintf('%01.3f', $in_record_object->distance);
                    echo("<p>Distance: $distance"."Km</p>");
                }
            
                if (method_exists($in_record_object, 'tags')) {
                    if ($in_record_object instanceof CO_Place) {
                        $address_elements = $in_record_object->get_address_elements();
                        if (isset($address_elements) && is_array($address_elements) && (0 < count($address_elements))) {
                            foreach ($address_elements as $key => $value) {
                                if (trim($value)) {
                                    echo("<p>$key: \"$value\"</p>");
                                }
                            }
                        }
                        if (($in_record_object instanceof CO_US_Place) && isset($in_record_object->tags()[7])) {
                            echo("<p>Tag 7: \"".$in_record_object->tags()[7]."\"</p>");
                        }
                        if (isset($in_record_object->tags()[8])) {
                            echo("<p>Tag 8: \"".$in_record_object->tags()[8]."\"</p>");
                        }
                        if (isset($in_record_object->tags()[9])) {
                            echo("<p>Tag 9: \"".$in_record_object->tags()[9]."\"</p>");
                        }
                        $address = $in_record_object->get_readable_address();
                        if ($address) {
                            echo("<p>Address: \"$address.\"</p>");
                        }
                    } else {
                        foreach ($in_record_object->tags() as $key => $value) {
                            echo("<p>Tag $key: \"$value\"</p>");
                        }
                    }
                }
    
                if (method_exists($in_record_object, 'ids')) {
                    echo("<p>IDs: ".implode(', ', $in_record_object->ids())."</p>");
                } else {
                    if ($in_record_object instanceof CO_Security_Login) {
                        echo("<h4>NO IDS!</h4>");
                    }
                }
                    
                if (method_exists($in_record_object, 'children')) {
                    $children = $in_record_object->children();
            
                    foreach ($children as $child) {
                        hierarchicalDisplayRecord($child, $in_hierarchy_level + 1, $in_record_object, $shorty);
                    }
                }
            } else {
                echo("<p>$in_record_object->name <em>(".$in_record_object->id().")</em></p>");
            }
        echo('</div>');
    } else {
        echo("<h4>Invalid Object!</h4>");
    }
}
