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

baobab_run_tests(52, 'PUT METHOD PEOPLE TESTS', '');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0052() {
    basalt_run_single_direct_test(52, 'TEST', '', 'people_tests');
}

function basalt_test_0052($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 52A:';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/json/people/people/';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 400;
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
}
?>
