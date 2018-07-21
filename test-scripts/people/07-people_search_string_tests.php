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

baobab_run_tests(120, '120-123: ADVANCED PEOPLE STRING SEARCH TESTS', '');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0120() {
    basalt_run_single_direct_test(120, 'USE THE PEOPLE SEARCH FUNCTIONS TO FIND USERS (NOT LOGINS) (JSON).', '', 'people_2_tests');
}

function basalt_test_0120($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 120A: Search for People With A "name" of "Ted."';
    $result_code = '';
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    
    $method = 'GET';

    $uri = __SERVER_URI__.'/json/people/people/?search_name=ted';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1747,"name":"Ted","lang":"en","coords":"37.331820,-122.031180"}]}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 120, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 120, $title);
    }
    
    $title = 'People Test 120B: Search for People With A "name" of "T%".';    

    $uri = __SERVER_URI__.'/json/people/people/?search_name=t%';
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1747,"name":"Ted","lang":"en","coords":"37.331820,-122.031180"},{"id":1749,"name":"Tina","lang":"en","coords":"37.331820,-122.031180"}]}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 120, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 120, $title);
    }
    
    $title = 'People Test 120C: Search for People With A "name" of "D%", and a page size that will require two pages.';    

    $uri = __SERVER_URI__.'/json/people/people/?search_name=D%&search_page_size=2';
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200"},{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800"}]}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 120, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 120, $title);
    }
    
    $title = 'People Test 120D: Search for People With A "name" of "D%", and a page size that will require two pages, and the second page.';    

    $uri = __SERVER_URI__.'/json/people/people/?search_name=D%&search_page_size=2&search_page_number=1';
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1745,"name":"Dilbert","lang":"en","coords":"37.331820,-122.031180"}]}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 120, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 120, $title);
    }
    
    $title = 'People Test 120E: Search for People With A "surname" of "Ramone."';

    $uri = __SERVER_URI__.'/json/people/people/?search_surname=ramone';
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1745,"name":"Dilbert","lang":"en","coords":"37.331820,-122.031180"},{"id":1746,"name":"Wally","lang":"en","coords":"37.331820,-122.031180"},{"id":1747,"name":"Ted","lang":"en","coords":"37.331820,-122.031180"},{"id":1748,"name":"Alice","lang":"en","coords":"37.331820,-122.031180"},{"id":1749,"name":"Tina","lang":"en","coords":"37.331820,-122.031180"}]}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 120, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 120, $title);
    }
    
    $title = 'People Test 120F: Search for People With no middle name';

    $uri = __SERVER_URI__.'/json/people/people/?search_middle_name=';
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100"},{"id":1726,"name":"VAAdmin","lang":"en","coords":"38.871900,-77.056300"},{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200"},{"id":1728,"name":"WVAdmin","lang":"en","coords":"38.834800,-79.376200"},{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800"},{"id":1730,"name":"Main Admin","lang":"en","coords":"38.989700,-76.937800"},{"id":1731,"name":"God Admin","lang":"en","coords":"38.871900,-77.056300"},{"id":1745,"name":"Dilbert","lang":"en","coords":"37.331820,-122.031180"},{"id":1746,"name":"Wally","lang":"en","coords":"37.331820,-122.031180"},{"id":1747,"name":"Ted","lang":"en","coords":"37.331820,-122.031180"},{"id":1748,"name":"Alice","lang":"en","coords":"37.331820,-122.031180"},{"id":1749,"name":"Tina","lang":"en","coords":"37.331820,-122.031180"},{"id":1750,"name":"PHB","lang":"en","coords":"37.331820,-122.031180"},{"id":1751,"name":"CEO","lang":"en","coords":"37.331820,-122.031180"}]}}';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 120, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 120, $title);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0121() {
    basalt_run_single_direct_test(121, 'USE THE PEOPLE SEARCH FUNCTIONS TO FIND USERS (NOT LOGINS) (XML).', '', 'people_2_tests');
}

