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

baobab_run_tests(52, 'PUT METHOD PEOPLE TESTS (PART 1)', '');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0052() {
    basalt_run_single_direct_test(52, 'Make A Couple of Simple Changes, Testing Each Type of Login (JSON).', 'We try changing the name of resources, with differing access levels.', 'people_tests');
}

function basalt_test_0052($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 52A: Try to Change the Name of A User Without Logging In (Expect a 400).';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/json/people/people/1725?name=Bob';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 400;
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
    
    $title = 'People Test 52B: Try to Change the Name of A User After Logging In As Another User (Expect a 403).';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/json/people/people/1725?name=Bob';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=VAAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
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
    
    $title = 'People Test 52C: Try to Change Our Own Name Via \'my_info\'. This should Work.';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/json/people/people/my_info?name=Bob';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"changed_users":[{"before":{"id":1726,"name":"VAAdmin","lang":"en","coords":"38.871900,-77.056300","read_token":0,"write_token":8,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8719,"longitude":-77.0563,"is_manager":false,"is_main_admin":false,"associated_login_id":8},"after":{"id":1726,"name":"Bob","lang":"en","coords":"38.871900,-77.056300","read_token":0,"write_token":8,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8719,"longitude":-77.0563,"is_manager":false,"is_main_admin":false,"associated_login_id":8}}]}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 52D: Try to Change Our Own Name Via ID. This should Work.';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/json/people/people/1726?name=VAAdmin';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"changed_users":[{"before":{"id":1726,"name":"Bob","lang":"en","coords":"38.871900,-77.056300","read_token":0,"write_token":8,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8719,"longitude":-77.0563,"is_manager":false,"is_main_admin":false,"associated_login_id":8},"after":{"id":1726,"name":"VAAdmin","lang":"en","coords":"38.871900,-77.056300","read_token":0,"write_token":8,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8719,"longitude":-77.0563,"is_manager":false,"is_main_admin":false,"associated_login_id":8}}]}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 52E: Try to Change Our Own Password Via \'my_info\'. This should fail, but \'gently,\' as we tried doing this to the user resource, which has no password. No changes were made.';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/json/people/people/my_info?password=NewPassword';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":[]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 52F: Try to Change Our Own Password Via the login \'my_info\'. This should work. Note that the API key in the "after" object is now invalid, so if we try a \'my_info\' after this, it should fail, as we are no longer logged in.';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/json/people/logins/my_info?password=NewPassword';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":{"changed_logins":[{"before":{"id":8,"name":"Virginia Login","lang":"en","login_id":"VAAdmin","read_token":8,"write_token":8,"last_access":"1970-01-02 00:00:00","writeable":true,"current_login":true,"user_object_id":1726,"is_manager":false,"is_main_admin":false,"security_tokens":[8],"current_api_key":true},"after":{"id":8,"name":"Virginia Login","lang":"en","login_id":"VAAdmin","read_token":8,"write_token":8,"last_access":"1970-01-02 00:00:00","writeable":true,"current_login":true,"user_object_id":1726,"is_manager":false,"is_main_admin":false,"security_tokens":[8],"password":"NewPassword"}}]}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code), 'NewPassword');
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 52G: Try a \'my_info\'. This should fail with a 401.';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/json/people/logins/my_info';
    $data = NULL;
    $expected_result_code = 401;
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
    
    echo('<h3>People Test 52G: This One Is Complicated: We log in three users, then change the password of one, and make sure it gets logged out.</h3>');
    $api_key1 = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $api_key2 = call_REST_API('GET', __SERVER_URI__.'/login?login_id=DCAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $api_key3 = call_REST_API('GET', __SERVER_URI__.'/login?login_id=DEAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);

    $title = '-> Verify that the Maryland Admin is Properly Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"my_info":{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.2858,"longitude":-76.6131,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login_id":7}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key1, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = '-> Verify that the DC Admin is Properly Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"my_info":{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200","read_token":0,"write_token":9,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8893,"longitude":-77.0502,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login_id":9}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key2, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = '-> Verify that the Delaware Admin is Properly Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"my_info":{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800","read_token":0,"write_token":11,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.7391,"longitude":-75.5398,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login_id":11}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key3, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'We are also logged in as the "God" Admin, and will use that to change the password for the DC Admin';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/json/people/logins/9?password=ThisIsANewPassword';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":{"changed_logins":[{"before":{"id":9,"name":"Washington DC Login","lang":"en","login_id":"DCAdmin","read_token":9,"write_token":9,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1727,"is_manager":false,"is_main_admin":false,"security_tokens":[9],"current_api_key":true,"api_key":"'.$api_key2.'","api_key_age_in_seconds":1},"after":{"id":9,"name":"Washington DC Login","lang":"en","login_id":"DCAdmin","read_token":9,"write_token":9,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1727,"is_manager":false,"is_main_admin":false,"security_tokens":[9],"password":"ThisIsANewPassword"}}]}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code), 'ThisIsANewPassword');
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    echo('<h3>Note that the API Key is now gone. Let\'s try the \'my_info\' tests again, and we expect a 401 on the DC one:</h3>');

    $title = '-> Verify that the Maryland Admin is Properly Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"my_info":{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.2858,"longitude":-76.6131,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login_id":7}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key1, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = '-> Verify that the DC Admin is No Longer Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/my_info';
    $data = NULL;
    $expected_result_code = 401;
    $expected_result = '';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key2, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = '-> Verify that the Delaware Admin is Properly Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"my_info":{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800","read_token":0,"write_token":11,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.7391,"longitude":-75.5398,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login_id":11}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key3, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key1, $result_code);
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key3, $result_code);
}

