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

baobab_run_tests(131, '130-: THINGS PUT TESTS', '');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0130() {
    basalt_run_single_direct_test(130, 'BASIC PUT TESTS ON SINGLE OBJECTS (JSON)', '', 'things_tests_2');
}

function basalt_test_0130($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Things Test 130A: Change the key, payload, name and description of a single record.';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/json/things/1732/?key=A+New+Simple+Text+Thing&payload=HELLO+WORLD&name=Howdy!&description=Simple+Text+Greeting&tag2=&tag3=&read_token=1&write_token=11';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/04-things-put-tests-130A.json');
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 130, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result, false);
        log_entry(true, 130, $title);
    }

    $title = 'Things Test 130B: Try Changing the Same Info for Another Record. We Expect A "Gentle" Failure, As The Key Is the Same.';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/json/things/1733/?key=A+New+Simple+Text+Thing&payload=HELLO+WORLD&name=Howdy!&description=Simple+Text+Greeting&tag2=&tag3=&read_token=1&write_token=11';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"things":[]}';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 130, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result, false);
        log_entry(true, 130, $title);
    }

    $title = 'Things Test 130C: Look At the Other Record, And Make Sure That No Changes Were Made.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/things/1733/?show_details';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/04-things-put-tests-130C.json');

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 130, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result, false);
        log_entry(true, 130, $title);
    }

    $title = 'Things Test 130D: Try Again, But This Time, Use A Different Key.';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/json/things/1733/?key=Another+Simple+Text+Thing&payload=HELLO+WORLD&name=Howdy!&description=Simple+Text+Greeting&tag2=&tag3=&read_token=1&write_token=11';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/04-things-put-tests-130D.json');

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 130, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result, false);
        log_entry(true, 130, $title);
    }

    $title = 'Things Test 130E: Look At Both Of Them Now.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/things/A+New+Simple+Text+Thing,Another+Simple+Text+Thing/?show_details';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"things":[{"id":1732,"name":"Howdy!","lang":"en","coords":"39.746352,-75.551615","read_token":1,"write_token":11,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.746352,"longitude":-75.551615,"payload_type":"text\/plain;base64","payload":"SEVMTE8gV09STEQ=","key":"A New Simple Text Thing","description":"Simple Text Greeting"},{"id":1733,"name":"Howdy!","lang":"en","coords":"39.648316,-77.719232","read_token":1,"write_token":11,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.648316,"longitude":-77.719232,"payload_type":"text\/plain;base64","payload":"SEVMTE8gV09STEQ=","key":"Another Simple Text Thing","description":"Simple Text Greeting"}]}';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 130, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result, false);
        log_entry(true, 130, $title);
    }

    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0131() {
    basalt_run_single_direct_test(131, 'BASIC PUT TESTS ON SINGLE OBJECTS (XML)', '', 'things_tests_2');
}

function basalt_test_0131($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Things Test 131A: Change the key, payload, name and description of a single record.';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/xml/things/1732/?key=A+New+Simple+Text+Thing&payload=HELLO+WORLD&name=Howdy!&description=Simple+Text+Greeting&tag2=&tag3=&read_token=1&write_token=11';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('things').file_get_contents(dirname(__FILE__).'/04-things-put-tests-131A.xml');
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 131, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result, false);
        log_entry(true, 131, $title);
    }

    $title = 'Things Test 131B: Try Changing the Same Info for Another Record. We Expect A "Gentle" Failure, As The Key Is the Same.';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/xml/things/1733/?key=A+New+Simple+Text+Thing&payload=HELLO+WORLD&name=Howdy!&description=Simple+Text+Greeting&tag2=&tag3=&read_token=1&write_token=11';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('things').'</things>';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 131, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result, false);
        log_entry(true, 131, $title);
    }

    $title = 'Things Test 131C: Look At the Other Record, And Make Sure That No Changes Were Made.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/things/1733/?show_details';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('things').file_get_contents(dirname(__FILE__).'/04-things-put-tests-131C.xml');

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 131, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result, false);
        log_entry(true, 131, $title);
    }

    $title = 'Things Test 131D: Try Again, But This Time, Use A Different Key.';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/xml/things/1733/?key=Another+Simple+Text+Thing&payload=HELLO+WORLD&name=Howdy!&description=Simple+Text+Greeting&tag2=&tag3=&read_token=1&write_token=11';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('things').file_get_contents(dirname(__FILE__).'/04-things-put-tests-131D.xml');

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 131, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result, false);
        log_entry(true, 131, $title);
    }

    $title = 'Things Test 131E: Look At Both Of Them Now.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/things/A+New+Simple+Text+Thing,Another+Simple+Text+Thing/?show_details';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('things').'<value sequence_index="0"><id>1732</id><name>Howdy!</name><lang>en</lang><coords>39.746352,-75.551615</coords><read_token>1</read_token><write_token>11</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.746352</latitude><longitude>-75.551615</longitude><payload_type>text/plain;base64</payload_type><payload>SEVMTE8gV09STEQ=</payload><key>A New Simple Text Thing</key><description>Simple Text Greeting</description></value><value sequence_index="1"><id>1733</id><name>Howdy!</name><lang>en</lang><coords>39.648316,-77.719232</coords><read_token>1</read_token><write_token>11</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.648316</latitude><longitude>-77.719232</longitude><payload_type>text/plain;base64</payload_type><payload>SEVMTE8gV09STEQ=</payload><key>Another Simple Text Thing</key><description>Simple Text Greeting</description></value></things>';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 131, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result, false);
        log_entry(true, 131, $title);
    }

    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}
?>
