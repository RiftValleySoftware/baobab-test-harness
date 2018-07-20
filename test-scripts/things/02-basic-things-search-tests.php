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

baobab_run_tests(116, '116- : BASIC SEARCH GET THINGS TESTS', '');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0116() {
    basalt_run_single_direct_test(116, 'BASIC GET TESTS (JSON)', 'We Set Up A Bunch of Tags, Then Use Them to Search for Things.', 'things_tests_2');
}

function basalt_test_0116($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Things Test 116A: Look for the string in Tag 2 (Gets Everything We Can See -Remember We Are Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/things/?search_tag2=TAG-2-TEST-THINGS';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"things":[{"id":1732,"name":"Worth Enough","lang":"en","coords":"39.746352,-75.551615"},{"id":1733,"name":"Another World","lang":"en","coords":"39.648316,-77.719232"},{"id":1735,"name":"The Great Shadow","lang":"en","coords":"37.510935,-77.595502"},{"id":1736,"name":"Yosemite","lang":"en","coords":"37.865100,-119.538300"},{"id":1737,"name":"Tom And Jerry","lang":"en"},{"id":1739,"name":"Winnie The Pooh","lang":"en"},{"id":1740,"name":"Crickets","lang":"en"},{"id":1741,"name":"Singing Pete","lang":"en","coords":"38.871900,-77.056300"},{"id":1742,"name":"Spinning Earth","lang":"en"},{"id":1743,"name":"The Three Musketeers In Dutch","lang":"en"}]}';
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 116, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 116, $title);
    }
    
    $title = 'Things Test 116B: Look for empty tag 2 (Should return nothing).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/things/?search_tag2=';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"things":[]}';
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 116, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 116, $title);
    }
    
    $title = 'Things Test 116C: Look for Images in the description.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/things/?search_description=image';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"things":[{"id":1732,"name":"Worth Enough","lang":"en","coords":"39.746352,-75.551615"},{"id":1733,"name":"Another World","lang":"en","coords":"39.648316,-77.719232"},{"id":1736,"name":"Yosemite","lang":"en","coords":"37.865100,-119.538300"},{"id":1739,"name":"Winnie The Pooh","lang":"en"},{"id":1742,"name":"Spinning Earth","lang":"en"}]}';
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 116, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 116, $title);
    }
    
    $title = 'Things Test 116D: Look for Anything In Tag 9.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/things/?search_tag9=%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"things":[{"id":1735,"name":"The Great Shadow","lang":"en","coords":"37.510935,-77.595502"},{"id":1743,"name":"The Three Musketeers In Dutch","lang":"en"}]}';
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 116, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 116, $title);
    }
    
    $title = 'Things Test 116E: Do It All Again, But This Time, Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/things/?search_tag2=TAG-2-TEST-THINGS';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"things":[{"id":1732,"name":"Worth Enough","lang":"en","coords":"39.746352,-75.551615"},{"id":1733,"name":"Another World","lang":"en","coords":"39.648316,-77.719232"},{"id":1734,"name":"Top Shot","lang":"en","coords":"39.746352,-75.551615"},{"id":1735,"name":"The Great Shadow","lang":"en","coords":"37.510935,-77.595502"},{"id":1736,"name":"Yosemite","lang":"en","coords":"37.865100,-119.538300"},{"id":1737,"name":"Tom And Jerry","lang":"en"},{"id":1739,"name":"Winnie The Pooh","lang":"en"},{"id":1740,"name":"Crickets","lang":"en"},{"id":1741,"name":"Singing Pete","lang":"en","coords":"38.871900,-77.056300"},{"id":1742,"name":"Spinning Earth","lang":"en"},{"id":1743,"name":"The Three Musketeers In Dutch","lang":"en"},{"id":1744,"name":"The Divine Comedy Illustrated.","lang":"en","coords":"38.871900,-77.056300"}]}';
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 116, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 116, $title);
    }
    
    $title = 'Things Test 116F: Look for empty tag 2. This Time, We Get Something.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/things/?search_tag2=';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"things":[{"id":1738,"name":"Brown And Williamson Phone Message","lang":"en"}]}';
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 116, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 116, $title);
    }
    
    $title = 'Things Test 116G: Look for Images in the description.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/things/?search_description=image';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"things":[{"id":1732,"name":"Worth Enough","lang":"en","coords":"39.746352,-75.551615"},{"id":1733,"name":"Another World","lang":"en","coords":"39.648316,-77.719232"},{"id":1734,"name":"Top Shot","lang":"en","coords":"39.746352,-75.551615"},{"id":1736,"name":"Yosemite","lang":"en","coords":"37.865100,-119.538300"},{"id":1739,"name":"Winnie The Pooh","lang":"en"},{"id":1742,"name":"Spinning Earth","lang":"en"}]}';
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 116, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 116, $title);
    }
    
    $title = 'Things Test 116H: Look for Anything In Tag 9.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/things/?search_tag9=%';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"things":[{"id":1735,"name":"The Great Shadow","lang":"en","coords":"37.510935,-77.595502"},{"id":1743,"name":"The Three Musketeers In Dutch","lang":"en"},{"id":1744,"name":"The Divine Comedy Illustrated.","lang":"en","coords":"38.871900,-77.056300"}]}';
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 116, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 116, $title);
    }

    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------
?>