function basalt_test_0121($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 121A: Search for People With A "name" of "Ted."';
    $result_code = '';
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    
    $method = 'GET';

    $uri = __SERVER_URI__.'/xml/people/people/?search_name=ted';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1747</id><name>Ted</name><lang>en</lang><coords>37.331820,-122.031180</coords></value></people></people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 121, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 121, $title);
    }
    
    $title = 'People Test 121B: Search for People With A "name" of "T%".';    

    $uri = __SERVER_URI__.'/xml/people/people/?search_name=t%';
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1747</id><name>Ted</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="1"><id>1749</id><name>Tina</name><lang>en</lang><coords>37.331820,-122.031180</coords></value></people></people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 121, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 121, $title);
    }
    
    $title = 'People Test 121C: Search for People With A "name" of "D%", and a page size that will require two pages.';    

    $uri = __SERVER_URI__.'/xml/people/people/?search_name=D%&search_page_size=2';
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1727</id><name>DCAdmin</name><lang>en</lang><coords>38.889300,-77.050200</coords></value><value sequence_index="1"><id>1729</id><name>DEAdmin</name><lang>en</lang><coords>39.739100,-75.539800</coords></value></people></people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 121, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 121, $title);
    }
    
    $title = 'People Test 121D: Search for People With A "name" of "D%", and a page size that will require two pages, and the second page.';    

    $uri = __SERVER_URI__.'/xml/people/people/?search_name=D%&search_page_size=2&search_page_number=1';
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1745</id><name>Dilbert</name><lang>en</lang><coords>37.331820,-122.031180</coords></value></people></people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 121, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 121, $title);
    }
    
    $title = 'People Test 121E: Search for People With A "surname" of "Ramone."';

    $uri = __SERVER_URI__.'/xml/people/people/?search_surname=ramone';
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1745</id><name>Dilbert</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="1"><id>1746</id><name>Wally</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="2"><id>1747</id><name>Ted</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="3"><id>1748</id><name>Alice</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="4"><id>1749</id><name>Tina</name><lang>en</lang><coords>37.331820,-122.031180</coords></value></people></people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 121, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 121, $title);
    }
    
    $title = 'People Test 121F: Search for People With no middle name';

    $uri = __SERVER_URI__.'/xml/people/people/?search_middle_name=';
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords></value><value sequence_index="1"><id>1726</id><name>VAAdmin</name><lang>en</lang><coords>38.871900,-77.056300</coords></value><value sequence_index="2"><id>1727</id><name>DCAdmin</name><lang>en</lang><coords>38.889300,-77.050200</coords></value><value sequence_index="3"><id>1728</id><name>WVAdmin</name><lang>en</lang><coords>38.834800,-79.376200</coords></value><value sequence_index="4"><id>1729</id><name>DEAdmin</name><lang>en</lang><coords>39.739100,-75.539800</coords></value><value sequence_index="5"><id>1730</id><name>Main Admin</name><lang>en</lang><coords>38.989700,-76.937800</coords></value><value sequence_index="6"><id>1731</id><name>God Admin</name><lang>en</lang><coords>38.871900,-77.056300</coords></value><value sequence_index="7"><id>1745</id><name>Dilbert</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="8"><id>1746</id><name>Wally</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="9"><id>1747</id><name>Ted</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="10"><id>1748</id><name>Alice</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="11"><id>1749</id><name>Tina</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="12"><id>1750</id><name>PHB</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="13"><id>1751</id><name>CEO</name><lang>en</lang><coords>37.331820,-122.031180</coords></value></people></people>';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 121, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 121, $title);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0122() {
    basalt_run_single_direct_test(122, 'MORE TEXT SEARCH FUNCTION FUN (JSON).', '', 'people_2_tests');
}

