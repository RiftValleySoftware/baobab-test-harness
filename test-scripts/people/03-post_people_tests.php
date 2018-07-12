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

baobab_run_tests(40, 'POST METHOD PEOPLE TESTS', 'Create New Users and Logins. NOTE: in these tests, we "normalize" all the "last_access" and "password" values, so the match works.');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0040() {
    basalt_run_single_direct_test(40, 'Create a Simple, Unadorned User (JSON), with No Associated Login', '', 'people_tests');
}

function basalt_test_0040($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 40A: Try A POST (No Login)';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/people/people/';
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
    
    $title = 'People Test 40B: Try A POST (Normal User Login)';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/people/people/';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MeLeet&password=CoreysGoryStory', NULL, NULL, $result_code);
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
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 40C: Try A POST (Manager Login). This time, it should work.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/people/people/';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"new_user":{"id":1752,"name":"New User 1752","lang":"en","read_token":0,"write_token":12,"last_access":"1970-01-02 00:00:00","writeable":true}}}}';
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

function basalt_test_define_0041() {
    basalt_run_single_direct_test(41, 'Create a Simple, Unadorned User (XML), with No Associated Login', '', 'people_tests');
}

function basalt_test_0041($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 41A: Try A POST (No Login)';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/people/people/';
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
    
    $title = 'People Test 41B: Try A POST (Normal User Login)';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/people/people/';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MeLeet&password=CoreysGoryStory', NULL, NULL, $result_code);
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
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    
    $title = 'People Test 41C: Try A POST (Manager Login). This time, it should work.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/people/people/';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><new_user><id>1752</id><name>New User 1752</name><lang>en</lang><write_token>12</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable></new_user></people></people>';
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

function basalt_test_define_0042() {
    basalt_run_single_direct_test(42, 'Create a Simple, Unadorned Login (JSON)', 'NOTE: Although the password is shown as \'-PASSWORD-\', what is actually returned is a randomly-generated password.', 'people_tests');
}

function basalt_test_0042($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 42A: Try A POST (No Login)';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/people/logins/';
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
    
    $title = 'People Test 42B: Try A POST (Normal User Login)';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/people/logins/';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MeLeet&password=CoreysGoryStory', NULL, NULL, $result_code);
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
    
    $title = 'People Test 42C: Try A POST (Manager Login). This time, will get a 400 error, as we have not supplied a login ID string.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/people/logins/';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
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
    
    $title = 'People Test 42D: Try Again, but this time, supply an empty login string. We should get another 400.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/people/logins/?login_string=';
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
    
    $title = 'People Test 42E: Try again. This time, supply a login string, but the string should be the same as an existing login. We expect a 200, but an empty response.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/people/logins/?login_string=MDAdmin';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 42F: One more time. This time, supply a login string, but the string should be the same as an existing login (that we can\'t see). We expect a 200, but an empty response.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/people/logins/?login_string=Dilbert';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":[]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 42G: OK, OK. Now we supply a valid, unique login. This time, it will work. The password will be "normalized" for comparison, but in reality, we got an auto-generated one.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/people/logins/?login_string=DickFromTheInternet';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":{"new_login":{"id":20,"name":"DickFromTheInternet","lang":"en","login_id":"DickFromTheInternet","read_token":1,"write_token":20,"last_access":"1970-01-02 00:00:00","writeable":true,"security_tokens":[],"password":"-PASSWORD-"}}}}';
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

function basalt_test_define_0043() {
    basalt_run_single_direct_test(43, 'Create a Simple, Unadorned Login (XML)', 'NOTE: Although the password is shown as \'-PASSWORD-\', what is actually returned is a randomly-generated password.', 'people_tests');
}

function basalt_test_0043($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 43A: Try A POST (No Login)';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/people/logins/';
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
    
    $title = 'People Test 43B: Try A POST (Normal User Login)';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/people/logins/';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MeLeet&password=CoreysGoryStory', NULL, NULL, $result_code);
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
    
    $title = 'People Test 43C: Try A POST (Manager Login). This time, will get a 400 error, as we have not supplied a login ID string.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/people/logins/';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 400;
    $expected_result = '';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 43D: Try Again, but this time, supply an empty login string. We should get another 400.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/people/logins/?login_string=';
    $data = NULL;
    $expected_result_code = 400;
    $expected_result = '';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 43E: Try again. This time, supply a login string, but the string should be the same as an existing login. We expect a 200, but an empty response.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/people/logins/?login_string=MDAdmin';
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
    
    $title = 'People Test 43F: One more time. This time, supply a login string, but the string should be the same as an existing login (that we can\'t see). We expect a 200, but an empty response.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/people/logins/?login_string=Dilbert';
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
    
    $title = 'People Test 43G: OK, OK. Now we supply a valid, unique login. This time, it will work. The password will be "normalized" for comparison, but in reality, we got an auto-generated one.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/people/logins/?login_string=DickFromTheInternet';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><new_login><id>20</id><name>DickFromTheInternet</name><lang>en</lang><login_id>DickFromTheInternet</login_id><read_token>1</read_token><write_token>20</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><password>-PASSWORD-</password></new_login></logins></people>';
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

function basalt_test_define_0044() {
    basalt_run_single_direct_test(44, 'Create a Simple, Unadorned User (JSON), with An Associated Login.', 'NOTE: Although the password is shown as \'-PASSWORD-\', what is actually returned is a randomly-generated password.', 'people_tests');
}

function basalt_test_0044($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 44A: Try A POST (Manager Login). However, we try using an existing login. We expect a 400.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/people/people/?login_id=MDAdmin';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
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
    
    $title = 'People Test 44B: Try Again. However, we try using an existing login that we can\'t see. We expect a 400.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/people/people/?login_id=Dilbert';
    $data = NULL;
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
    
    $title = 'People Test 44C: Try Again, with a unique login.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/people/people/?login_id=DickFromTheInternet';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"new_user":{"id":1752,"name":"DickFromTheInternet","lang":"en","read_token":0,"write_token":20,"last_access":"1970-01-02 00:00:00","writeable":true,"associated_login":{"id":20,"name":"DickFromTheInternet","lang":"en","login_id":"DickFromTheInternet","read_token":20,"write_token":20,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1752,"security_tokens":[20],"password":"-PASSWORD-"}}}}}';
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

function basalt_test_define_0045() {
    basalt_run_single_direct_test(45, 'Create a Simple, Unadorned User (XML), with An Associated Login.', 'NOTE: Although the password is shown as \'-PASSWORD-\', what is actually returned is a randomly-generated password.', 'people_tests');
}

function basalt_test_0045($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 45A: Try A POST (Manager Login). However, we try using an existing login. We expect a 400.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/people/people/?login_id=MDAdmin';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
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
    
    $title = 'People Test 45B: Try Again. However, we try using an existing login that we can\'t see. We expect a 400.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/people/people/?login_id=Dilbert';
    $data = NULL;
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
    
    $title = 'People Test 45C: Try Again, with a unique login.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/people/people/?login_id=DickFromTheInternet';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><new_user><id>1752</id><name>DickFromTheInternet</name><lang>en</lang><write_token>20</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><associated_login><id>20</id><name>DickFromTheInternet</name><lang>en</lang><login_id>DickFromTheInternet</login_id><read_token>20</read_token><write_token>20</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1752</user_object_id><security_tokens><value sequence_index="0">20</value></security_tokens><password>-PASSWORD-</password></associated_login></new_user></people></people>';
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
?>
