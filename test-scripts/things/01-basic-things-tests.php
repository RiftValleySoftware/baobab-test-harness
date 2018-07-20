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

baobab_run_tests(114, '114-115 : BASIC DIRECT-ACCESS GET THINGS TESTS', '');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0114() {
    basalt_run_single_direct_test(114, 'BASIC GET TESTS (JSON)', 'Access Things In Resource Paths', 'things_tests');
}

function basalt_test_0114($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Things Test 114A: Just A Simple List of All the Publicly-Visible Things';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/things/';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"things":[{"id":1732,"name":"Worth Enough","lang":"en","coords":"39.746352,-75.551615"},{"id":1733,"name":"Another World","lang":"en","coords":"39.648316,-77.719232"},{"id":1734,"name":"Top Shot","lang":"en","coords":"39.746352,-75.551615"},{"id":1735,"name":"The Great Shadow","lang":"en","coords":"37.510935,-77.595502"},{"id":1736,"name":"Yosemite","lang":"en","coords":"37.865100,-119.538300"},{"id":1737,"name":"Tom And Jerry","lang":"en"},{"id":1738,"name":"Brown And Williamson Phone Message","lang":"en"},{"id":1739,"name":"Winnie The Pooh","lang":"en"},{"id":1740,"name":"Crickets","lang":"en"},{"id":1741,"name":"Singing Pete","lang":"en","coords":"38.871900,-77.056300"},{"id":1742,"name":"Spinning Earth","lang":"en"},{"id":1743,"name":"The Three Musketeers In Dutch","lang":"en"},{"id":1744,"name":"The Divine Comedy Illustrated.","lang":"en","coords":"38.871900,-77.056300"}]}';
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 114, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 114, $title);
    }
    
    $title = 'Things Test 114B: Same Thing, But Showing Details (Big Dump)';
    $uri = __SERVER_URI__.'/json/things/?show_details';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/01-basic-things-tests-114B.json');
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 114, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result, false);
        log_entry(true, 114, $title);
    }
    
    $title = 'Things Test 114C: Just A Simple List of Four, Explicitly-Selected Things (By ID)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/things/1732,1733,1734,1736';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"things":[{"id":1732,"name":"Worth Enough","lang":"en","coords":"39.746352,-75.551615"},{"id":1733,"name":"Another World","lang":"en","coords":"39.648316,-77.719232"},{"id":1734,"name":"Top Shot","lang":"en","coords":"39.746352,-75.551615"},{"id":1736,"name":"Yosemite","lang":"en","coords":"37.865100,-119.538300"}]}';
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 114, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 114, $title);
    }
    
    $title = 'Things Test 114D: Just A Simple List of Four, Explicitly-Selected Things (By Key)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/things/basalt-test-0171:+Worth+Enough,basalt-test-0171:+Another+World,basalt-test-0171:+Top+Shot,basalt-test-0171:+Yosemite';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"things":[{"id":1732,"name":"Worth Enough","lang":"en","coords":"39.746352,-75.551615"},{"id":1733,"name":"Another World","lang":"en","coords":"39.648316,-77.719232"},{"id":1734,"name":"Top Shot","lang":"en","coords":"39.746352,-75.551615"},{"id":1736,"name":"Yosemite","lang":"en","coords":"37.865100,-119.538300"}]}';
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 114, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 114, $title);
    }
    
    $title = 'Things Test 114E: Let\'s Look At One of the Things (By ID)';
    $uri = __SERVER_URI__.'/json/things/1732/?show_details';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/01-basic-things-tests-114E.json');
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 114, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 114, $title);
    }
    
    $title = 'Things Test 114F: Let\'s Look At One of the Things (By Key)';
    $uri = __SERVER_URI__.'/json/things/basalt-test-0171:+Worth+Enough/?show_details';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/01-basic-things-tests-114E.json');
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 114, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 114, $title);
    }
}

// --------------------

function basalt_test_define_0115() {
    basalt_run_single_direct_test(115, 'BASIC GET TESTS (XML)', 'Access Things In Resource Paths', 'things_tests');
}