function basalt_test_0122($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 122A: Search for People With No name';
    $result_code = '';
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    
    $method = 'GET';

    $uri = __SERVER_URI__.'/json/people/people/?search_name=';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[]}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 122, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 122, $title);
    }
    
    $title = 'People Test 122B: Search for People With Any name';

    $uri = __SERVER_URI__.'/json/people/people/?search_name=%';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100"},{"id":1726,"name":"VAAdmin","lang":"en","coords":"38.871900,-77.056300"},{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200"},{"id":1728,"name":"WVAdmin","lang":"en","coords":"38.834800,-79.376200"},{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800"},{"id":1730,"name":"Main Admin","lang":"en","coords":"38.989700,-76.937800"},{"id":1731,"name":"God Admin","lang":"en","coords":"38.871900,-77.056300"},{"id":1745,"name":"Dilbert","lang":"en","coords":"37.331820,-122.031180"},{"id":1746,"name":"Wally","lang":"en","coords":"37.331820,-122.031180"},{"id":1747,"name":"Ted","lang":"en","coords":"37.331820,-122.031180"},{"id":1748,"name":"Alice","lang":"en","coords":"37.331820,-122.031180"},{"id":1749,"name":"Tina","lang":"en","coords":"37.331820,-122.031180"},{"id":1750,"name":"PHB","lang":"en","coords":"37.331820,-122.031180"},{"id":1751,"name":"CEO","lang":"en","coords":"37.331820,-122.031180"}]}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 122, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 122, $title);
    }
    
    $title = 'People Test 122C: Search for People With No Surname';

    $uri = __SERVER_URI__.'/json/people/people/?search_surname=';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100"},{"id":1726,"name":"VAAdmin","lang":"en","coords":"38.871900,-77.056300"},{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200"},{"id":1728,"name":"WVAdmin","lang":"en","coords":"38.834800,-79.376200"},{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800"},{"id":1730,"name":"Main Admin","lang":"en","coords":"38.989700,-76.937800"},{"id":1731,"name":"God Admin","lang":"en","coords":"38.871900,-77.056300"}]}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 122, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 122, $title);
    }
    
    $title = 'People Test 122D: Search for People With Any Surname';
    $result_code = '';
    
    $method = 'GET';

    $uri = __SERVER_URI__.'/json/people/people/?search_surname=%';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1745,"name":"Dilbert","lang":"en","coords":"37.331820,-122.031180"},{"id":1746,"name":"Wally","lang":"en","coords":"37.331820,-122.031180"},{"id":1747,"name":"Ted","lang":"en","coords":"37.331820,-122.031180"},{"id":1748,"name":"Alice","lang":"en","coords":"37.331820,-122.031180"},{"id":1749,"name":"Tina","lang":"en","coords":"37.331820,-122.031180"},{"id":1750,"name":"PHB","lang":"en","coords":"37.331820,-122.031180"},{"id":1751,"name":"CEO","lang":"en","coords":"37.331820,-122.031180"}]}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 122, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 122, $title);
    }
    
    $title = 'People Test 122E: Search for People With Any Tag 8';
    $result_code = '';
    
    $method = 'GET';

    $uri = __SERVER_URI__.'/json/people/people/?search_tag8=%';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1745,"name":"Dilbert","lang":"en","coords":"37.331820,-122.031180"},{"id":1746,"name":"Wally","lang":"en","coords":"37.331820,-122.031180"},{"id":1747,"name":"Ted","lang":"en","coords":"37.331820,-122.031180"},{"id":1748,"name":"Alice","lang":"en","coords":"37.331820,-122.031180"},{"id":1749,"name":"Tina","lang":"en","coords":"37.331820,-122.031180"},{"id":1750,"name":"PHB","lang":"en","coords":"37.331820,-122.031180"},{"id":1751,"name":"CEO","lang":"en","coords":"37.331820,-122.031180"}]}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 122, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 122, $title);
    }
    
    $title = 'People Test 122F: Search for People With No Tag 8';
    $result_code = '';
    
    $method = 'GET';

    $uri = __SERVER_URI__.'/json/people/people/?search_tag8=';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100"},{"id":1726,"name":"VAAdmin","lang":"en","coords":"38.871900,-77.056300"},{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200"},{"id":1728,"name":"WVAdmin","lang":"en","coords":"38.834800,-79.376200"},{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800"},{"id":1730,"name":"Main Admin","lang":"en","coords":"38.989700,-76.937800"},{"id":1731,"name":"God Admin","lang":"en","coords":"38.871900,-77.056300"}]}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 122, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 122, $title);
    }
    
    $title = 'People Test 122G: Search for People With First Name of "Wally"';
    $result_code = '';
    
    $method = 'GET';

    $uri = __SERVER_URI__.'/json/people/people/?search_given_name=Wally';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1746,"name":"Wally","lang":"en","coords":"37.331820,-122.031180"}]}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 122, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 122, $title);
    }
    
    $title = 'People Test 122H: Search for People With No First Name';
    $result_code = '';
    
    $method = 'GET';

    $uri = __SERVER_URI__.'/json/people/people/?search_given_name=';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100"},{"id":1726,"name":"VAAdmin","lang":"en","coords":"38.871900,-77.056300"},{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200"},{"id":1728,"name":"WVAdmin","lang":"en","coords":"38.834800,-79.376200"},{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800"},{"id":1730,"name":"Main Admin","lang":"en","coords":"38.989700,-76.937800"},{"id":1731,"name":"God Admin","lang":"en","coords":"38.871900,-77.056300"}]}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 122, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 122, $title);
    }
    
    $title = 'People Test 122I: Search for People With A Tag 9 of "Engineering"';
    $result_code = '';
    
    $method = 'GET';

    $uri = __SERVER_URI__.'/json/people/people/?search_tag9=engineering';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[{"id":1745,"name":"Dilbert","lang":"en","coords":"37.331820,-122.031180"},{"id":1748,"name":"Alice","lang":"en","coords":"37.331820,-122.031180"}]}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 122, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 122, $title);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0123() {
    basalt_run_single_direct_test(123, 'MORE TEXT SEARCH FUNCTION FUN (XML).', '', 'people_2_tests');
}