// --------------------

function basalt_test_define_0053() {
    basalt_run_single_direct_test(53, 'Make A Couple of Simple Changes, Testing Each Type of Login (XML).', 'We try changing the name of resources, with differing access levels.', 'people_tests');
}

function basalt_test_0053($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 53A: Try to Change the Name of A User Without Logging In (Expect a 400).';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/xml/people/people/1725?name=Bob';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 400;
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
    
    $title = 'People Test 53B: Try to Change the Name of A User After Logging In As Another User (Expect a 403).';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/xml/people/people/1725?name=Bob';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=VAAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
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
    
    $title = 'People Test 53C: Try to Change Our Own Name Via \'my_info\'. This should Work.';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/xml/people/people/my_info?name=Bob';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><changed_users><value sequence_index="0"><before><id>1726</id><name>VAAdmin</name><lang>en</lang><coords>38.871900,-77.056300</coords><write_token>8</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.8719</latitude><longitude>-77.0563</longitude><associated_login_id>8</associated_login_id></before><after><id>1726</id><name>Bob</name><lang>en</lang><coords>38.871900,-77.056300</coords><write_token>8</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.8719</latitude><longitude>-77.0563</longitude><associated_login_id>8</associated_login_id></after></value></changed_users></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 53D: Try to Change Our Own Name Via ID. This should Work.';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/xml/people/people/1726?name=VAAdmin';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><changed_users><value sequence_index="0"><before><id>1726</id><name>Bob</name><lang>en</lang><coords>38.871900,-77.056300</coords><write_token>8</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.8719</latitude><longitude>-77.0563</longitude><associated_login_id>8</associated_login_id></before><after><id>1726</id><name>VAAdmin</name><lang>en</lang><coords>38.871900,-77.056300</coords><write_token>8</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.8719</latitude><longitude>-77.0563</longitude><associated_login_id>8</associated_login_id></after></value></changed_users></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 53E: Try to Change Our Own Password Via \'my_info\'. This should fail, but \'gently,\' as we tried doing this to the user resource, which has no password. No changes were made.';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/xml/people/people/my_info?password=NewPassword';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'</people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 53F: Try to Change Our Own Password Via the login \'my_info\'. This should work. Note that the API key in the "after" object is now invalid, so if we try a \'my_info\' after this, it should fail, as we are no longer logged in.';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/xml/people/logins/my_info?password=NewPassword';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><changed_logins><value sequence_index="0"><before><id>8</id><name>Virginia Login</name><lang>en</lang><login_id>VAAdmin</login_id><read_token>8</read_token><write_token>8</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><current_login>1</current_login><user_object_id>1726</user_object_id><security_tokens><value sequence_index="0">8</value></security_tokens><current_api_key>1</current_api_key></before><after><id>8</id><name>Virginia Login</name><lang>en</lang><login_id>VAAdmin</login_id><read_token>8</read_token><write_token>8</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><current_login>1</current_login><user_object_id>1726</user_object_id><security_tokens><value sequence_index="0">8</value></security_tokens><password>NewPassword</password></after></value></changed_logins></logins></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code), 'NewPassword');
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 53G: Try a \'my_info\'. This should fail with a 401.';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/xml/people/logins/my_info';
    $data = NULL;
    $expected_result_code = 401;
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
    
    echo('<h3>People Test 53G: This One Is Complicated: We log in three users, then change the password of one, and make sure it gets logged out.</h3>');
    $api_key1 = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $api_key2 = call_REST_API('GET', __SERVER_URI__.'/login?login_id=DCAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $api_key3 = call_REST_API('GET', __SERVER_URI__.'/login?login_id=DEAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);

    $title = '-> Verify that the Maryland Admin is Properly Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><my_info><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.2858</latitude><longitude>-76.6131</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login_id>7</associated_login_id></my_info></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key1, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = '-> Verify that the DC Admin is Properly Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><my_info><id>1727</id><name>DCAdmin</name><lang>en</lang><coords>38.889300,-77.050200</coords><write_token>9</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.8893</latitude><longitude>-77.0502</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login_id>9</associated_login_id></my_info></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key2, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = '-> Verify that the Delaware Admin is Properly Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><my_info><id>1729</id><name>DEAdmin</name><lang>en</lang><coords>39.739100,-75.539800</coords><write_token>11</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.7391</latitude><longitude>-75.5398</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login_id>11</associated_login_id></my_info></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key3, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'We are also logged in as the "God" Admin, and will use that to change the password for the DC Admin';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/xml/people/logins/DCAdmin?password=ThisIsANewPassword';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><changed_logins><value sequence_index="0"><before><id>9</id><name>Washington DC Login</name><lang>en</lang><login_id>DCAdmin</login_id><read_token>9</read_token><write_token>9</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1727</user_object_id><security_tokens><value sequence_index="0">9</value></security_tokens><current_api_key>1</current_api_key><api_key>'.$api_key2.'</api_key><api_key_age_in_seconds>1</api_key_age_in_seconds></before><after><id>9</id><name>Washington DC Login</name><lang>en</lang><login_id>DCAdmin</login_id><read_token>9</read_token><write_token>9</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1727</user_object_id><security_tokens><value sequence_index="0">9</value></security_tokens><password>ThisIsANewPassword</password></after></value></changed_logins></logins></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code), 'ThisIsANewPassword');
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    echo('<h3>Note that the API Key is now gone. Let\'s try the \'my_info\' tests again, and we expect a 401 on the DC one:</h3>');

    $title = '-> Verify that the Maryland Admin is Properly Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><my_info><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.2858</latitude><longitude>-76.6131</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login_id>7</associated_login_id></my_info></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key1, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = '-> Verify that the DC Admin is No Longer Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/my_info';
    $data = NULL;
    $expected_result_code = 401;
    $expected_result = '';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key2, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = '-> Verify that the Delaware Admin is Properly Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><my_info><id>1729</id><name>DEAdmin</name><lang>en</lang><coords>39.739100,-75.539800</coords><write_token>11</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.7391</latitude><longitude>-75.5398</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login_id>11</associated_login_id></my_info></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key3, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key1, $result_code);
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key3, $result_code);
}

