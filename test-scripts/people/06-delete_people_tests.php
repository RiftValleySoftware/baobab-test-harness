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

baobab_run_tests(68, '68-71: DELETE PEOPLE AND LOGINS TESTS', '');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0068() {
    basalt_run_single_direct_test(68, 'DELETE INDIVIDUAL PEOPLE AND LOGINS TEST (JSON).', '', 'people_2_tests');
}

function basalt_test_0068($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 68A: Delete One Selected Person (Ted)';
    $result_code = '';
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=PHB&password=CoreysGoryStory', NULL, NULL, $result_code);
    
    $method = 'DELETE';

    $uri = __SERVER_URI__.'/json/people/people/1747';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"deleted_users":[{"id":1747,"name":"Ted","lang":"en","coords":"37.331820,-122.031180","read_token":15,"write_token":15,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Ted","is_manager":false,"is_main_admin":false,"associated_login_id":15}],"deleted_logins":[]}}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 68, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 68, $title);
    }
    
    $method = 'GET';

    $title = 'People Test 68B: Make Sure They Are Gone.';
    $uri = __SERVER_URI__.'/json/people/people/1747';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[]}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 68, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 68, $title);
    }

    $title = 'People Test 68C: Make Sure Their Login Is Still There.';
    $uri = __SERVER_URI__.'/json/people/logins/Ted';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[{"id":15,"name":"Ted Login","lang":"en","login_id":"Ted"}]}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 68, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 68, $title);
    }
    
    $title = 'People Test 68D: Delete That Login.';
    $method = 'DELETE';

    $uri = __SERVER_URI__.'/json/people/logins/Ted';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":{"deleted_logins":[{"id":15,"name":"Ted Login","lang":"en","login_id":"Ted","read_token":15,"write_token":15,"last_access":"1970-01-02 00:00:00","writeable":true,"is_manager":false,"is_main_admin":false,"security_tokens":[15]}]}}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 68, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 68, $title);
    }

    $title = 'People Test 68E: Make Sure Their Login Is Gone.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins/Ted';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[]}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 68, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 68, $title);
    }
    
    $title = 'People Test 68G: Delete One Selected Person (Alice), and Their Login';
    
    $method = 'DELETE';

    $uri = __SERVER_URI__.'/json/people/people/login_ids/Alice?login_user';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"deleted_users":[{"id":1748,"name":"Alice","lang":"en","coords":"37.331820,-122.031180","read_token":16,"write_token":16,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Alice","is_manager":false,"is_main_admin":false,"associated_login":{"id":16,"name":"Alice Login","lang":"en","login_id":"Alice","read_token":16,"write_token":16,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1748,"is_manager":false,"is_main_admin":false,"security_tokens":[16]}}],"deleted_logins":[{"id":16,"name":"Alice Login","lang":"en","login_id":"Alice","read_token":16,"write_token":16,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1748,"is_manager":false,"is_main_admin":false,"security_tokens":[16]}]}}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 68, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 68, $title);
    }
    
    $method = 'GET';

    $title = 'People Test 68H: Make Sure They Are Gone.';
    $uri = __SERVER_URI__.'/json/people/people/1748';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[]}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 68, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 68, $title);
    }

    $title = 'People Test 68I: Make Sure Their Login Is Also Gone.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins/Alice';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[]}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 68, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 68, $title);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0069() {
    basalt_run_single_direct_test(69, 'DELETE PEOPLE AND LOGINS TEST (JSON).', '', 'people_2_tests');
}

function basalt_test_0069($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 69A: Delete One Selected Person (Ted)';
    $result_code = '';
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=PHB&password=CoreysGoryStory', NULL, NULL, $result_code);
    
    $method = 'DELETE';

    $uri = __SERVER_URI__.'/xml/people/people/1747';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><deleted_users><value sequence_index="0"><id>1747</id><name>Ted</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>15</read_token><write_token>15</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Ramone</surname><given_name>Ted</given_name><associated_login_id>15</associated_login_id></value></deleted_users></people></people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 69, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 69, $title);
    }
    
    $method = 'GET';

    $title = 'People Test 69B: Make Sure They Are Gone.';
    $uri = __SERVER_URI__.'/xml/people/people/1747';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'</people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 69, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 69, $title);
    }

    $title = 'People Test 69C: Make Sure Their Login Is Still There.';
    $uri = __SERVER_URI__.'/xml/people/logins/Ted';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><value sequence_index="0"><id>15</id><name>Ted Login</name><lang>en</lang><login_id>Ted</login_id></value></logins></people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 69, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 69, $title);
    }
    
    $title = 'People Test 69D: Delete That Login.';
    $method = 'DELETE';

    $uri = __SERVER_URI__.'/xml/people/logins/Ted';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><deleted_logins><value sequence_index="0"><id>15</id><name>Ted Login</name><lang>en</lang><login_id>Ted</login_id><read_token>15</read_token><write_token>15</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><security_tokens><value sequence_index="0">15</value></security_tokens></value></deleted_logins></logins></people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 69, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 69, $title);
    }

    $title = 'People Test 69E: Make Sure Their Login Is Gone.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins/Ted';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'</people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 69, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 69, $title);
    }
    
    $title = 'People Test 69G: Delete One Selected Person (Alice), and Their Login';
    
    $method = 'DELETE';

    $uri = __SERVER_URI__.'/xml/people/people/login_ids/Alice?login_user';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><deleted_users><value sequence_index="0"><id>1748</id><name>Alice</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>16</read_token><write_token>16</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Ramone</surname><given_name>Alice</given_name><associated_login><id>16</id><name>Alice Login</name><lang>en</lang><login_id>Alice</login_id><read_token>16</read_token><write_token>16</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1748</user_object_id><security_tokens><value sequence_index="0">16</value></security_tokens></associated_login></value></deleted_users><deleted_logins><value sequence_index="0"><id>16</id><name>Alice Login</name><lang>en</lang><login_id>Alice</login_id><read_token>16</read_token><write_token>16</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1748</user_object_id><security_tokens><value sequence_index="0">16</value></security_tokens></value></deleted_logins></people></people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 69, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 69, $title);
    }
    
    $method = 'GET';

    $title = 'People Test 69H: Make Sure They Are Gone.';
    $uri = __SERVER_URI__.'/xml/people/people/1748';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'</people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 69, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 69, $title);
    }

    $title = 'People Test 69I: Make Sure Their Login Is Also Gone.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins/Alice';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'</people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 69, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 69, $title);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0070() {
    basalt_run_single_direct_test(70, 'DELETE MULTIPLE PEOPLE AND LOGINS TEST (JSON).', '', 'people_2_tests');
}

