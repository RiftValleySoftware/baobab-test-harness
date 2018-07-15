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
    $expected_result = '{"people":{"people":{"new_user":{"id":1752,"name":"New User 1752","lang":"en","read_token":1,"write_token":12,"last_access":"1970-01-02 00:00:00","writeable":true,"is_manager":false,"is_main_admin":false}}}}';
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
    $expected_result = get_xml_header('people').'<people><new_user><id>1752</id><name>New User 1752</name><lang>en</lang><read_token>1</read_token><write_token>12</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable></new_user></people></people>';
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
    basalt_run_single_direct_test(42, 'Create a Simple, Unadorned Login (JSON)', '', 'people_tests');
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
    $uri = __SERVER_URI__.'/json/people/logins/?login_id=';
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
    $uri = __SERVER_URI__.'/json/people/logins/?login_id=MDAdmin';
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
    $uri = __SERVER_URI__.'/json/people/logins/?login_id=Dilbert';
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
    
    $title = 'People Test 42G: OK, OK. Now we supply a valid, unique login. This time, it will work.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/people/logins/?login_id=DickFromTheInternet';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":{"new_login":{"id":20,"name":"DickFromTheInternet","lang":"en","login_id":"DickFromTheInternet","read_token":20,"write_token":20,"last_access":"1970-01-02 00:00:00","writeable":true,"is_manager":false,"is_main_admin":false,"security_tokens":[],"password":"-PASSWORD-"}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        $people = json_decode($result)->people->logins;
        $new_password = $people->new_login->password;
        $result = clean_last_access_json($result, $new_password);
        $expected_result = preg_replace('|"password":".*?"|', '"password":"'.$new_password.'"', $expected_result);
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0043() {
    basalt_run_single_direct_test(43, 'Create a Simple, Unadorned Login (XML)', '', 'people_tests');
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
    $uri = __SERVER_URI__.'/xml/people/logins/?login_id=';
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
    $uri = __SERVER_URI__.'/xml/people/logins/?login_id=MDAdmin';
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
    $uri = __SERVER_URI__.'/xml/people/logins/?login_id=Dilbert';
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
    
    $title = 'People Test 43G: OK, OK. Now we supply a valid, unique login. This time, it will work.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/people/logins/?login_id=DickFromTheInternet';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><new_login><id>20</id><name>DickFromTheInternet</name><lang>en</lang><login_id>DickFromTheInternet</login_id><read_token>20</read_token><write_token>20</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><password>-PASSWORD-</password></new_login></logins></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        $people = simplexml_load_string($result)->logins;
        $new_password = $people->new_login->password;
        $result = clean_last_access_xml($result, $new_password);
        $expected_result = preg_replace('|\<password\>.*?\<\/password\>|', '<password>'.$new_password.'</password>', $expected_result);
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0044() {
    basalt_run_single_direct_test(44, 'Create a Simple, Unadorned User (JSON), with An Associated Login.', '', 'people_tests');
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
    $expected_result = '{"people":{"people":{"new_user":{"id":1752,"name":"DickFromTheInternet","lang":"en","read_token":1,"write_token":20,"last_access":"1970-01-02 00:00:00","writeable":true,"is_manager":false,"is_main_admin":false,"associated_login":{"id":20,"name":"DickFromTheInternet","lang":"en","login_id":"DickFromTheInternet","read_token":20,"write_token":20,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1752,"is_manager":false,"is_main_admin":false,"security_tokens":[20],"password":"-PASSWORD-"}}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        $people = json_decode($result)->people->people;
        $new_password = $people->new_user->associated_login->password;
        $result = clean_last_access_json($result, $new_password);
        $expected_result = preg_replace('|"password":".*?"|', '"password":"'.$new_password.'"', $expected_result);
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 44D: Now, try Again, with a unique login, and specify that the new login is a manager.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/people/people/?login_id=RichardFromTheWeb&is_manager';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"new_user":{"id":1753,"name":"RichardFromTheWeb","lang":"en","read_token":1,"write_token":21,"last_access":"1970-01-02 00:00:00","writeable":true,"is_manager":true,"is_main_admin":false,"associated_login":{"id":21,"name":"RichardFromTheWeb","lang":"en","login_id":"RichardFromTheWeb","read_token":21,"write_token":21,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1753,"is_manager":true,"is_main_admin":false,"security_tokens":[21],"password":"-PASSWORD-"}}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        $people = json_decode($result)->people->people;
        $new_password = $people->new_user->associated_login->password;
        $result = clean_last_access_json($result, $new_password);
        $expected_result = preg_replace('|"password":".*?"|', '"password":"'.$new_password.'"', $expected_result);
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0045() {
    basalt_run_single_direct_test(45, 'Create a Simple, Unadorned User (XML), with An Associated Login.', '', 'people_tests');
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
    $expected_result = get_xml_header('people').'<people><new_user><id>1752</id><name>DickFromTheInternet</name><lang>en</lang><read_token>1</read_token><write_token>20</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><associated_login><id>20</id><name>DickFromTheInternet</name><lang>en</lang><login_id>DickFromTheInternet</login_id><read_token>20</read_token><write_token>20</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1752</user_object_id><security_tokens><value sequence_index="0">20</value></security_tokens><password>-PASSWORD-</password></associated_login></new_user></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        $people = simplexml_load_string($result)->people;
        $new_password = $people->new_user->associated_login->password;
        $result = clean_last_access_xml($result, $new_password);
        $expected_result = preg_replace('|\<password\>.*?\<\/password\>|', '<password>'.$new_password.'</password>', $expected_result);
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 45D: Now, try Again, with a unique login, and specify that the new login is a manager.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/people/people/?login_id=RichardFromTheWeb&is_manager';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><new_user><id>1753</id><name>RichardFromTheWeb</name><lang>en</lang><read_token>1</read_token><write_token>21</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><is_manager>1</is_manager><associated_login><id>21</id><name>RichardFromTheWeb</name><lang>en</lang><login_id>RichardFromTheWeb</login_id><read_token>21</read_token><write_token>21</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1753</user_object_id><is_manager>1</is_manager><security_tokens><value sequence_index="0">21</value></security_tokens><password>-PASSWORD-</password></associated_login></new_user></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        $people = simplexml_load_string($result)->people;
        $new_password = $people->new_user->associated_login->password;
        $result = clean_last_access_xml($result, $new_password);
        $expected_result = preg_replace('|\<password\>.*?\<\/password\>|', '<password>'.$new_password.'</password>', $expected_result);
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0046() {
    basalt_run_single_direct_test(46, 'Create a User/Login Pair, with Some Initial Settings (JSON).', '', 'people_tests');
}

function basalt_test_0046($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 46A: Try A POST (Manager Login). We will add some basic parameters to the new object. We try to give a write token outside of our bailiwick, which will be ignored. Some of the provided security tokens will also be ignored.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/people/people/?login_id=DickFromTheInternet&name=Dick&surname=The+Internet&given_name=Dick&middle_name=From&nickname=Troll&tokens=5,6,7,8,9,10,13,14&write_token=5';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"new_user":{"id":1752,"name":"Dick","lang":"en","read_token":1,"write_token":20,"last_access":"1970-01-02 00:00:00","writeable":true,"surname":"The Internet","middle_name":"From","given_name":"Dick","nickname":"Troll","is_manager":false,"is_main_admin":false,"associated_login":{"id":20,"name":"Dick","lang":"en","login_id":"DickFromTheInternet","read_token":20,"write_token":20,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1752,"is_manager":false,"is_main_admin":false,"security_tokens":[7,8,9,10],"password":"-PASSWORD-"}}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        $people = json_decode($result)->people->people;
        $new_password = $people->new_user->associated_login->password;
        $result = clean_last_access_json($result, $new_password);
        $expected_result = preg_replace('|"password":".*?"|', '"password":"'.$new_password.'"', $expected_result);
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 46B: Try A POST Again, but This Time, We Make a Manager (Manager Login). We will add some basic parameters to the new object.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/people/people/?login_id=RichardFromTheWeb&name=Dick&surname=The+Internet&given_name=Dick&middle_name=From&nickname=NiceBoy&tokens=9,10&is_manager';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"new_user":{"id":1753,"name":"Dick","lang":"en","read_token":1,"write_token":21,"last_access":"1970-01-02 00:00:00","writeable":true,"surname":"The Internet","middle_name":"From","given_name":"Dick","nickname":"NiceBoy","is_manager":true,"is_main_admin":false,"associated_login":{"id":21,"name":"Dick","lang":"en","login_id":"RichardFromTheWeb","read_token":21,"write_token":21,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1753,"is_manager":true,"is_main_admin":false,"security_tokens":[9,10],"password":"-PASSWORD-"}}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        $people = json_decode($result)->people->people;
        $new_password = $people->new_user->associated_login->password;
        $result = clean_last_access_json($result, $new_password);
        $expected_result = preg_replace('|"password":".*?"|', '"password":"'.$new_password.'"', $expected_result);
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 46C: Check My Info (Manager Login). Make Sure the new tokens were added to our pool (20 and 21).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/people/logins/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":{"my_info":{"id":12,"name":"Main Admin Login","lang":"en","login_id":"MainAdmin","read_token":12,"write_token":12,"last_access":"1970-01-02 00:00:00","writeable":true,"current_login":true,"user_object_id":1730,"is_manager":true,"is_main_admin":false,"security_tokens":[12,7,8,9,10,11,20,21],"current_api_key":true}}}}';
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

function basalt_test_define_0047() {
    basalt_run_single_direct_test(47, 'Create a User/Login Pair, with Some Initial Settings (XML).', '', 'people_tests');
}

function basalt_test_0047($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 47A: Try A POST (Manager Login). We will add some basic parameters to the new object. We try to give a write token outside of our bailiwick, which will be ignored. Some of the provided security tokens will also be ignored.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/people/people/?login_id=DickFromTheInternet&name=Dick&surname=The+Internet&given_name=Dick&middle_name=From&nickname=Troll&tokens=5,6,7,8,9,10,13,14&write_token=5';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><new_user><id>1752</id><name>Dick</name><lang>en</lang><read_token>1</read_token><write_token>20</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><surname>The Internet</surname><middle_name>From</middle_name><given_name>Dick</given_name><nickname>Troll</nickname><associated_login><id>20</id><name>Dick</name><lang>en</lang><login_id>DickFromTheInternet</login_id><read_token>20</read_token><write_token>20</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1752</user_object_id><security_tokens><value sequence_index="0">7</value><value sequence_index="1">8</value><value sequence_index="2">9</value><value sequence_index="3">10</value></security_tokens><password>-PASSWORD-</password></associated_login></new_user></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        $people = simplexml_load_string($result)->people;
        $new_password = $people->new_user->associated_login->password;
        $result = clean_last_access_xml($result, $new_password);
        $expected_result = preg_replace('|\<password\>.*?\<\/password\>|', '<password>'.$new_password.'</password>', $expected_result);
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 47B: Try A POST Again, but This Time, We Make a Manager (Manager Login). We will add some basic parameters to the new object.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/people/people/?login_id=RichardFromTheWeb&name=Dick&surname=The+Internet&given_name=Dick&middle_name=From&nickname=NiceBoy&tokens=9,10&is_manager';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><new_user><id>1753</id><name>Dick</name><lang>en</lang><read_token>1</read_token><write_token>21</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><surname>The Internet</surname><middle_name>From</middle_name><given_name>Dick</given_name><nickname>NiceBoy</nickname><is_manager>1</is_manager><associated_login><id>21</id><name>Dick</name><lang>en</lang><login_id>RichardFromTheWeb</login_id><read_token>21</read_token><write_token>21</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1753</user_object_id><is_manager>1</is_manager><security_tokens><value sequence_index="0">9</value><value sequence_index="1">10</value></security_tokens><password>-PASSWORD-</password></associated_login></new_user></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        $people = simplexml_load_string($result)->people;
        $new_password = $people->new_user->associated_login->password;
        $result = clean_last_access_xml($result, $new_password);
        $expected_result = preg_replace('|\<password\>.*?\<\/password\>|', '<password>'.$new_password.'</password>', $expected_result);
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 47C: Check My Info (Manager Login). Make Sure the new tokens were added to our pool (20 and 21).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/people/logins/my_info';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><my_info><id>12</id><name>Main Admin Login</name><lang>en</lang><login_id>MainAdmin</login_id><read_token>12</read_token><write_token>12</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><current_login>1</current_login><user_object_id>1730</user_object_id><is_manager>1</is_manager><security_tokens><value sequence_index="0">12</value><value sequence_index="1">7</value><value sequence_index="2">8</value><value sequence_index="3">9</value><value sequence_index="4">10</value><value sequence_index="5">11</value><value sequence_index="6">20</value><value sequence_index="7">21</value></security_tokens><current_api_key>1</current_api_key></my_info></logins></people>';
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

function basalt_test_define_0048() {
    basalt_run_single_direct_test(48, 'Create A Basic Standalone Login Object (JSON)', '', 'people_tests');
}

function basalt_test_0048($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 48A: Try A POST for a standalone Login, Using the Resource Path (Manager Login).';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/people/logins/DickFromTheInternet';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":{"new_login":{"id":20,"name":"DickFromTheInternet","lang":"en","login_id":"DickFromTheInternet","read_token":20,"write_token":20,"last_access":"1970-01-02 00:00:00","writeable":true,"is_manager":false,"is_main_admin":false,"security_tokens":[],"password":"-PASSWORD-"}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        $logins = json_decode($result)->people->logins;
        $new_password = $logins->new_login->password;
        $result = clean_last_access_json($result, $new_password);
        $expected_result = preg_replace('|"password":".*?"|', '"password":"'.$new_password.'"', $expected_result);
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 48B: Try A POST for a standalone Login, Using the alternate "login_string" Query Argument (Manager Login).';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/people/logins/?login_string=RichardFromTheWeb';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"people":{"logins":{"new_login":{"id":21,"name":"RichardFromTheWeb","lang":"en","login_id":"RichardFromTheWeb","read_token":21,"write_token":21,"last_access":"1970-01-02 00:00:00","writeable":true,"is_manager":false,"is_main_admin":false,"security_tokens":[],"password":"-PASSWORD-"}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        $logins = json_decode($result)->people->logins;
        $new_password = $logins->new_login->password;
        $result = clean_last_access_json($result, $new_password);
        $expected_result = preg_replace('|"password":".*?"|', '"password":"'.$new_password.'"', $expected_result);
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0049() {
    basalt_run_single_direct_test(49, 'Create A Basic Standalone Login Object (XML)', '', 'people_tests');
}

function basalt_test_0049($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 49A: Try A POST for a standalone Login, Using the Resource Path (Manager Login).';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/people/logins/DickFromTheInternet';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><new_login><id>20</id><name>DickFromTheInternet</name><lang>en</lang><login_id>DickFromTheInternet</login_id><read_token>20</read_token><write_token>20</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><password>q=*-f1F0gn</password></new_login></logins></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        $logins = simplexml_load_string($result)->logins;
        $new_password = $logins->new_login->password;
        $result = clean_last_access_xml($result, $new_password);
        $expected_result = preg_replace('|\<password\>.*?\<\/password\>|', '<password>'.$new_password.'</password>', $expected_result);
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    $title = 'People Test 49B: Try A POST for a standalone Login, Using the alternate "login_string" Query Argument (Manager Login).';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/people/logins/?login_string=RichardFromTheWeb';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<logins><new_login><id>21</id><name>RichardFromTheWeb</name><lang>en</lang><login_id>RichardFromTheWeb</login_id><read_token>21</read_token><write_token>21</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><password>y92EG50i^O</password></new_login></logins></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        $logins = simplexml_load_string($result)->logins;
        $new_password = $logins->new_login->password;
        $result = clean_last_access_xml($result, $new_password);
        $expected_result = preg_replace('|\<password\>.*?\<\/password\>|', '<password>'.$new_password.'</password>', $expected_result);
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0050() {
    basalt_run_single_direct_test(50, 'Create A User Login Object Pair, With Location Information (JSON)', '', 'people_tests');
}

function basalt_test_0050($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 50A: Try A POST for a standalone Login, Using the Resource Path (Manager Login).';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/people/people/?login_id=ComradeAngryOrange&longitude=-77.0365&latitude=38.8977';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"people":{"people":{"new_user":{"id":1752,"name":"ComradeAngryOrange","lang":"en","coords":"38.897700,-77.036500","read_token":1,"write_token":20,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8977,"longitude":-77.0365,"is_manager":false,"is_main_admin":false,"associated_login":{"id":20,"name":"ComradeAngryOrange","lang":"en","login_id":"ComradeAngryOrange","read_token":20,"write_token":20,"last_access":"1970-01-02 00:00:00","writeable":true,"user_object_id":1752,"is_manager":false,"is_main_admin":false,"security_tokens":[20],"password":"-PASSWORD-"}}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        $logins = json_decode($result)->people->people;
        $new_password = $logins->new_user->associated_login->password;
        $result = clean_last_access_json($result, $new_password);
        $expected_result = preg_replace('|"password":".*?"|', '"password":"'.$new_password.'"', $expected_result);
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0051() {
    basalt_run_single_direct_test(51, 'Create A User Login Object Pair, With Location Information (XML)', '', 'people_tests');
}

function basalt_test_0051($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'People Test 51A: Try A POST for a standalone Login, Using the Resource Path (Manager Login).';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/people/people/?login_id=ComradeAngryOrange&longitude=-77.0365&latitude=38.8977';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('people').'<people><new_user><id>1752</id><name>ComradeAngryOrange</name><lang>en</lang><coords>38.897700,-77.036500</coords><read_token>1</read_token><write_token>20</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.8977</latitude><longitude>-77.0365</longitude><associated_login><id>20</id><name>ComradeAngryOrange</name><lang>en</lang><login_id>ComradeAngryOrange</login_id><read_token>20</read_token><write_token>20</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><user_object_id>1752</user_object_id><security_tokens><value sequence_index="0">20</value></security_tokens><password>-PASSWORD-</password></associated_login></new_user></people></people>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
    } else {
        $logins = simplexml_load_string($result)->people;
        $new_password = $logins->new_user->associated_login->password;
        $result = clean_last_access_xml($result, $new_password);
        $expected_result = preg_replace('|\<password\>.*?\<\/password\>|', '<password>'.$new_password.'</password>', $expected_result);
        test_result_good($result_code, $result, $st1, $expected_result);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}
?>
