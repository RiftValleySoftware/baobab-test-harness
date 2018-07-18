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

baobab_run_tests(72, 'BASIC PLACES TESTS', '');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0072() {
    basalt_run_single_direct_test(72, 'List Places (JSON)', 'GET tests for places.', 'places_tests_1');
}

function basalt_test_0072($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 72A: List All (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/01-get_places_tests-72A.json');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 72, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 72, $title);
    }
    
    $title = 'Places Test 72B: List All (Logged In as A Regular User)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/01-get_places_tests-72B.json');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 72, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 72, $title);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'Places Test 72C: List All With Details (Logged In as "God")';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?show_details';
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/01-get_places_tests-72C.json');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 72, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 72, $title);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0073() {
    basalt_run_single_direct_test(73, 'List Places (XML)', 'GET tests for places.', 'places_tests_1');
}

function basalt_test_0073($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 73A: List All (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').file_get_contents(dirname(__FILE__).'/01-get_places_tests-73A.xml');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 73, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 73, $title);
    }
    
    $title = 'Places Test 73B: List All (Logged In as A Regular User)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=Dilbert&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').file_get_contents(dirname(__FILE__).'/01-get_places_tests-73B.xml');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 73, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 73, $title);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'Places Test 73C: List All With Details (Logged In as "God")';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?show_details';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').file_get_contents(dirname(__FILE__).'/01-get_places_tests-73C.xml');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 73, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 73, $title);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0074() {
    basalt_run_single_direct_test(74, 'List Selected Places (JSON)', 'GET tests for individual places.', 'places_tests_1');
}

function basalt_test_0074($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 74A: List Several Places (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places/2,33,17,245,23,1720';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/01-get_places_tests-74A.json');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 74, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 74, $title);
    }
    
    $title = 'Places Test 74B: List Several Places With Details (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places/2,33,17,245,23,1720?show_details';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/01-get_places_tests-74B.json');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 74, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 74, $title);
    }
    
    $title = 'Places Test 74C: List One Single Place (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places/245';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"results":[{"id":245,"name":"Still In The Process","lang":"en","coords":"39.322056,-76.600627","address":"Coldstream Rec. Ctr., 1401 Filmore St., Baltimore, MD 21218 USA"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 74, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 74, $title);
    }
    
    $title = 'Places Test 74D: List One Single Place With Details (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places/1700?show_details';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"results":[{"id":1700,"name":"This Is How","lang":"en","coords":"39.798641,-75.567866","address":"Mount Lebanon Church, 850 Mount Lebanon Road, Wilmington, DE 19803 USA","last_access":"1970-01-02 00:00:00","owner_id":11,"latitude":39.798641,"longitude":-75.567866,"address_elements":{"venue":"Mount Lebanon Church","street_address":"850 Mount Lebanon Road","town":"Wilmington","county":"New Castle","state":"DE","postal_code":"19803","nation":"USA"},"tag8":"19:00:00"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 74, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 74, $title);
    }
}

// --------------------

function basalt_test_define_0075() {
    basalt_run_single_direct_test(75, 'List Selected Places (XML)', 'GET tests for individual places.', 'places_tests_1');
}

function basalt_test_0075($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 75A: List Several Places (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places/2,33,17,245,23,1720';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').file_get_contents(dirname(__FILE__).'/01-get_places_tests-75A.xml');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 75, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 75, $title);
    }
    
    $title = 'Places Test 75B: List Several Places With Details (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places/2,33,17,245,23,1720?show_details';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').file_get_contents(dirname(__FILE__).'/01-get_places_tests-75B.xml');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 75, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 75, $title);
    }
    
    $title = 'Places Test 75C: List One Single Place (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places/245';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<results><value sequence_index="0"><id>245</id><name>Still In The Process</name><lang>en</lang><coords>39.322056,-76.600627</coords><address>Coldstream Rec. Ctr., 1401 Filmore St., Baltimore, MD 21218 USA</address></value></results></places>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 75, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 75, $title);
    }
    
    $title = 'Places Test 75D: List One Single Place With Details (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places/1700?show_details';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<results><value sequence_index="0"><id>1700</id><name>This Is How</name><lang>en</lang><coords>39.798641,-75.567866</coords><address>Mount Lebanon Church, 850 Mount Lebanon Road, Wilmington, DE 19803 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>11</owner_id><latitude>39.798641</latitude><longitude>-75.567866</longitude><address_elements><venue>Mount Lebanon Church</venue><street_address>850 Mount Lebanon Road</street_address><town>Wilmington</town><county>New Castle</county><state>DE</state><postal_code>19803</postal_code><nation>USA</nation></address_elements><tag8>19:00:00</tag8></value></results></places>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 75, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 75, $title);
    }
}
?>