function basalt_test_0070($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 70A: Delete Multiple Selected People (Ted, Alice). MDAmin and VAAdmin are also selected, but they will be ignored. The logins will not be deleted.';
    $result_code = '';
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=PHB&password=CoreysGoryStory', NULL, NULL, $result_code);
    
    $method = 'DELETE';

    $uri = __SERVER_URI__.'/json/people/people/1725,1726,1747,1748';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"deleted_users":[{"id":1747,"name":"Ted","lang":"en","coords":"37.331820,-122.031180","read_token":15,"write_token":15,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Ted","is_manager":false,"is_main_admin":false,"associated_login_id":15},{"id":1748,"name":"Alice","lang":"en","coords":"37.331820,-122.031180","read_token":16,"write_token":16,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Alice","is_manager":false,"is_main_admin":false,"associated_login_id":16}],"deleted_logins":[]}}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 70, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 70, $title);
    }

    $method = 'GET';

    $title = 'People Test 70B: Make Sure Their Logins Are Still There.';
    $uri = __SERVER_URI__.'/json/people/logins/Ted,Alice?show_details';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[{"id":15,"name":"Ted Login","lang":"en","login_id":"Ted","read_token":15,"write_token":15,"last_access":"1970-01-02 00:00:00","writeable":true,"is_manager":false,"is_main_admin":false,"security_tokens":[15]},{"id":16,"name":"Alice Login","lang":"en","login_id":"Alice","read_token":16,"write_token":16,"last_access":"1970-01-02 00:00:00","writeable":true,"is_manager":false,"is_main_admin":false,"security_tokens":[16]}]}}';
        
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 70, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 70, $title);
    }
    
    $method = 'DELETE';

    $title = 'People Test 70C: Delete Those Logins.';
    $uri = __SERVER_URI__.'/json/people/logins/15,16';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":{"deleted_logins":[{"id":15,"name":"Ted Login","lang":"en","login_id":"Ted","read_token":15,"write_token":15,"last_access":"1970-01-02 00:00:00","writeable":true,"is_manager":false,"is_main_admin":false,"security_tokens":[15]},{"id":16,"name":"Alice Login","lang":"en","login_id":"Alice","read_token":16,"write_token":16,"last_access":"1970-01-02 00:00:00","writeable":true,"is_manager":false,"is_main_admin":false,"security_tokens":[16]}]}}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 70, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 70, $title);
    }

    $method = 'GET';

    $title = 'People Test 70D: Make Sure Those Logins Are Now Gone.';
    $uri = __SERVER_URI__.'/json/people/logins/Ted,Alice?show_details';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[]}}';
        
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 70, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 70, $title);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    
    $method = 'DELETE';

    $title = 'People Test 70E: Log In as the Main Admin, And Delete Multiple Logins and Users At Once. The Last Two Will be Ignored.';
    $uri = __SERVER_URI__.'/json/people/people/login_ids/VAAdmin,WVAdmin,DEAdmin,Dilbert,Wally?login_user';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"deleted_users":[{"id":1726,"name":"VAAdmin","lang":"en","coords":"38.871900,-77.056300","read_token":0,"write_token":8,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8719,"longitude":-77.0563,"children":{"places":[855,856,857,858,859,860,861,862,863,864,865,866,867,868,869,870,871,872,873,874,875,876,877,878,879,880,881,882,883,884,885,886,887,888,889,890,891,892,893,894,895,896,897,898,899,900,901,902,903,904,905,906,907,908,909,910,911,912,913,914,915,916,917,918,919,920,921,922,923,924,925,926,927,928,929,930,931,932,933,934,935,936,937,938,939,940,941,942,943,944,945,946,947,948,949,950,951,952,953,954,955,956,957,958,959,960,961,962,963,964,965,966,967,968,969,970,971,972,973,974,975,976,977,978,979,980,981,982,983,984,985,986,987,988,989,990,991,992,993,994,995,996,997,998,999,1000,1001,1002,1003,1004,1005,1006,1007,1008,1009,1010,1011,1012,1013,1014,1015,1016,1017,1018,1019,1020,1021,1022,1023,1024,1025,1026,1027,1028,1029,1030,1031,1032,1033,1034,1035,1036,1037,1038,1039,1040,1041,1042,1043,1044,1045,1046,1047,1048,1049,1050,1051,1052,1053,1054,1055,1056,1057,1058,1059,1060,1061,1062,1063,1064,1065,1066,1067,1068,1069,1070,1071,1072,1073,1074,1075,1076,1077,1078,1079,1080,1081,1082,1083,1084,1085,1086,1087,1088,1089,1090,1091,1092,1093,1094,1095,1096,1097,1098,1099,1100,1101,1102,1103,1104,1105,1106,1107,1108,1109,1110,1111,1112,1113,1114,1115,1116,1117,1118,1119,1120,1121,1122,1123,1124,1125,1126,1127,1128,1129,1130,1131,1132,1133,1134,1135,1136,1137,1138,1139,1140,1141,1142,1143,1144,1145,1146,1147,1148,1149,1150,1151,1152,1153,1154,1155,1156,1157,1158,1159,1160,1161,1162,1163,1164,1165,1166,1167,1168,1169,1170,1171,1172,1173,1174,1175,1176,1177,1178,1179,1180,1181,1182,1183,1184,1185,1186,1187,1188,1189,1190,1191,1192,1193,1194,1195,1196,1197,1198,1199,1200,1201,1202,1203,1204,1205,1206,1207,1208,1209,1210,1211,1212,1213,1214,1215,1216,1217,1218,1219,1220,1221,1222,1223,1224,1225,1226,1227,1228,1229,1230,1231,1232,1233,1234,1235,1236,1237,1238,1239,1240,1241,1242,1243,1244,1245,1246,1247,1248,1249,1250,1251,1252,1253,1254,1255,1256,1257,1258,1259,1260,1261,1262,1263,1264,1265,1266,1267,1268,1269,1270,1271,1272,1273,1274,1275,1276,1277,1278,1279,1280,1281,1282,1283,1284,1285,1286,1287,1288,1289,1290,1291,1292,1293,1294,1295,1296,1297,1298,1299,1300,1301,1302,1303,1304,1305,1306,1307,1308,1309,1310,1311,1312,1313,1314,1315,1316,1317,1318,1319,1320,1321,1322,1323,1324,1325,1326,1327,1328,1329,1330,1331,1332,1333,1334,1335,1336,1337,1338,1339,1340,1341,1342,1343,1344,1345,1346,1347,1348,1349,1350,1351,1352,1353,1354,1355,1356,1357,1358,1359,1360,1361,1362,1363,1364,1365,1366,1367,1368,1369,1370,1371,1372,1373,1374,1375,1376,1377,1378,1379,1380,1381,1382,1383,1384,1385,1386,1387,1388,1389,1390,1391,1392,1393,1394,1395,1396,1397,1398,1399,1400,1401,1402,1403,1404,1405,1406,1407,1408,1409,1410,1411,1412,1413,1414,1415,1416,1417,1418,1419,1420,1421,1422,1423,1424,1425,1426,1427,1428,1429,1430,1431,1432,1433,1434,1435,1436,1437,1438,1439,1440,1441,1442,1443,1444,1445,1446,1447,1448,1449,1450,1451]},"is_manager":false,"is_main_admin":false,"associated_login":{"id":8,"name":"Virginia Login","lang":"en","login_id":"VAAdmin","read_token":8,"write_token":8,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1726,"is_manager":false,"is_main_admin":false,"security_tokens":[8]}},{"id":1728,"name":"WVAdmin","lang":"en","coords":"38.834800,-79.376200","read_token":0,"write_token":10,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8348,"longitude":-79.3762,"children":{"places":[1575,1576,1577,1578,1579,1580,1581,1582,1583,1584,1585,1586,1587,1588,1589,1590,1591,1592,1593,1594,1595,1596,1597,1598,1599,1600,1601,1602,1603,1604,1605,1606,1607,1608,1609,1610,1611,1612,1613,1614,1615,1616,1617,1618,1619,1620,1621,1622,1623,1624,1625,1626,1627,1628,1629,1630,1631,1632,1633,1634,1635,1636,1637,1638,1639,1640,1641,1642,1643,1644,1645,1646,1647,1648,1649,1650,1651,1652,1653,1654,1655,1656,1657,1658,1659,1660]},"is_manager":false,"is_main_admin":false,"associated_login":{"id":10,"name":"West Virginia Login","lang":"en","login_id":"WVAdmin","read_token":10,"write_token":10,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1728,"is_manager":false,"is_main_admin":false,"security_tokens":[10]}},{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800","read_token":0,"write_token":11,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.7391,"longitude":-75.5398,"children":{"places":[1661,1662,1663,1664,1665,1666,1667,1668,1669,1670,1671,1672,1673,1674,1675,1676,1677,1678,1679,1680,1681,1682,1683,1684,1685,1686,1687,1688,1689,1690,1691,1692,1693,1694,1695,1696,1697,1698,1699,1700,1701,1702,1703,1704,1705,1706,1707,1708,1709,1710,1711,1712,1713,1714,1715,1716,1717,1718,1719,1720,1721,1722,1723,1724]},"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login":{"id":11,"name":"Delaware Login","lang":"en","login_id":"DEAdmin","read_token":11,"write_token":11,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1729,"is_manager":false,"is_main_admin":false,"security_tokens":[11]}}],"deleted_logins":[{"id":8,"name":"Virginia Login","lang":"en","login_id":"VAAdmin","read_token":8,"write_token":8,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1726,"is_manager":false,"is_main_admin":false,"security_tokens":[8]},{"id":10,"name":"West Virginia Login","lang":"en","login_id":"WVAdmin","read_token":10,"write_token":10,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1728,"is_manager":false,"is_main_admin":false,"security_tokens":[10]},{"id":11,"name":"Delaware Login","lang":"en","login_id":"DEAdmin","read_token":11,"write_token":11,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1729,"is_manager":false,"is_main_admin":false,"security_tokens":[11]}]}}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 70, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 70, $title);
    }
    
    $method = 'GET';

    $title = 'People Test 70F: Make Sure They Are All Gone (User IDs)';
    $uri = __SERVER_URI__.'/json/people/people/1726,1728,1729';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[]}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 70, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 70, $title);
    }

    $title = 'People Test 70G: Make Sure They Are All Gone (Login IDs)';
    $uri = __SERVER_URI__.'/json/people/people/login_ids/8,10,11';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[]}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 70, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 70, $title);
    }

    $title = 'People Test 70H: Make Sure They Are All Gone (Logins)';
    $uri = __SERVER_URI__.'/json/people/logins/8,10,11';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[]}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 70, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 70, $title);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=PHB&password=CoreysGoryStory', NULL, NULL, $result_code);
    
    $method = 'DELETE';

    $title = 'People Test 70I: Log In as the PHB Admin, And Delete All Visible Logins and Users At Once. We Cannot Delete Ourselves.';
    $uri = __SERVER_URI__.'/json/people/people/?login_user';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"deleted_users":[{"id":1745,"name":"Dilbert","lang":"en","coords":"37.331820,-122.031180","read_token":13,"write_token":13,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Dilbert","is_manager":false,"is_main_admin":false,"associated_login":{"id":13,"name":"Dilbert Login","lang":"en","login_id":"Dilbert","read_token":13,"write_token":13,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1745,"is_manager":false,"is_main_admin":false,"security_tokens":[13]}},{"id":1746,"name":"Wally","lang":"en","coords":"37.331820,-122.031180","read_token":14,"write_token":14,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Wally","is_manager":false,"is_main_admin":false,"associated_login":{"id":14,"name":"Wally Login","lang":"en","login_id":"Wally","read_token":14,"write_token":14,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1746,"is_manager":false,"is_main_admin":false,"security_tokens":[14]}},{"id":1749,"name":"Tina","lang":"en","coords":"37.331820,-122.031180","read_token":17,"write_token":17,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.33182,"longitude":-122.03118,"surname":"Ramone","given_name":"Tina","is_manager":false,"is_main_admin":false,"associated_login":{"id":17,"name":"Tina Login","lang":"en","login_id":"Tina","read_token":17,"write_token":17,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1749,"is_manager":false,"is_main_admin":false,"security_tokens":[17]}}],"deleted_logins":[{"id":13,"name":"Dilbert Login","lang":"en","login_id":"Dilbert","read_token":13,"write_token":13,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1745,"is_manager":false,"is_main_admin":false,"security_tokens":[13]},{"id":14,"name":"Wally Login","lang":"en","login_id":"Wally","read_token":14,"write_token":14,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1746,"is_manager":false,"is_main_admin":false,"security_tokens":[14]},{"id":17,"name":"Tina Login","lang":"en","login_id":"Tina","read_token":17,"write_token":17,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1749,"is_manager":false,"is_main_admin":false,"security_tokens":[17]}]}}}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 70, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 70, $title);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0071() {
    basalt_run_single_direct_test(71, 'DELETE MULTIPLE PEOPLE AND LOGINS TEST (XML).', '', 'people_2_tests');
}

