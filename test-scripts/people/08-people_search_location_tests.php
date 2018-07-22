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

baobab_run_tests(124, '124-125: ADVANCED PEOPLE LOCATION SEARCH TESTS', '');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0124() {
    basalt_run_single_direct_test(124, 'USE THE PEOPLE LOCATION SEARCH FUNCTIONS TO FIND USERS (NOT LOGINS) (JSON).', '', 'people_2_tests');
}

function basalt_test_0124($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 124A: Quick Search Around DC';
    $result_code = '';
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    
    $method = 'GET';

    $uri = __SERVER_URI__.'/json/people/people/?search_latitude=38.8712&search_longitude=-77.0561&search_radius=10';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"0":{"id":1726,"name":"VAAdmin","lang":"en","coords":"38.871900,-77.056300","distance_in_km":0.08},"1":{"id":1731,"name":"God Admin","lang":"en","coords":"38.871900,-77.056300","distance_in_km":0.08},"2":{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200","distance_in_km":2.074},"search_location":{"radius":10,"longitude":-77.0561,"latitude":38.8712}}}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 124, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 124, $title);
    }
    
    $title = 'People Test 124B: Quick Search Around Baltimore';

    $uri = __SERVER_URI__.'/json/people/people/?search_latitude=39.2904&search_longitude=-76.6122&search_radius=20';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"0":{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","distance_in_km":0.517},"search_location":{"radius":20,"longitude":-76.6122,"latitude":39.2904}}}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 124, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 124, $title);
    }
    
    $title = 'People Test 124C: Quick Search Around Seattle';

    $uri = __SERVER_URI__.'/json/people/people/?search_latitude=47.6062&search_longitude=-122.3321&search_radius=200';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[]}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 124, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 124, $title);
    }
    
    $title = 'People Test 124D: Quick Search Around San Jose, CA';

    $uri = __SERVER_URI__.'/json/people/people/?search_latitude=37.3382&search_longitude=-121.8863&search_radius=12.859';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"0":{"id":1745,"name":"Dilbert","lang":"en","coords":"37.331820,-122.031180","distance_in_km":12.859},"1":{"id":1746,"name":"Wally","lang":"en","coords":"37.331820,-122.031180","distance_in_km":12.859},"2":{"id":1747,"name":"Ted","lang":"en","coords":"37.331820,-122.031180","distance_in_km":12.859},"3":{"id":1748,"name":"Alice","lang":"en","coords":"37.331820,-122.031180","distance_in_km":12.859},"4":{"id":1749,"name":"Tina","lang":"en","coords":"37.331820,-122.031180","distance_in_km":12.859},"5":{"id":1750,"name":"PHB","lang":"en","coords":"37.331820,-122.031180","distance_in_km":12.859},"6":{"id":1751,"name":"CEO","lang":"en","coords":"37.331820,-122.031180","distance_in_km":12.859},"search_location":{"radius":12.859,"longitude":-121.8863,"latitude":37.3382}}}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 124, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 124, $title);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0125() {
    basalt_run_single_direct_test(125, 'USE THE PEOPLE LOCATION SEARCH FUNCTIONS TO FIND USERS (NOT LOGINS) (XML).', '', 'people_2_tests');
}

function basalt_test_0125($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 125A: Quick Search Around DC';
    $result_code = '';
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    
    $method = 'GET';

    $uri = __SERVER_URI__.'/xml/people/people/?search_latitude=38.8712&search_longitude=-77.0561&search_radius=10';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1726</id><name>VAAdmin</name><lang>en</lang><coords>38.871900,-77.056300</coords><distance_in_km>0.08</distance_in_km></value><value sequence_index="1"><id>1731</id><name>God Admin</name><lang>en</lang><coords>38.871900,-77.056300</coords><distance_in_km>0.08</distance_in_km></value><value sequence_index="2"><id>1727</id><name>DCAdmin</name><lang>en</lang><coords>38.889300,-77.050200</coords><distance_in_km>2.074</distance_in_km></value><search_location><radius>10</radius><longitude>-77.0561</longitude><latitude>38.8712</latitude></search_location></people></people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 125, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 125, $title);
    }
    
    $title = 'People Test 125B: Quick Search Around Baltimore';

    $uri = __SERVER_URI__.'/xml/people/people/?search_latitude=39.2904&search_longitude=-76.6122&search_radius=20';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords><distance_in_km>0.517</distance_in_km></value><search_location><radius>20</radius><longitude>-76.6122</longitude><latitude>39.2904</latitude></search_location></people></people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 125, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 125, $title);
    }
    
    $title = 'People Test 125C: Quick Search Around Seattle';

    $uri = __SERVER_URI__.'/xml/people/people/?search_latitude=47.6062&search_longitude=-122.3321&search_radius=200';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'</people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 125, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 125, $title);
    }
    
    $title = 'People Test 125D: Quick Search Around San Jose, CA';

    $uri = __SERVER_URI__.'/xml/people/people/?search_latitude=37.3382&search_longitude=-121.8863&search_radius=12.859';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1745</id><name>Dilbert</name><lang>en</lang><coords>37.331820,-122.031180</coords><distance_in_km>12.859</distance_in_km></value><value sequence_index="1"><id>1746</id><name>Wally</name><lang>en</lang><coords>37.331820,-122.031180</coords><distance_in_km>12.859</distance_in_km></value><value sequence_index="2"><id>1747</id><name>Ted</name><lang>en</lang><coords>37.331820,-122.031180</coords><distance_in_km>12.859</distance_in_km></value><value sequence_index="3"><id>1748</id><name>Alice</name><lang>en</lang><coords>37.331820,-122.031180</coords><distance_in_km>12.859</distance_in_km></value><value sequence_index="4"><id>1749</id><name>Tina</name><lang>en</lang><coords>37.331820,-122.031180</coords><distance_in_km>12.859</distance_in_km></value><value sequence_index="5"><id>1750</id><name>PHB</name><lang>en</lang><coords>37.331820,-122.031180</coords><distance_in_km>12.859</distance_in_km></value><value sequence_index="6"><id>1751</id><name>CEO</name><lang>en</lang><coords>37.331820,-122.031180</coords><distance_in_km>12.859</distance_in_km></value><search_location><radius>12.859</radius><longitude>-121.8863</longitude><latitude>37.3382</latitude></search_location></people></people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 125, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 125, $title);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}
?>
