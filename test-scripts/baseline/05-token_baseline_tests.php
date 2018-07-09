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

baobab_run_tests(16, 'BASELINE TOKEN MANAGEMENT', 'We test to make sure that we can see whatever tokens we have available, and create new ones, if allowed.');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0016() {
    basalt_run_single_direct_test(16, 'Check Our Tokens (JSON)', 'Check tokens for various logins.', 'baseline_tests');
}

function basalt_test_0016($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Baseline Test 16A: Don\'t Log In, and see what tokens we have. We expect to get bounced with a 403.';
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
    
    $title = 'Baseline Test 16B: Log in as "MDAdmin," and see what tokens we have.';
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
    
        call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    }
    
    $title = 'Baseline Test 16C: Log in as "MainAdmin," and see what tokens we have.';
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
    
        call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    }
    
    $title = 'Baseline Test 16D: Log in as "God," and see what tokens we have.';
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
    
        call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    }
}

// --------------------

function basalt_test_define_0017() {
    basalt_run_single_direct_test(17, 'Check Our Tokens (XML)', 'Check tokens for various logins.', 'baseline_tests');
}

function basalt_test_0017($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Baseline Test 17A: Don\'t Log In, and see what tokens we have. We expect to get bounced with a 403.';
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
    
    $title = 'Baseline Test 17B: Log in as "MDAdmin," and see what tokens we have.';
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
    
        call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    }
    
    $title = 'Baseline Test 17C: Log in as "MainAdmin," and see what tokens we have.';
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
    
        call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    }
    
    $title = 'Baseline Test 17D: Log in as "God," and see what tokens we have.';
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
    
        call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    }
}

// --------------------

function basalt_test_define_0018() {
    basalt_run_single_direct_test(18, 'Create Tokens (JSON)', 'Try to create new tokens for various logins.', 'baseline_tests');
}

function basalt_test_0018($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Baseline Test 18A: Don\'t Log In, and try to create a token. We expect to get bounced with a 403.';
    $method = 'POST';
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
    
    $title = 'Baseline Test 18B: Log in as "MDAdmin," and try to create a token. We expect to get bounced with a 403.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/baseline/tokens';
    $data = NULL;
    $result_code = '';
    $expected_result_code = 200;
    $st1 = microtime(true);
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, NULL);
    } else {
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
    }
    
    $title = 'Baseline Test 18C: Log in as "MainAdmin," and try to create a token. It should work, this time, but first, we try PUT, which should "fail" with an empty 200.';
    $result_code = '';
    $expected_result_code = 200;
    $st1 = microtime(true);
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, NULL);
    } else {
        $method = 'PUT';
        $uri = __SERVER_URI__.'/json/baseline/tokens';
        $data = NULL;
        $expected_result_code = 200;
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
    
        $method = 'POST';
        $uri = __SERVER_URI__.'/json/baseline/tokens';
        $data = NULL;
        $expected_result_code = 200;
        $expected_result = '{"baseline":{"tokens":[13]}}';
        $result_code = '';

        $st1 = microtime(true);
        $result = call_REST_API($method, $uri, $data, $api_key, $result_code);

        if ($result_code != $expected_result_code) {
            test_result_bad($result_code, $result, $st1, $expected_result);
        } else {
            test_result_good($result_code, $result, $st1, $expected_result);
        }
    
        call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    }
    
    $title = 'Baseline Test 18D: Log in as "God," and try to create a token. This should also work.';
    $result_code = '';
    $expected_result_code = 200;
    $st1 = microtime(true);
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, NULL);
    } else {
        $method = 'POST';
        $uri = __SERVER_URI__.'/json/baseline/tokens';
        $data = NULL;
        $expected_result_code = 200;
        $expected_result = '{"baseline":{"tokens":[14]}}';
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
}

// --------------------

function basalt_test_define_0019() {
    basalt_run_single_direct_test(19, 'Create Tokens (XML)', 'Try to create new tokens for various logins.', 'baseline_tests');
}

function basalt_test_0019($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Baseline Test 19A: Don\'t Log In, and try to create a token. We expect to get bounced with a 403.';
    $method = 'POST';
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
    
    $title = 'Baseline Test 19B: Log in as "MDAdmin," and try to create a token. We expect to get bounced with a 403.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/baseline/tokens';
    $data = NULL;
    $result_code = '';
    $expected_result_code = 200;
    $st1 = microtime(true);
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, NULL);
    } else {
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
    }
    
    $result_code = '';
    $expected_result_code = 200;
    $st1 = microtime(true);
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, NULL);
    } else {
    $title = 'Baseline Test 19C: Log in as "MainAdmin," and try to create a token. It should work, this time, but first, we try PUT, which should "fail" with an empty 200.';
        $method = 'PUT';
        $uri = __SERVER_URI__.'/xml/baseline/tokens';
        $data = NULL;
        $expected_result_code = 200;
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
    
        $method = 'POST';
        $expected_result_code = 200;
        $expected_result = get_xml_header('baseline').'<tokens><value sequence_index="0">13</value></tokens></baseline>';
        $result_code = '';

        $st1 = microtime(true);
        $result = call_REST_API($method, $uri, $data, $api_key, $result_code);

        if ($result_code != $expected_result_code) {
            test_result_bad($result_code, $result, $st1, $expected_result);
        } else {
            test_result_good($result_code, $result, $st1, $expected_result);
        }
    
        call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    }
    
    $title = 'Baseline Test 19D: Log in as "God," and try to create a token. This should also work.';
    $result_code = '';
    $expected_result_code = 200;
    $st1 = microtime(true);
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, NULL);
    } else {
        $method = 'POST';
        $uri = __SERVER_URI__.'/xml/baseline/tokens';
        $data = NULL;
        $expected_result_code = 200;
        $expected_result = get_xml_header('baseline').'<tokens><value sequence_index="0">14</value></tokens></baseline>';
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
}
?>
