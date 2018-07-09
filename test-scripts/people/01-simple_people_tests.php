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

baobab_run_tests(20, 'BASIC PEOPLE TESTS', 'Access All Available Resources.');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0020() {
    basalt_run_single_direct_test(20, 'List People and Logins (JSON)', '', 'people_tests');
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
    $expected_result = '{"people":["people","my_info"]}';
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
    $expected_result = '{"people":["people","my_info","logins"]}';
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
    
    $title = 'People Test 20H: Full Logins Dump (Not Logged In)';
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
    
    $title = 'People Test 20I: Full Logins Dump (Logged In As A User)';
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
    
    $title = 'People Test 20J: Full Logins Dump (Logged In As A MainAdmin Manager)';
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
    
    $title = 'People Test 20K: Full Logins Dump (Logged In As A PHB Manager)';
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
}

// --------------------

function basalt_test_define_0021() {
    basalt_run_single_direct_test(21, 'List People and Logins (XML)', '', 'people_tests');
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
    $expected_result = get_xml_header('people').'<value sequence_index="0">people</value><value sequence_index="1">my_info</value></people>';
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
    $expected_result = get_xml_header('people').'<value sequence_index="0">people</value><value sequence_index="1">my_info</value><value sequence_index="2">logins</value></people>';
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
    
    $title = 'People Test 21H: Full Logins Dump (Not Logged In)';
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
    
    $title = 'People Test 21I: Full Logins Dump (Logged In As A User)';
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
    
    $title = 'People Test 21J: Full Logins Dump (Logged In As A MainAdmin Manager)';
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
    
    $title = 'People Test 21K: Full Logins Dump (Logged In As A PHB Manager)';
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
}

?>
