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
// ------------------------------ MAIN CODE -------------------------------------------

require_once(dirname(dirname(dirname(__FILE__))).'/php/run_baobab_tests.php');

baobab_run_tests(6, 'RESOURCE-NEUTRAL TAG STRING BASELINE SEARCHES', 'We search for resources with the baseline plugin, which returns them as groups of IDs.');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0006() {
    basalt_run_single_direct_test(6, 'Complex Tag Search (JSON)', 'Do a more comprehensive search on the tags in objects.', 'baseline_tests');
}

function basalt_test_0006($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Baseline Test 6A: Test With A Fairly Specific Tag 0 (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag0=Grace+United+Methodist+Church';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"places":[1592,1721]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'Baseline Test 6B: Test With A Fairly Vague Tag 0 (Large Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag0=%Church%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/03-search_baseline_tests-6B-Value.txt');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'Baseline Test 6C: Test With A Fairly Specific Tag 1 (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag1=1101+West+Pratt+Street';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"places":[187,310]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'Baseline Test 6D: Test With A Fairly Vague Tag 1 (Large Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag1=11%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/03-search_baseline_tests-6D-Value.txt');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'Baseline Test 6E: Test With A Fairly Specific Tag 2 (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag2=TAG-2-TEST-THINGS';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"things":[1732,1733,1734,1736]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'Baseline Test 6F: Test With A Fairly Vague Tag 2 (Larger Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag2=TAG-2-TEST%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"people":[1725,1727,1729],"things":[1732,1733,1734,1736]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'Baseline Test 6G: Test With A Fairly Specific Tag 3 (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag3=waldorf';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"places":[10,31,80]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'Baseline Test 6H: Test With A Fairly Specific Tag 3, but A Common Tag (Large Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag3=baltimore';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/03-search_baseline_tests-6H-Value.txt');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'Baseline Test 6I: Test With A Fairly Vage Tag 3 (Large Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag3=w%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/03-search_baseline_tests-6I-Value.txt');
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

// --------------------

function basalt_test_define_0007() {
    basalt_run_single_direct_test(7, 'Complex Tag Search (XML)', 'Do a more comprehensive search on the tags in objects.', 'baseline_tests');
}

function basalt_test_0007($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Baseline Test 6A: Test With A Fairly Specific Tag 0 (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag0=Grace+United+Methodist+Church';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').'<places><value sequence_index="0">1592</value><value sequence_index="1">1721</value></places></baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
        
    $title = 'Baseline Test 7B: Test With A Fairly Vague Tag 0 (Large Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag0=%Church%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').file_get_contents(dirname(__FILE__).'/03-search_baseline_tests-7B-Value.txt').'</baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'Baseline Test 7C: Test With A Fairly Specific Tag 1 (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag1=1101+West+Pratt+Street';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').'<places><value sequence_index="0">187</value><value sequence_index="1">310</value></places></baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'Baseline Test 7D: Test With A Fairly Vague Tag 1 (Large Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag1=11%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').file_get_contents(dirname(__FILE__).'/03-search_baseline_tests-7D-Value.txt').'</baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'Baseline Test 7E: Test With A Fairly Specific Tag 2 (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag2=TAG-2-TEST-THINGS';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').'<things><value sequence_index="0">1732</value><value sequence_index="1">1733</value><value sequence_index="2">1734</value><value sequence_index="3">1736</value></things></baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'Baseline Test 7F: Test With A Fairly Vague Tag 2 (Larger Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag2=TAG-2-TEST%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').'<people><value sequence_index="0">1725</value><value sequence_index="1">1727</value><value sequence_index="2">1729</value></people><things><value sequence_index="0">1732</value><value sequence_index="1">1733</value><value sequence_index="2">1734</value><value sequence_index="3">1736</value></things></baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'Baseline Test 7G: Test With A Fairly Specific Tag 3 (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag3=waldorf';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').'<places><value sequence_index="0">10</value><value sequence_index="1">31</value><value sequence_index="2">80</value></places></baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'Baseline Test 7H: Test With A Fairly Specific Tag 3, but A Common Tag (Large Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag3=baltimore';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').file_get_contents(dirname(__FILE__).'/03-search_baseline_tests-7H-Value.txt').'</baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'Baseline Test 7I: Test With A Fairly Vage Tag 3 (Large Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag3=w%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').file_get_contents(dirname(__FILE__).'/03-search_baseline_tests-7I-Value.txt').'</baseline>';
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
