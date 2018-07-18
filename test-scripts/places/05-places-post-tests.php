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

baobab_run_tests(104, '104- : PLACES POST TESTS', '');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0104() {
    basalt_run_single_direct_test(104, 'Search For Places Using Simple Name (JSON)', 'GET Simple Direct Name Search for \'Just For Today.\'', 'places_tests');
}

function basalt_test_0104($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 104A: .';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MeLeet&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 400;
    $expected_result = '';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code, true));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 104, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 104, $title);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------
?>
