<?php
/***************************************************************************************************************************/
/**
    BASALT Extension Layer
    
    © Copyright 2018, Little Green Viper Software Development LLC/The Great Rift Valley Software Company
    
    LICENSE:
    
    FOR OPEN-SOURCE (COMMERCIAL OR FREE):
    This code is released as open source under the GNU Plublic License (GPL), Version 3.
    You may use, modify or republish this code, as long as you do so under the terms of the GPL, which requires that you also
    publish all modificanions, derivative products and license notices, along with this code.
    
    UNDER SPECIAL LICENSE, DIRECTLY FROM LITTLE GREEN VIPER OR THE GREAT RIFT VALLEY SOFTWARE COMPANY:
    It is NOT to be reused or combined into any application, nor is it to be redistributed, republished or sublicensed,
    unless done so, specifically WITH SPECIFIC, WRITTEN PERMISSION from Little Green Viper Software Development LLC,
    or The Great Rift Valley Software Company.

    Little Green Viper Software Development: https://littlegreenviper.com
    The Great Rift Valley Software Company: https://riftvalleysoftware.com

    Little Green Viper Software Development: https://littlegreenviper.com
*/
// ------------------------------ MAIN CODE -------------------------------------------

require_once(dirname(dirname(dirname(__FILE__))).'/php/run_baobab_tests.php');

baobab_run_tests(1, '1-3: GENERIC BASELINE AND SCHEMA', 'Try the basic list plugins command, and access each plugin for its XML schema.');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0001() {
    basalt_run_single_direct_test(1, 'List Plugins (JSON)', 'We first try with no plugin selector. We expect that to fail, then we try with \'baseline\' as the selector.', 'baseline_tests');
}

function basalt_test_0001($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Baseline Test 1A: Test Without A Plugin Specifier';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 400;
    $expected_result = NULL;
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 1, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 1, $title);
    }
    
    $title = 'Baseline Test 1B: Test With A Plugin Specifier ("baseline")';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"plugins":["baseline","people","places","things"]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 1, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 1, $title);
    }
}

// --------------------

function basalt_test_define_0002() {
    basalt_run_single_direct_test(2, 'List Plugins (XML)', 'We first try with no plugin selector. We expect that to fail, then we try with \'baseline\' as the selector.', 'baseline_tests');
}

function basalt_test_0002($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Baseline Test 2A: Test Without A Plugin Specifier';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 400;
    $expected_result = NULL;
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 2, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 2, $title);
    }
    
    $title = 'Baseline Test 2B: Test With A Plugin Specifier ("baseline")';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '<?xml version="1.0" encoding="UTF-8"?><baseline xsi:schemaLocation="http://localhost/baobab-test-harness/php/baobab-server.php http://localhost/baobab-test-harness/php/baobab-server.php/xsd/baseline" xmlns="http://localhost/baobab-test-harness/php/baobab-server.php" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><plugins><value sequence_index="0">baseline</value><value sequence_index="1">people</value><value sequence_index="2">places</value><value sequence_index="3">things</value></plugins></baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 2, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 2, $title);
    }
}

// --------------------

function basalt_test_define_0003() {
    basalt_run_single_direct_test(3, 'Get All Plugin Schemas (XSD)', 'We determine what plugins we have, then get the XML schema for each', 'baseline_tests');
}

function basalt_test_0003($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Baseline Test 3A: Test Without A Plugin Specifier';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xsd/';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 400;
    $expected_result = NULL;
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 3, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 3, $title);
    }
    
    echo('<h3>Baseline Test 3B: Get the XSD Plugin Schemas</h3><div class="indent_1">');
    
    $title = 'Baseline Test 3B-Step 1: Get the JSON Plugin Specifiers';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"plugins":["baseline","people","places","things"]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 3, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 3, $title);
        
        $plugin_list = json_decode($result)->baseline->plugins;
        
        $step = 2;
        
        foreach ($plugin_list as $plugin_name) {
            $title = 'Baseline Test 3B-Step '.$step++.': Get the '.$plugin_name.' Plugin Schema';
            $method = 'GET';
            $uri = __SERVER_URI__.'/xsd/'.$plugin_name;
            $data = NULL;
            $api_key = NULL;
            $expected_result_code = 200;
            $expected_result = get_xsd($plugin_name, ('baseline' == $plugin_name) ? 'main' : NULL);
            $result_code = '';
            
            test_header($title, $method, $uri, $expected_result_code);
            
            $st1 = microtime(true);
            $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
            if ($result_code != $expected_result_code) {
                test_result_bad($result_code, $result, $st1, $expected_result);
                log_entry(false, 3, $title);
            } else {
                test_result_good($result_code, $result, $st1, $expected_result);
                log_entry(true, 3, $title);
            }
        }
    }
    echo('</div>');
}
?>
