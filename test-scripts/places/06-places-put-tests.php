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

baobab_run_tests(106, '106-107: PLACES PUT TESTS PART 1', '');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0106() {
    basalt_run_single_direct_test(106, 'Verify Changed Places (JSON)', '', 'places_tests_2');
}

function basalt_test_0106($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $place_ids = load_places_photos();
    
    if (isset($place_ids) && is_array($place_ids) && count($place_ids)) {
        $title = 'Places Test 106: After Loading 50 Photos, Verify That They All Loaded Correctly.';
        $method = 'GET';
        $uri = __SERVER_URI__.'/json/places/'.implode(',', $place_ids).'?show_details';
        $data = NULL;
        $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
        $expected_result_code = 200;
        $expected_result = file_get_contents(dirname(__FILE__).'/06-places-put-tests-106A.json');
        $result_code = '';
    
        test_header($title, $method, $uri, $expected_result_code);
    
        $st1 = microtime(true);
        $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
        if ($result_code != $expected_result_code) {
            test_result_bad($result_code, $result, $st1, $expected_result);
            log_entry(false, 106, $title);
        } else {
            test_result_good($result_code, $result, $st1, $expected_result, false);
            log_entry(true, 106, $title);
        }
    
        call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    } else {
        echo('<h3 style="color:red">FAILED TO LOAD PHOTOS!</h3>');
        log_entry(false, 106, 'Failed to Load Photos');
    }
}

// --------------------

function basalt_test_define_0107() {
    basalt_run_single_direct_test(107, 'Verify Changed Places (XML)', '', 'places_tests_2');
}

function basalt_test_0107($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $place_ids = load_places_photos();
    
    if (isset($place_ids) && is_array($place_ids) && count($place_ids)) {
        $title = 'Places Test 107: After Loading 50 Photos, Verify That They All Loaded Correctly.';
        $method = 'GET';
        $uri = __SERVER_URI__.'/xml/places/'.implode(',', $place_ids).'?show_details';
        $data = NULL;
        $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
        $expected_result_code = 200;
        $expected_result = get_xml_header('places').file_get_contents(dirname(__FILE__).'/06-places-put-tests-107A.xml');
        $result_code = '';
        test_header($title, $method, $uri, $expected_result_code);
    
        $st1 = microtime(true);
        $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
        if ($result_code != $expected_result_code) {
            test_result_bad($result_code, $result, $st1, $expected_result);
            log_entry(false, 107, $title);
        } else {
            test_result_good($result_code, $result, $st1, $expected_result, false);
            log_entry(true, 107, $title);
        }
    
        call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
    } else {
        echo('<h3 style="color:red">FAILED TO LOAD PHOTOS!</h3>');
        log_entry(false, 107, 'Failed to Load Photos');
    }
}
?>
