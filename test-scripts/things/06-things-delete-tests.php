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

baobab_run_tests(136, '136-139: THINGS DELETE TESTS', '');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0136() {
    basalt_run_single_direct_test(136, 'DELETE A SINGLE RECORD (JSON)', '', 'things_tests_2');
}

function basalt_test_0136($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Things Test 136A: Try Deleting A Thing With No Login. Should Fail With A 403.';
    $method = 'DELETE';
    $uri = __SERVER_URI__.'/json/things/1732';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 403;
    $expected_result = '';
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 136, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 136, $title);
    }

    $title = 'Things Test 136B: Try Again, But This Time, Log In.';
    $method = 'DELETE';
    $uri = __SERVER_URI__.'/json/things/1732';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/06-things-delete-tests-136B.json');

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 136, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 136, $title);
    }

    $title = 'Things Test 136C: Now Let\'s Do One With the Key.';
    $method = 'DELETE';
    $uri = __SERVER_URI__.'/json/things/basalt-test-0171:+Another%20World';
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/06-things-delete-tests-136C.json');

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 136, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 136, $title);
    }

    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0137() {
    basalt_run_single_direct_test(137, 'DELETE A SINGLE RECORD (XML)', '', 'things_tests_2');
}

function basalt_test_0137($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Things Test 137A: Try Deleting A Thing With No Login. Should Fail With A 403.';
    $method = 'DELETE';
    $uri = __SERVER_URI__.'/xml/things/1732';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 403;
    $expected_result = '';
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 137, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 137, $title);
    }

    $title = 'Things Test 137B: Try Again, But This Time, Log In.';
    $method = 'DELETE';
    $uri = __SERVER_URI__.'/xml/things/1732';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('things').file_get_contents(dirname(__FILE__).'/06-things-delete-tests-137B.xml');

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 137, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 137, $title);
    }

    $title = 'Things Test 137C: Now Let\'s Do One With the Key.';
    $method = 'DELETE';
    $uri = __SERVER_URI__.'/xml/things/basalt-test-0171:+Another%20World';
    $expected_result_code = 200;
    $expected_result = get_xml_header('things').file_get_contents(dirname(__FILE__).'/06-things-delete-tests-137C.xml');

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 137, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 137, $title);
    }

    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0138() {
    basalt_run_single_direct_test(138, 'DELETE MULTIPLE THINGS (JSON)', '', 'things_tests_2');
}

function basalt_test_0138($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Things Test 138A: Delete Two Discretely-Selected (By ID) Things.';
    $method = 'DELETE';
    $uri = __SERVER_URI__.'/json/things/1732,1733';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/06-things-delete-tests-138A.json');
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 138, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result, false);
        log_entry(true, 138, $title);
    }
    
    $title = 'Things Test 138B: Delete These Things That We Find With A Radius Search.';
    $method = 'DELETE';
    $uri = __SERVER_URI__.'/json/things/?search_longitude=-77.595505&search_latitude=37.510937&search_radius=2';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/06-things-delete-tests-138B.json');

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 138, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result, false);
        log_entry(true, 138, $title);
    }
    
    $title = 'Things Test 138C: Delete A Bunch of Things We Find By Text Search.';
    $method = 'DELETE';
    $uri = __SERVER_URI__.'/json/things/?search_description=IMAGE';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/06-things-delete-tests-138C.json');

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 138, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result, false);
        log_entry(true, 138, $title);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0139() {
    basalt_run_single_direct_test(139, 'DELETE MULTIPLE THINGS (XML)', '', 'things_tests_2');
}

function basalt_test_0139($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Things Test 139A: Delete Two Discretely-Selected (By ID) Things.';
    $method = 'DELETE';
    $uri = __SERVER_URI__.'/xml/things/1732,1733';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('things').file_get_contents(dirname(__FILE__).'/06-things-delete-tests-139A.xml');
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 139, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result, false);
        log_entry(true, 139, $title);
    }
    
    $title = 'Things Test 139B: Delete These Things That We Find With A Radius Search.';
    $method = 'DELETE';
    $uri = __SERVER_URI__.'/xml/things/?search_longitude=-77.595505&search_latitude=37.510937&search_radius=2';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('things').file_get_contents(dirname(__FILE__).'/06-things-delete-tests-139B.xml');

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 139, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result, false);
        log_entry(true, 139, $title);
    }
    
    $title = 'Things Test 139C: Delete A Bunch of Things We Find By Text Search.';
    $method = 'DELETE';
    $uri = __SERVER_URI__.'/xml/things/?search_description=IMAGE';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('things').file_get_contents(dirname(__FILE__).'/06-things-delete-tests-139C.xml');

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 139, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result, false);
        log_entry(true, 139, $title);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}
?>