function basalt_test_0071($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 71A: Delete Multiple Selected People (Ted, Alice). MDAmin and VAAdmin are also selected, but they will be ignored. The logins will not be deleted.';
    $result_code = '';
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=PHB&password=CoreysGoryStory', NULL, NULL, $result_code);
    
    $method = 'DELETE';

    $uri = __SERVER_URI__.'/xml/people/people/1725,1726,1747,1748';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><deleted_users><value sequence_index="0"><id>1747</id><name>Ted</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>15</read_token><write_token>15</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Ramone</surname><given_name>Ted</given_name><associated_login_id>15</associated_login_id></value><value sequence_index="1"><id>1748</id><name>Alice</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>16</read_token><write_token>16</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Ramone</surname><given_name>Alice</given_name><associated_login_id>16</associated_login_id></value></deleted_users></people></people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 71, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 71, $title);
    }

    $method = 'GET';

    $title = 'People Test 71B: Make Sure Their Logins Are Still There.';
    $uri = __SERVER_URI__.'/xml/people/logins/Ted,Alice?show_details';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><value sequence_index="0"><id>15</id><name>Ted Login</name><lang>en</lang><login_id>Ted</login_id><read_token>15</read_token><write_token>15</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><security_tokens><value sequence_index="0">15</value></security_tokens></value><value sequence_index="1"><id>16</id><name>Alice Login</name><lang>en</lang><login_id>Alice</login_id><read_token>16</read_token><write_token>16</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><security_tokens><value sequence_index="0">16</value></security_tokens></value></logins></people>';
        
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 71, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 71, $title);
    }
    
    $method = 'DELETE';

    $title = 'People Test 71C: Delete Those Logins.';
    $uri = __SERVER_URI__.'/xml/people/logins/15,16';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><deleted_logins><value sequence_index="0"><id>15</id><name>Ted Login</name><lang>en</lang><login_id>Ted</login_id><read_token>15</read_token><write_token>15</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><security_tokens><value sequence_index="0">15</value></security_tokens></value><value sequence_index="1"><id>16</id><name>Alice Login</name><lang>en</lang><login_id>Alice</login_id><read_token>16</read_token><write_token>16</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><security_tokens><value sequence_index="0">16</value></security_tokens></value></deleted_logins></logins></people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 71, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 71, $title);
    }

    $method = 'GET';

    $title = 'People Test 71D: Make Sure Those Logins Are Now Gone.';
    $uri = __SERVER_URI__.'/xml/people/logins/Ted,Alice?show_details';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'</people>';
        
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 71, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 71, $title);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    
    $method = 'DELETE';

    $title = 'People Test 71E: Log In as the Main Admin, And Delete Multiple Logins and Users At Once. The Last Two Will be Ignored.';
    $uri = __SERVER_URI__.'/xml/people/people/login_ids/VAAdmin,WVAdmin,DEAdmin,Dilbert,Wally?login_user';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><deleted_users><value sequence_index="0"><id>1726</id><name>VAAdmin</name><lang>en</lang><coords>38.871900,-77.056300</coords><write_token>8</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.8719</latitude><longitude>-77.0563</longitude><children><places><value sequence_index="0">855</value><value sequence_index="1">856</value><value sequence_index="2">857</value><value sequence_index="3">858</value><value sequence_index="4">859</value><value sequence_index="5">860</value><value sequence_index="6">861</value><value sequence_index="7">862</value><value sequence_index="8">863</value><value sequence_index="9">864</value><value sequence_index="10">865</value><value sequence_index="11">866</value><value sequence_index="12">867</value><value sequence_index="13">868</value><value sequence_index="14">869</value><value sequence_index="15">870</value><value sequence_index="16">871</value><value sequence_index="17">872</value><value sequence_index="18">873</value><value sequence_index="19">874</value><value sequence_index="20">875</value><value sequence_index="21">876</value><value sequence_index="22">877</value><value sequence_index="23">878</value><value sequence_index="24">879</value><value sequence_index="25">880</value><value sequence_index="26">881</value><value sequence_index="27">882</value><value sequence_index="28">883</value><value sequence_index="29">884</value><value sequence_index="30">885</value><value sequence_index="31">886</value><value sequence_index="32">887</value><value sequence_index="33">888</value><value sequence_index="34">889</value><value sequence_index="35">890</value><value sequence_index="36">891</value><value sequence_index="37">892</value><value sequence_index="38">893</value><value sequence_index="39">894</value><value sequence_index="40">895</value><value sequence_index="41">896</value><value sequence_index="42">897</value><value sequence_index="43">898</value><value sequence_index="44">899</value><value sequence_index="45">900</value><value sequence_index="46">901</value><value sequence_index="47">902</value><value sequence_index="48">903</value><value sequence_index="49">904</value><value sequence_index="50">905</value><value sequence_index="51">906</value><value sequence_index="52">907</value><value sequence_index="53">908</value><value sequence_index="54">909</value><value sequence_index="55">910</value><value sequence_index="56">911</value><value sequence_index="57">912</value><value sequence_index="58">913</value><value sequence_index="59">914</value><value sequence_index="60">915</value><value sequence_index="61">916</value><value sequence_index="62">917</value><value sequence_index="63">918</value><value sequence_index="64">919</value><value sequence_index="65">920</value><value sequence_index="66">921</value><value sequence_index="67">922</value><value sequence_index="68">923</value><value sequence_index="69">924</value><value sequence_index="70">925</value><value sequence_index="71">926</value><value sequence_index="72">927</value><value sequence_index="73">928</value><value sequence_index="74">929</value><value sequence_index="75">930</value><value sequence_index="76">931</value><value sequence_index="77">932</value><value sequence_index="78">933</value><value sequence_index="79">934</value><value sequence_index="80">935</value><value sequence_index="81">936</value><value sequence_index="82">937</value><value sequence_index="83">938</value><value sequence_index="84">939</value><value sequence_index="85">940</value><value sequence_index="86">941</value><value sequence_index="87">942</value><value sequence_index="88">943</value><value sequence_index="89">944</value><value sequence_index="90">945</value><value sequence_index="91">946</value><value sequence_index="92">947</value><value sequence_index="93">948</value><value sequence_index="94">949</value><value sequence_index="95">950</value><value sequence_index="96">951</value><value sequence_index="97">952</value><value sequence_index="98">953</value><value sequence_index="99">954</value><value sequence_index="100">955</value><value sequence_index="101">956</value><value sequence_index="102">957</value><value sequence_index="103">958</value><value sequence_index="104">959</value><value sequence_index="105">960</value><value sequence_index="106">961</value><value sequence_index="107">962</value><value sequence_index="108">963</value><value sequence_index="109">964</value><value sequence_index="110">965</value><value sequence_index="111">966</value><value sequence_index="112">967</value><value sequence_index="113">968</value><value sequence_index="114">969</value><value sequence_index="115">970</value><value sequence_index="116">971</value><value sequence_index="117">972</value><value sequence_index="118">973</value><value sequence_index="119">974</value><value sequence_index="120">975</value><value sequence_index="121">976</value><value sequence_index="122">977</value><value sequence_index="123">978</value><value sequence_index="124">979</value><value sequence_index="125">980</value><value sequence_index="126">981</value><value sequence_index="127">982</value><value sequence_index="128">983</value><value sequence_index="129">984</value><value sequence_index="130">985</value><value sequence_index="131">986</value><value sequence_index="132">987</value><value sequence_index="133">988</value><value sequence_index="134">989</value><value sequence_index="135">990</value><value sequence_index="136">991</value><value sequence_index="137">992</value><value sequence_index="138">993</value><value sequence_index="139">994</value><value sequence_index="140">995</value><value sequence_index="141">996</value><value sequence_index="142">997</value><value sequence_index="143">998</value><value sequence_index="144">999</value><value sequence_index="145">1000</value><value sequence_index="146">1001</value><value sequence_index="147">1002</value><value sequence_index="148">1003</value><value sequence_index="149">1004</value><value sequence_index="150">1005</value><value sequence_index="151">1006</value><value sequence_index="152">1007</value><value sequence_index="153">1008</value><value sequence_index="154">1009</value><value sequence_index="155">1010</value><value sequence_index="156">1011</value><value sequence_index="157">1012</value><value sequence_index="158">1013</value><value sequence_index="159">1014</value><value sequence_index="160">1015</value><value sequence_index="161">1016</value><value sequence_index="162">1017</value><value sequence_index="163">1018</value><value sequence_index="164">1019</value><value sequence_index="165">1020</value><value sequence_index="166">1021</value><value sequence_index="167">1022</value><value sequence_index="168">1023</value><value sequence_index="169">1024</value><value sequence_index="170">1025</value><value sequence_index="171">1026</value><value sequence_index="172">1027</value><value sequence_index="173">1028</value><value sequence_index="174">1029</value><value sequence_index="175">1030</value><value sequence_index="176">1031</value><value sequence_index="177">1032</value><value sequence_index="178">1033</value><value sequence_index="179">1034</value><value sequence_index="180">1035</value><value sequence_index="181">1036</value><value sequence_index="182">1037</value><value sequence_index="183">1038</value><value sequence_index="184">1039</value><value sequence_index="185">1040</value><value sequence_index="186">1041</value><value sequence_index="187">1042</value><value sequence_index="188">1043</value><value sequence_index="189">1044</value><value sequence_index="190">1045</value><value sequence_index="191">1046</value><value sequence_index="192">1047</value><value sequence_index="193">1048</value><value sequence_index="194">1049</value><value sequence_index="195">1050</value><value sequence_index="196">1051</value><value sequence_index="197">1052</value><value sequence_index="198">1053</value><value sequence_index="199">1054</value><value sequence_index="200">1055</value><value sequence_index="201">1056</value><value sequence_index="202">1057</value><value sequence_index="203">1058</value><value sequence_index="204">1059</value><value sequence_index="205">1060</value><value sequence_index="206">1061</value><value sequence_index="207">1062</value><value sequence_index="208">1063</value><value sequence_index="209">1064</value><value sequence_index="210">1065</value><value sequence_index="211">1066</value><value sequence_index="212">1067</value><value sequence_index="213">1068</value><value sequence_index="214">1069</value><value sequence_index="215">1070</value><value sequence_index="216">1071</value><value sequence_index="217">1072</value><value sequence_index="218">1073</value><value sequence_index="219">1074</value><value sequence_index="220">1075</value><value sequence_index="221">1076</value><value sequence_index="222">1077</value><value sequence_index="223">1078</value><value sequence_index="224">1079</value><value sequence_index="225">1080</value><value sequence_index="226">1081</value><value sequence_index="227">1082</value><value sequence_index="228">1083</value><value sequence_index="229">1084</value><value sequence_index="230">1085</value><value sequence_index="231">1086</value><value sequence_index="232">1087</value><value sequence_index="233">1088</value><value sequence_index="234">1089</value><value sequence_index="235">1090</value><value sequence_index="236">1091</value><value sequence_index="237">1092</value><value sequence_index="238">1093</value><value sequence_index="239">1094</value><value sequence_index="240">1095</value><value sequence_index="241">1096</value><value sequence_index="242">1097</value><value sequence_index="243">1098</value><value sequence_index="244">1099</value><value sequence_index="245">1100</value><value sequence_index="246">1101</value><value sequence_index="247">1102</value><value sequence_index="248">1103</value><value sequence_index="249">1104</value><value sequence_index="250">1105</value><value sequence_index="251">1106</value><value sequence_index="252">1107</value><value sequence_index="253">1108</value><value sequence_index="254">1109</value><value sequence_index="255">1110</value><value sequence_index="256">1111</value><value sequence_index="257">1112</value><value sequence_index="258">1113</value><value sequence_index="259">1114</value><value sequence_index="260">1115</value><value sequence_index="261">1116</value><value sequence_index="262">1117</value><value sequence_index="263">1118</value><value sequence_index="264">1119</value><value sequence_index="265">1120</value><value sequence_index="266">1121</value><value sequence_index="267">1122</value><value sequence_index="268">1123</value><value sequence_index="269">1124</value><value sequence_index="270">1125</value><value sequence_index="271">1126</value><value sequence_index="272">1127</value><value sequence_index="273">1128</value><value sequence_index="274">1129</value><value sequence_index="275">1130</value><value sequence_index="276">1131</value><value sequence_index="277">1132</value><value sequence_index="278">1133</value><value sequence_index="279">1134</value><value sequence_index="280">1135</value><value sequence_index="281">1136</value><value sequence_index="282">1137</value><value sequence_index="283">1138</value><value sequence_index="284">1139</value><value sequence_index="285">1140</value><value sequence_index="286">1141</value><value sequence_index="287">1142</value><value sequence_index="288">1143</value><value sequence_index="289">1144</value><value sequence_index="290">1145</value><value sequence_index="291">1146</value><value sequence_index="292">1147</value><value sequence_index="293">1148</value><value sequence_index="294">1149</value><value sequence_index="295">1150</value><value sequence_index="296">1151</value><value sequence_index="297">1152</value><value sequence_index="298">1153</value><value sequence_index="299">1154</value><value sequence_index="300">1155</value><value sequence_index="301">1156</value><value sequence_index="302">1157</value><value sequence_index="303">1158</value><value sequence_index="304">1159</value><value sequence_index="305">1160</value><value sequence_index="306">1161</value><value sequence_index="307">1162</value><value sequence_index="308">1163</value><value sequence_index="309">1164</value><value sequence_index="310">1165</value><value sequence_index="311">1166</value><value sequence_index="312">1167</value><value sequence_index="313">1168</value><value sequence_index="314">1169</value><value sequence_index="315">1170</value><value sequence_index="316">1171</value><value sequence_index="317">1172</value><value sequence_index="318">1173</value><value sequence_index="319">1174</value><value sequence_index="320">1175</value><value sequence_index="321">1176</value><value sequence_index="322">1177</value><value sequence_index="323">1178</value><value sequence_index="324">1179</value><value sequence_index="325">1180</value><value sequence_index="326">1181</value><value sequence_index="327">1182</value><value sequence_index="328">1183</value><value sequence_index="329">1184</value><value sequence_index="330">1185</value><value sequence_index="331">1186</value><value sequence_index="332">1187</value><value sequence_index="333">1188</value><value sequence_index="334">1189</value><value sequence_index="335">1190</value><value sequence_index="336">1191</value><value sequence_index="337">1192</value><value sequence_index="338">1193</value><value sequence_index="339">1194</value><value sequence_index="340">1195</value><value sequence_index="341">1196</value><value sequence_index="342">1197</value><value sequence_index="343">1198</value><value sequence_index="344">1199</value><value sequence_index="345">1200</value><value sequence_index="346">1201</value><value sequence_index="347">1202</value><value sequence_index="348">1203</value><value sequence_index="349">1204</value><value sequence_index="350">1205</value><value sequence_index="351">1206</value><value sequence_index="352">1207</value><value sequence_index="353">1208</value><value sequence_index="354">1209</value><value sequence_index="355">1210</value><value sequence_index="356">1211</value><value sequence_index="357">1212</value><value sequence_index="358">1213</value><value sequence_index="359">1214</value><value sequence_index="360">1215</value><value sequence_index="361">1216</value><value sequence_index="362">1217</value><value sequence_index="363">1218</value><value sequence_index="364">1219</value><value sequence_index="365">1220</value><value sequence_index="366">1221</value><value sequence_index="367">1222</value><value sequence_index="368">1223</value><value sequence_index="369">1224</value><value sequence_index="370">1225</value><value sequence_index="371">1226</value><value sequence_index="372">1227</value><value sequence_index="373">1228</value><value sequence_index="374">1229</value><value sequence_index="375">1230</value><value sequence_index="376">1231</value><value sequence_index="377">1232</value><value sequence_index="378">1233</value><value sequence_index="379">1234</value><value sequence_index="380">1235</value><value sequence_index="381">1236</value><value sequence_index="382">1237</value><value sequence_index="383">1238</value><value sequence_index="384">1239</value><value sequence_index="385">1240</value><value sequence_index="386">1241</value><value sequence_index="387">1242</value><value sequence_index="388">1243</value><value sequence_index="389">1244</value><value sequence_index="390">1245</value><value sequence_index="391">1246</value><value sequence_index="392">1247</value><value sequence_index="393">1248</value><value sequence_index="394">1249</value><value sequence_index="395">1250</value><value sequence_index="396">1251</value><value sequence_index="397">1252</value><value sequence_index="398">1253</value><value sequence_index="399">1254</value><value sequence_index="400">1255</value><value sequence_index="401">1256</value><value sequence_index="402">1257</value><value sequence_index="403">1258</value><value sequence_index="404">1259</value><value sequence_index="405">1260</value><value sequence_index="406">1261</value><value sequence_index="407">1262</value><value sequence_index="408">1263</value><value sequence_index="409">1264</value><value sequence_index="410">1265</value><value sequence_index="411">1266</value><value sequence_index="412">1267</value><value sequence_index="413">1268</value><value sequence_index="414">1269</value><value sequence_index="415">1270</value><value sequence_index="416">1271</value><value sequence_index="417">1272</value><value sequence_index="418">1273</value><value sequence_index="419">1274</value><value sequence_index="420">1275</value><value sequence_index="421">1276</value><value sequence_index="422">1277</value><value sequence_index="423">1278</value><value sequence_index="424">1279</value><value sequence_index="425">1280</value><value sequence_index="426">1281</value><value sequence_index="427">1282</value><value sequence_index="428">1283</value><value sequence_index="429">1284</value><value sequence_index="430">1285</value><value sequence_index="431">1286</value><value sequence_index="432">1287</value><value sequence_index="433">1288</value><value sequence_index="434">1289</value><value sequence_index="435">1290</value><value sequence_index="436">1291</value><value sequence_index="437">1292</value><value sequence_index="438">1293</value><value sequence_index="439">1294</value><value sequence_index="440">1295</value><value sequence_index="441">1296</value><value sequence_index="442">1297</value><value sequence_index="443">1298</value><value sequence_index="444">1299</value><value sequence_index="445">1300</value><value sequence_index="446">1301</value><value sequence_index="447">1302</value><value sequence_index="448">1303</value><value sequence_index="449">1304</value><value sequence_index="450">1305</value><value sequence_index="451">1306</value><value sequence_index="452">1307</value><value sequence_index="453">1308</value><value sequence_index="454">1309</value><value sequence_index="455">1310</value><value sequence_index="456">1311</value><value sequence_index="457">1312</value><value sequence_index="458">1313</value><value sequence_index="459">1314</value><value sequence_index="460">1315</value><value sequence_index="461">1316</value><value sequence_index="462">1317</value><value sequence_index="463">1318</value><value sequence_index="464">1319</value><value sequence_index="465">1320</value><value sequence_index="466">1321</value><value sequence_index="467">1322</value><value sequence_index="468">1323</value><value sequence_index="469">1324</value><value sequence_index="470">1325</value><value sequence_index="471">1326</value><value sequence_index="472">1327</value><value sequence_index="473">1328</value><value sequence_index="474">1329</value><value sequence_index="475">1330</value><value sequence_index="476">1331</value><value sequence_index="477">1332</value><value sequence_index="478">1333</value><value sequence_index="479">1334</value><value sequence_index="480">1335</value><value sequence_index="481">1336</value><value sequence_index="482">1337</value><value sequence_index="483">1338</value><value sequence_index="484">1339</value><value sequence_index="485">1340</value><value sequence_index="486">1341</value><value sequence_index="487">1342</value><value sequence_index="488">1343</value><value sequence_index="489">1344</value><value sequence_index="490">1345</value><value sequence_index="491">1346</value><value sequence_index="492">1347</value><value sequence_index="493">1348</value><value sequence_index="494">1349</value><value sequence_index="495">1350</value><value sequence_index="496">1351</value><value sequence_index="497">1352</value><value sequence_index="498">1353</value><value sequence_index="499">1354</value><value sequence_index="500">1355</value><value sequence_index="501">1356</value><value sequence_index="502">1357</value><value sequence_index="503">1358</value><value sequence_index="504">1359</value><value sequence_index="505">1360</value><value sequence_index="506">1361</value><value sequence_index="507">1362</value><value sequence_index="508">1363</value><value sequence_index="509">1364</value><value sequence_index="510">1365</value><value sequence_index="511">1366</value><value sequence_index="512">1367</value><value sequence_index="513">1368</value><value sequence_index="514">1369</value><value sequence_index="515">1370</value><value sequence_index="516">1371</value><value sequence_index="517">1372</value><value sequence_index="518">1373</value><value sequence_index="519">1374</value><value sequence_index="520">1375</value><value sequence_index="521">1376</value><value sequence_index="522">1377</value><value sequence_index="523">1378</value><value sequence_index="524">1379</value><value sequence_index="525">1380</value><value sequence_index="526">1381</value><value sequence_index="527">1382</value><value sequence_index="528">1383</value><value sequence_index="529">1384</value><value sequence_index="530">1385</value><value sequence_index="531">1386</value><value sequence_index="532">1387</value><value sequence_index="533">1388</value><value sequence_index="534">1389</value><value sequence_index="535">1390</value><value sequence_index="536">1391</value><value sequence_index="537">1392</value><value sequence_index="538">1393</value><value sequence_index="539">1394</value><value sequence_index="540">1395</value><value sequence_index="541">1396</value><value sequence_index="542">1397</value><value sequence_index="543">1398</value><value sequence_index="544">1399</value><value sequence_index="545">1400</value><value sequence_index="546">1401</value><value sequence_index="547">1402</value><value sequence_index="548">1403</value><value sequence_index="549">1404</value><value sequence_index="550">1405</value><value sequence_index="551">1406</value><value sequence_index="552">1407</value><value sequence_index="553">1408</value><value sequence_index="554">1409</value><value sequence_index="555">1410</value><value sequence_index="556">1411</value><value sequence_index="557">1412</value><value sequence_index="558">1413</value><value sequence_index="559">1414</value><value sequence_index="560">1415</value><value sequence_index="561">1416</value><value sequence_index="562">1417</value><value sequence_index="563">1418</value><value sequence_index="564">1419</value><value sequence_index="565">1420</value><value sequence_index="566">1421</value><value sequence_index="567">1422</value><value sequence_index="568">1423</value><value sequence_index="569">1424</value><value sequence_index="570">1425</value><value sequence_index="571">1426</value><value sequence_index="572">1427</value><value sequence_index="573">1428</value><value sequence_index="574">1429</value><value sequence_index="575">1430</value><value sequence_index="576">1431</value><value sequence_index="577">1432</value><value sequence_index="578">1433</value><value sequence_index="579">1434</value><value sequence_index="580">1435</value><value sequence_index="581">1436</value><value sequence_index="582">1437</value><value sequence_index="583">1438</value><value sequence_index="584">1439</value><value sequence_index="585">1440</value><value sequence_index="586">1441</value><value sequence_index="587">1442</value><value sequence_index="588">1443</value><value sequence_index="589">1444</value><value sequence_index="590">1445</value><value sequence_index="591">1446</value><value sequence_index="592">1447</value><value sequence_index="593">1448</value><value sequence_index="594">1449</value><value sequence_index="595">1450</value><value sequence_index="596">1451</value></places></children><associated_login><id>8</id><name>Virginia Login</name><lang>en</lang><login_id>VAAdmin</login_id><read_token>8</read_token><write_token>8</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1726</user_object_id><security_tokens><value sequence_index="0">8</value></security_tokens></associated_login></value><value sequence_index="1"><id>1728</id><name>WVAdmin</name><lang>en</lang><coords>38.834800,-79.376200</coords><write_token>10</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.8348</latitude><longitude>-79.3762</longitude><children><places><value sequence_index="0">1575</value><value sequence_index="1">1576</value><value sequence_index="2">1577</value><value sequence_index="3">1578</value><value sequence_index="4">1579</value><value sequence_index="5">1580</value><value sequence_index="6">1581</value><value sequence_index="7">1582</value><value sequence_index="8">1583</value><value sequence_index="9">1584</value><value sequence_index="10">1585</value><value sequence_index="11">1586</value><value sequence_index="12">1587</value><value sequence_index="13">1588</value><value sequence_index="14">1589</value><value sequence_index="15">1590</value><value sequence_index="16">1591</value><value sequence_index="17">1592</value><value sequence_index="18">1593</value><value sequence_index="19">1594</value><value sequence_index="20">1595</value><value sequence_index="21">1596</value><value sequence_index="22">1597</value><value sequence_index="23">1598</value><value sequence_index="24">1599</value><value sequence_index="25">1600</value><value sequence_index="26">1601</value><value sequence_index="27">1602</value><value sequence_index="28">1603</value><value sequence_index="29">1604</value><value sequence_index="30">1605</value><value sequence_index="31">1606</value><value sequence_index="32">1607</value><value sequence_index="33">1608</value><value sequence_index="34">1609</value><value sequence_index="35">1610</value><value sequence_index="36">1611</value><value sequence_index="37">1612</value><value sequence_index="38">1613</value><value sequence_index="39">1614</value><value sequence_index="40">1615</value><value sequence_index="41">1616</value><value sequence_index="42">1617</value><value sequence_index="43">1618</value><value sequence_index="44">1619</value><value sequence_index="45">1620</value><value sequence_index="46">1621</value><value sequence_index="47">1622</value><value sequence_index="48">1623</value><value sequence_index="49">1624</value><value sequence_index="50">1625</value><value sequence_index="51">1626</value><value sequence_index="52">1627</value><value sequence_index="53">1628</value><value sequence_index="54">1629</value><value sequence_index="55">1630</value><value sequence_index="56">1631</value><value sequence_index="57">1632</value><value sequence_index="58">1633</value><value sequence_index="59">1634</value><value sequence_index="60">1635</value><value sequence_index="61">1636</value><value sequence_index="62">1637</value><value sequence_index="63">1638</value><value sequence_index="64">1639</value><value sequence_index="65">1640</value><value sequence_index="66">1641</value><value sequence_index="67">1642</value><value sequence_index="68">1643</value><value sequence_index="69">1644</value><value sequence_index="70">1645</value><value sequence_index="71">1646</value><value sequence_index="72">1647</value><value sequence_index="73">1648</value><value sequence_index="74">1649</value><value sequence_index="75">1650</value><value sequence_index="76">1651</value><value sequence_index="77">1652</value><value sequence_index="78">1653</value><value sequence_index="79">1654</value><value sequence_index="80">1655</value><value sequence_index="81">1656</value><value sequence_index="82">1657</value><value sequence_index="83">1658</value><value sequence_index="84">1659</value><value sequence_index="85">1660</value></places></children><associated_login><id>10</id><name>West Virginia Login</name><lang>en</lang><login_id>WVAdmin</login_id><read_token>10</read_token><write_token>10</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1728</user_object_id><security_tokens><value sequence_index="0">10</value></security_tokens></associated_login></value><value sequence_index="2"><id>1729</id><name>DEAdmin</name><lang>en</lang><coords>39.739100,-75.539800</coords><write_token>11</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.7391</latitude><longitude>-75.5398</longitude><children><places><value sequence_index="0">1661</value><value sequence_index="1">1662</value><value sequence_index="2">1663</value><value sequence_index="3">1664</value><value sequence_index="4">1665</value><value sequence_index="5">1666</value><value sequence_index="6">1667</value><value sequence_index="7">1668</value><value sequence_index="8">1669</value><value sequence_index="9">1670</value><value sequence_index="10">1671</value><value sequence_index="11">1672</value><value sequence_index="12">1673</value><value sequence_index="13">1674</value><value sequence_index="14">1675</value><value sequence_index="15">1676</value><value sequence_index="16">1677</value><value sequence_index="17">1678</value><value sequence_index="18">1679</value><value sequence_index="19">1680</value><value sequence_index="20">1681</value><value sequence_index="21">1682</value><value sequence_index="22">1683</value><value sequence_index="23">1684</value><value sequence_index="24">1685</value><value sequence_index="25">1686</value><value sequence_index="26">1687</value><value sequence_index="27">1688</value><value sequence_index="28">1689</value><value sequence_index="29">1690</value><value sequence_index="30">1691</value><value sequence_index="31">1692</value><value sequence_index="32">1693</value><value sequence_index="33">1694</value><value sequence_index="34">1695</value><value sequence_index="35">1696</value><value sequence_index="36">1697</value><value sequence_index="37">1698</value><value sequence_index="38">1699</value><value sequence_index="39">1700</value><value sequence_index="40">1701</value><value sequence_index="41">1702</value><value sequence_index="42">1703</value><value sequence_index="43">1704</value><value sequence_index="44">1705</value><value sequence_index="45">1706</value><value sequence_index="46">1707</value><value sequence_index="47">1708</value><value sequence_index="48">1709</value><value sequence_index="49">1710</value><value sequence_index="50">1711</value><value sequence_index="51">1712</value><value sequence_index="52">1713</value><value sequence_index="53">1714</value><value sequence_index="54">1715</value><value sequence_index="55">1716</value><value sequence_index="56">1717</value><value sequence_index="57">1718</value><value sequence_index="58">1719</value><value sequence_index="59">1720</value><value sequence_index="60">1721</value><value sequence_index="61">1722</value><value sequence_index="62">1723</value><value sequence_index="63">1724</value></places></children><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login><id>11</id><name>Delaware Login</name><lang>en</lang><login_id>DEAdmin</login_id><read_token>11</read_token><write_token>11</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1729</user_object_id><security_tokens><value sequence_index="0">11</value></security_tokens></associated_login></value></deleted_users><deleted_logins><value sequence_index="0"><id>8</id><name>Virginia Login</name><lang>en</lang><login_id>VAAdmin</login_id><read_token>8</read_token><write_token>8</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1726</user_object_id><security_tokens><value sequence_index="0">8</value></security_tokens></value><value sequence_index="1"><id>10</id><name>West Virginia Login</name><lang>en</lang><login_id>WVAdmin</login_id><read_token>10</read_token><write_token>10</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1728</user_object_id><security_tokens><value sequence_index="0">10</value></security_tokens></value><value sequence_index="2"><id>11</id><name>Delaware Login</name><lang>en</lang><login_id>DEAdmin</login_id><read_token>11</read_token><write_token>11</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1729</user_object_id><security_tokens><value sequence_index="0">11</value></security_tokens></value></deleted_logins></people></people>';    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 71, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 71, $title);
    }
    
    $method = 'GET';

    $title = 'People Test 71F: Make Sure They Are All Gone (User IDs)';
    $uri = __SERVER_URI__.'/xml/people/people/1726,1728,1729';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'</people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 71, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 71, $title);
    }

    $title = 'People Test 71G: Make Sure They Are All Gone (Login IDs)';
    $uri = __SERVER_URI__.'/xml/people/people/login_ids/8,10,11';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'</people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 71, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 71, $title);
    }

    $title = 'People Test 71H: Make Sure They Are All Gone (Logins)';
    $uri = __SERVER_URI__.'/xml/people/logins/8,10,11';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'</people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 71, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 71, $title);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=PHB&password=CoreysGoryStory', NULL, NULL, $result_code);
    
    $method = 'DELETE';

    $title = 'People Test 71I: Log In as the PHB Admin, And Delete All Visible Logins and Users At Once. We Cannot Delete Ourselves.';
    $uri = __SERVER_URI__.'/xml/people/people/?login_user';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><deleted_users><value sequence_index="0"><id>1745</id><name>Dilbert</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>13</read_token><write_token>13</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Ramone</surname><given_name>Dilbert</given_name><associated_login><id>13</id><name>Dilbert Login</name><lang>en</lang><login_id>Dilbert</login_id><read_token>13</read_token><write_token>13</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1745</user_object_id><security_tokens><value sequence_index="0">13</value></security_tokens></associated_login></value><value sequence_index="1"><id>1746</id><name>Wally</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>14</read_token><write_token>14</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Ramone</surname><given_name>Wally</given_name><associated_login><id>14</id><name>Wally Login</name><lang>en</lang><login_id>Wally</login_id><read_token>14</read_token><write_token>14</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1746</user_object_id><security_tokens><value sequence_index="0">14</value></security_tokens></associated_login></value><value sequence_index="2"><id>1749</id><name>Tina</name><lang>en</lang><coords>37.331820,-122.031180</coords><read_token>17</read_token><write_token>17</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.33182</latitude><longitude>-122.03118</longitude><surname>Ramone</surname><given_name>Tina</given_name><associated_login><id>17</id><name>Tina Login</name><lang>en</lang><login_id>Tina</login_id><read_token>17</read_token><write_token>17</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1749</user_object_id><security_tokens><value sequence_index="0">17</value></security_tokens></associated_login></value></deleted_users><deleted_logins><value sequence_index="0"><id>13</id><name>Dilbert Login</name><lang>en</lang><login_id>Dilbert</login_id><read_token>13</read_token><write_token>13</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1745</user_object_id><security_tokens><value sequence_index="0">13</value></security_tokens></value><value sequence_index="1"><id>14</id><name>Wally Login</name><lang>en</lang><login_id>Wally</login_id><read_token>14</read_token><write_token>14</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1746</user_object_id><security_tokens><value sequence_index="0">14</value></security_tokens></value><value sequence_index="2"><id>17</id><name>Tina Login</name><lang>en</lang><login_id>Tina</login_id><read_token>17</read_token><write_token>17</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1749</user_object_id><security_tokens><value sequence_index="0">17</value></security_tokens></value></deleted_logins></people></people>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 71, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 71, $title);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}
?>