// --------------------

function basalt_test_define_0054() {
    basalt_run_single_direct_test(54, 'Use the "God" Admin to Change A Login ID (JSON).', '', 'people_tests');
}

function basalt_test_0054($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    echo('<h3>People Test 54A: This One Is Complicated: We log in three users, then change the Login ID of one, and make sure it gets logged out.</h3>');
    $result_code = '';
    $api_key1 = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $api_key2 = call_REST_API('GET', __SERVER_URI__.'/login?login_id=DCAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $api_key3 = call_REST_API('GET', __SERVER_URI__.'/login?login_id=DEAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);

    $title = '-> Verify that the Maryland Admin is Properly Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"my_info":{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.2858,"longitude":-76.6131,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login_id":7}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key1, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = '-> Verify that the DC Admin is Properly Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"my_info":{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200","read_token":0,"write_token":9,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8893,"longitude":-77.0502,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login_id":9}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key2, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = '-> Verify that the Delaware Admin is Properly Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"my_info":{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800","read_token":0,"write_token":11,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.7391,"longitude":-75.5398,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login_id":11}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key3, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = 'Try to Change the Login String ID of A User to An Existing Login (Logged In As "God"). This should fail with a 400, and everyone stays logged in.';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/json/people/logins/7?login_string=VAAdmin';
    $data = NULL;
    $expected_result_code = 400;
    $expected_result = '';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = '-> Verify that the Maryland Admin is Properly Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"my_info":{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.2858,"longitude":-76.6131,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login_id":7}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key1, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = '-> Verify that the DC Admin is Properly Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"my_info":{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200","read_token":0,"write_token":9,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8893,"longitude":-77.0502,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login_id":9}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key2, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = '-> Verify that the Delaware Admin is Properly Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"my_info":{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800","read_token":0,"write_token":11,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.7391,"longitude":-75.5398,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login_id":11}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key3, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = 'Try to Change the Login String ID of the MDAdmin User to A Unique One (Logged In As "God"). This should force the "MDAdmin" login out.';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/json/people/logins/MDAdmin?login_string=EhmDeeAdmin';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":{"changed_logins":[{"before":{"id":7,"name":"Maryland Login","lang":"en","login_id":"MDAdmin","read_token":7,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1725,"is_manager":false,"is_main_admin":false,"security_tokens":[7],"current_api_key":true,"api_key":"'.$api_key1.'","api_key_age_in_seconds":1},"after":{"id":7,"name":"Maryland Login","lang":"en","login_id":"EhmDeeAdmin","read_token":7,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1725,"is_manager":false,"is_main_admin":false,"security_tokens":[7]}}]}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = '-> Verify that the Maryland Admin is No Longer Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/my_info';
    $data = NULL;
    $expected_result_code = 401;
    $expected_result = '';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key1, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = '-> Verify that the DC Admin is Properly Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"my_info":{"id":1727,"name":"DCAdmin","lang":"en","coords":"38.889300,-77.050200","read_token":0,"write_token":9,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8893,"longitude":-77.0502,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login_id":9}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key2, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = '-> Verify that the Delaware Admin is Properly Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"my_info":{"id":1729,"name":"DEAdmin","lang":"en","coords":"39.739100,-75.539800","read_token":0,"write_token":11,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.7391,"longitude":-75.5398,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login_id":11}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key3, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key2, $result_code);
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key3, $result_code);

    $title = 'People Test 54B: Try logging in MDAdmin, Using the Old Credentials.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory';
    $api_key = '';
    $data = NULL;
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

    $title = 'People Test 54C: Try logging in EhmDeeAdmin, Using the New Credentials.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/login?login_id=EhmDeeAdmin&password=CoreysGoryStory';
    $api_key = '';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $result);
    } else {
        test_result_good($result_code, $result, $st1, $result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0055() {
    basalt_run_single_direct_test(55, 'Use the "God" Admin to Change A Login ID (XML).', '', 'people_tests');
}

function basalt_test_0055($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    echo('<h3>People Test 55A: This One Is Complicated: We log in three users, then change the Login ID of one, and make sure it gets logged out.</h3>');
    $result_code = '';
    $api_key1 = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $api_key2 = call_REST_API('GET', __SERVER_URI__.'/login?login_id=DCAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $api_key3 = call_REST_API('GET', __SERVER_URI__.'/login?login_id=DEAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=admin&password='.CO_Config::god_mode_password(), NULL, NULL, $result_code);

    $title = '-> Verify that the Maryland Admin is Properly Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><my_info><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.2858</latitude><longitude>-76.6131</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login_id>7</associated_login_id></my_info></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key1, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = '-> Verify that the DC Admin is Properly Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><my_info><id>1727</id><name>DCAdmin</name><lang>en</lang><coords>38.889300,-77.050200</coords><write_token>9</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.8893</latitude><longitude>-77.0502</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login_id>9</associated_login_id></my_info></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key2, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = '-> Verify that the Delaware Admin is Properly Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><my_info><id>1729</id><name>DEAdmin</name><lang>en</lang><coords>39.739100,-75.539800</coords><write_token>11</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.7391</latitude><longitude>-75.5398</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login_id>11</associated_login_id></my_info></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key3, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = 'Try to Change the Login String ID of A User to An Existing Login (Logged In As "God"). This should fail with a 400, and everyone stays logged in.';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/xml/people/logins/7?login_string=VAAdmin';
    $data = NULL;
    $expected_result_code = 400;
    $expected_result = '';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = '-> Verify that the Maryland Admin is Properly Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><my_info><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.2858</latitude><longitude>-76.6131</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login_id>7</associated_login_id></my_info></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key1, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = '-> Verify that the DC Admin is Properly Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><my_info><id>1727</id><name>DCAdmin</name><lang>en</lang><coords>38.889300,-77.050200</coords><write_token>9</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.8893</latitude><longitude>-77.0502</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login_id>9</associated_login_id></my_info></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key2, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = '-> Verify that the Delaware Admin is Properly Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><my_info><id>1729</id><name>DEAdmin</name><lang>en</lang><coords>39.739100,-75.539800</coords><write_token>11</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.7391</latitude><longitude>-75.5398</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login_id>11</associated_login_id></my_info></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key3, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = 'Try to Change the Login String ID of the MDAdmin User to A Unique One (Logged In As "God"). This should force the "MDAdmin" login out.';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/xml/people/logins/MDAdmin?login_string=EhmDeeAdmin';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><changed_logins><value sequence_index="0"><before><id>7</id><name>Maryland Login</name><lang>en</lang><login_id>MDAdmin</login_id><read_token>7</read_token><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1725</user_object_id><security_tokens><value sequence_index="0">7</value></security_tokens><current_api_key>1</current_api_key><api_key>'.$api_key1.'</api_key><api_key_age_in_seconds>1</api_key_age_in_seconds></before><after><id>7</id><name>Maryland Login</name><lang>en</lang><login_id>EhmDeeAdmin</login_id><read_token>7</read_token><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1725</user_object_id><security_tokens><value sequence_index="0">7</value></security_tokens></after></value></changed_logins></logins></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = '-> Verify that the Maryland Admin is No Longer Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/my_info';
    $data = NULL;
    $expected_result_code = 401;
    $expected_result = '';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key1, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = '-> Verify that the DC Admin is Properly Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><my_info><id>1727</id><name>DCAdmin</name><lang>en</lang><coords>38.889300,-77.050200</coords><write_token>9</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.8893</latitude><longitude>-77.0502</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login_id>9</associated_login_id></my_info></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key2, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = '-> Verify that the Delaware Admin is Properly Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><my_info><id>1729</id><name>DEAdmin</name><lang>en</lang><coords>39.739100,-75.539800</coords><write_token>11</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.7391</latitude><longitude>-75.5398</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login_id>11</associated_login_id></my_info></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key3, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key2, $result_code);
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key3, $result_code);

    $title = 'People Test 55B: Try logging in MDAdmin, Using the Old Credentials.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory';
    $api_key = '';
    $data = NULL;
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

    $title = 'People Test 54C: Try logging in EhmDeeAdmin, Using the New Credentials.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/login?login_id=EhmDeeAdmin&password=CoreysGoryStory';
    $api_key = '';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $result);
    } else {
        test_result_good($result_code, $result, $st1, $result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0056() {
    basalt_run_single_direct_test(56, 'Try to Change Our Own Login ID, and Try to Change Another User\'s. Also Change Another User\'s Password as a Manager (JSON).', '', 'people_tests');
}

function basalt_test_0056($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    echo('<h3>People Test 56A: We log in two users: The Main Admin for the DC Area, and the Maryland Admin.</h3>');
    $result_code = '';
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $api_key1 = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);

    $title = '-> Verify that the Main Admin is Properly Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"my_info":{"id":1730,"name":"Main Admin","lang":"en","coords":"38.989700,-76.937800","read_token":1,"write_token":12,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.9897,"longitude":-76.9378,"is_manager":true,"is_main_admin":false,"associated_login_id":12}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = '-> Verify that the Maryland Admin is Properly Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"my_info":{"id":1725,"name":"MDAdmin","lang":"en","coords":"39.285800,-76.613100","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.2858,"longitude":-76.6131,"middle_name":"TAG-2-TEST-PEOPLE","is_manager":false,"is_main_admin":false,"associated_login_id":7}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key1, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'First, we try to change the Maryland Admin\'s Login String ID. This should fail (we\'re not God), do so \'gently,\' as the login ID change is simply ignored.';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/json/people/logins/MDAdmin?login_string=EhmDeeAdmin';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'Next, we change the Maryland Admin\'s password. This should succeed, and it should also log out the Maryland Admin.';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/json/people/logins/MDAdmin?password=NewPassword';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":{"changed_logins":[{"before":{"id":7,"name":"Maryland Login","lang":"en","login_id":"MDAdmin","read_token":7,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1725,"is_manager":false,"is_main_admin":false,"security_tokens":[7],"current_api_key":true},"after":{"id":7,"name":"Maryland Login","lang":"en","login_id":"MDAdmin","read_token":7,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1725,"is_manager":false,"is_main_admin":false,"security_tokens":[7],"password":"NewPassword"}}]}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code), 'NewPassword');
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = '-> Verify that the Maryland Admin is No Longer Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/people/my_info';
    $data = NULL;
    $expected_result_code = 401;
    $expected_result = '';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key1, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0057() {
    basalt_run_single_direct_test(57, 'Try to Change Our Own Login ID, and Try to Change Another User\'s. Also Change Another User\'s Password as a Manager (XML).', '', 'people_tests');
}

function basalt_test_0057($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    echo('<h3>We log in two users: The Main Admin for the DC Area, and the Maryland Admin.</h3>');
    $result_code = '';
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $api_key1 = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);

    $title = '-> Verify that the Main Admin is Properly Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><my_info><id>1730</id><name>Main Admin</name><lang>en</lang><coords>38.989700,-76.937800</coords><read_token>1</read_token><write_token>12</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.9897</latitude><longitude>-76.9378</longitude><is_manager>1</is_manager><associated_login_id>12</associated_login_id></my_info></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = '-> Verify that the Maryland Admin is Properly Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><my_info><id>1725</id><name>MDAdmin</name><lang>en</lang><coords>39.285800,-76.613100</coords><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.2858</latitude><longitude>-76.6131</longitude><middle_name>TAG-2-TEST-PEOPLE</middle_name><associated_login_id>7</associated_login_id></my_info></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key1, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'First, we try to change the Maryland Admin\'s Login String ID. This should fail (we\'re not God), do so \'gently,\' as the login ID change is simply ignored.';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/xml/people/logins/MDAdmin?login_string=EhmDeeAdmin';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'</people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'Next, we change the Maryland Admin\'s password. This should succeed, and it should also log out the Maryland Admin.';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/xml/people/logins/MDAdmin?password=NewPassword';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><changed_logins><value sequence_index="0"><before><id>7</id><name>Maryland Login</name><lang>en</lang><login_id>MDAdmin</login_id><read_token>7</read_token><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1725</user_object_id><security_tokens><value sequence_index="0">7</value></security_tokens><current_api_key>1</current_api_key></before><after><id>7</id><name>Maryland Login</name><lang>en</lang><login_id>MDAdmin</login_id><read_token>7</read_token><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1725</user_object_id><security_tokens><value sequence_index="0">7</value></security_tokens><password>NewPassword</password></after></value></changed_logins></logins></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code), 'NewPassword');
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }

    $title = '-> Verify that the Maryland Admin is No Longer Logged In.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/people/my_info';
    $data = NULL;
    $expected_result_code = 401;
    $expected_result = '';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key1, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}
?>
