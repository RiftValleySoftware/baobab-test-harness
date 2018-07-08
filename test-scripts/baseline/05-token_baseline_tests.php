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

baobab_run_tests(14, 'BASELINE TOKEN MANAGEMENT', 'We test to make sure that we can see whatever tokens we have available, and create new ones, if allowed.');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0014() {
    basalt_run_single_direct_test(14, 'Check Our Tokens (JSON)', 'Check tokens for various logins.', 'baseline_tests');
}

function basalt_test_0014($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Baseline Test 14A: D ont Log In, and see what tokens we have. We expect to get bounced with a 403.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/tokens';
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
    
    $title = 'Baseline Test 14B: Log in as "MDAdmin," and see what tokens we have.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/tokens';
    $data = NULL;
    $result_code = '';
    $expected_result_code = 200;
    $st1 = microtime(true);
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, NULL);
    } else {
        $expected_result_code = 200;
        $expected_result = '{"baseline":{"tokens":[7,1]}}';
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
    
    $title = 'Baseline Test 14C: Log in as "MainAdmin," and see what tokens we have.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/tokens';
    $data = NULL;
    $result_code = '';
    $expected_result_code = 200;
    $st1 = microtime(true);
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, NULL);
    } else {
        $expected_result_code = 200;
        $expected_result = '{"baseline":{"tokens":[12,1,7,8,9,10,11]}}';
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
    
    $title = 'Baseline Test 14D: Log in as "God," and see what tokens we have.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/tokens';
    $data = NULL;
    $result_code = '';
    $expected_result_code = 200;
    $st1 = microtime(true);
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, NULL);
    } else {
        $expected_result_code = 200;
        $expected_result = '{"baseline":{"tokens":[2,1,7,8,9,10,11,12]}}';
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
}

// --------------------

function basalt_test_define_0015() {
    basalt_run_single_direct_test(15, 'Check Our Tokens (XML)', 'Check tokens for various logins.', 'baseline_tests');
}

function basalt_test_0015($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Baseline Test 14A: D ont Log In, and see what tokens we have. We expect to get bounced with a 403.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/tokens';
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
    
    $title = 'Baseline Test 14B: Log in as "MDAdmin," and see what tokens we have.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/tokens';
    $data = NULL;
    $result_code = '';
    $expected_result_code = 200;
    $st1 = microtime(true);
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, NULL);
    } else {
        $expected_result_code = 200;
        $expected_result = get_xml_header('baseline').'<tokens><value sequence_index="0">7</value><value sequence_index="1">1</value></tokens></baseline>';
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
    
    $title = 'Baseline Test 14C: Log in as "MainAdmin," and see what tokens we have.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/tokens';
    $data = NULL;
    $result_code = '';
    $expected_result_code = 200;
    $st1 = microtime(true);
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, NULL);
    } else {
        $expected_result_code = 200;
        $expected_result = get_xml_header('baseline').'<tokens><value sequence_index="0">12</value><value sequence_index="1">1</value><value sequence_index="2">7</value><value sequence_index="3">8</value><value sequence_index="4">9</value><value sequence_index="5">10</value><value sequence_index="6">11</value></tokens></baseline>';
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
    
    $title = 'Baseline Test 14D: Log in as "God," and see what tokens we have.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/tokens';
    $data = NULL;
    $result_code = '';
    $expected_result_code = 200;
    $st1 = microtime(true);
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, NULL);
    } else {
        $expected_result_code = 200;
        $expected_result = get_xml_header('baseline').'<tokens><value sequence_index="0">2</value><value sequence_index="1">1</value><value sequence_index="2">7</value><value sequence_index="3">8</value><value sequence_index="4">9</value><value sequence_index="5">10</value><value sequence_index="6">11</value><value sequence_index="7">12</value></tokens></baseline>';
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
}

?>