function basalt_test_0123($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 123A: Search for People With No name';
    $result_code = '';
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);
    
    $method = 'GET';

    $uri = __SERVER_URI__.'/xml/people/people/?search_name=';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'</people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 123, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 123, $title);
    }
    
    $title = 'People Test 123B: Search for People With Any name';

    $uri = __SERVER_URI__.'/xml/people/people/?search_name=%';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords></value><value sequence_index="1"><id>1726</id><name>VAAdmin</name><lang>en</lang><coords>38.871900,-77.056300</coords></value><value sequence_index="2"><id>1727</id><name>DCAdmin</name><lang>en</lang><coords>38.889300,-77.050200</coords></value><value sequence_index="3"><id>1728</id><name>WVAdmin</name><lang>en</lang><coords>38.834800,-79.376200</coords></value><value sequence_index="4"><id>1729</id><name>DEAdmin</name><lang>en</lang><coords>39.739100,-75.539800</coords></value><value sequence_index="5"><id>1730</id><name>Main Admin</name><lang>en</lang><coords>38.989700,-76.937800</coords></value><value sequence_index="6"><id>1731</id><name>God Admin</name><lang>en</lang><coords>38.871900,-77.056300</coords></value><value sequence_index="7"><id>1745</id><name>Dilbert</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="8"><id>1746</id><name>Wally</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="9"><id>1747</id><name>Ted</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="10"><id>1748</id><name>Alice</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="11"><id>1749</id><name>Tina</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="12"><id>1750</id><name>PHB</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="13"><id>1751</id><name>CEO</name><lang>en</lang><coords>37.331820,-122.031180</coords></value></people></people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 123, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 123, $title);
    }
    
    $title = 'People Test 123C: Search for People With No Surname';

    $uri = __SERVER_URI__.'/xml/people/people/?search_surname=';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords></value><value sequence_index="1"><id>1726</id><name>VAAdmin</name><lang>en</lang><coords>38.871900,-77.056300</coords></value><value sequence_index="2"><id>1727</id><name>DCAdmin</name><lang>en</lang><coords>38.889300,-77.050200</coords></value><value sequence_index="3"><id>1728</id><name>WVAdmin</name><lang>en</lang><coords>38.834800,-79.376200</coords></value><value sequence_index="4"><id>1729</id><name>DEAdmin</name><lang>en</lang><coords>39.739100,-75.539800</coords></value><value sequence_index="5"><id>1730</id><name>Main Admin</name><lang>en</lang><coords>38.989700,-76.937800</coords></value><value sequence_index="6"><id>1731</id><name>God Admin</name><lang>en</lang><coords>38.871900,-77.056300</coords></value></people></people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 123, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 123, $title);
    }
    
    $title = 'People Test 123D: Search for People With Any Surname';
    $result_code = '';
    
    $method = 'GET';

    $uri = __SERVER_URI__.'/xml/people/people/?search_surname=%';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1745</id><name>Dilbert</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="1"><id>1746</id><name>Wally</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="2"><id>1747</id><name>Ted</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="3"><id>1748</id><name>Alice</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="4"><id>1749</id><name>Tina</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="5"><id>1750</id><name>PHB</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="6"><id>1751</id><name>CEO</name><lang>en</lang><coords>37.331820,-122.031180</coords></value></people></people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 123, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 123, $title);
    }
    
    $title = 'People Test 123E: Search for People With Any Tag 8';
    
    $method = 'GET';

    $uri = __SERVER_URI__.'/xml/people/people/?search_tag8=%';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1745</id><name>Dilbert</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="1"><id>1746</id><name>Wally</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="2"><id>1747</id><name>Ted</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="3"><id>1748</id><name>Alice</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="4"><id>1749</id><name>Tina</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="5"><id>1750</id><name>PHB</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="6"><id>1751</id><name>CEO</name><lang>en</lang><coords>37.331820,-122.031180</coords></value></people></people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 123, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 123, $title);
    }
    
    $title = 'People Test 123F: Search for People With No Tag 8';
    $result_code = '';
    
    $method = 'GET';

    $uri = __SERVER_URI__.'/xml/people/people/?search_tag8=';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords></value><value sequence_index="1"><id>1726</id><name>VAAdmin</name><lang>en</lang><coords>38.871900,-77.056300</coords></value><value sequence_index="2"><id>1727</id><name>DCAdmin</name><lang>en</lang><coords>38.889300,-77.050200</coords></value><value sequence_index="3"><id>1728</id><name>WVAdmin</name><lang>en</lang><coords>38.834800,-79.376200</coords></value><value sequence_index="4"><id>1729</id><name>DEAdmin</name><lang>en</lang><coords>39.739100,-75.539800</coords></value><value sequence_index="5"><id>1730</id><name>Main Admin</name><lang>en</lang><coords>38.989700,-76.937800</coords></value><value sequence_index="6"><id>1731</id><name>God Admin</name><lang>en</lang><coords>38.871900,-77.056300</coords></value></people></people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 123, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 123, $title);
    }
    
    $title = 'People Test 123G: Search for People With First Name of "Wally"';
    $result_code = '';
    
    $method = 'GET';

    $uri = __SERVER_URI__.'/xml/people/people/?search_given_name=Wally';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1746</id><name>Wally</name><lang>en</lang><coords>37.331820,-122.031180</coords></value></people></people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 123, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 123, $title);
    }
    
    $title = 'People Test 123H: Search for People With No First Name';
    $result_code = '';
    
    $method = 'GET';

    $uri = __SERVER_URI__.'/xml/people/people/?search_given_name=';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords></value><value sequence_index="1"><id>1726</id><name>VAAdmin</name><lang>en</lang><coords>38.871900,-77.056300</coords></value><value sequence_index="2"><id>1727</id><name>DCAdmin</name><lang>en</lang><coords>38.889300,-77.050200</coords></value><value sequence_index="3"><id>1728</id><name>WVAdmin</name><lang>en</lang><coords>38.834800,-79.376200</coords></value><value sequence_index="4"><id>1729</id><name>DEAdmin</name><lang>en</lang><coords>39.739100,-75.539800</coords></value><value sequence_index="5"><id>1730</id><name>Main Admin</name><lang>en</lang><coords>38.989700,-76.937800</coords></value><value sequence_index="6"><id>1731</id><name>God Admin</name><lang>en</lang><coords>38.871900,-77.056300</coords></value></people></people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 123, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 123, $title);
    }
    
    $title = 'People Test 123I: Search for People With A Tag 9 of "Engineering"';
    $result_code = '';
    
    $method = 'GET';

    $uri = __SERVER_URI__.'/xml/people/people/?search_tag9=engineering';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><value sequence_index="0"><id>1745</id><name>Dilbert</name><lang>en</lang><coords>37.331820,-122.031180</coords></value><value sequence_index="1"><id>1748</id><name>Alice</name><lang>en</lang><coords>37.331820,-122.031180</coords></value></people></people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 123, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 123, $title);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}
?>
