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

baobab_run_tests(68, 'BASIC PLACES TESTS', '');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0068() {
    basalt_run_single_direct_test(68, 'List Places (JSON)', 'GET tests for places.', 'places_tests');
}

function basalt_test_0068($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 68A: List All (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/01-get_places_tests-68A.json');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 68, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 68, $title);
    }
    
    $title = 'Places Test 68B: List All (Logged In as "God")';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/01-get_places_tests-68B.json');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 68, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 68, $title);
    }
    
    $title = 'Places Test 68C: List All With Details (Logged In as "God")';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?show_details';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/01-get_places_tests-68C.json');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 68, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 68, $title);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

function basalt_test_define_0069() {
    basalt_run_single_direct_test(69, 'List Places (XML)', 'GET tests for places.', 'places_tests');
}

function basalt_test_0069($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 69A: List All (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').file_get_contents(dirname(__FILE__).'/01-get_places_tests-69A.xml');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 69, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 69, $title);
    }
    
    $title = 'Places Test 69B: List All (Logged In as "God")';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').file_get_contents(dirname(__FILE__).'/01-get_places_tests-69B.xml');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 69, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 69, $title);
    }
    
    $title = 'Places Test 69C: List All With Details (Logged In as "God")';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?show_details';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').file_get_contents(dirname(__FILE__).'/01-get_places_tests-69C.xml');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 69, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 69, $title);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}
?>
