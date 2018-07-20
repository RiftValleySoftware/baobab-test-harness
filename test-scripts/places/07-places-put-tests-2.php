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

baobab_run_tests(108, '108-111: PLACES PUT TESTS PART 2', '');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0108() {
    basalt_run_single_direct_test(108, 'CHANGE A LOT OF DATA IN ONE SINGLE PLACE (JSON)', 'Just Change All The Fields In One Single Place. In This One, We Geocode.', 'places_tests_2');
}

function basalt_test_0108($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 108A: Change One Single Place.';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/json/places/2?name=This+Is+A+New+Name&address_venue=The+Social+Security+Administration&address_extra_information=1100+West+High+Rise&address_street_address=6401+Security+Blvd.&address_town=Baltimore&address_county=Baltimore&address_state=MD&address_postal_code=21235&address_nation=USA&geocode&tag8=TAG=8&tag9=TAG-9';
    $image_data = file_get_contents(dirname(dirname(dirname(__FILE__))).'/places-photos/places-0002.jpg');
    $data = ['data' => $image_data, 'type' => 'image/jpeg'];
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/07-places-put-tests-2-108A.json');
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 108, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 108, $title);
    }

    $title = 'Places Test 108B: Oops. Wrong Picture. Let\'s Give It the Correct One.';
    $image_data = file_get_contents(dirname(__FILE__).'/07-places-put-tests-2-108B.jpg');
    $uri = __SERVER_URI__.'/json/places/2';
    $data['data'] = $image_data;
    $expected_result = file_get_contents(dirname(__FILE__).'/07-places-put-tests-2-108B.json');
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 108, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 108, $title);
    }

    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0109() {
    basalt_run_single_direct_test(109, 'CHANGE A LOT OF DATA IN ONE SINGLE PLACE (XML)', 'Just Change All The Fields In One Single Place. In This One, We Explicitly Assign Long/Lat.', 'places_tests_2');
}

function basalt_test_0109($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 109A: Change One Single Place.';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/xml/places/2?name=This+Is+A+New+Name&address_venue=The+Social+Security+Administration&address_extra_information=1100+West+High+Rise&address_street_address=6401+Security+Blvd.&address_town=Baltimore&address_county=Baltimore&address_state=MD&address_postal_code=21235&address_nation=USA&latitude=39.311331&longitude=-76.725716&tag8=TAG=8&tag9=TAG-9';
    $image_data = file_get_contents(dirname(dirname(dirname(__FILE__))).'/places-photos/places-0002.jpg');
    $data = ['data' => $image_data, 'type' => 'image/jpeg'];
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').file_get_contents(dirname(__FILE__).'/07-places-put-tests-2-109A.xml');
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 109, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 109, $title);
    }

    $title = 'Places Test 109B: Oops. Wrong Picture. Let\'s Give It the Correct One. We\'ll Also Set Incorrect Long/Lat, and Ask for A Geocode.';
    $image_data = file_get_contents(dirname(__FILE__).'/07-places-put-tests-2-108B.jpg');
    $uri = __SERVER_URI__.'/xml/places/2?longitude=123&latitude45&geocode';
    $data['data'] = $image_data;
    $expected_result = get_xml_header('places').file_get_contents(dirname(__FILE__).'/07-places-put-tests-2-109B.xml');
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 109, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 109, $title);
    }

    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0110() {
    basalt_run_single_direct_test(110, 'CHANGE SEVERAL FIELDS FOR MULTIPLE PLACES (JSON)', 'Change A Few Properties of Several Records.', 'places_tests_2');
}

function basalt_test_0110($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 110A: Change Multiple Places.';
    $method = 'PUT';
    $image_data = file_get_contents(dirname(dirname(dirname(__FILE__))).'/images/fail.gif');
    $data = ['data' => $image_data, 'type' => 'image/gif'];
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/07-places-put-tests-2-110A.json');
    $result_code = '';
    $uri = __SERVER_URI__.'/json/places/2,3,4,5,6,7,8,9?name=This+Is+A+New+Name&address_venue=Some+Church,+I+Guess&address_extra_information=&tag8=TAG+8&tag9=TAG+9';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 110, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result, false);
        log_entry(true, 110, $title);
    }
    
    $title = 'Places Test 110B: Let\'s Look At One of Them.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places/5?show_details';
    $data = NULL;

    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/07-places-put-tests-2-110B.json');
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 110, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 110, $title);
    }

    $method = 'PUT';
    $title = 'Places Test 110C: Oops. Wrong Picture. Let\'s Give It the Correct One.';
    $image_data = file_get_contents(dirname(dirname(dirname(__FILE__))).'/images/pass.gif');
    $data = ['data' => $image_data, 'type' => 'image/gif'];
    $uri = __SERVER_URI__.'/json/places/2,3,4,5,6,7,8,9';
    $data['data'] = $image_data;
    $expected_result = file_get_contents(dirname(__FILE__).'/07-places-put-tests-2-110C.json');
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 110, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result, false);
        log_entry(true, 110, $title);
    }
    
    $title = 'Places Test 110D: Let\'s Look At It Again.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places/5?show_details';
    $data = NULL;

    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/07-places-put-tests-2-110D.json');
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 110, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 110, $title);
    }

    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0111() {
    basalt_run_single_direct_test(111, 'CHANGE SEVERAL FIELDS FOR MULTIPLE PLACES (XML)', 'Change A Few Properties of Several Records.', 'places_tests_2');
}

function basalt_test_0111($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 111A: Change Multiple Places.';
    $method = 'PUT';
    $image_data = file_get_contents(dirname(dirname(dirname(__FILE__))).'/images/fail.gif');
    $data = ['data' => $image_data, 'type' => 'image/gif'];
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').file_get_contents(dirname(__FILE__).'/07-places-put-tests-2-111A.xml');
    $result_code = '';
    $uri = __SERVER_URI__.'/xml/places/2,3,4,5,6,7,8,9?name=This+Is+A+New+Name&address_venue=Some+Church,+I+Guess&address_extra_information=&tag8=TAG+8&tag9=TAG+9';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 111, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result, false);
        log_entry(true, 111, $title);
    }
    
    $title = 'Places Test 111B: Let\'s Look At One of Them.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places/5?show_details';
    $data = NULL;

    $expected_result_code = 200;
    $expected_result = get_xml_header('places').file_get_contents(dirname(__FILE__).'/07-places-put-tests-2-111B.xml');
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 111, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 111, $title);
    }

    $method = 'PUT';
    $title = 'Places Test 111C: Oops. Wrong Picture. Let\'s Give It the Correct One.';
    $image_data = file_get_contents(dirname(dirname(dirname(__FILE__))).'/images/pass.gif');
    $data = ['data' => $image_data, 'type' => 'image/gif'];
    $uri = __SERVER_URI__.'/xml/places/2,3,4,5,6,7,8,9';
    $data['data'] = $image_data;
    $expected_result = get_xml_header('places').file_get_contents(dirname(__FILE__).'/07-places-put-tests-2-111C.xml');
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 111, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result, false);
        log_entry(true, 111, $title);
    }
    
    $title = 'Places Test 111D: Let\'s Look At It Again.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places/5?show_details';
    $data = NULL;

    $expected_result_code = 200;
    $expected_result = get_xml_header('places').file_get_contents(dirname(__FILE__).'/07-places-put-tests-2-111D.xml');
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 111, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 111, $title);
    }

    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}
?>
