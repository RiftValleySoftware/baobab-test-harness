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

baobab_run_tests(20, 'BASIC PEOPLE TESTS', 'Access All Available Resources. NOTE: in these tests, we "normalize" all the "last_access" values, so the match works.');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0020() {
    basalt_run_single_direct_test(20, 'List People and Logins (JSON)', 'GET tests for people and logins; with and without various logins.', 'people_tests');
}

function basalt_test_0020($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 20A: Command Dump (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":["people"]}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 20B: Command Dump (Logged In As A User)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":["people"]}';
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
    
    $title = 'People Test 20C: Command Dump (Logged In As A Manager)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":["people","logins"]}';
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
    
    $title = 'People Test 20D: Full People Dump (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100"},{"id":1726,"name":"VAAdmin","lang":"en","coords":"38.871900,-77.056300"},{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200"},{"id":1728,"name":"WVAdmin","lang":"en","coords":"38.834800,-79.376200"},{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800"},{"id":1751,"name":"CEO","lang":"en","coords":"37.331820,-122.031180"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 20E: Full People Dump (Logged In As A User)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100"},{"id":1726,"name":"VAAdmin","lang":"en","coords":"38.871900,-77.056300"},{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200"},{"id":1728,"name":"WVAdmin","lang":"en","coords":"38.834800,-79.376200"},{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800"},{"id":1730,"name":"Main Admin","lang":"en","coords":"38.989700,-76.937800"},{"id":1751,"name":"CEO","lang":"en","coords":"37.331820,-122.031180"}]}}';
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
    
    $title = 'People Test 20F: Full People Dump (Logged In As A MainAdmin Manager)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100"},{"id":1726,"name":"VAAdmin","lang":"en","coords":"38.871900,-77.056300"},{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200"},{"id":1728,"name":"WVAdmin","lang":"en","coords":"38.834800,-79.376200"},{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800"},{"id":1730,"name":"Main Admin","lang":"en","coords":"38.989700,-76.937800"},{"id":1751,"name":"CEO","lang":"en","coords":"37.331820,-122.031180"}]}}';
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
    
    $title = 'People Test 20G: Full People Dump (Logged In As A Dilbert Co. PHB Manager)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=PHB&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100"},{"id":1726,"name":"VAAdmin","lang":"en","coords":"38.871900,-77.056300"},{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200"},{"id":1728,"name":"WVAdmin","lang":"en","coords":"38.834800,-79.376200"},{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800"},{"id":1730,"name":"Main Admin","lang":"en","coords":"38.989700,-76.937800"},{"id":1745,"name":"Dilbert","lang":"en","coords":"37.331820,-122.031180"},{"id":1746,"name":"Wally","lang":"en","coords":"37.331820,-122.031180"},{"id":1747,"name":"Ted","lang":"en","coords":"37.331820,-122.031180"},{"id":1748,"name":"Alice","lang":"en","coords":"37.331820,-122.031180"},{"id":1749,"name":"Tina","lang":"en","coords":"37.331820,-122.031180"},{"id":1750,"name":"PHB","lang":"en","coords":"37.331820,-122.031180"},{"id":1751,"name":"CEO","lang":"en","coords":"37.331820,-122.031180"}]}}';
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
    
    $title = 'People Test 20H: Full People Dump (Logged In As "God")';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100"},{"id":1726,"name":"VAAdmin","lang":"en","coords":"38.871900,-77.056300"},{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200"},{"id":1728,"name":"WVAdmin","lang":"en","coords":"38.834800,-79.376200"},{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800"},{"id":1730,"name":"Main Admin","lang":"en","coords":"38.989700,-76.937800"},{"id":1731,"name":"God Admin","lang":"en","coords":"38.871900,-77.056300"},{"id":1745,"name":"Dilbert","lang":"en","coords":"37.331820,-122.031180"},{"id":1746,"name":"Wally","lang":"en","coords":"37.331820,-122.031180"},{"id":1747,"name":"Ted","lang":"en","coords":"37.331820,-122.031180"},{"id":1748,"name":"Alice","lang":"en","coords":"37.331820,-122.031180"},{"id":1749,"name":"Tina","lang":"en","coords":"37.331820,-122.031180"},{"id":1750,"name":"PHB","lang":"en","coords":"37.331820,-122.031180"},{"id":1751,"name":"CEO","lang":"en","coords":"37.331820,-122.031180"}]}}';
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
    
    $title = 'People Test 20I: Full Logins Dump (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins';
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
    
    $title = 'People Test 20J: Full Logins Dump (Logged In As A User)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
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
    
    $title = 'People Test 20K: Full Logins Dump (Logged In As A MainAdmin Manager)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[{"id":7,"name":"Maryland Login","lang":"en","login_id":"MDAdmin"},{"id":8,"name":"Virginia Login","lang":"en","login_id":"VAAdmin"},{"id":9,"name":"Washington DC Login","lang":"en","login_id":"DCAdmin"},{"id":10,"name":"West Virginia Login","lang":"en","login_id":"WVAdmin"},{"id":11,"name":"Delaware Login","lang":"en","login_id":"DEAdmin"},{"id":12,"name":"Main Admin Login","lang":"en","login_id":"MainAdmin"}]}}';
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
    
    $title = 'People Test 20L: Full Logins Dump (Logged In As A PHB Manager)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=PHB&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[{"id":13,"name":"Dilbert Login","lang":"en","login_id":"Dilbert"},{"id":14,"name":"Wally Login","lang":"en","login_id":"Wally"},{"id":15,"name":"Ted Login","lang":"en","login_id":"Ted"},{"id":16,"name":"Alice Login","lang":"en","login_id":"Alice"},{"id":17,"name":"Tina Login","lang":"en","login_id":"Tina"},{"id":18,"name":"Pointy-Haired Boss login","lang":"en","login_id":"PHB"}]}}';
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
    
    $title = 'People Test 20M: Full Logins Dump (Logged In As "God")';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[{"id":2,"name":"God Admin Login","lang":"en","login_id":"admin"},{"id":7,"name":"Maryland Login","lang":"en","login_id":"MDAdmin"},{"id":8,"name":"Virginia Login","lang":"en","login_id":"VAAdmin"},{"id":9,"name":"Washington DC Login","lang":"en","login_id":"DCAdmin"},{"id":10,"name":"West Virginia Login","lang":"en","login_id":"WVAdmin"},{"id":11,"name":"Delaware Login","lang":"en","login_id":"DEAdmin"},{"id":12,"name":"Main Admin Login","lang":"en","login_id":"MainAdmin"},{"id":13,"name":"Dilbert Login","lang":"en","login_id":"Dilbert"},{"id":14,"name":"Wally Login","lang":"en","login_id":"Wally"},{"id":15,"name":"Ted Login","lang":"en","login_id":"Ted"},{"id":16,"name":"Alice Login","lang":"en","login_id":"Alice"},{"id":17,"name":"Tina Login","lang":"en","login_id":"Tina"},{"id":18,"name":"Pointy-Haired Boss login","lang":"en","login_id":"PHB"},{"id":19,"name":"Elbonian Hacker","lang":"eb","login_id":"MeLeet"}]}}';
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