function basalt_test_0115($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Things Test 115A: Just A Simple List of All the Publicly-Visible Things';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/things/';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('things').'<value sequence_index="0"><id>1732</id><name>Worth Enough</name><lang>en</lang><coords>39.746352,-75.551615</coords></value><value sequence_index="1"><id>1733</id><name>Another World</name><lang>en</lang><coords>39.648316,-77.719232</coords></value><value sequence_index="2"><id>1734</id><name>Top Shot</name><lang>en</lang><coords>39.746352,-75.551615</coords></value><value sequence_index="3"><id>1735</id><name>The Great Shadow</name><lang>en</lang><coords>37.510935,-77.595502</coords></value><value sequence_index="4"><id>1736</id><name>Yosemite</name><lang>en</lang><coords>37.865100,-119.538300</coords></value><value sequence_index="5"><id>1737</id><name>Tom And Jerry</name><lang>en</lang></value><value sequence_index="6"><id>1738</id><name>Brown And Williamson Phone Message</name><lang>en</lang></value><value sequence_index="7"><id>1739</id><name>Winnie The Pooh</name><lang>en</lang></value><value sequence_index="8"><id>1740</id><name>Crickets</name><lang>en</lang></value><value sequence_index="9"><id>1741</id><name>Singing Pete</name><lang>en</lang><coords>38.871900,-77.056300</coords></value><value sequence_index="10"><id>1742</id><name>Spinning Earth</name><lang>en</lang></value><value sequence_index="11"><id>1743</id><name>The Three Musketeers In Dutch</name><lang>en</lang></value><value sequence_index="12"><id>1744</id><name>The Divine Comedy Illustrated.</name><lang>en</lang><coords>38.871900,-77.056300</coords></value></things>';
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 115, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 115, $title);
    }
    
    $title = 'Things Test 115B: Same Thing, But Showing Details (Big Dump)';
    $uri = __SERVER_URI__.'/xml/things/?show_details';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('things').file_get_contents(dirname(__FILE__).'/01-basic-things-tests-115B.xml');
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 115, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result, false);
        log_entry(true, 115, $title);
    }
    
    $title = 'Things Test 115C: Just A Simple List of Four, Explicitly-Selected Things (By ID)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/things/1732,1733,1734,1736';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('things').'<value sequence_index="0"><id>1732</id><name>Worth Enough</name><lang>en</lang><coords>39.746352,-75.551615</coords></value><value sequence_index="1"><id>1733</id><name>Another World</name><lang>en</lang><coords>39.648316,-77.719232</coords></value><value sequence_index="2"><id>1734</id><name>Top Shot</name><lang>en</lang><coords>39.746352,-75.551615</coords></value><value sequence_index="3"><id>1736</id><name>Yosemite</name><lang>en</lang><coords>37.865100,-119.538300</coords></value></things>';
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 115, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 115, $title);
    }
    
    $title = 'Things Test 115D: Just A Simple List of Four, Explicitly-Selected Things (By Key)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/things/basalt-test-0171:+Worth+Enough,basalt-test-0171:+Another+World,basalt-test-0171:+Top+Shot,basalt-test-0171:+Yosemite';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('things').'<value sequence_index="0"><id>1732</id><name>Worth Enough</name><lang>en</lang><coords>39.746352,-75.551615</coords></value><value sequence_index="1"><id>1733</id><name>Another World</name><lang>en</lang><coords>39.648316,-77.719232</coords></value><value sequence_index="2"><id>1734</id><name>Top Shot</name><lang>en</lang><coords>39.746352,-75.551615</coords></value><value sequence_index="3"><id>1736</id><name>Yosemite</name><lang>en</lang><coords>37.865100,-119.538300</coords></value></things>';
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 115, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 115, $title);
    }
    
    $title = 'Things Test 115E: Let\'s Look At One of the Things (By ID)';
    $uri = __SERVER_URI__.'/xml/things/1732/?show_details';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('things').file_get_contents(dirname(__FILE__).'/01-basic-things-tests-115E.xml');
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 115, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 115, $title);
    }
    
    $title = 'Things Test 115F: Let\'s Look At One of the Things (By Key)';
    $uri = __SERVER_URI__.'/xml/things/basalt-test-0171:+Worth+Enough/?show_details';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('things').file_get_contents(dirname(__FILE__).'/01-basic-things-tests-115E.xml');
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 115, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 115, $title);
    }
}
?>
