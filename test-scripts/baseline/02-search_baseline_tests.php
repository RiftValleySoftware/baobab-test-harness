<?php
/***************************************************************************************************************************/
/**
    BASALT Extension Layer
    
    © Copyright 2018, Little Green Viper Software Development LLC/The Great Rift Valley Software Company
    
    LICENSE:
    

    Little Green Viper Software Development: https://littlegreenviper.com
*/
// ------------------------------ MAIN CODE -------------------------------------------

require_once(dirname(dirname(dirname(__FILE__))).'/php/run_baobab_tests.php');

baobab_run_tests(4, '4-5: RESOURCE-NEUTRAL NAME STRING BASELINE SEARCHES', 'We search for resources with the baseline plugin, which returns them as groups of IDs.');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0004() {
    basalt_run_single_direct_test(4, 'Simple Name Search (JSON)', 'Do a simple search on an object name.', 'baseline_tests');
}

function basalt_test_0004($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Baseline Test 5A: Test With A Fairly Specific Name (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_name=worth+enough';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"things":[1732]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 4, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 4, $title);
    }
    
    $title = 'Baseline Test 5B: Test With A Fairly Vague Name (Large Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_name=w%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/02-search_baseline_tests-4B-Value.txt');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 4, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 4, $title);
    }
}

// --------------------

function basalt_test_define_0005() {
    basalt_run_single_direct_test(5, 'Simple Name Search (XML)', 'Do a simple search on an object name.', 'baseline_tests');
}

function basalt_test_0005($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Baseline Test 5A: Test With A Fairly Specific Name (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_name=worth+enough';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').'<things><value sequence_index="0">1732</value></things></baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 5, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 5, $title);
    }
    
    $title = 'Baseline Test 5B: Test With A Fairly Vague Name (Large Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_name=w%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').file_get_contents(dirname(__FILE__).'/02-search_baseline_tests-5B-Value.txt').'</baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 5, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 5, $title);
    }
}
?>
