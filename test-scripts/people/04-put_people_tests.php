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

baobab_run_tests(52, 'PUT METHOD PEOPLE TESTS', '');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0052() {
    basalt_run_single_direct_test(52, 'Make A Simple Name Change, Testing Each Type of Login (JSON).', 'We try changing the name of resources, with differing access levels.', 'people_tests');
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
    
    $title = 'People Test 52E: Try to Change Our Own Password Via \'my_info\'. This should fail, but \'gently,\' as this is a user operation, and there is no password.';
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
    
    $title = 'People Test 52F: Try to Change Our Own Password Via the login \'my_info\'. This should work. Note that the API key is now invalid, so if we try a \'my_info\' after this, it should fail, as we are no longer logged in.';
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
}

// --------------------

function basalt_test_define_0053() {
    basalt_run_single_direct_test(53, 'Make A Simple Name Change, Testing Each Type of Login (XML).', 'We try changing the name of resources, with differing access levels.', 'people_tests');
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
    
    $title = 'People Test 53E: Try to Change Our Own Password Via \'my_info\'. This should fail, but \'gently,\' as this is a user operation, and there is no password.';
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
    
    $title = 'People Test 53F: Try to Change Our Own Password Via the login \'my_info\'. This should work. Note that the API key is now invalid, so if we try a \'my_info\' after this, it should fail, as we are no longer logged in.';
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
}
?>