// --------------------

function basalt_test_define_0021() {
    basalt_run_single_direct_test(21, 'List People and Logins (XML)', 'GET tests for people and logins; with and without various logins.', 'people_tests');
}

function basalt_test_0021($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 21A: Command Dump (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<value sequence_index="0">people</value></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 21B: Command Dump (Logged In As A User)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<value sequence_index="0">people</value></people>';
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
    
    $title = 'People Test 21C: Command Dump (Logged In As A Manager)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<value sequence_index="0">people</value><value sequence_index="1">logins</value></people>';
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
    
    $title = 'People Test 21D: Full People Dump (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords></value><value sequence_index="1"><id>1726</id><name>VAAdmin</name><lang>en</lang><coords>38.871900,-77.056300</coords></value><value sequence_index="2"><id>1727</id><name>DCAdmin</name><lang>en</lang><coords>38.889300,-77.050200</coords></value><value sequence_index="3"><id>1728</id><name>WVAdmin</name><lang>en</lang><coords>38.834800,-79.376200</coords></value><value sequence_index="4"><id>1729</id><name>DEAdmin</name><lang>en</lang><coords>39.739100,-75.539800</coords></value><value sequence_index="5"><id>1751</id><name>CEO</name><lang>en</lang><coords>37.331820,-122.031180</coords></value></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 21E: Full People Dump (Logged In As A User)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords></value><value sequence_index="1"><id>1726</id><name>VAAdmin</name><lang>en</lang><coords>38.871900,-77.056300</coords></value><value sequence_index="2"><id>1727</id><name>DCAdmin</name><lang>en</lang><coords>38.889300,-77.050200</coords></value><value sequence_index="3"><id>1728</id><name>WVAdmin</name><lang>en</lang><coords>38.834800,-79.376200</coords></value><value sequence_index="4"><id>1729</id><name>DEAdmin</name><lang>en</lang><coords>39.739100,-75.539800</coords></value><value sequence_index="5"><id>1730</id><name>Main Admin</name><lang>en</lang><coords>38.989700,-76.937800</coords></value><value sequence_index="6"><id>1751</id><name>CEO</name><lang>en</lang><coords>37.331820,-122.031180</coords></value></people></people>';
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
    
    $title = 'People Test 21F: Full People Dump (Logged In As A MainAdmin Manager)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords></value><value sequence_index="1"><id>1726</id><name>VAAdmin</name><lang>en</lang><coords>38.871900,-77.056300</coords></value><value sequence_index="2"><id>1727</id><name>DCAdmin</name><lang>en</lang><coords>38.889300,-77.050200</coords></value><value sequence_index="3"><id>1728</id><name>WVAdmin</name><lang>en</lang><coords>38.834800,-79.376200</coords></value><value sequence_index="4"><id>1729</id><name>DEAdmin</name><lang>en</lang><coords>39.739100,-75.539800</coords></value><value sequence_index="5"><id>1730</id><name>Main Admin</name><lang>en</lang><coords>38.989700,-76.937800</coords></value><value sequence_index="6"><id>1751</id><name>CEO</name><lang>en</lang><coords>37.331820,-122.031180</coords></value></people></people>';
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
    
    $title = 'People Test 21G: Full People Dump (Logged In As A Dilbert Co. PHB Manager)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=PHB&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords></value><value sequence_index="1"><id>1726</id><name>VAAdmin</name><lang>en</lang><coords>38.871900,-77.056300</coords></value><value sequence_index="2"><id>1727</id><name>DCAdmin</name><lang>en</lang><coords>38.889300,-77.050200</coords></value><value sequence_index="3"><id>1728</id><name>WVAdmin</name><lang>en</lang><coords>38.834800,-79.376200</coords></value><value sequence_index="4"><id>1729</id><name>DEAdmin</name><lang>en</lang><coords>39.739100,-75.539800</coords></value><value sequence_index="5"><id>1730</id><name>Main Admin</name><lang>en</lang><coords>38.989700,-76.937800</coords></value><value sequence_index="6"><id>1745</id><name>Dilbert</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="7"><id>1746</id><name>Wally</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="8"><id>1747</id><name>Ted</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="9"><id>1748</id><name>Alice</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="10"><id>1749</id><name>Tina</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="11"><id>1750</id><name>PHB</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="12"><id>1751</id><name>CEO</name><lang>en</lang><coords>37.331820,-122.031180</coords></value></people></people>';
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
    
    $title = 'People Test 21H: Full People Dump (Logged In As "God")';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords></value><value sequence_index="1"><id>1726</id><name>VAAdmin</name><lang>en</lang><coords>38.871900,-77.056300</coords></value><value sequence_index="2"><id>1727</id><name>DCAdmin</name><lang>en</lang><coords>38.889300,-77.050200</coords></value><value sequence_index="3"><id>1728</id><name>WVAdmin</name><lang>en</lang><coords>38.834800,-79.376200</coords></value><value sequence_index="4"><id>1729</id><name>DEAdmin</name><lang>en</lang><coords>39.739100,-75.539800</coords></value><value sequence_index="5"><id>1730</id><name>Main Admin</name><lang>en</lang><coords>38.989700,-76.937800</coords></value><value sequence_index="6"><id>1731</id><name>God Admin</name><lang>en</lang><coords>38.871900,-77.056300</coords></value><value sequence_index="7"><id>1745</id><name>Dilbert</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="8"><id>1746</id><name>Wally</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="9"><id>1747</id><name>Ted</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="10"><id>1748</id><name>Alice</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="11"><id>1749</id><name>Tina</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="12"><id>1750</id><name>PHB</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="13"><id>1751</id><name>CEO</name><lang>en</lang><coords>37.331820,-122.031180</coords></value></people></people>';
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
        
    $title = 'People Test 21I: Full Logins Dump (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins';
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
    
    $title = 'People Test 21J: Full Logins Dump (Logged In As A User)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
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
    
    $title = 'People Test 21K: Full Logins Dump (Logged In As A MainAdmin Manager)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><value sequence_index="0"><id>7</id><name>Maryland Login</name><lang>en</lang><login_id>MDAdmin</login_id></value><value sequence_index="1"><id>8</id><name>Virginia Login</name><lang>en</lang><login_id>VAAdmin</login_id></value><value sequence_index="2"><id>9</id><name>Washington DC Login</name><lang>en</lang><login_id>DCAdmin</login_id></value><value sequence_index="3"><id>10</id><name>West Virginia Login</name><lang>en</lang><login_id>WVAdmin</login_id></value><value sequence_index="4"><id>11</id><name>Delaware Login</name><lang>en</lang><login_id>DEAdmin</login_id></value><value sequence_index="5"><id>12</id><name>Main Admin Login</name><lang>en</lang><login_id>MainAdmin</login_id></value></logins></people>';
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
    
    $title = 'People Test 21L: Full Logins Dump (Logged In As A PHB Manager)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=PHB&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><value sequence_index="0"><id>13</id><name>Dilbert Login</name><lang>en</lang><login_id>Dilbert</login_id></value><value sequence_index="1"><id>14</id><name>Wally Login</name><lang>en</lang><login_id>Wally</login_id></value><value sequence_index="2"><id>15</id><name>Ted Login</name><lang>en</lang><login_id>Ted</login_id></value><value sequence_index="3"><id>16</id><name>Alice Login</name><lang>en</lang><login_id>Alice</login_id></value><value sequence_index="4"><id>17</id><name>Tina Login</name><lang>en</lang><login_id>Tina</login_id></value><value sequence_index="5"><id>18</id><name>Pointy-Haired Boss login</name><lang>en</lang><login_id>PHB</login_id></value></logins></people>';
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
    
    $title = 'People Test 21M: Full Logins Dump (Logged In As "God")';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><value sequence_index="0"><id>2</id><name>God Admin Login</name><lang>en</lang><login_id>admin</login_id></value><value sequence_index="1"><id>7</id><name>Maryland Login</name><lang>en</lang><login_id>MDAdmin</login_id></value><value sequence_index="2"><id>8</id><name>Virginia Login</name><lang>en</lang><login_id>VAAdmin</login_id></value><value sequence_index="3"><id>9</id><name>Washington DC Login</name><lang>en</lang><login_id>DCAdmin</login_id></value><value sequence_index="4"><id>10</id><name>West Virginia Login</name><lang>en</lang><login_id>WVAdmin</login_id></value><value sequence_index="5"><id>11</id><name>Delaware Login</name><lang>en</lang><login_id>DEAdmin</login_id></value><value sequence_index="6"><id>12</id><name>Main Admin Login</name><lang>en</lang><login_id>MainAdmin</login_id></value><value sequence_index="7"><id>13</id><name>Dilbert Login</name><lang>en</lang><login_id>Dilbert</login_id></value><value sequence_index="8"><id>14</id><name>Wally Login</name><lang>en</lang><login_id>Wally</login_id></value><value sequence_index="9"><id>15</id><name>Ted Login</name><lang>en</lang><login_id>Ted</login_id></value><value sequence_index="10"><id>16</id><name>Alice Login</name><lang>en</lang><login_id>Alice</login_id></value><value sequence_index="11"><id>17</id><name>Tina Login</name><lang>en</lang><login_id>Tina</login_id></value><value sequence_index="12"><id>18</id><name>Pointy-Haired Boss login</name><lang>en</lang><login_id>PHB</login_id></value><value sequence_index="13"><id>19</id><name>Elbonian Hacker</name><lang>eb</lang><login_id>MeLeet</login_id></value></logins></people>';
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

// --------------------

function basalt_test_define_0022() {
    basalt_run_single_direct_test(22, 'My Info (JSON)', 'Look at "My Info" GET test; with and without various logins.', 'people_tests');
}

function basalt_test_0022($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 22A: Get My People Info (Not Logged In). We expect this to fail with a 403.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/my_info';
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
    
    $title = 'People Test 22B: Get My Login Info (Not Logged In). We expect this to fail with a 403.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins/my_info';
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
    
    $title = 'People Test 22C: Get My People Info (Logged In As A Regular User).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/my_info';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=Dilbert&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"my_info":{"id":1745,"name":"Dilbert","lang":"en","coords":"37.331820,-122.031180","read_token":13,"write_token":13,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Dilbert","associated_login_id":13}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 22D: Get My People Info, along with the associated login info (Logged In As A Regular User).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/my_info?login_user';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"my_info":{"id":1745,"name":"Dilbert","lang":"en","coords":"37.331820,-122.031180","read_token":13,"write_token":13,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Dilbert","current_login":true,"associated_login":{"id":13,"name":"Dilbert Login","lang":"en","login_id":"Dilbert","read_token":13,"write_token":13,"last_access":"1970-01-02 00:00:00","writeable":true,"current_login":true,"user_object_id":1745,"security_tokens":[13],"current_api_key":true}}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 22E: Get My Login Info (Logged In As A Regular User).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":{"my_info":{"id":13,"name":"Dilbert Login","lang":"en","login_id":"Dilbert","read_token":13,"write_token":13,"last_access":"1970-01-02 00:00:00","writeable":true,"current_login":true,"user_object_id":1745,"security_tokens":[13],"current_api_key":true}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 22F: Get My People Info (Logged In As A Manager).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/my_info';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"my_info":{"id":1730,"name":"Main Admin","lang":"en","coords":"38.989700,-76.937800","read_token":1,"write_token":12,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.9897,"longitude":-76.9378,"associated_login_id":12}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 22G: Get My People Info, along with the associated login info (Logged In As A Manager).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/my_info?login_user';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"my_info":{"id":1730,"name":"Main Admin","lang":"en","coords":"38.989700,-76.937800","read_token":1,"write_token":12,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.9897,"longitude":-76.9378,"current_login":true,"associated_login":{"id":12,"name":"Main Admin Login","lang":"en","login_id":"MainAdmin","read_token":12,"write_token":12,"last_access":"1970-01-02 00:00:00","writeable":true,"current_login":true,"user_object_id":1730,"security_tokens":[12,7,8,9,10,11],"current_api_key":true}}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 22H: Get My Login Info (Logged In As A Manager).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":{"my_info":{"id":12,"name":"Main Admin Login","lang":"en","login_id":"MainAdmin","read_token":12,"write_token":12,"last_access":"1970-01-02 00:00:00","writeable":true,"current_login":true,"user_object_id":1730,"security_tokens":[12,7,8,9,10,11],"current_api_key":true}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 22I: Get My People Info (Logged In As "God").';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/my_info';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"my_info":{"id":1731,"name":"God Admin","lang":"en","coords":"38.871900,-77.056300","read_token":1,"write_token":2,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8719,"longitude":-77.0563,"middle_name":"TAG-2-TEST-PEOPLE","associated_login_id":2}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 22J: Get My People Info, along with the associated login info (Logged In As "God").';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/my_info?login_user';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"my_info":{"id":1731,"name":"God Admin","lang":"en","coords":"38.871900,-77.056300","read_token":1,"write_token":2,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8719,"longitude":-77.0563,"middle_name":"TAG-2-TEST-PEOPLE","current_login":true,"associated_login":{"id":2,"name":"God Admin Login","lang":"en","login_id":"admin","last_access":"1970-01-02 00:00:00","writeable":true,"current_login":true,"user_object_id":1731,"security_tokens":[2],"current_api_key":true,"api_key":"'.$api_key.'","api_key_age_in_seconds":1}}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 22K: Get My Login Info (Logged In As "God").';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":{"my_info":{"id":2,"name":"God Admin Login","lang":"en","login_id":"admin","last_access":"1970-01-02 00:00:00","writeable":true,"current_login":true,"user_object_id":1731,"security_tokens":[2],"current_api_key":true,"api_key":"'.$api_key.'","api_key_age_in_seconds":1}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0023() {
    basalt_run_single_direct_test(23, 'My Info (XML)', 'Look at "My Info" GET test; with and without various logins.', 'people_tests');
}

function basalt_test_0023($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 23A: Get My People Info (Not Logged In). We expect this to fail with a 403.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/my_info';
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
    
    $title = 'People Test 23B: Get My Login Info (Not Logged In). We expect this to fail with a 403.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins/my_info';
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
    
    $title = 'People Test 23C: Get My People Info (Logged In As A Regular User).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/my_info';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=Dilbert&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><my_info><id>1745</id><name>Dilbert</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>13</read_token><write_token>13</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Ramone</surname><given_name>Dilbert</given_name><associated_login_id>13</associated_login_id></my_info></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 23D: Get My People Info, along with the associated login info (Logged In As A Regular User).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/my_info?login_user';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><my_info><id>1745</id><name>Dilbert</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>13</read_token><write_token>13</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Ramone</surname><given_name>Dilbert</given_name><current_login>1</current_login><associated_login><id>13</id><name>Dilbert Login</name><lang>en</lang><login_id>Dilbert</login_id><read_token>13</read_token><write_token>13</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><current_login>1</current_login><user_object_id>1745</user_object_id><security_tokens><value sequence_index="0">13</value></security_tokens><current_api_key>1</current_api_key></associated_login></my_info></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 23E: Get My Login Info (Logged In As A Regular User).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><my_info><id>13</id><name>Dilbert Login</name><lang>en</lang><login_id>Dilbert</login_id><read_token>13</read_token><write_token>13</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><current_login>1</current_login><user_object_id>1745</user_object_id><security_tokens><value sequence_index="0">13</value></security_tokens><current_api_key>1</current_api_key></my_info></logins></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 23F: Get My People Info (Logged In As A Manager).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/my_info';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><my_info><id>1730</id><name>Main Admin</name><lang>en</lang><coords>38.989700,-76.937800</coords><read_token>1</read_token><write_token>12</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.9897</latitude><longitude>-76.9378</longitude><associated_login_id>12</associated_login_id></my_info></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 23G: Get My People Info, along with the associated login info (Logged In As A Manager).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/my_info?login_user';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><my_info><id>1730</id><name>Main Admin</name><lang>en</lang><coords>38.989700,-76.937800</coords><read_token>1</read_token><write_token>12</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.9897</latitude><longitude>-76.9378</longitude><current_login>1</current_login><associated_login><id>12</id><name>Main Admin Login</name><lang>en</lang><login_id>MainAdmin</login_id><read_token>12</read_token><write_token>12</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><current_login>1</current_login><user_object_id>1730</user_object_id><security_tokens><value sequence_index="0">12</value><value sequence_index="1">7</value><value sequence_index="2">8</value><value sequence_index="3">9</value><value sequence_index="4">10</value><value sequence_index="5">11</value></security_tokens><current_api_key>1</current_api_key></associated_login></my_info></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 23H: Get My Login Info (Logged In As A Manager).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><my_info><id>12</id><name>Main Admin Login</name><lang>en</lang><login_id>MainAdmin</login_id><read_token>12</read_token><write_token>12</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><current_login>1</current_login><user_object_id>1730</user_object_id><security_tokens><value sequence_index="0">12</value><value sequence_index="1">7</value><value sequence_index="2">8</value><value sequence_index="3">9</value><value sequence_index="4">10</value><value sequence_index="5">11</value></security_tokens><current_api_key>1</current_api_key></my_info></logins></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 23I: Get My People Info (Logged In As "God").';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/my_info';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><my_info><id>1731</id><name>God Admin</name><lang>en</lang><coords>38.871900,-77.056300</coords><read_token>1</read_token><write_token>2</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.8719</latitude><longitude>-77.0563</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login_id>2</associated_login_id></my_info></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 23J: Get My People Info, along with the associated login info (Logged In As "God").';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/my_info?login_user';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><my_info><id>1731</id><name>God Admin</name><lang>en</lang><coords>38.871900,-77.056300</coords><read_token>1</read_token><write_token>2</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.8719</latitude><longitude>-77.0563</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><current_login>1</current_login><associated_login><id>2</id><name>God Admin Login</name><lang>en</lang><login_id>admin</login_id><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><current_login>1</current_login><user_object_id>1731</user_object_id><security_tokens><value sequence_index="0">2</value></security_tokens><current_api_key>1</current_api_key><api_key>'.$api_key.'</api_key><api_key_age_in_seconds>1</api_key_age_in_seconds></associated_login></my_info></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 23K: Get My Login Info (Logged In As "God").';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><my_info><id>2</id><name>God Admin Login</name><lang>en</lang><login_id>admin</login_id><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><current_login>1</current_login><user_object_id>1731</user_object_id><security_tokens><value sequence_index="0">2</value></security_tokens><current_api_key>1</current_api_key><api_key>'.$api_key.'</api_key><api_key_age_in_seconds>1</api_key_age_in_seconds></my_info></logins></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0024() {
    basalt_run_single_direct_test(24, 'Detailed User Info (JSON)', 'Log in with various logins, and look at detailed users (logins are already detailed, so we stick with users).', 'people_tests');
}

function basalt_test_0024($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 24A: Get Detailed People (User) Info (Not Logged In).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/?show_details';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","last_access":"1970-01-02 00:00:00","latitude":39.2858,"longitude":-76.6131,"middle_name":"TAG-2-TEST-PEOPLE"},{"id":1726,"name":"VAAdmin","lang":"en","coords":"38.871900,-77.056300","last_access":"1970-01-02 00:00:00","latitude":38.8719,"longitude":-77.0563},{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200","last_access":"1970-01-02 00:00:00","latitude":38.8893,"longitude":-77.0502,"middle_name":"TAG-2-TEST-PEOPLE"},{"id":1728,"name":"WVAdmin","lang":"en","coords":"38.834800,-79.376200","last_access":"1970-01-02 00:00:00","latitude":38.8348,"longitude":-79.3762},{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800","last_access":"1970-01-02 00:00:00","latitude":39.7391,"longitude":-75.5398,"middle_name":"TAG-2-TEST-PEOPLE"},{"id":1751,"name":"CEO","lang":"en","coords":"37.331820,-122.031180","last_access":"1970-01-02 00:00:00","latitude":37.33182,"longitude":-122.03118,"surname":"Garcia","given_name":"Jerry"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 24B: Get Detailed People (User) Info (Logged In As A Regular User -Elbonian Hacker).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/?show_details';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MeLeet&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","latitude":39.2858,"longitude":-76.6131,"middle_name":"TAG-2-TEST-PEOPLE"},{"id":1726,"name":"VAAdmin","lang":"en","coords":"38.871900,-77.056300","read_token":0,"write_token":8,"last_access":"1970-01-02 00:00:00","latitude":38.8719,"longitude":-77.0563},{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200","read_token":0,"write_token":9,"last_access":"1970-01-02 00:00:00","latitude":38.8893,"longitude":-77.0502,"middle_name":"TAG-2-TEST-PEOPLE"},{"id":1728,"name":"WVAdmin","lang":"en","coords":"38.834800,-79.376200","read_token":0,"write_token":10,"last_access":"1970-01-02 00:00:00","latitude":38.8348,"longitude":-79.3762},{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800","read_token":0,"write_token":11,"last_access":"1970-01-02 00:00:00","latitude":39.7391,"longitude":-75.5398,"middle_name":"TAG-2-TEST-PEOPLE"},{"id":1730,"name":"Main Admin","lang":"en","coords":"38.989700,-76.937800","read_token":1,"write_token":12,"last_access":"1970-01-02 00:00:00","latitude":38.9897,"longitude":-76.9378},{"id":1751,"name":"CEO","lang":"en","coords":"37.331820,-122.031180","read_token":0,"write_token":2,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Garcia","given_name":"Jerry"}]}}';
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
    
    $title = 'People Test 24C: Get Detailed People (User) Info (Logged In As A Manager).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/?show_details';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.2858,"longitude":-76.6131,"middle_name":"TAG-2-TEST-PEOPLE","associated_login_id":7},{"id":1726,"name":"VAAdmin","lang":"en","coords":"38.871900,-77.056300","read_token":0,"write_token":8,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8719,"longitude":-77.0563,"associated_login_id":8},{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200","read_token":0,"write_token":9,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8893,"longitude":-77.0502,"middle_name":"TAG-2-TEST-PEOPLE","associated_login_id":9},{"id":1728,"name":"WVAdmin","lang":"en","coords":"38.834800,-79.376200","read_token":0,"write_token":10,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8348,"longitude":-79.3762,"associated_login_id":10},{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800","read_token":0,"write_token":11,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.7391,"longitude":-75.5398,"middle_name":"TAG-2-TEST-PEOPLE","associated_login_id":11},{"id":1730,"name":"Main Admin","lang":"en","coords":"38.989700,-76.937800","read_token":1,"write_token":12,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.9897,"longitude":-76.9378,"associated_login_id":12},{"id":1751,"name":"CEO","lang":"en","coords":"37.331820,-122.031180","read_token":0,"write_token":2,"last_access":"1970-01-02 00:00:00","latitude":37.33182,"longitude":-122.03118,"surname":"Garcia","given_name":"Jerry"}]}}';
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
    
    $title = 'People Test 24D: Get Detailed People (User) Info (Logged In As A PHB Manager).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/?show_details';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=PHB&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","latitude":39.2858,"longitude":-76.6131,"middle_name":"TAG-2-TEST-PEOPLE"},{"id":1726,"name":"VAAdmin","lang":"en","coords":"38.871900,-77.056300","read_token":0,"write_token":8,"last_access":"1970-01-02 00:00:00","latitude":38.8719,"longitude":-77.0563},{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200","read_token":0,"write_token":9,"last_access":"1970-01-02 00:00:00","latitude":38.8893,"longitude":-77.0502,"middle_name":"TAG-2-TEST-PEOPLE"},{"id":1728,"name":"WVAdmin","lang":"en","coords":"38.834800,-79.376200","read_token":0,"write_token":10,"last_access":"1970-01-02 00:00:00","latitude":38.8348,"longitude":-79.3762},{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800","read_token":0,"write_token":11,"last_access":"1970-01-02 00:00:00","latitude":39.7391,"longitude":-75.5398,"middle_name":"TAG-2-TEST-PEOPLE"},{"id":1730,"name":"Main Admin","lang":"en","coords":"38.989700,-76.937800","read_token":1,"write_token":12,"last_access":"1970-01-02 00:00:00","latitude":38.9897,"longitude":-76.9378},{"id":1745,"name":"Dilbert","lang":"en","coords":"37.331820,-122.031180","read_token":13,"write_token":13,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Dilbert","associated_login_id":13},{"id":1746,"name":"Wally","lang":"en","coords":"37.331820,-122.031180","read_token":14,"write_token":14,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Wally","associated_login_id":14},{"id":1747,"name":"Ted","lang":"en","coords":"37.331820,-122.031180","read_token":15,"write_token":15,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Ted","associated_login_id":15},{"id":1748,"name":"Alice","lang":"en","coords":"37.331820,-122.031180","read_token":16,"write_token":16,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Alice","associated_login_id":16},{"id":1749,"name":"Tina","lang":"en","coords":"37.331820,-122.031180","read_token":17,"write_token":17,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Tina","associated_login_id":17},{"id":1750,"name":"PHB","lang":"en","coords":"37.331820,-122.031180","read_token":18,"write_token":18,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Reznor","given_name":"Trent","associated_login_id":18},{"id":1751,"name":"CEO","lang":"en","coords":"37.331820,-122.031180","read_token":0,"write_token":2,"last_access":"1970-01-02 00:00:00","latitude":37.33182,"longitude":-122.03118,"surname":"Garcia","given_name":"Jerry"}]}}';
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
    
    $title = 'People Test 24E: Get Detailed People (User) Info (Logged In As "God").';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/?show_details';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.2858,"longitude":-76.6131,"middle_name":"TAG-2-TEST-PEOPLE","associated_login_id":7},{"id":1726,"name":"VAAdmin","lang":"en","coords":"38.871900,-77.056300","read_token":0,"write_token":8,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8719,"longitude":-77.0563,"associated_login_id":8},{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200","read_token":0,"write_token":9,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8893,"longitude":-77.0502,"middle_name":"TAG-2-TEST-PEOPLE","associated_login_id":9},{"id":1728,"name":"WVAdmin","lang":"en","coords":"38.834800,-79.376200","read_token":0,"write_token":10,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8348,"longitude":-79.3762,"associated_login_id":10},{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800","read_token":0,"write_token":11,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.7391,"longitude":-75.5398,"middle_name":"TAG-2-TEST-PEOPLE","associated_login_id":11},{"id":1730,"name":"Main Admin","lang":"en","coords":"38.989700,-76.937800","read_token":1,"write_token":12,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.9897,"longitude":-76.9378,"associated_login_id":12},{"id":1731,"name":"God Admin","lang":"en","coords":"38.871900,-77.056300","read_token":1,"write_token":2,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8719,"longitude":-77.0563,"middle_name":"TAG-2-TEST-PEOPLE","associated_login_id":2},{"id":1745,"name":"Dilbert","lang":"en","coords":"37.331820,-122.031180","last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Dilbert","associated_login_id":13},{"id":1746,"name":"Wally","lang":"en","coords":"37.331820,-122.031180","last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Wally","associated_login_id":14},{"id":1747,"name":"Ted","lang":"en","coords":"37.331820,-122.031180","last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Ted","associated_login_id":15},{"id":1748,"name":"Alice","lang":"en","coords":"37.331820,-122.031180","last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Alice","associated_login_id":16},{"id":1749,"name":"Tina","lang":"en","coords":"37.331820,-122.031180","last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Tina","associated_login_id":17},{"id":1750,"name":"PHB","lang":"en","coords":"37.331820,-122.031180","last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Reznor","given_name":"Trent","associated_login_id":18},{"id":1751,"name":"CEO","lang":"en","coords":"37.331820,-122.031180","read_token":0,"write_token":2,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Garcia","given_name":"Jerry"}]}}';
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

    $title = 'People Test 24F: Get Detailed People (User) Info with Login Info (Not Logged In).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/?login_user';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","last_access":"1970-01-02 00:00:00","latitude":39.2858,"longitude":-76.6131,"middle_name":"TAG-2-TEST-PEOPLE"},{"id":1726,"name":"VAAdmin","lang":"en","coords":"38.871900,-77.056300","last_access":"1970-01-02 00:00:00","latitude":38.8719,"longitude":-77.0563},{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200","last_access":"1970-01-02 00:00:00","latitude":38.8893,"longitude":-77.0502,"middle_name":"TAG-2-TEST-PEOPLE"},{"id":1728,"name":"WVAdmin","lang":"en","coords":"38.834800,-79.376200","last_access":"1970-01-02 00:00:00","latitude":38.8348,"longitude":-79.3762},{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800","last_access":"1970-01-02 00:00:00","latitude":39.7391,"longitude":-75.5398,"middle_name":"TAG-2-TEST-PEOPLE"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 24G: Get Detailed People (User) Info with Login Info (Logged In As A Regular User -Elbonian Hacker).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/?login_user';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MeLeet&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","latitude":39.2858,"longitude":-76.6131,"middle_name":"TAG-2-TEST-PEOPLE"},{"id":1726,"name":"VAAdmin","lang":"en","coords":"38.871900,-77.056300","read_token":0,"write_token":8,"last_access":"1970-01-02 00:00:00","latitude":38.8719,"longitude":-77.0563},{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200","read_token":0,"write_token":9,"last_access":"1970-01-02 00:00:00","latitude":38.8893,"longitude":-77.0502,"middle_name":"TAG-2-TEST-PEOPLE"},{"id":1728,"name":"WVAdmin","lang":"en","coords":"38.834800,-79.376200","read_token":0,"write_token":10,"last_access":"1970-01-02 00:00:00","latitude":38.8348,"longitude":-79.3762},{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800","read_token":0,"write_token":11,"last_access":"1970-01-02 00:00:00","latitude":39.7391,"longitude":-75.5398,"middle_name":"TAG-2-TEST-PEOPLE"},{"id":1730,"name":"Main Admin","lang":"en","coords":"38.989700,-76.937800","read_token":1,"write_token":12,"last_access":"1970-01-02 00:00:00","latitude":38.9897,"longitude":-76.9378}]}}';
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
    
    $title = 'People Test 24H: Get Detailed People (User) Info with Login Info (Logged In As A Manager).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/?login_user';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.2858,"longitude":-76.6131,"middle_name":"TAG-2-TEST-PEOPLE","associated_login":{"id":7,"name":"Maryland Login","lang":"en","login_id":"MDAdmin","read_token":7,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1725,"security_tokens":[7]}},{"id":1726,"name":"VAAdmin","lang":"en","coords":"38.871900,-77.056300","read_token":0,"write_token":8,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8719,"longitude":-77.0563,"associated_login":{"id":8,"name":"Virginia Login","lang":"en","login_id":"VAAdmin","read_token":8,"write_token":8,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1726,"security_tokens":[8]}},{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200","read_token":0,"write_token":9,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8893,"longitude":-77.0502,"middle_name":"TAG-2-TEST-PEOPLE","associated_login":{"id":9,"name":"Washington DC Login","lang":"en","login_id":"DCAdmin","read_token":9,"write_token":9,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1727,"security_tokens":[9]}},{"id":1728,"name":"WVAdmin","lang":"en","coords":"38.834800,-79.376200","read_token":0,"write_token":10,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8348,"longitude":-79.3762,"associated_login":{"id":10,"name":"West Virginia Login","lang":"en","login_id":"WVAdmin","read_token":10,"write_token":10,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1728,"security_tokens":[10]}},{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800","read_token":0,"write_token":11,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.7391,"longitude":-75.5398,"middle_name":"TAG-2-TEST-PEOPLE","associated_login":{"id":11,"name":"Delaware Login","lang":"en","login_id":"DEAdmin","read_token":11,"write_token":11,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1729,"security_tokens":[11]}},{"id":1730,"name":"Main Admin","lang":"en","coords":"38.989700,-76.937800","read_token":1,"write_token":12,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.9897,"longitude":-76.9378,"current_login":true,"associated_login":{"id":12,"name":"Main Admin Login","lang":"en","login_id":"MainAdmin","read_token":12,"write_token":12,"last_access":"1970-01-02 00:00:00","writeable":true,"current_login":true,"user_object_id":1730,"security_tokens":[12,7,8,9,10,11],"current_api_key":true}}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 24I: Get Detailed People (User) Info with Login Info (Logged In As A PHB Manager).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/?login_user';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=PHB&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","latitude":39.2858,"longitude":-76.6131,"middle_name":"TAG-2-TEST-PEOPLE"},{"id":1726,"name":"VAAdmin","lang":"en","coords":"38.871900,-77.056300","read_token":0,"write_token":8,"last_access":"1970-01-02 00:00:00","latitude":38.8719,"longitude":-77.0563},{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200","read_token":0,"write_token":9,"last_access":"1970-01-02 00:00:00","latitude":38.8893,"longitude":-77.0502,"middle_name":"TAG-2-TEST-PEOPLE"},{"id":1728,"name":"WVAdmin","lang":"en","coords":"38.834800,-79.376200","read_token":0,"write_token":10,"last_access":"1970-01-02 00:00:00","latitude":38.8348,"longitude":-79.3762},{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800","read_token":0,"write_token":11,"last_access":"1970-01-02 00:00:00","latitude":39.7391,"longitude":-75.5398,"middle_name":"TAG-2-TEST-PEOPLE"},{"id":1730,"name":"Main Admin","lang":"en","coords":"38.989700,-76.937800","read_token":1,"write_token":12,"last_access":"1970-01-02 00:00:00","latitude":38.9897,"longitude":-76.9378},{"id":1745,"name":"Dilbert","lang":"en","coords":"37.331820,-122.031180","read_token":13,"write_token":13,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Dilbert","associated_login":{"id":13,"name":"Dilbert Login","lang":"en","login_id":"Dilbert","read_token":13,"write_token":13,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1745,"security_tokens":[13]}},{"id":1746,"name":"Wally","lang":"en","coords":"37.331820,-122.031180","read_token":14,"write_token":14,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Wally","associated_login":{"id":14,"name":"Wally Login","lang":"en","login_id":"Wally","read_token":14,"write_token":14,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1746,"security_tokens":[14]}},{"id":1747,"name":"Ted","lang":"en","coords":"37.331820,-122.031180","read_token":15,"write_token":15,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Ted","associated_login":{"id":15,"name":"Ted Login","lang":"en","login_id":"Ted","read_token":15,"write_token":15,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1747,"security_tokens":[15]}},{"id":1748,"name":"Alice","lang":"en","coords":"37.331820,-122.031180","read_token":16,"write_token":16,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Alice","associated_login":{"id":16,"name":"Alice Login","lang":"en","login_id":"Alice","read_token":16,"write_token":16,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1748,"security_tokens":[16]}},{"id":1749,"name":"Tina","lang":"en","coords":"37.331820,-122.031180","read_token":17,"write_token":17,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Tina","associated_login":{"id":17,"name":"Tina Login","lang":"en","login_id":"Tina","read_token":17,"write_token":17,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1749,"security_tokens":[17]}},{"id":1750,"name":"PHB","lang":"en","coords":"37.331820,-122.031180","read_token":18,"write_token":18,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Reznor","given_name":"Trent","current_login":true,"associated_login":{"id":18,"name":"Pointy-Haired Boss login","lang":"en","login_id":"PHB","read_token":18,"write_token":18,"last_access":"1970-01-02 00:00:00","writeable":true,"current_login":true,"user_object_id":1750,"security_tokens":[18,13,14,15,16,17],"current_api_key":true}}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 24J: Get Detailed People (User) Info with Login Info (Logged In As "God").';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/?login_user';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.2858,"longitude":-76.6131,"middle_name":"TAG-2-TEST-PEOPLE","associated_login":{"id":7,"name":"Maryland Login","lang":"en","login_id":"MDAdmin","last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1725,"security_tokens":[7]}},{"id":1726,"name":"VAAdmin","lang":"en","coords":"38.871900,-77.056300","read_token":0,"write_token":8,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8719,"longitude":-77.0563,"associated_login":{"id":8,"name":"Virginia Login","lang":"en","login_id":"VAAdmin","last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1726,"security_tokens":[8]}},{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200","read_token":0,"write_token":9,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8893,"longitude":-77.0502,"middle_name":"TAG-2-TEST-PEOPLE","associated_login":{"id":9,"name":"Washington DC Login","lang":"en","login_id":"DCAdmin","last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1727,"security_tokens":[9]}},{"id":1728,"name":"WVAdmin","lang":"en","coords":"38.834800,-79.376200","read_token":0,"write_token":10,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8348,"longitude":-79.3762,"associated_login":{"id":10,"name":"West Virginia Login","lang":"en","login_id":"WVAdmin","last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1728,"security_tokens":[10]}},{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800","read_token":0,"write_token":11,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.7391,"longitude":-75.5398,"middle_name":"TAG-2-TEST-PEOPLE","associated_login":{"id":11,"name":"Delaware Login","lang":"en","login_id":"DEAdmin","last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1729,"security_tokens":[11]}},{"id":1730,"name":"Main Admin","lang":"en","coords":"38.989700,-76.937800","read_token":1,"write_token":12,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.9897,"longitude":-76.9378,"associated_login":{"id":12,"name":"Main Admin Login","lang":"en","login_id":"MainAdmin","last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1730,"security_tokens":[12,7,8,9,10,11]}},{"id":1731,"name":"God Admin","lang":"en","coords":"38.871900,-77.056300","read_token":1,"write_token":2,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8719,"longitude":-77.0563,"middle_name":"TAG-2-TEST-PEOPLE","current_login":true,"associated_login":{"id":2,"name":"God Admin Login","lang":"en","login_id":"admin","last_access":"1970-01-02 00:00:00","writeable":true,"current_login":true,"user_object_id":1731,"security_tokens":[2],"current_api_key":true,"api_key":"'.$api_key.'","api_key_age_in_seconds":1}},{"id":1745,"name":"Dilbert","lang":"en","coords":"37.331820,-122.031180","last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Dilbert","associated_login":{"id":13,"name":"Dilbert Login","lang":"en","login_id":"Dilbert","last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1745,"security_tokens":[13]}},{"id":1746,"name":"Wally","lang":"en","coords":"37.331820,-122.031180","last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Wally","associated_login":{"id":14,"name":"Wally Login","lang":"en","login_id":"Wally","last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1746,"security_tokens":[14]}},{"id":1747,"name":"Ted","lang":"en","coords":"37.331820,-122.031180","last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Ted","associated_login":{"id":15,"name":"Ted Login","lang":"en","login_id":"Ted","last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1747,"security_tokens":[15]}},{"id":1748,"name":"Alice","lang":"en","coords":"37.331820,-122.031180","last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Alice","associated_login":{"id":16,"name":"Alice Login","lang":"en","login_id":"Alice","last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1748,"security_tokens":[16]}},{"id":1749,"name":"Tina","lang":"en","coords":"37.331820,-122.031180","last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Tina","associated_login":{"id":17,"name":"Tina Login","lang":"en","login_id":"Tina","last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1749,"security_tokens":[17]}},{"id":1750,"name":"PHB","lang":"en","coords":"37.331820,-122.031180","last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Reznor","given_name":"Trent","associated_login":{"id":18,"name":"Pointy-Haired Boss login","lang":"en","login_id":"PHB","last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1750,"security_tokens":[18,13,14,15,16,17]}}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}
?>
