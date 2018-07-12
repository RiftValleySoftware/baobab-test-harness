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

baobab_run_tests(26, 'BASIC SELECTED PEOPLE TESTS', 'Access Users and Logins Specifically. NOTE: in these tests, we "normalize" all the "last_access" values, so the match works.');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0026() {
    basalt_run_single_direct_test(26, 'Access A Single User By Numerical ID (JSON)', 'GET tests for users, where we access one single user, by its numerical ID.', 'people_tests');
}

function basalt_test_0026($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 26A: Access A Single User (with an associated login) by ID (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/1725';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 26B: Access A Single User (with an associated login) by ID (Logged In as a Normal User)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/1725';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MeLeet&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 26C: Access A Single User (with an associated login) by ID (Logged In as a Manager)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/1725';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 26D: Access A Single User (with an associated login) by ID (Logged In as "God")';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/1725';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);

    $title = 'People Test 26E: Access A Single User (with an associated login) by ID, with details (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/1725?show_details';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","last_access":"1970-01-02 00:00:00","latitude":39.2858,"longitude":-76.6131,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 26F: Access A Single User (with an associated login) by ID, with details (Logged In as a Normal User)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/1725/?show_details';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MeLeet&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","latitude":39.2858,"longitude":-76.6131,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 26G: Access A Single User (with an associated login) by ID, with details (Logged In as a Manager)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/1725?show_details';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.2858,"longitude":-76.6131,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login_id":7}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 26H: Access A Single User (with an associated login) by ID, with details (Logged In as "God")';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/1725/?show_details';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.2858,"longitude":-76.6131,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login_id":7}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 26I: Access A Single User (with an associated login) by ID, with details and associated login (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/1725?login_user';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","last_access":"1970-01-02 00:00:00","latitude":39.2858,"longitude":-76.6131,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 26J: Access A Single User (with an associated login) by ID, with details and associated login (Logged In as a Normal User)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/1725/?login_user';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MeLeet&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","latitude":39.2858,"longitude":-76.6131,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 26K: Access A Single User (with an associated login) by ID, with details and associated login (Logged In as a Manager)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/1725/?login_user';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.2858,"longitude":-76.6131,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login":{"id":7,"name":"Maryland Login","lang":"en","login_id":"MDAdmin","read_token":7,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1725,"is_manager":false,"is_main_admin":false,"security_tokens":[7]}}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 26L: Access A Single User (with an associated login) by ID, with details and associated login (Logged In as a PHB Manager)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/1725/?login_user';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=PHB&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","latitude":39.2858,"longitude":-76.6131,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 26K: Access A Single User (with an associated login) by ID, with details and associated login (Logged In as "God")';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/1725/?login_user';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.2858,"longitude":-76.6131,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login":{"id":7,"name":"Maryland Login","lang":"en","login_id":"MDAdmin","read_token":7,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1725,"is_manager":false,"is_main_admin":false,"security_tokens":[7]}}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0027() {
    basalt_run_single_direct_test(27, 'Access A Single User By Numerical ID (XML)', 'GET tests for users, where we access one single user, by its numerical ID.', 'people_tests');
}

function basalt_test_0027($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 27A: Access A Single User (with an associated login) by ID (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/1725';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords></value></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 27B: Access A Single User (with an associated login) by ID (Logged In as a Normal User)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/1725';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MeLeet&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords></value></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 27C: Access A Single User (with an associated login) by ID (Logged In as a Manager)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/1725';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords></value></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 27D: Access A Single User (with an associated login) by ID (Logged In as "God")';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/1725';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords></value></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);

    $title = 'People Test 27E: Access A Single User (with an associated login) by ID, with details (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/1725?show_details';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords><last_access>1970-01-02 00:00:00</last_access><latitude>39.2858</latitude><longitude>-76.6131</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name></value></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 27F: Access A Single User (with an associated login) by ID, with details (Logged In as a Normal User)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/1725/?show_details';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MeLeet&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><latitude>39.2858</latitude><longitude>-76.6131</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name></value></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 27G: Access A Single User (with an associated login) by ID, with details (Logged In as a Manager)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/1725?show_details';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.2858</latitude><longitude>-76.6131</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login_id>7</associated_login_id></value></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 27H: Access A Single User (with an associated login) by ID, with details (Logged In as "God")';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/1725/?show_details';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.2858</latitude><longitude>-76.6131</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login_id>7</associated_login_id></value></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 27I: Access A Single User (with an associated login) by ID, with details and associated login (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/1725?login_user';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords><last_access>1970-01-02 00:00:00</last_access><latitude>39.2858</latitude><longitude>-76.6131</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name></value></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 27J: Access A Single User (with an associated login) by ID, with details and associated login (Logged In as a Normal User)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/1725/?login_user';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MeLeet&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><latitude>39.2858</latitude><longitude>-76.6131</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name></value></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 27K: Access A Single User (with an associated login) by ID, with details and associated login (Logged In as a Manager)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/1725/?login_user';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.2858</latitude><longitude>-76.6131</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login><id>7</id><name>Maryland Login</name><lang>en</lang><login_id>MDAdmin</login_id><read_token>7</read_token><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1725</user_object_id><security_tokens><value sequence_index="0">7</value></security_tokens></associated_login></value></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 27L: Access A Single User (with an associated login) by ID, with details and associated login (Logged In as a PHB Manager)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/1725/?login_user';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=PHB&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><latitude>39.2858</latitude><longitude>-76.6131</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name></value></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 27K: Access A Single User (with an associated login) by ID, with details and associated login (Logged In as "God")';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/1725/?login_user';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.2858</latitude><longitude>-76.6131</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login><id>7</id><name>Maryland Login</name><lang>en</lang><login_id>MDAdmin</login_id><read_token>7</read_token><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1725</user_object_id><security_tokens><value sequence_index="0">7</value></security_tokens></associated_login></value></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0028() {
    basalt_run_single_direct_test(28, 'Access A Single User By Login ID (JSON)', 'GET tests for users, where we access one single user, by its numerical or string login ID.', 'people_tests');
}

function basalt_test_0028($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 28A: Access A Single User (with an associated login) by Numerical ID (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/login_ids/7';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 28B: Access A Single User (with an associated login) by String ID (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/login_ids/MDAdmin';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 28C: Access A Single User (with an associated login) by Numerical ID (Logged In as a Normal User that Cannot See the Login)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/login_ids/7';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MeLeet&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 28D: Access A Single User (with an associated login) by String ID (Logged In as a Normal User that Cannot See the Login)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/login_ids/MDAdmin';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MeLeet&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 28E: Access A Single User (with an associated login) by Numerical ID (Logged In as a Manager that Cannot See the Login)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/login_ids/7';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=PHB&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 28F: Access A Single User (with an associated login) by String ID (Logged In as a Manager that Cannot See the Login)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/login_ids/MDAdmin';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=PHB&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 28G: Access A Single User (with an associated login) by Numerical ID (Logged In as a Manager that Can See the Login)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/login_ids/7';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 28H: Access A Single User (with an associated login) by String ID (Logged In as a Manager that Can See the Login)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/login_ids/MDAdmin';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 28I: Access A Single User (with an associated login) by Numerical ID (Logged In as "God"). Also, show lots of detail.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/login_ids/7?login_user';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.2858,"longitude":-76.6131,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login":{"id":7,"name":"Maryland Login","lang":"en","login_id":"MDAdmin","read_token":7,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1725,"is_manager":false,"is_main_admin":false,"security_tokens":[7]}}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 28J: Access A Single User (with an associated login) by String ID (Logged In as "God"). Also, show lots of detail.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/login_ids/MDAdmin?login_user';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.2858,"longitude":-76.6131,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login":{"id":7,"name":"Maryland Login","lang":"en","login_id":"MDAdmin","read_token":7,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1725,"is_manager":false,"is_main_admin":false,"security_tokens":[7]}}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0029() {
    basalt_run_single_direct_test(29, 'Access A Single User By Login ID (XML)', 'GET tests for users, where we access one single user, by its numerical or string login ID.', 'people_tests');
}

function basalt_test_0029($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 29A: Access A Single User (with an associated login) by Numerical ID (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/login_ids/7';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'</people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 29B: Access A Single User (with an associated login) by String ID (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/login_ids/MDAdmin';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'</people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 29C: Access A Single User (with an associated login) by Numerical ID (Logged In as a Normal User that Cannot See the Login)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/login_ids/7';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MeLeet&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'</people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 29D: Access A Single User (with an associated login) by String ID (Logged In as a Normal User that Cannot See the Login)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/login_ids/MDAdmin';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MeLeet&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'</people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 29E: Access A Single User (with an associated login) by Numerical ID (Logged In as a Manager that Cannot See the Login)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/login_ids/7';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=PHB&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'</people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 29F: Access A Single User (with an associated login) by String ID (Logged In as a Manager that Cannot See the Login)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/login_ids/MDAdmin';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=PHB&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'</people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 29G: Access A Single User (with an associated login) by Numerical ID (Logged In as a Manager that Can See the Login)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/login_ids/7';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords></value></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 29H: Access A Single User (with an associated login) by String ID (Logged In as a Manager that Can See the Login)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/login_ids/MDAdmin';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords></value></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 29I: Access A Single User (with an associated login) by Numerical ID (Logged In as "God"). Also, show lots of detail.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/login_ids/7?login_user';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.2858</latitude><longitude>-76.6131</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login><id>7</id><name>Maryland Login</name><lang>en</lang><login_id>MDAdmin</login_id><read_token>7</read_token><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1725</user_object_id><security_tokens><value sequence_index="0">7</value></security_tokens></associated_login></value></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 29J: Access A Single User (with an associated login) by String ID (Logged In as "God"). Also, show lots of detail.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/login_ids/MDAdmin?login_user';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.2858</latitude><longitude>-76.6131</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login><id>7</id><name>Maryland Login</name><lang>en</lang><login_id>MDAdmin</login_id><read_token>7</read_token><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1725</user_object_id><security_tokens><value sequence_index="0">7</value></security_tokens></associated_login></value></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0030() {
    basalt_run_single_direct_test(30, 'Access All Available Logins (JSON)', 'GET tests for logins', 'people_tests');
}

function basalt_test_0030($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 30A: Access All Available Logins (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins/';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 403;
    $expected_result = '';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 30B: Access All Available Logins (Regular User Login)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins/';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MeLeet&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 403;
    $expected_result = '';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 30C: Access All Available Logins (Manager Login)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins/';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[{"id":7,"name":"Maryland Login","lang":"en","login_id":"MDAdmin"},{"id":8,"name":"Virginia Login","lang":"en","login_id":"VAAdmin"},{"id":9,"name":"Washington DC Login","lang":"en","login_id":"DCAdmin"},{"id":10,"name":"West Virginia Login","lang":"en","login_id":"WVAdmin"},{"id":11,"name":"Delaware Login","lang":"en","login_id":"DEAdmin"},{"id":12,"name":"Main Admin Login","lang":"en","login_id":"MainAdmin"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 30D: Access All Available Logins (PHB Manager Login)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins/';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=PHB&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[{"id":13,"name":"Dilbert Login","lang":"en","login_id":"Dilbert"},{"id":14,"name":"Wally Login","lang":"en","login_id":"Wally"},{"id":15,"name":"Ted Login","lang":"en","login_id":"Ted"},{"id":16,"name":"Alice Login","lang":"en","login_id":"Alice"},{"id":17,"name":"Tina Login","lang":"en","login_id":"Tina"},{"id":18,"name":"Pointy-Haired Boss login","lang":"en","login_id":"PHB"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 30E: Access All Available Logins, and show details ("God" Login)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins/?show_details';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[{"id":2,"name":"God Admin Login","lang":"en","login_id":"admin","read_token":2,"write_token":2,"last_access":"1970-01-02 00:00:00","writeable":true,"current_login":true,"is_manager":true,"is_main_admin":true,"security_tokens":[2],"current_api_key":true,"api_key":"'.$api_key.'","api_key_age_in_seconds":1},{"id":7,"name":"Maryland Login","lang":"en","login_id":"MDAdmin","read_token":7,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"is_manager":false,"is_main_admin":false,"security_tokens":[7]},{"id":8,"name":"Virginia Login","lang":"en","login_id":"VAAdmin","read_token":8,"write_token":8,"last_access":"1970-01-02 00:00:00","writeable":true,"is_manager":false,"is_main_admin":false,"security_tokens":[8]},{"id":9,"name":"Washington DC Login","lang":"en","login_id":"DCAdmin","read_token":9,"write_token":9,"last_access":"1970-01-02 00:00:00","writeable":true,"is_manager":false,"is_main_admin":false,"security_tokens":[9]},{"id":10,"name":"West Virginia Login","lang":"en","login_id":"WVAdmin","read_token":10,"write_token":10,"last_access":"1970-01-02 00:00:00","writeable":true,"is_manager":false,"is_main_admin":false,"security_tokens":[10]},{"id":11,"name":"Delaware Login","lang":"en","login_id":"DEAdmin","read_token":11,"write_token":11,"last_access":"1970-01-02 00:00:00","writeable":true,"is_manager":false,"is_main_admin":false,"security_tokens":[11]},{"id":12,"name":"Main Admin Login","lang":"en","login_id":"MainAdmin","read_token":12,"write_token":12,"last_access":"1970-01-02 00:00:00","writeable":true,"is_manager":true,"is_main_admin":false,"security_tokens":[12,7,8,9,10,11]},{"id":13,"name":"Dilbert Login","lang":"en","login_id":"Dilbert","read_token":13,"write_token":13,"last_access":"1970-01-02 00:00:00","writeable":true,"is_manager":false,"is_main_admin":false,"security_tokens":[13]},{"id":14,"name":"Wally Login","lang":"en","login_id":"Wally","read_token":14,"write_token":14,"last_access":"1970-01-02 00:00:00","writeable":true,"is_manager":false,"is_main_admin":false,"security_tokens":[14]},{"id":15,"name":"Ted Login","lang":"en","login_id":"Ted","read_token":15,"write_token":15,"last_access":"1970-01-02 00:00:00","writeable":true,"is_manager":false,"is_main_admin":false,"security_tokens":[15]},{"id":16,"name":"Alice Login","lang":"en","login_id":"Alice","read_token":16,"write_token":16,"last_access":"1970-01-02 00:00:00","writeable":true,"is_manager":false,"is_main_admin":false,"security_tokens":[16]},{"id":17,"name":"Tina Login","lang":"en","login_id":"Tina","read_token":17,"write_token":17,"last_access":"1970-01-02 00:00:00","writeable":true,"is_manager":false,"is_main_admin":false,"security_tokens":[17]},{"id":18,"name":"Pointy-Haired Boss login","lang":"en","login_id":"PHB","read_token":18,"write_token":18,"last_access":"1970-01-02 00:00:00","writeable":true,"is_manager":true,"is_main_admin":false,"security_tokens":[18,13,14,15,16,17]},{"id":19,"name":"Elbonian Hacker","lang":"eb","login_id":"MeLeet","read_token":19,"write_token":19,"last_access":"1970-01-02 00:00:00","writeable":true,"is_manager":false,"is_main_admin":false,"security_tokens":[19,2]}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0031() {
    basalt_run_single_direct_test(31, 'Access All Available Logins (XML)', 'GET tests for logins', 'people_tests');
}

function basalt_test_0031($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 31A: Access All Available Logins (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins/';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 403;
    $expected_result = '';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 31B: Access All Available Logins (Regular User Login)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins/';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MeLeet&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 403;
    $expected_result = '';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 31C: Access All Available Logins (Manager Login)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins/';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><value sequence_index="0"><id>7</id><name>Maryland Login</name><lang>en</lang><login_id>MDAdmin</login_id></value><value sequence_index="1"><id>8</id><name>Virginia Login</name><lang>en</lang><login_id>VAAdmin</login_id></value><value sequence_index="2"><id>9</id><name>Washington DC Login</name><lang>en</lang><login_id>DCAdmin</login_id></value><value sequence_index="3"><id>10</id><name>West Virginia Login</name><lang>en</lang><login_id>WVAdmin</login_id></value><value sequence_index="4"><id>11</id><name>Delaware Login</name><lang>en</lang><login_id>DEAdmin</login_id></value><value sequence_index="5"><id>12</id><name>Main Admin Login</name><lang>en</lang><login_id>MainAdmin</login_id></value></logins></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 31D: Access All Available Logins (PHB Manager Login)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins/';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=PHB&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><value sequence_index="0"><id>13</id><name>Dilbert Login</name><lang>en</lang><login_id>Dilbert</login_id></value><value sequence_index="1"><id>14</id><name>Wally Login</name><lang>en</lang><login_id>Wally</login_id></value><value sequence_index="2"><id>15</id><name>Ted Login</name><lang>en</lang><login_id>Ted</login_id></value><value sequence_index="3"><id>16</id><name>Alice Login</name><lang>en</lang><login_id>Alice</login_id></value><value sequence_index="4"><id>17</id><name>Tina Login</name><lang>en</lang><login_id>Tina</login_id></value><value sequence_index="5"><id>18</id><name>Pointy-Haired Boss login</name><lang>en</lang><login_id>PHB</login_id></value></logins></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 31E: Access All Available Logins, and show details ("God" Login)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins/?show_details';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><value sequence_index="0"><id>2</id><name>God Admin Login</name><lang>en</lang><login_id>admin</login_id><read_token>2</read_token><write_token>2</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><current_login>1</current_login><is_manager>1</is_manager><is_main_admin>1</is_main_admin><security_tokens><value sequence_index="0">2</value></security_tokens><current_api_key>1</current_api_key><api_key>'.$api_key.'</api_key><api_key_age_in_seconds>1</api_key_age_in_seconds></value><value sequence_index="1"><id>7</id><name>Maryland Login</name><lang>en</lang><login_id>MDAdmin</login_id><read_token>7</read_token><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><security_tokens><value sequence_index="0">7</value></security_tokens></value><value sequence_index="2"><id>8</id><name>Virginia Login</name><lang>en</lang><login_id>VAAdmin</login_id><read_token>8</read_token><write_token>8</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><security_tokens><value sequence_index="0">8</value></security_tokens></value><value sequence_index="3"><id>9</id><name>Washington DC Login</name><lang>en</lang><login_id>DCAdmin</login_id><read_token>9</read_token><write_token>9</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><security_tokens><value sequence_index="0">9</value></security_tokens></value><value sequence_index="4"><id>10</id><name>West Virginia Login</name><lang>en</lang><login_id>WVAdmin</login_id><read_token>10</read_token><write_token>10</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><security_tokens><value sequence_index="0">10</value></security_tokens></value><value sequence_index="5"><id>11</id><name>Delaware Login</name><lang>en</lang><login_id>DEAdmin</login_id><read_token>11</read_token><write_token>11</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><security_tokens><value sequence_index="0">11</value></security_tokens></value><value sequence_index="6"><id>12</id><name>Main Admin Login</name><lang>en</lang><login_id>MainAdmin</login_id><read_token>12</read_token><write_token>12</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><is_manager>1</is_manager><security_tokens><value sequence_index="0">12</value><value sequence_index="1">7</value><value sequence_index="2">8</value><value sequence_index="3">9</value><value sequence_index="4">10</value><value sequence_index="5">11</value></security_tokens></value><value sequence_index="7"><id>13</id><name>Dilbert Login</name><lang>en</lang><login_id>Dilbert</login_id><read_token>13</read_token><write_token>13</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><security_tokens><value sequence_index="0">13</value></security_tokens></value><value sequence_index="8"><id>14</id><name>Wally Login</name><lang>en</lang><login_id>Wally</login_id><read_token>14</read_token><write_token>14</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><security_tokens><value sequence_index="0">14</value></security_tokens></value><value sequence_index="9"><id>15</id><name>Ted Login</name><lang>en</lang><login_id>Ted</login_id><read_token>15</read_token><write_token>15</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><security_tokens><value sequence_index="0">15</value></security_tokens></value><value sequence_index="10"><id>16</id><name>Alice Login</name><lang>en</lang><login_id>Alice</login_id><read_token>16</read_token><write_token>16</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><security_tokens><value sequence_index="0">16</value></security_tokens></value><value sequence_index="11"><id>17</id><name>Tina Login</name><lang>en</lang><login_id>Tina</login_id><read_token>17</read_token><write_token>17</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><security_tokens><value sequence_index="0">17</value></security_tokens></value><value sequence_index="12"><id>18</id><name>Pointy-Haired Boss login</name><lang>en</lang><login_id>PHB</login_id><read_token>18</read_token><write_token>18</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><is_manager>1</is_manager><security_tokens><value sequence_index="0">18</value><value sequence_index="1">13</value><value sequence_index="2">14</value><value sequence_index="3">15</value><value sequence_index="4">16</value><value sequence_index="5">17</value></security_tokens></value><value sequence_index="13"><id>19</id><name>Elbonian Hacker</name><lang>eb</lang><login_id>MeLeet</login_id><read_token>19</read_token><write_token>19</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><security_tokens><value sequence_index="0">19</value><value sequence_index="1">2</value></security_tokens></value></logins></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0032() {
    basalt_run_single_direct_test(32, 'Access Single Login Directly by ID (JSON)', 'GET test for logins. We log in as a manager, and look for a specific login.', 'people_tests');
}

function basalt_test_0032($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 32A: Access A Login (Logged in as a Manager). We try to get the login via its user ID (We\'ll get nothing).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins/1725';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 32B: Access A Login (Logged in as a Manager). Now, we try with the login ID (not the user ID).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins/7';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[{"id":7,"name":"Maryland Login","lang":"en","login_id":"MDAdmin"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    
    $title = 'People Test 32C: Access A Login (Logged in as a Manager). Now, we try with the text login ID.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins/MDAdmin';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[{"id":7,"name":"Maryland Login","lang":"en","login_id":"MDAdmin"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);

    $title = 'People Test 32D: Access A Login (Logged in as a PHB Manager). We try to get the same login, but logged in with a different manager. We expect to get nothing.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins/1725';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=PHB&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = 'People Test 32E: Access A Login (Logged in as a PHB Manager). But we will be able to see one of our employees\' logins.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins/Dilbert?show_details';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[{"id":13,"name":"Dilbert Login","lang":"en","login_id":"Dilbert","read_token":13,"write_token":13,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1745,"is_manager":false,"is_main_admin":false,"security_tokens":[13]}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0033() {
    basalt_run_single_direct_test(33, 'Access Single Login Directly by ID (XML)', 'GET test for logins. We log in as a manager, and look for a specific login.', 'people_tests');
}

function basalt_test_0033($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 33A: Access A Login (Logged in as a Manager). We try to get the login via its user ID (We\'ll get nothing).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins/1725';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'</people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 33B: Access A Login (Logged in as a Manager). Now, we try with the login ID (not the user ID).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins/7';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><value sequence_index="0"><id>7</id><name>Maryland Login</name><lang>en</lang><login_id>MDAdmin</login_id></value></logins></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    
    $title = 'People Test 33C: Access A Login (Logged in as a Manager). Now, we try with the text login ID.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins/MDAdmin';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><value sequence_index="0"><id>7</id><name>Maryland Login</name><lang>en</lang><login_id>MDAdmin</login_id></value></logins></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);

    $title = 'People Test 33D: Access A Login (Logged in as a PHB Manager). We try to get the same login, but logged in with a different manager. We expect to get nothing.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins/1725';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=PHB&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'</people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = 'People Test 33E: Access A Login (Logged in as a PHB Manager). But we will be able to see one of our employees\' logins.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins/Dilbert?show_details';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><value sequence_index="0"><id>13</id><name>Dilbert Login</name><lang>en</lang><login_id>Dilbert</login_id><read_token>13</read_token><write_token>13</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1745</user_object_id><security_tokens><value sequence_index="0">13</value></security_tokens></value></logins></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0034() {
    basalt_run_single_direct_test(34, 'Access A Bunch of Individually-Selected Users (JSON)', 'GET tests for users', 'people_tests');
}

function basalt_test_0034($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 34A: Access a bunch of individually-selected users (Not Logged In). We will only see the users that are set to a read token of 0 (world-readable).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/1725,1726,1727,1728,1729,1730,1731,1745,1746,1747,1748,1749,1750,1751';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100"},{"id":1726,"name":"VAAdmin","lang":"en","coords":"38.871900,-77.056300"},{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200"},{"id":1728,"name":"WVAdmin","lang":"en","coords":"38.834800,-79.376200"},{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800"},{"id":1751,"name":"CEO","lang":"en","coords":"37.331820,-122.031180"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 34B: Access a bunch of individually-selected users (Not Logged In), but this time, we ask for details.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/1725,1726,1727,1728,1729,1730,1731,1745,1746,1747,1748,1749,1750,1751?show_details';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","last_access":"1970-01-02 00:00:00","latitude":39.2858,"longitude":-76.6131,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false},{"id":1726,"name":"VAAdmin","lang":"en","coords":"38.871900,-77.056300","last_access":"1970-01-02 00:00:00","latitude":38.8719,"longitude":-77.0563,"is_manager":false,"is_main_admin":false},{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200","last_access":"1970-01-02 00:00:00","latitude":38.8893,"longitude":-77.0502,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false},{"id":1728,"name":"WVAdmin","lang":"en","coords":"38.834800,-79.376200","last_access":"1970-01-02 00:00:00","latitude":38.8348,"longitude":-79.3762,"is_manager":false,"is_main_admin":false},{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800","last_access":"1970-01-02 00:00:00","latitude":39.7391,"longitude":-75.5398,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false},{"id":1751,"name":"CEO","lang":"en","coords":"37.331820,-122.031180","last_access":"1970-01-02 00:00:00","latitude":37.33182,"longitude":-122.03118,"surname":"Garcia","given_name":"Jerry","is_manager":false,"is_main_admin":false}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = 'People Test 34C: Access a bunch of individually-selected users by their login IDs (Not Logged In). We should get nothing.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/login_ids/2,7,8,9,10,11,12,13,14,15,16,17,18,19';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = 'People Test 34D: Access a bunch of individually-selected users by their login IDs (Logged In as a Regular User). We should get nothing.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/login_ids/2,7,8,9,10,11,12,13,14,15,16,17,18,19';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MeLeet&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);

    $title = 'People Test 34E: Access a bunch of individually-selected users by their login IDs (Logged In as a Manager). We should get the DC Area Admins. We also ask for login user details.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/login_ids/2,7,8,9,10,11,12,13,14,15,16,17,18,19?login_user';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.2858,"longitude":-76.6131,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login":{"id":7,"name":"Maryland Login","lang":"en","login_id":"MDAdmin","read_token":7,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1725,"is_manager":false,"is_main_admin":false,"security_tokens":[7]}},{"id":1726,"name":"VAAdmin","lang":"en","coords":"38.871900,-77.056300","read_token":0,"write_token":8,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8719,"longitude":-77.0563,"is_manager":false,"is_main_admin":false,"associated_login":{"id":8,"name":"Virginia Login","lang":"en","login_id":"VAAdmin","read_token":8,"write_token":8,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1726,"is_manager":false,"is_main_admin":false,"security_tokens":[8]}},{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200","read_token":0,"write_token":9,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8893,"longitude":-77.0502,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login":{"id":9,"name":"Washington DC Login","lang":"en","login_id":"DCAdmin","read_token":9,"write_token":9,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1727,"is_manager":false,"is_main_admin":false,"security_tokens":[9]}},{"id":1728,"name":"WVAdmin","lang":"en","coords":"38.834800,-79.376200","read_token":0,"write_token":10,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8348,"longitude":-79.3762,"is_manager":false,"is_main_admin":false,"associated_login":{"id":10,"name":"West Virginia Login","lang":"en","login_id":"WVAdmin","read_token":10,"write_token":10,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1728,"is_manager":false,"is_main_admin":false,"security_tokens":[10]}},{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800","read_token":0,"write_token":11,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.7391,"longitude":-75.5398,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login":{"id":11,"name":"Delaware Login","lang":"en","login_id":"DEAdmin","read_token":11,"write_token":11,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1729,"is_manager":false,"is_main_admin":false,"security_tokens":[11]}},{"id":1730,"name":"Main Admin","lang":"en","coords":"38.989700,-76.937800","read_token":1,"write_token":12,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.9897,"longitude":-76.9378,"is_manager":true,"is_main_admin":false,"current_login":true,"associated_login":{"id":12,"name":"Main Admin Login","lang":"en","login_id":"MainAdmin","read_token":12,"write_token":12,"last_access":"1970-01-02 00:00:00","writeable":true,"current_login":true,"user_object_id":1730,"is_manager":true,"is_main_admin":false,"security_tokens":[12,7,8,9,10,11],"current_api_key":true}}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = 'People Test 34F: Do it again, but this time, with login string IDs.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/login_ids/admin,MDAdmin,VAAdmin,DCAdmin,WVAdmin,DEAdmin,MainAdmin,Dilbert,Wally,Ted,Alice,Tina,PHB,MeLeet?login_user';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.2858,"longitude":-76.6131,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login":{"id":7,"name":"Maryland Login","lang":"en","login_id":"MDAdmin","read_token":7,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1725,"is_manager":false,"is_main_admin":false,"security_tokens":[7]}},{"id":1726,"name":"VAAdmin","lang":"en","coords":"38.871900,-77.056300","read_token":0,"write_token":8,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8719,"longitude":-77.0563,"is_manager":false,"is_main_admin":false,"associated_login":{"id":8,"name":"Virginia Login","lang":"en","login_id":"VAAdmin","read_token":8,"write_token":8,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1726,"is_manager":false,"is_main_admin":false,"security_tokens":[8]}},{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200","read_token":0,"write_token":9,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8893,"longitude":-77.0502,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login":{"id":9,"name":"Washington DC Login","lang":"en","login_id":"DCAdmin","read_token":9,"write_token":9,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1727,"is_manager":false,"is_main_admin":false,"security_tokens":[9]}},{"id":1728,"name":"WVAdmin","lang":"en","coords":"38.834800,-79.376200","read_token":0,"write_token":10,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8348,"longitude":-79.3762,"is_manager":false,"is_main_admin":false,"associated_login":{"id":10,"name":"West Virginia Login","lang":"en","login_id":"WVAdmin","read_token":10,"write_token":10,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1728,"is_manager":false,"is_main_admin":false,"security_tokens":[10]}},{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800","read_token":0,"write_token":11,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.7391,"longitude":-75.5398,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login":{"id":11,"name":"Delaware Login","lang":"en","login_id":"DEAdmin","read_token":11,"write_token":11,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1729,"is_manager":false,"is_main_admin":false,"security_tokens":[11]}},{"id":1730,"name":"Main Admin","lang":"en","coords":"38.989700,-76.937800","read_token":1,"write_token":12,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.9897,"longitude":-76.9378,"is_manager":true,"is_main_admin":false,"current_login":true,"associated_login":{"id":12,"name":"Main Admin Login","lang":"en","login_id":"MainAdmin","read_token":12,"write_token":12,"last_access":"1970-01-02 00:00:00","writeable":true,"current_login":true,"user_object_id":1730,"is_manager":true,"is_main_admin":false,"security_tokens":[12,7,8,9,10,11],"current_api_key":true}}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);

    $title = 'People Test 34G: Access a bunch of individually-selected users by their login IDs (Logged In as a Dilbert Co. Manager). We should get the Dilbert Co. Employees. We also ask for login user details.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/login_ids/2,7,8,9,10,11,12,13,14,15,16,17,18,19?login_user';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=PHB&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1745,"name":"Dilbert","lang":"en","coords":"37.331820,-122.031180","read_token":13,"write_token":13,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Dilbert","is_manager":false,"is_main_admin":false,"associated_login":{"id":13,"name":"Dilbert Login","lang":"en","login_id":"Dilbert","read_token":13,"write_token":13,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1745,"is_manager":false,"is_main_admin":false,"security_tokens":[13]}},{"id":1746,"name":"Wally","lang":"en","coords":"37.331820,-122.031180","read_token":14,"write_token":14,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Wally","is_manager":false,"is_main_admin":false,"associated_login":{"id":14,"name":"Wally Login","lang":"en","login_id":"Wally","read_token":14,"write_token":14,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1746,"is_manager":false,"is_main_admin":false,"security_tokens":[14]}},{"id":1747,"name":"Ted","lang":"en","coords":"37.331820,-122.031180","read_token":15,"write_token":15,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Ted","is_manager":false,"is_main_admin":false,"associated_login":{"id":15,"name":"Ted Login","lang":"en","login_id":"Ted","read_token":15,"write_token":15,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1747,"is_manager":false,"is_main_admin":false,"security_tokens":[15]}},{"id":1748,"name":"Alice","lang":"en","coords":"37.331820,-122.031180","read_token":16,"write_token":16,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Alice","is_manager":false,"is_main_admin":false,"associated_login":{"id":16,"name":"Alice Login","lang":"en","login_id":"Alice","read_token":16,"write_token":16,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1748,"is_manager":false,"is_main_admin":false,"security_tokens":[16]}},{"id":1749,"name":"Tina","lang":"en","coords":"37.331820,-122.031180","read_token":17,"write_token":17,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Tina","is_manager":false,"is_main_admin":false,"associated_login":{"id":17,"name":"Tina Login","lang":"en","login_id":"Tina","read_token":17,"write_token":17,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1749,"is_manager":false,"is_main_admin":false,"security_tokens":[17]}},{"id":1750,"name":"PHB","lang":"en","coords":"37.331820,-122.031180","read_token":18,"write_token":18,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Reznor","given_name":"Trent","is_manager":true,"is_main_admin":false,"current_login":true,"associated_login":{"id":18,"name":"Pointy-Haired Boss login","lang":"en","login_id":"PHB","read_token":18,"write_token":18,"last_access":"1970-01-02 00:00:00","writeable":true,"current_login":true,"user_object_id":1750,"is_manager":true,"is_main_admin":false,"security_tokens":[18,13,14,15,16,17],"current_api_key":true}}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = 'People Test 34H: Do it again, but this time, with login string IDs.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/login_ids/admin,MDAdmin,VAAdmin,DCAdmin,WVAdmin,DEAdmin,MainAdmin,Dilbert,Wally,Ted,Alice,Tina,PHB,MeLeet?login_user';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1745,"name":"Dilbert","lang":"en","coords":"37.331820,-122.031180","read_token":13,"write_token":13,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Dilbert","is_manager":false,"is_main_admin":false,"associated_login":{"id":13,"name":"Dilbert Login","lang":"en","login_id":"Dilbert","read_token":13,"write_token":13,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1745,"is_manager":false,"is_main_admin":false,"security_tokens":[13]}},{"id":1746,"name":"Wally","lang":"en","coords":"37.331820,-122.031180","read_token":14,"write_token":14,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Wally","is_manager":false,"is_main_admin":false,"associated_login":{"id":14,"name":"Wally Login","lang":"en","login_id":"Wally","read_token":14,"write_token":14,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1746,"is_manager":false,"is_main_admin":false,"security_tokens":[14]}},{"id":1747,"name":"Ted","lang":"en","coords":"37.331820,-122.031180","read_token":15,"write_token":15,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Ted","is_manager":false,"is_main_admin":false,"associated_login":{"id":15,"name":"Ted Login","lang":"en","login_id":"Ted","read_token":15,"write_token":15,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1747,"is_manager":false,"is_main_admin":false,"security_tokens":[15]}},{"id":1748,"name":"Alice","lang":"en","coords":"37.331820,-122.031180","read_token":16,"write_token":16,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Alice","is_manager":false,"is_main_admin":false,"associated_login":{"id":16,"name":"Alice Login","lang":"en","login_id":"Alice","read_token":16,"write_token":16,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1748,"is_manager":false,"is_main_admin":false,"security_tokens":[16]}},{"id":1749,"name":"Tina","lang":"en","coords":"37.331820,-122.031180","read_token":17,"write_token":17,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Tina","is_manager":false,"is_main_admin":false,"associated_login":{"id":17,"name":"Tina Login","lang":"en","login_id":"Tina","read_token":17,"write_token":17,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1749,"is_manager":false,"is_main_admin":false,"security_tokens":[17]}},{"id":1750,"name":"PHB","lang":"en","coords":"37.331820,-122.031180","read_token":18,"write_token":18,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Reznor","given_name":"Trent","is_manager":true,"is_main_admin":false,"current_login":true,"associated_login":{"id":18,"name":"Pointy-Haired Boss login","lang":"en","login_id":"PHB","read_token":18,"write_token":18,"last_access":"1970-01-02 00:00:00","writeable":true,"current_login":true,"user_object_id":1750,"is_manager":true,"is_main_admin":false,"security_tokens":[18,13,14,15,16,17],"current_api_key":true}}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);

    $title = 'People Test 34I: Access a bunch of individually-selected users by their login IDs (Logged In as God). We should get everything. However, we will not see the CEO (user only) or the Elbonian Hacker (login only). We only get valid paired logins, and we need at least read rights to both members of the pair.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/login_ids/2,7,8,9,10,11,12,13,14,15,16,17,18,19?login_user';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1731,"name":"God Admin","lang":"en","coords":"38.871900,-77.056300","read_token":1,"write_token":2,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8719,"longitude":-77.0563,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":true,"is_main_admin":true,"current_login":true,"associated_login":{"id":2,"name":"God Admin Login","lang":"en","login_id":"admin","read_token":2,"write_token":2,"last_access":"1970-01-02 00:00:00","writeable":true,"current_login":true,"user_object_id":1731,"is_manager":true,"is_main_admin":true,"security_tokens":[2],"current_api_key":true,"api_key":"'.$api_key.'","api_key_age_in_seconds":1}},{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.2858,"longitude":-76.6131,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login":{"id":7,"name":"Maryland Login","lang":"en","login_id":"MDAdmin","read_token":7,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1725,"is_manager":false,"is_main_admin":false,"security_tokens":[7]}},{"id":1726,"name":"VAAdmin","lang":"en","coords":"38.871900,-77.056300","read_token":0,"write_token":8,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8719,"longitude":-77.0563,"is_manager":false,"is_main_admin":false,"associated_login":{"id":8,"name":"Virginia Login","lang":"en","login_id":"VAAdmin","read_token":8,"write_token":8,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1726,"is_manager":false,"is_main_admin":false,"security_tokens":[8]}},{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200","read_token":0,"write_token":9,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8893,"longitude":-77.0502,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login":{"id":9,"name":"Washington DC Login","lang":"en","login_id":"DCAdmin","read_token":9,"write_token":9,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1727,"is_manager":false,"is_main_admin":false,"security_tokens":[9]}},{"id":1728,"name":"WVAdmin","lang":"en","coords":"38.834800,-79.376200","read_token":0,"write_token":10,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8348,"longitude":-79.3762,"is_manager":false,"is_main_admin":false,"associated_login":{"id":10,"name":"West Virginia Login","lang":"en","login_id":"WVAdmin","read_token":10,"write_token":10,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1728,"is_manager":false,"is_main_admin":false,"security_tokens":[10]}},{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800","read_token":0,"write_token":11,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.7391,"longitude":-75.5398,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login":{"id":11,"name":"Delaware Login","lang":"en","login_id":"DEAdmin","read_token":11,"write_token":11,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1729,"is_manager":false,"is_main_admin":false,"security_tokens":[11]}},{"id":1730,"name":"Main Admin","lang":"en","coords":"38.989700,-76.937800","read_token":1,"write_token":12,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.9897,"longitude":-76.9378,"is_manager":true,"is_main_admin":false,"associated_login":{"id":12,"name":"Main Admin Login","lang":"en","login_id":"MainAdmin","read_token":12,"write_token":12,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1730,"is_manager":true,"is_main_admin":false,"security_tokens":[12,7,8,9,10,11]}},{"id":1745,"name":"Dilbert","lang":"en","coords":"37.331820,-122.031180","read_token":13,"write_token":13,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Dilbert","is_manager":false,"is_main_admin":false,"associated_login":{"id":13,"name":"Dilbert Login","lang":"en","login_id":"Dilbert","read_token":13,"write_token":13,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1745,"is_manager":false,"is_main_admin":false,"security_tokens":[13]}},{"id":1746,"name":"Wally","lang":"en","coords":"37.331820,-122.031180","read_token":14,"write_token":14,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Wally","is_manager":false,"is_main_admin":false,"associated_login":{"id":14,"name":"Wally Login","lang":"en","login_id":"Wally","read_token":14,"write_token":14,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1746,"is_manager":false,"is_main_admin":false,"security_tokens":[14]}},{"id":1747,"name":"Ted","lang":"en","coords":"37.331820,-122.031180","read_token":15,"write_token":15,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Ted","is_manager":false,"is_main_admin":false,"associated_login":{"id":15,"name":"Ted Login","lang":"en","login_id":"Ted","read_token":15,"write_token":15,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1747,"is_manager":false,"is_main_admin":false,"security_tokens":[15]}},{"id":1748,"name":"Alice","lang":"en","coords":"37.331820,-122.031180","read_token":16,"write_token":16,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Alice","is_manager":false,"is_main_admin":false,"associated_login":{"id":16,"name":"Alice Login","lang":"en","login_id":"Alice","read_token":16,"write_token":16,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1748,"is_manager":false,"is_main_admin":false,"security_tokens":[16]}},{"id":1749,"name":"Tina","lang":"en","coords":"37.331820,-122.031180","read_token":17,"write_token":17,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Tina","is_manager":false,"is_main_admin":false,"associated_login":{"id":17,"name":"Tina Login","lang":"en","login_id":"Tina","read_token":17,"write_token":17,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1749,"is_manager":false,"is_main_admin":false,"security_tokens":[17]}},{"id":1750,"name":"PHB","lang":"en","coords":"37.331820,-122.031180","read_token":18,"write_token":18,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Reznor","given_name":"Trent","is_manager":true,"is_main_admin":false,"associated_login":{"id":18,"name":"Pointy-Haired Boss login","lang":"en","login_id":"PHB","read_token":18,"write_token":18,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1750,"is_manager":true,"is_main_admin":false,"security_tokens":[18,13,14,15,16,17]}}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = 'People Test 34J: Do it again, but this time, with login string IDs.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/login_ids/admin,MDAdmin,VAAdmin,DCAdmin,WVAdmin,DEAdmin,MainAdmin,Dilbert,Wally,Ted,Alice,Tina,PHB,MeLeet?login_user';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1731,"name":"God Admin","lang":"en","coords":"38.871900,-77.056300","read_token":1,"write_token":2,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8719,"longitude":-77.0563,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":true,"is_main_admin":true,"current_login":true,"associated_login":{"id":2,"name":"God Admin Login","lang":"en","login_id":"admin","read_token":2,"write_token":2,"last_access":"1970-01-02 00:00:00","writeable":true,"current_login":true,"user_object_id":1731,"is_manager":true,"is_main_admin":true,"security_tokens":[2],"current_api_key":true,"api_key":"'.$api_key.'","api_key_age_in_seconds":1}},{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.2858,"longitude":-76.6131,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login":{"id":7,"name":"Maryland Login","lang":"en","login_id":"MDAdmin","read_token":7,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1725,"is_manager":false,"is_main_admin":false,"security_tokens":[7]}},{"id":1726,"name":"VAAdmin","lang":"en","coords":"38.871900,-77.056300","read_token":0,"write_token":8,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8719,"longitude":-77.0563,"is_manager":false,"is_main_admin":false,"associated_login":{"id":8,"name":"Virginia Login","lang":"en","login_id":"VAAdmin","read_token":8,"write_token":8,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1726,"is_manager":false,"is_main_admin":false,"security_tokens":[8]}},{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200","read_token":0,"write_token":9,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8893,"longitude":-77.0502,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login":{"id":9,"name":"Washington DC Login","lang":"en","login_id":"DCAdmin","read_token":9,"write_token":9,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1727,"is_manager":false,"is_main_admin":false,"security_tokens":[9]}},{"id":1728,"name":"WVAdmin","lang":"en","coords":"38.834800,-79.376200","read_token":0,"write_token":10,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8348,"longitude":-79.3762,"is_manager":false,"is_main_admin":false,"associated_login":{"id":10,"name":"West Virginia Login","lang":"en","login_id":"WVAdmin","read_token":10,"write_token":10,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1728,"is_manager":false,"is_main_admin":false,"security_tokens":[10]}},{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800","read_token":0,"write_token":11,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.7391,"longitude":-75.5398,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login":{"id":11,"name":"Delaware Login","lang":"en","login_id":"DEAdmin","read_token":11,"write_token":11,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1729,"is_manager":false,"is_main_admin":false,"security_tokens":[11]}},{"id":1730,"name":"Main Admin","lang":"en","coords":"38.989700,-76.937800","read_token":1,"write_token":12,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.9897,"longitude":-76.9378,"is_manager":true,"is_main_admin":false,"associated_login":{"id":12,"name":"Main Admin Login","lang":"en","login_id":"MainAdmin","read_token":12,"write_token":12,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1730,"is_manager":true,"is_main_admin":false,"security_tokens":[12,7,8,9,10,11]}},{"id":1745,"name":"Dilbert","lang":"en","coords":"37.331820,-122.031180","read_token":13,"write_token":13,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Dilbert","is_manager":false,"is_main_admin":false,"associated_login":{"id":13,"name":"Dilbert Login","lang":"en","login_id":"Dilbert","read_token":13,"write_token":13,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1745,"is_manager":false,"is_main_admin":false,"security_tokens":[13]}},{"id":1746,"name":"Wally","lang":"en","coords":"37.331820,-122.031180","read_token":14,"write_token":14,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Wally","is_manager":false,"is_main_admin":false,"associated_login":{"id":14,"name":"Wally Login","lang":"en","login_id":"Wally","read_token":14,"write_token":14,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1746,"is_manager":false,"is_main_admin":false,"security_tokens":[14]}},{"id":1747,"name":"Ted","lang":"en","coords":"37.331820,-122.031180","read_token":15,"write_token":15,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Ted","is_manager":false,"is_main_admin":false,"associated_login":{"id":15,"name":"Ted Login","lang":"en","login_id":"Ted","read_token":15,"write_token":15,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1747,"is_manager":false,"is_main_admin":false,"security_tokens":[15]}},{"id":1748,"name":"Alice","lang":"en","coords":"37.331820,-122.031180","read_token":16,"write_token":16,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Alice","is_manager":false,"is_main_admin":false,"associated_login":{"id":16,"name":"Alice Login","lang":"en","login_id":"Alice","read_token":16,"write_token":16,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1748,"is_manager":false,"is_main_admin":false,"security_tokens":[16]}},{"id":1749,"name":"Tina","lang":"en","coords":"37.331820,-122.031180","read_token":17,"write_token":17,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Tina","is_manager":false,"is_main_admin":false,"associated_login":{"id":17,"name":"Tina Login","lang":"en","login_id":"Tina","read_token":17,"write_token":17,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1749,"is_manager":false,"is_main_admin":false,"security_tokens":[17]}},{"id":1750,"name":"PHB","lang":"en","coords":"37.331820,-122.031180","read_token":18,"write_token":18,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Reznor","given_name":"Trent","is_manager":true,"is_main_admin":false,"associated_login":{"id":18,"name":"Pointy-Haired Boss login","lang":"en","login_id":"PHB","read_token":18,"write_token":18,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1750,"is_manager":true,"is_main_admin":false,"security_tokens":[18,13,14,15,16,17]}}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0035() {
    basalt_run_single_direct_test(35, 'Access A Bunch of Individually-Selected Users (XML)', 'GET tests for users', 'people_tests');
}

function basalt_test_0035($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 35A: Access a bunch of individually-selected users (Not Logged In). We will only see the users that are set to a read token of 0 (world-readable).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/1725,1726,1727,1728,1729,1730,1731,1745,1746,1747,1748,1749,1750,1751';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords></value><value sequence_index="1"><id>1726</id><name>VAAdmin</name><lang>en</lang><coords>38.871900,-77.056300</coords></value><value sequence_index="2"><id>1727</id><name>DCAdmin</name><lang>en</lang><coords>38.889300,-77.050200</coords></value><value sequence_index="3"><id>1728</id><name>WVAdmin</name><lang>en</lang><coords>38.834800,-79.376200</coords></value><value sequence_index="4"><id>1729</id><name>DEAdmin</name><lang>en</lang><coords>39.739100,-75.539800</coords></value><value sequence_index="5"><id>1751</id><name>CEO</name><lang>en</lang><coords>37.331820,-122.031180</coords></value></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 35B: Access a bunch of individually-selected users (Not Logged In), but this time, we ask for details.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/1725,1726,1727,1728,1729,1730,1731,1745,1746,1747,1748,1749,1750,1751?show_details';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords><last_access>1970-01-02 00:00:00</last_access><latitude>39.2858</latitude><longitude>-76.6131</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name></value><value sequence_index="1"><id>1726</id><name>VAAdmin</name><lang>en</lang><coords>38.871900,-77.056300</coords><last_access>1970-01-02 00:00:00</last_access><latitude>38.8719</latitude><longitude>-77.0563</longitude></value><value sequence_index="2"><id>1727</id><name>DCAdmin</name><lang>en</lang><coords>38.889300,-77.050200</coords><last_access>1970-01-02 00:00:00</last_access><latitude>38.8893</latitude><longitude>-77.0502</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name></value><value sequence_index="3"><id>1728</id><name>WVAdmin</name><lang>en</lang><coords>38.834800,-79.376200</coords><last_access>1970-01-02 00:00:00</last_access><latitude>38.8348</latitude><longitude>-79.3762</longitude></value><value sequence_index="4"><id>1729</id><name>DEAdmin</name><lang>en</lang><coords>39.739100,-75.539800</coords><last_access>1970-01-02 00:00:00</last_access><latitude>39.7391</latitude><longitude>-75.5398</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name></value><value sequence_index="5"><id>1751</id><name>CEO</name><lang>en</lang><coords>37.331820,-122.031180</coords><last_access>1970-01-02 00:00:00</last_access><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Garcia</surname><given_name>Jerry</given_name></value></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = 'People Test 35C: Access a bunch of individually-selected users by their login IDs (Not Logged In). We should get nothing.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/login_ids/2,7,8,9,10,11,12,13,14,15,16,17,18,19';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'</people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = 'People Test 35D: Access a bunch of individually-selected users by their login IDs (Logged In as a Regular User). We should get nothing.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/login_ids/2,7,8,9,10,11,12,13,14,15,16,17,18,19';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MeLeet&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'</people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);

    $title = 'People Test 35E: Access a bunch of individually-selected users by their login IDs (Logged In as a Manager). We should get the DC Area Admins. We also ask for login user details.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/login_ids/2,7,8,9,10,11,12,13,14,15,16,17,18,19?login_user';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.2858</latitude><longitude>-76.6131</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login><id>7</id><name>Maryland Login</name><lang>en</lang><login_id>MDAdmin</login_id><read_token>7</read_token><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1725</user_object_id><security_tokens><value sequence_index="0">7</value></security_tokens></associated_login></value><value sequence_index="1"><id>1726</id><name>VAAdmin</name><lang>en</lang><coords>38.871900,-77.056300</coords><write_token>8</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.8719</latitude><longitude>-77.0563</longitude><associated_login><id>8</id><name>Virginia Login</name><lang>en</lang><login_id>VAAdmin</login_id><read_token>8</read_token><write_token>8</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1726</user_object_id><security_tokens><value sequence_index="0">8</value></security_tokens></associated_login></value><value sequence_index="2"><id>1727</id><name>DCAdmin</name><lang>en</lang><coords>38.889300,-77.050200</coords><write_token>9</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.8893</latitude><longitude>-77.0502</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login><id>9</id><name>Washington DC Login</name><lang>en</lang><login_id>DCAdmin</login_id><read_token>9</read_token><write_token>9</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1727</user_object_id><security_tokens><value sequence_index="0">9</value></security_tokens></associated_login></value><value sequence_index="3"><id>1728</id><name>WVAdmin</name><lang>en</lang><coords>38.834800,-79.376200</coords><write_token>10</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.8348</latitude><longitude>-79.3762</longitude><associated_login><id>10</id><name>West Virginia Login</name><lang>en</lang><login_id>WVAdmin</login_id><read_token>10</read_token><write_token>10</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1728</user_object_id><security_tokens><value sequence_index="0">10</value></security_tokens></associated_login></value><value sequence_index="4"><id>1729</id><name>DEAdmin</name><lang>en</lang><coords>39.739100,-75.539800</coords><write_token>11</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.7391</latitude><longitude>-75.5398</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login><id>11</id><name>Delaware Login</name><lang>en</lang><login_id>DEAdmin</login_id><read_token>11</read_token><write_token>11</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1729</user_object_id><security_tokens><value sequence_index="0">11</value></security_tokens></associated_login></value><value sequence_index="5"><id>1730</id><name>Main Admin</name><lang>en</lang><coords>38.989700,-76.937800</coords><read_token>1</read_token><write_token>12</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.9897</latitude><longitude>-76.9378</longitude><is_manager>1</is_manager><current_login>1</current_login><associated_login><id>12</id><name>Main Admin Login</name><lang>en</lang><login_id>MainAdmin</login_id><read_token>12</read_token><write_token>12</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><current_login>1</current_login><user_object_id>1730</user_object_id><is_manager>1</is_manager><security_tokens><value sequence_index="0">12</value><value sequence_index="1">7</value><value sequence_index="2">8</value><value sequence_index="3">9</value><value sequence_index="4">10</value><value sequence_index="5">11</value></security_tokens><current_api_key>1</current_api_key></associated_login></value></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = 'People Test 35F: Do it again, but this time, with login string IDs.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/login_ids/admin,MDAdmin,VAAdmin,DCAdmin,WVAdmin,DEAdmin,MainAdmin,Dilbert,Wally,Ted,Alice,Tina,PHB,MeLeet?login_user';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.2858</latitude><longitude>-76.6131</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login><id>7</id><name>Maryland Login</name><lang>en</lang><login_id>MDAdmin</login_id><read_token>7</read_token><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1725</user_object_id><security_tokens><value sequence_index="0">7</value></security_tokens></associated_login></value><value sequence_index="1"><id>1726</id><name>VAAdmin</name><lang>en</lang><coords>38.871900,-77.056300</coords><write_token>8</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.8719</latitude><longitude>-77.0563</longitude><associated_login><id>8</id><name>Virginia Login</name><lang>en</lang><login_id>VAAdmin</login_id><read_token>8</read_token><write_token>8</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1726</user_object_id><security_tokens><value sequence_index="0">8</value></security_tokens></associated_login></value><value sequence_index="2"><id>1727</id><name>DCAdmin</name><lang>en</lang><coords>38.889300,-77.050200</coords><write_token>9</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.8893</latitude><longitude>-77.0502</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login><id>9</id><name>Washington DC Login</name><lang>en</lang><login_id>DCAdmin</login_id><read_token>9</read_token><write_token>9</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1727</user_object_id><security_tokens><value sequence_index="0">9</value></security_tokens></associated_login></value><value sequence_index="3"><id>1728</id><name>WVAdmin</name><lang>en</lang><coords>38.834800,-79.376200</coords><write_token>10</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.8348</latitude><longitude>-79.3762</longitude><associated_login><id>10</id><name>West Virginia Login</name><lang>en</lang><login_id>WVAdmin</login_id><read_token>10</read_token><write_token>10</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1728</user_object_id><security_tokens><value sequence_index="0">10</value></security_tokens></associated_login></value><value sequence_index="4"><id>1729</id><name>DEAdmin</name><lang>en</lang><coords>39.739100,-75.539800</coords><write_token>11</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.7391</latitude><longitude>-75.5398</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login><id>11</id><name>Delaware Login</name><lang>en</lang><login_id>DEAdmin</login_id><read_token>11</read_token><write_token>11</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1729</user_object_id><security_tokens><value sequence_index="0">11</value></security_tokens></associated_login></value><value sequence_index="5"><id>1730</id><name>Main Admin</name><lang>en</lang><coords>38.989700,-76.937800</coords><read_token>1</read_token><write_token>12</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.9897</latitude><longitude>-76.9378</longitude><is_manager>1</is_manager><current_login>1</current_login><associated_login><id>12</id><name>Main Admin Login</name><lang>en</lang><login_id>MainAdmin</login_id><read_token>12</read_token><write_token>12</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><current_login>1</current_login><user_object_id>1730</user_object_id><is_manager>1</is_manager><security_tokens><value sequence_index="0">12</value><value sequence_index="1">7</value><value sequence_index="2">8</value><value sequence_index="3">9</value><value sequence_index="4">10</value><value sequence_index="5">11</value></security_tokens><current_api_key>1</current_api_key></associated_login></value></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);

    $title = 'People Test 35G: Access a bunch of individually-selected users by their login IDs (Logged In as a Dilbert Co. Manager). We should get the Dilbert Co. Employees. We also ask for login user details.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/login_ids/2,7,8,9,10,11,12,13,14,15,16,17,18,19?login_user';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=PHB&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1745</id><name>Dilbert</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>13</read_token><write_token>13</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Ramone</surname><given_name>Dilbert</given_name><associated_login><id>13</id><name>Dilbert Login</name><lang>en</lang><login_id>Dilbert</login_id><read_token>13</read_token><write_token>13</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1745</user_object_id><security_tokens><value sequence_index="0">13</value></security_tokens></associated_login></value><value sequence_index="1"><id>1746</id><name>Wally</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>14</read_token><write_token>14</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Ramone</surname><given_name>Wally</given_name><associated_login><id>14</id><name>Wally Login</name><lang>en</lang><login_id>Wally</login_id><read_token>14</read_token><write_token>14</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1746</user_object_id><security_tokens><value sequence_index="0">14</value></security_tokens></associated_login></value><value sequence_index="2"><id>1747</id><name>Ted</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>15</read_token><write_token>15</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Ramone</surname><given_name>Ted</given_name><associated_login><id>15</id><name>Ted Login</name><lang>en</lang><login_id>Ted</login_id><read_token>15</read_token><write_token>15</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1747</user_object_id><security_tokens><value sequence_index="0">15</value></security_tokens></associated_login></value><value sequence_index="3"><id>1748</id><name>Alice</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>16</read_token><write_token>16</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Ramone</surname><given_name>Alice</given_name><associated_login><id>16</id><name>Alice Login</name><lang>en</lang><login_id>Alice</login_id><read_token>16</read_token><write_token>16</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1748</user_object_id><security_tokens><value sequence_index="0">16</value></security_tokens></associated_login></value><value sequence_index="4"><id>1749</id><name>Tina</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>17</read_token><write_token>17</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Ramone</surname><given_name>Tina</given_name><associated_login><id>17</id><name>Tina Login</name><lang>en</lang><login_id>Tina</login_id><read_token>17</read_token><write_token>17</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1749</user_object_id><security_tokens><value sequence_index="0">17</value></security_tokens></associated_login></value><value sequence_index="5"><id>1750</id><name>PHB</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>18</read_token><write_token>18</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Reznor</surname><given_name>Trent</given_name><is_manager>1</is_manager><current_login>1</current_login><associated_login><id>18</id><name>Pointy-Haired Boss login</name><lang>en</lang><login_id>PHB</login_id><read_token>18</read_token><write_token>18</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><current_login>1</current_login><user_object_id>1750</user_object_id><is_manager>1</is_manager><security_tokens><value sequence_index="0">18</value><value sequence_index="1">13</value><value sequence_index="2">14</value><value sequence_index="3">15</value><value sequence_index="4">16</value><value sequence_index="5">17</value></security_tokens><current_api_key>1</current_api_key></associated_login></value></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = 'People Test 35H: Do it again, but this time, with login string IDs.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/login_ids/admin,MDAdmin,VAAdmin,DCAdmin,WVAdmin,DEAdmin,MainAdmin,Dilbert,Wally,Ted,Alice,Tina,PHB,MeLeet?login_user';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1745</id><name>Dilbert</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>13</read_token><write_token>13</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Ramone</surname><given_name>Dilbert</given_name><associated_login><id>13</id><name>Dilbert Login</name><lang>en</lang><login_id>Dilbert</login_id><read_token>13</read_token><write_token>13</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1745</user_object_id><security_tokens><value sequence_index="0">13</value></security_tokens></associated_login></value><value sequence_index="1"><id>1746</id><name>Wally</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>14</read_token><write_token>14</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Ramone</surname><given_name>Wally</given_name><associated_login><id>14</id><name>Wally Login</name><lang>en</lang><login_id>Wally</login_id><read_token>14</read_token><write_token>14</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1746</user_object_id><security_tokens><value sequence_index="0">14</value></security_tokens></associated_login></value><value sequence_index="2"><id>1747</id><name>Ted</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>15</read_token><write_token>15</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Ramone</surname><given_name>Ted</given_name><associated_login><id>15</id><name>Ted Login</name><lang>en</lang><login_id>Ted</login_id><read_token>15</read_token><write_token>15</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1747</user_object_id><security_tokens><value sequence_index="0">15</value></security_tokens></associated_login></value><value sequence_index="3"><id>1748</id><name>Alice</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>16</read_token><write_token>16</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Ramone</surname><given_name>Alice</given_name><associated_login><id>16</id><name>Alice Login</name><lang>en</lang><login_id>Alice</login_id><read_token>16</read_token><write_token>16</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1748</user_object_id><security_tokens><value sequence_index="0">16</value></security_tokens></associated_login></value><value sequence_index="4"><id>1749</id><name>Tina</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>17</read_token><write_token>17</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Ramone</surname><given_name>Tina</given_name><associated_login><id>17</id><name>Tina Login</name><lang>en</lang><login_id>Tina</login_id><read_token>17</read_token><write_token>17</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1749</user_object_id><security_tokens><value sequence_index="0">17</value></security_tokens></associated_login></value><value sequence_index="5"><id>1750</id><name>PHB</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>18</read_token><write_token>18</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Reznor</surname><given_name>Trent</given_name><is_manager>1</is_manager><current_login>1</current_login><associated_login><id>18</id><name>Pointy-Haired Boss login</name><lang>en</lang><login_id>PHB</login_id><read_token>18</read_token><write_token>18</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><current_login>1</current_login><user_object_id>1750</user_object_id><is_manager>1</is_manager><security_tokens><value sequence_index="0">18</value><value sequence_index="1">13</value><value sequence_index="2">14</value><value sequence_index="3">15</value><value sequence_index="4">16</value><value sequence_index="5">17</value></security_tokens><current_api_key>1</current_api_key></associated_login></value></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);

    $title = 'People Test 35I: Access a bunch of individually-selected users by their login IDs (Logged In as God). We should get everything. However, we will not see the CEO (user only) or the Elbonian Hacker (login only). We only get valid paired logins, and we need at least read rights to both members of the pair.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/login_ids/2,7,8,9,10,11,12,13,14,15,16,17,18,19?login_user';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1731</id><name>God Admin</name><lang>en</lang><coords>38.871900,-77.056300</coords><read_token>1</read_token><write_token>2</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.8719</latitude><longitude>-77.0563</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><is_manager>1</is_manager><is_main_admin>1</is_main_admin><current_login>1</current_login><associated_login><id>2</id><name>God Admin Login</name><lang>en</lang><login_id>admin</login_id><read_token>2</read_token><write_token>2</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><current_login>1</current_login><user_object_id>1731</user_object_id><is_manager>1</is_manager><is_main_admin>1</is_main_admin><security_tokens><value sequence_index="0">2</value></security_tokens><current_api_key>1</current_api_key><api_key>'.$api_key.'</api_key><api_key_age_in_seconds>1</api_key_age_in_seconds></associated_login></value><value sequence_index="1"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.2858</latitude><longitude>-76.6131</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login><id>7</id><name>Maryland Login</name><lang>en</lang><login_id>MDAdmin</login_id><read_token>7</read_token><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1725</user_object_id><security_tokens><value sequence_index="0">7</value></security_tokens></associated_login></value><value sequence_index="2"><id>1726</id><name>VAAdmin</name><lang>en</lang><coords>38.871900,-77.056300</coords><write_token>8</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.8719</latitude><longitude>-77.0563</longitude><associated_login><id>8</id><name>Virginia Login</name><lang>en</lang><login_id>VAAdmin</login_id><read_token>8</read_token><write_token>8</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1726</user_object_id><security_tokens><value sequence_index="0">8</value></security_tokens></associated_login></value><value sequence_index="3"><id>1727</id><name>DCAdmin</name><lang>en</lang><coords>38.889300,-77.050200</coords><write_token>9</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.8893</latitude><longitude>-77.0502</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login><id>9</id><name>Washington DC Login</name><lang>en</lang><login_id>DCAdmin</login_id><read_token>9</read_token><write_token>9</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1727</user_object_id><security_tokens><value sequence_index="0">9</value></security_tokens></associated_login></value><value sequence_index="4"><id>1728</id><name>WVAdmin</name><lang>en</lang><coords>38.834800,-79.376200</coords><write_token>10</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.8348</latitude><longitude>-79.3762</longitude><associated_login><id>10</id><name>West Virginia Login</name><lang>en</lang><login_id>WVAdmin</login_id><read_token>10</read_token><write_token>10</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1728</user_object_id><security_tokens><value sequence_index="0">10</value></security_tokens></associated_login></value><value sequence_index="5"><id>1729</id><name>DEAdmin</name><lang>en</lang><coords>39.739100,-75.539800</coords><write_token>11</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.7391</latitude><longitude>-75.5398</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login><id>11</id><name>Delaware Login</name><lang>en</lang><login_id>DEAdmin</login_id><read_token>11</read_token><write_token>11</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1729</user_object_id><security_tokens><value sequence_index="0">11</value></security_tokens></associated_login></value><value sequence_index="6"><id>1730</id><name>Main Admin</name><lang>en</lang><coords>38.989700,-76.937800</coords><read_token>1</read_token><write_token>12</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.9897</latitude><longitude>-76.9378</longitude><is_manager>1</is_manager><associated_login><id>12</id><name>Main Admin Login</name><lang>en</lang><login_id>MainAdmin</login_id><read_token>12</read_token><write_token>12</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1730</user_object_id><is_manager>1</is_manager><security_tokens><value sequence_index="0">12</value><value sequence_index="1">7</value><value sequence_index="2">8</value><value sequence_index="3">9</value><value sequence_index="4">10</value><value sequence_index="5">11</value></security_tokens></associated_login></value><value sequence_index="7"><id>1745</id><name>Dilbert</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>13</read_token><write_token>13</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Ramone</surname><given_name>Dilbert</given_name><associated_login><id>13</id><name>Dilbert Login</name><lang>en</lang><login_id>Dilbert</login_id><read_token>13</read_token><write_token>13</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1745</user_object_id><security_tokens><value sequence_index="0">13</value></security_tokens></associated_login></value><value sequence_index="8"><id>1746</id><name>Wally</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>14</read_token><write_token>14</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Ramone</surname><given_name>Wally</given_name><associated_login><id>14</id><name>Wally Login</name><lang>en</lang><login_id>Wally</login_id><read_token>14</read_token><write_token>14</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1746</user_object_id><security_tokens><value sequence_index="0">14</value></security_tokens></associated_login></value><value sequence_index="9"><id>1747</id><name>Ted</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>15</read_token><write_token>15</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Ramone</surname><given_name>Ted</given_name><associated_login><id>15</id><name>Ted Login</name><lang>en</lang><login_id>Ted</login_id><read_token>15</read_token><write_token>15</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1747</user_object_id><security_tokens><value sequence_index="0">15</value></security_tokens></associated_login></value><value sequence_index="10"><id>1748</id><name>Alice</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>16</read_token><write_token>16</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Ramone</surname><given_name>Alice</given_name><associated_login><id>16</id><name>Alice Login</name><lang>en</lang><login_id>Alice</login_id><read_token>16</read_token><write_token>16</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1748</user_object_id><security_tokens><value sequence_index="0">16</value></security_tokens></associated_login></value><value sequence_index="11"><id>1749</id><name>Tina</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>17</read_token><write_token>17</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Ramone</surname><given_name>Tina</given_name><associated_login><id>17</id><name>Tina Login</name><lang>en</lang><login_id>Tina</login_id><read_token>17</read_token><write_token>17</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1749</user_object_id><security_tokens><value sequence_index="0">17</value></security_tokens></associated_login></value><value sequence_index="12"><id>1750</id><name>PHB</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>18</read_token><write_token>18</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Reznor</surname><given_name>Trent</given_name><is_manager>1</is_manager><associated_login><id>18</id><name>Pointy-Haired Boss login</name><lang>en</lang><login_id>PHB</login_id><read_token>18</read_token><write_token>18</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1750</user_object_id><is_manager>1</is_manager><security_tokens><value sequence_index="0">18</value><value sequence_index="1">13</value><value sequence_index="2">14</value><value sequence_index="3">15</value><value sequence_index="4">16</value><value sequence_index="5">17</value></security_tokens></associated_login></value></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = 'People Test 35J: Do it again, but this time, with login string IDs.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/login_ids/admin,MDAdmin,VAAdmin,DCAdmin,WVAdmin,DEAdmin,MainAdmin,Dilbert,Wally,Ted,Alice,Tina,PHB,MeLeet?login_user';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1731</id><name>God Admin</name><lang>en</lang><coords>38.871900,-77.056300</coords><read_token>1</read_token><write_token>2</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.8719</latitude><longitude>-77.0563</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><is_manager>1</is_manager><is_main_admin>1</is_main_admin><current_login>1</current_login><associated_login><id>2</id><name>God Admin Login</name><lang>en</lang><login_id>admin</login_id><read_token>2</read_token><write_token>2</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><current_login>1</current_login><user_object_id>1731</user_object_id><is_manager>1</is_manager><is_main_admin>1</is_main_admin><security_tokens><value sequence_index="0">2</value></security_tokens><current_api_key>1</current_api_key><api_key>'.$api_key.'</api_key><api_key_age_in_seconds>1</api_key_age_in_seconds></associated_login></value><value sequence_index="1"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.2858</latitude><longitude>-76.6131</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login><id>7</id><name>Maryland Login</name><lang>en</lang><login_id>MDAdmin</login_id><read_token>7</read_token><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1725</user_object_id><security_tokens><value sequence_index="0">7</value></security_tokens></associated_login></value><value sequence_index="2"><id>1726</id><name>VAAdmin</name><lang>en</lang><coords>38.871900,-77.056300</coords><write_token>8</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.8719</latitude><longitude>-77.0563</longitude><associated_login><id>8</id><name>Virginia Login</name><lang>en</lang><login_id>VAAdmin</login_id><read_token>8</read_token><write_token>8</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1726</user_object_id><security_tokens><value sequence_index="0">8</value></security_tokens></associated_login></value><value sequence_index="3"><id>1727</id><name>DCAdmin</name><lang>en</lang><coords>38.889300,-77.050200</coords><write_token>9</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.8893</latitude><longitude>-77.0502</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login><id>9</id><name>Washington DC Login</name><lang>en</lang><login_id>DCAdmin</login_id><read_token>9</read_token><write_token>9</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1727</user_object_id><security_tokens><value sequence_index="0">9</value></security_tokens></associated_login></value><value sequence_index="4"><id>1728</id><name>WVAdmin</name><lang>en</lang><coords>38.834800,-79.376200</coords><write_token>10</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.8348</latitude><longitude>-79.3762</longitude><associated_login><id>10</id><name>West Virginia Login</name><lang>en</lang><login_id>WVAdmin</login_id><read_token>10</read_token><write_token>10</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1728</user_object_id><security_tokens><value sequence_index="0">10</value></security_tokens></associated_login></value><value sequence_index="5"><id>1729</id><name>DEAdmin</name><lang>en</lang><coords>39.739100,-75.539800</coords><write_token>11</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.7391</latitude><longitude>-75.5398</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login><id>11</id><name>Delaware Login</name><lang>en</lang><login_id>DEAdmin</login_id><read_token>11</read_token><write_token>11</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1729</user_object_id><security_tokens><value sequence_index="0">11</value></security_tokens></associated_login></value><value sequence_index="6"><id>1730</id><name>Main Admin</name><lang>en</lang><coords>38.989700,-76.937800</coords><read_token>1</read_token><write_token>12</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.9897</latitude><longitude>-76.9378</longitude><is_manager>1</is_manager><associated_login><id>12</id><name>Main Admin Login</name><lang>en</lang><login_id>MainAdmin</login_id><read_token>12</read_token><write_token>12</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1730</user_object_id><is_manager>1</is_manager><security_tokens><value sequence_index="0">12</value><value sequence_index="1">7</value><value sequence_index="2">8</value><value sequence_index="3">9</value><value sequence_index="4">10</value><value sequence_index="5">11</value></security_tokens></associated_login></value><value sequence_index="7"><id>1745</id><name>Dilbert</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>13</read_token><write_token>13</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Ramone</surname><given_name>Dilbert</given_name><associated_login><id>13</id><name>Dilbert Login</name><lang>en</lang><login_id>Dilbert</login_id><read_token>13</read_token><write_token>13</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1745</user_object_id><security_tokens><value sequence_index="0">13</value></security_tokens></associated_login></value><value sequence_index="8"><id>1746</id><name>Wally</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>14</read_token><write_token>14</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Ramone</surname><given_name>Wally</given_name><associated_login><id>14</id><name>Wally Login</name><lang>en</lang><login_id>Wally</login_id><read_token>14</read_token><write_token>14</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1746</user_object_id><security_tokens><value sequence_index="0">14</value></security_tokens></associated_login></value><value sequence_index="9"><id>1747</id><name>Ted</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>15</read_token><write_token>15</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Ramone</surname><given_name>Ted</given_name><associated_login><id>15</id><name>Ted Login</name><lang>en</lang><login_id>Ted</login_id><read_token>15</read_token><write_token>15</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1747</user_object_id><security_tokens><value sequence_index="0">15</value></security_tokens></associated_login></value><value sequence_index="10"><id>1748</id><name>Alice</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>16</read_token><write_token>16</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Ramone</surname><given_name>Alice</given_name><associated_login><id>16</id><name>Alice Login</name><lang>en</lang><login_id>Alice</login_id><read_token>16</read_token><write_token>16</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1748</user_object_id><security_tokens><value sequence_index="0">16</value></security_tokens></associated_login></value><value sequence_index="11"><id>1749</id><name>Tina</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>17</read_token><write_token>17</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Ramone</surname><given_name>Tina</given_name><associated_login><id>17</id><name>Tina Login</name><lang>en</lang><login_id>Tina</login_id><read_token>17</read_token><write_token>17</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1749</user_object_id><security_tokens><value sequence_index="0">17</value></security_tokens></associated_login></value><value sequence_index="12"><id>1750</id><name>PHB</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>18</read_token><write_token>18</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Reznor</surname><given_name>Trent</given_name><is_manager>1</is_manager><associated_login><id>18</id><name>Pointy-Haired Boss login</name><lang>en</lang><login_id>PHB</login_id><read_token>18</read_token><write_token>18</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1750</user_object_id><is_manager>1</is_manager><security_tokens><value sequence_index="0">18</value><value sequence_index="1">13</value><value sequence_index="2">14</value><value sequence_index="3">15</value><value sequence_index="4">16</value><value sequence_index="5">17</value></security_tokens></associated_login></value></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0036() {
    basalt_run_single_direct_test(36, 'Access A Bunch of Individually-Selected Logins (JSON)', 'GET tests for logins', 'people_tests');
}

function basalt_test_0036($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 36A: Access a bunch of individually-selected logins (Not Logged In). We should get an empty response.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins/2,7,8,9,10,11,12,13,14,15,16,17,18,19';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 36B: Access a bunch of individually-selected logins (Logged in as MDAdmin). We should get a single login (ours), as that is the only one we\'re cleared to see.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins/2,7,8,9,10,11,12,13,14,15,16,17,18,19';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[{"id":7,"name":"Maryland Login","lang":"en","login_id":"MDAdmin"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 36C: Access a bunch of individually-selected logins (Logged in as Elbonian Hacker). We should get a single login (ours), as that is the only one we\'re cleared to see.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins/2,7,8,9,10,11,12,13,14,15,16,17,18,19';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MeLeet&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[{"id":19,"name":"Elbonian Hacker","lang":"eb","login_id":"MeLeet"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 36D: Access a bunch of individually-selected logins (Logged in as DC Area Main Admin). We should get several logins, as we are cleared to see all the DC Area admin logins.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins/2,7,8,9,10,11,12,13,14,15,16,17,18,19';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[{"id":7,"name":"Maryland Login","lang":"en","login_id":"MDAdmin"},{"id":8,"name":"Virginia Login","lang":"en","login_id":"VAAdmin"},{"id":9,"name":"Washington DC Login","lang":"en","login_id":"DCAdmin"},{"id":10,"name":"West Virginia Login","lang":"en","login_id":"WVAdmin"},{"id":11,"name":"Delaware Login","lang":"en","login_id":"DEAdmin"},{"id":12,"name":"Main Admin Login","lang":"en","login_id":"MainAdmin"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 36E: Access a bunch of individually-selected logins (Logged in as the Dilbert Co. PHB). We should get several logins, as we are cleared to see all the Dilbert Co. logins.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins/2,7,8,9,10,11,12,13,14,15,16,17,18,19';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=PHB&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[{"id":13,"name":"Dilbert Login","lang":"en","login_id":"Dilbert"},{"id":14,"name":"Wally Login","lang":"en","login_id":"Wally"},{"id":15,"name":"Ted Login","lang":"en","login_id":"Ted"},{"id":16,"name":"Alice Login","lang":"en","login_id":"Alice"},{"id":17,"name":"Tina Login","lang":"en","login_id":"Tina"},{"id":18,"name":"Pointy-Haired Boss login","lang":"en","login_id":"PHB"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 36F: Access a bunch of individually-selected users (Logged in as "God"). We should get everything, including the Elbonian Hacker login.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins/2,7,8,9,10,11,12,13,14,15,16,17,18,19';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[{"id":2,"name":"God Admin Login","lang":"en","login_id":"admin"},{"id":7,"name":"Maryland Login","lang":"en","login_id":"MDAdmin"},{"id":8,"name":"Virginia Login","lang":"en","login_id":"VAAdmin"},{"id":9,"name":"Washington DC Login","lang":"en","login_id":"DCAdmin"},{"id":10,"name":"West Virginia Login","lang":"en","login_id":"WVAdmin"},{"id":11,"name":"Delaware Login","lang":"en","login_id":"DEAdmin"},{"id":12,"name":"Main Admin Login","lang":"en","login_id":"MainAdmin"},{"id":13,"name":"Dilbert Login","lang":"en","login_id":"Dilbert"},{"id":14,"name":"Wally Login","lang":"en","login_id":"Wally"},{"id":15,"name":"Ted Login","lang":"en","login_id":"Ted"},{"id":16,"name":"Alice Login","lang":"en","login_id":"Alice"},{"id":17,"name":"Tina Login","lang":"en","login_id":"Tina"},{"id":18,"name":"Pointy-Haired Boss login","lang":"en","login_id":"PHB"},{"id":19,"name":"Elbonian Hacker","lang":"eb","login_id":"MeLeet"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0037() {
    basalt_run_single_direct_test(37, 'Access A Bunch of Individually-Selected Logins (XML)', 'GET tests for logins', 'people_tests');
}

function basalt_test_0037($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 37A: Access a bunch of individually-selected logins (Not Logged In). We should get an empty response.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins/2,7,8,9,10,11,12,13,14,15,16,17,18,19';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'</people>';;
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 37B: Access a bunch of individually-selected logins (Logged in as MDAdmin). We should get a single login (ours), as that is the only one we\'re cleared to see.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins/2,7,8,9,10,11,12,13,14,15,16,17,18,19';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><value sequence_index="0"><id>7</id><name>Maryland Login</name><lang>en</lang><login_id>MDAdmin</login_id></value></logins></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 37C: Access a bunch of individually-selected logins (Logged in as Elbonian Hacker). We should get a single login (ours), as that is the only one we\'re cleared to see.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins/2,7,8,9,10,11,12,13,14,15,16,17,18,19';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MeLeet&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><value sequence_index="0"><id>19</id><name>Elbonian Hacker</name><lang>eb</lang><login_id>MeLeet</login_id></value></logins></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 37D: Access a bunch of individually-selected logins (Logged in as DC Area Main Admin). We should get several logins, as we are cleared to see all the DC Area admin logins.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins/2,7,8,9,10,11,12,13,14,15,16,17,18,19';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><value sequence_index="0"><id>7</id><name>Maryland Login</name><lang>en</lang><login_id>MDAdmin</login_id></value><value sequence_index="1"><id>8</id><name>Virginia Login</name><lang>en</lang><login_id>VAAdmin</login_id></value><value sequence_index="2"><id>9</id><name>Washington DC Login</name><lang>en</lang><login_id>DCAdmin</login_id></value><value sequence_index="3"><id>10</id><name>West Virginia Login</name><lang>en</lang><login_id>WVAdmin</login_id></value><value sequence_index="4"><id>11</id><name>Delaware Login</name><lang>en</lang><login_id>DEAdmin</login_id></value><value sequence_index="5"><id>12</id><name>Main Admin Login</name><lang>en</lang><login_id>MainAdmin</login_id></value></logins></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 37E: Access a bunch of individually-selected logins (Logged in as the Dilbert Co. PHB). We should get several logins, as we are cleared to see all the Dilbert Co. logins.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins/2,7,8,9,10,11,12,13,14,15,16,17,18,19';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=PHB&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><value sequence_index="0"><id>13</id><name>Dilbert Login</name><lang>en</lang><login_id>Dilbert</login_id></value><value sequence_index="1"><id>14</id><name>Wally Login</name><lang>en</lang><login_id>Wally</login_id></value><value sequence_index="2"><id>15</id><name>Ted Login</name><lang>en</lang><login_id>Ted</login_id></value><value sequence_index="3"><id>16</id><name>Alice Login</name><lang>en</lang><login_id>Alice</login_id></value><value sequence_index="4"><id>17</id><name>Tina Login</name><lang>en</lang><login_id>Tina</login_id></value><value sequence_index="5"><id>18</id><name>Pointy-Haired Boss login</name><lang>en</lang><login_id>PHB</login_id></value></logins></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 37F: Access a bunch of individually-selected users (Logged in as "God"). We should get everything, including the Elbonian Hacker login.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins/2,7,8,9,10,11,12,13,14,15,16,17,18,19';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><value sequence_index="0"><id>2</id><name>God Admin Login</name><lang>en</lang><login_id>admin</login_id></value><value sequence_index="1"><id>7</id><name>Maryland Login</name><lang>en</lang><login_id>MDAdmin</login_id></value><value sequence_index="2"><id>8</id><name>Virginia Login</name><lang>en</lang><login_id>VAAdmin</login_id></value><value sequence_index="3"><id>9</id><name>Washington DC Login</name><lang>en</lang><login_id>DCAdmin</login_id></value><value sequence_index="4"><id>10</id><name>West Virginia Login</name><lang>en</lang><login_id>WVAdmin</login_id></value><value sequence_index="5"><id>11</id><name>Delaware Login</name><lang>en</lang><login_id>DEAdmin</login_id></value><value sequence_index="6"><id>12</id><name>Main Admin Login</name><lang>en</lang><login_id>MainAdmin</login_id></value><value sequence_index="7"><id>13</id><name>Dilbert Login</name><lang>en</lang><login_id>Dilbert</login_id></value><value sequence_index="8"><id>14</id><name>Wally Login</name><lang>en</lang><login_id>Wally</login_id></value><value sequence_index="9"><id>15</id><name>Ted Login</name><lang>en</lang><login_id>Ted</login_id></value><value sequence_index="10"><id>16</id><name>Alice Login</name><lang>en</lang><login_id>Alice</login_id></value><value sequence_index="11"><id>17</id><name>Tina Login</name><lang>en</lang><login_id>Tina</login_id></value><value sequence_index="12"><id>18</id><name>Pointy-Haired Boss login</name><lang>en</lang><login_id>PHB</login_id></value><value sequence_index="13"><id>19</id><name>Elbonian Hacker</name><lang>eb</lang><login_id>MeLeet</login_id></value></logins></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0038() {
    basalt_run_single_direct_test(38, 'Access A Bunch of Individually-Selected Logins by their login strings (not integer IDs) (JSON)', 'GET tests for logins', 'people_tests');
}

function basalt_test_0038($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 38A: Access a bunch of individually-selected logins (Not Logged In). We should get an empty response.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins/admin,MDAdmin,VAAdmin,DCAdmin,WVAdmin,DEAdmin,MainAdmin,Dilbert,Wally,Ted,Alice,Tina,PHB,MeLeet';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 38B: Access a bunch of individually-selected logins (Logged in as MDAdmin). We should get a single login (ours), as that is the only one we\'re cleared to see.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins/admin,MDAdmin,VAAdmin,DCAdmin,WVAdmin,DEAdmin,MainAdmin,Dilbert,Wally,Ted,Alice,Tina,PHB,MeLeet';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[{"id":7,"name":"Maryland Login","lang":"en","login_id":"MDAdmin"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 38C: Access a bunch of individually-selected logins (Logged in as Elbonian Hacker). We should get a single login (ours), as that is the only one we\'re cleared to see.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins/admin,MDAdmin,VAAdmin,DCAdmin,WVAdmin,DEAdmin,MainAdmin,Dilbert,Wally,Ted,Alice,Tina,PHB,MeLeet';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MeLeet&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[{"id":19,"name":"Elbonian Hacker","lang":"eb","login_id":"MeLeet"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 38D: Access a bunch of individually-selected logins (Logged in as DC Area Main Admin). We should get several logins, as we are cleared to see all the DC Area admin logins.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins/admin,MDAdmin,VAAdmin,DCAdmin,WVAdmin,DEAdmin,MainAdmin,Dilbert,Wally,Ted,Alice,Tina,PHB,MeLeet';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[{"id":7,"name":"Maryland Login","lang":"en","login_id":"MDAdmin"},{"id":8,"name":"Virginia Login","lang":"en","login_id":"VAAdmin"},{"id":9,"name":"Washington DC Login","lang":"en","login_id":"DCAdmin"},{"id":10,"name":"West Virginia Login","lang":"en","login_id":"WVAdmin"},{"id":11,"name":"Delaware Login","lang":"en","login_id":"DEAdmin"},{"id":12,"name":"Main Admin Login","lang":"en","login_id":"MainAdmin"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 38E: Access a bunch of individually-selected logins (Logged in as the Dilbert Co. PHB). We should get several logins, as we are cleared to see all the Dilbert Co. logins.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins/admin,MDAdmin,VAAdmin,DCAdmin,WVAdmin,DEAdmin,MainAdmin,Dilbert,Wally,Ted,Alice,Tina,PHB,MeLeet';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=PHB&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[{"id":13,"name":"Dilbert Login","lang":"en","login_id":"Dilbert"},{"id":14,"name":"Wally Login","lang":"en","login_id":"Wally"},{"id":15,"name":"Ted Login","lang":"en","login_id":"Ted"},{"id":16,"name":"Alice Login","lang":"en","login_id":"Alice"},{"id":17,"name":"Tina Login","lang":"en","login_id":"Tina"},{"id":18,"name":"Pointy-Haired Boss login","lang":"en","login_id":"PHB"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 38F: Access a bunch of individually-selected users (Logged in as "God"). We should get everything, including the Elbonian Hacker login.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins/admin,MDAdmin,VAAdmin,DCAdmin,WVAdmin,DEAdmin,MainAdmin,Dilbert,Wally,Ted,Alice,Tina,PHB,MeLeet';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[{"id":2,"name":"God Admin Login","lang":"en","login_id":"admin"},{"id":7,"name":"Maryland Login","lang":"en","login_id":"MDAdmin"},{"id":8,"name":"Virginia Login","lang":"en","login_id":"VAAdmin"},{"id":9,"name":"Washington DC Login","lang":"en","login_id":"DCAdmin"},{"id":10,"name":"West Virginia Login","lang":"en","login_id":"WVAdmin"},{"id":11,"name":"Delaware Login","lang":"en","login_id":"DEAdmin"},{"id":12,"name":"Main Admin Login","lang":"en","login_id":"MainAdmin"},{"id":13,"name":"Dilbert Login","lang":"en","login_id":"Dilbert"},{"id":14,"name":"Wally Login","lang":"en","login_id":"Wally"},{"id":15,"name":"Ted Login","lang":"en","login_id":"Ted"},{"id":16,"name":"Alice Login","lang":"en","login_id":"Alice"},{"id":17,"name":"Tina Login","lang":"en","login_id":"Tina"},{"id":18,"name":"Pointy-Haired Boss login","lang":"en","login_id":"PHB"},{"id":19,"name":"Elbonian Hacker","lang":"eb","login_id":"MeLeet"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0039() {
    basalt_run_single_direct_test(39, 'Access A Bunch of Individually-Selected Logins (XML)', 'GET tests for logins', 'people_tests');
}

function basalt_test_0039($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 39A: Access a bunch of individually-selected logins (Not Logged In). We should get an empty response.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins/admin,MDAdmin,VAAdmin,DCAdmin,WVAdmin,DEAdmin,MainAdmin,Dilbert,Wally,Ted,Alice,Tina,PHB,MeLeet';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'</people>';;
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 39B: Access a bunch of individually-selected logins (Logged in as MDAdmin). We should get a single login (ours), as that is the only one we\'re cleared to see.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins/admin,MDAdmin,VAAdmin,DCAdmin,WVAdmin,DEAdmin,MainAdmin,Dilbert,Wally,Ted,Alice,Tina,PHB,MeLeet';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><value sequence_index="0"><id>7</id><name>Maryland Login</name><lang>en</lang><login_id>MDAdmin</login_id></value></logins></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 39C: Access a bunch of individually-selected logins (Logged in as Elbonian Hacker). We should get a single login (ours), as that is the only one we\'re cleared to see.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins/admin,MDAdmin,VAAdmin,DCAdmin,WVAdmin,DEAdmin,MainAdmin,Dilbert,Wally,Ted,Alice,Tina,PHB,MeLeet';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MeLeet&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><value sequence_index="0"><id>19</id><name>Elbonian Hacker</name><lang>eb</lang><login_id>MeLeet</login_id></value></logins></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 39D: Access a bunch of individually-selected logins (Logged in as DC Area Main Admin). We should get several logins, as we are cleared to see all the DC Area admin logins.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins/admin,MDAdmin,VAAdmin,DCAdmin,WVAdmin,DEAdmin,MainAdmin,Dilbert,Wally,Ted,Alice,Tina,PHB,MeLeet';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><value sequence_index="0"><id>7</id><name>Maryland Login</name><lang>en</lang><login_id>MDAdmin</login_id></value><value sequence_index="1"><id>8</id><name>Virginia Login</name><lang>en</lang><login_id>VAAdmin</login_id></value><value sequence_index="2"><id>9</id><name>Washington DC Login</name><lang>en</lang><login_id>DCAdmin</login_id></value><value sequence_index="3"><id>10</id><name>West Virginia Login</name><lang>en</lang><login_id>WVAdmin</login_id></value><value sequence_index="4"><id>11</id><name>Delaware Login</name><lang>en</lang><login_id>DEAdmin</login_id></value><value sequence_index="5"><id>12</id><name>Main Admin Login</name><lang>en</lang><login_id>MainAdmin</login_id></value></logins></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 39E: Access a bunch of individually-selected logins (Logged in as the Dilbert Co. PHB). We should get several logins, as we are cleared to see all the Dilbert Co. logins.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins/admin,MDAdmin,VAAdmin,DCAdmin,WVAdmin,DEAdmin,MainAdmin,Dilbert,Wally,Ted,Alice,Tina,PHB,MeLeet';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=PHB&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><value sequence_index="0"><id>13</id><name>Dilbert Login</name><lang>en</lang><login_id>Dilbert</login_id></value><value sequence_index="1"><id>14</id><name>Wally Login</name><lang>en</lang><login_id>Wally</login_id></value><value sequence_index="2"><id>15</id><name>Ted Login</name><lang>en</lang><login_id>Ted</login_id></value><value sequence_index="3"><id>16</id><name>Alice Login</name><lang>en</lang><login_id>Alice</login_id></value><value sequence_index="4"><id>17</id><name>Tina Login</name><lang>en</lang><login_id>Tina</login_id></value><value sequence_index="5"><id>18</id><name>Pointy-Haired Boss login</name><lang>en</lang><login_id>PHB</login_id></value></logins></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 39F: Access a bunch of individually-selected users (Logged in as "God"). We should get everything, including the Elbonian Hacker login.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins/admin,MDAdmin,VAAdmin,DCAdmin,WVAdmin,DEAdmin,MainAdmin,Dilbert,Wally,Ted,Alice,Tina,PHB,MeLeet';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><value sequence_index="0"><id>2</id><name>God Admin Login</name><lang>en</lang><login_id>admin</login_id></value><value sequence_index="1"><id>7</id><name>Maryland Login</name><lang>en</lang><login_id>MDAdmin</login_id></value><value sequence_index="2"><id>8</id><name>Virginia Login</name><lang>en</lang><login_id>VAAdmin</login_id></value><value sequence_index="3"><id>9</id><name>Washington DC Login</name><lang>en</lang><login_id>DCAdmin</login_id></value><value sequence_index="4"><id>10</id><name>West Virginia Login</name><lang>en</lang><login_id>WVAdmin</login_id></value><value sequence_index="5"><id>11</id><name>Delaware Login</name><lang>en</lang><login_id>DEAdmin</login_id></value><value sequence_index="6"><id>12</id><name>Main Admin Login</name><lang>en</lang><login_id>MainAdmin</login_id></value><value sequence_index="7"><id>13</id><name>Dilbert Login</name><lang>en</lang><login_id>Dilbert</login_id></value><value sequence_index="8"><id>14</id><name>Wally Login</name><lang>en</lang><login_id>Wally</login_id></value><value sequence_index="9"><id>15</id><name>Ted Login</name><lang>en</lang><login_id>Ted</login_id></value><value sequence_index="10"><id>16</id><name>Alice Login</name><lang>en</lang><login_id>Alice</login_id></value><value sequence_index="11"><id>17</id><name>Tina Login</name><lang>en</lang><login_id>Tina</login_id></value><value sequence_index="12"><id>18</id><name>Pointy-Haired Boss login</name><lang>en</lang><login_id>PHB</login_id></value><value sequence_index="13"><id>19</id><name>Elbonian Hacker</name><lang>eb</lang><login_id>MeLeet</login_id></value></logins></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}
?>
