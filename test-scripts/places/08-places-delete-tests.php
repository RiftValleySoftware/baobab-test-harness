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

baobab_run_tests(112, '112-113 : PLACES DELETE TESTS', '');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0112() {
    basalt_run_single_direct_test(112, 'VARIOUS DELETE TESTS (JSON)', '', 'places_tests_2');
}

function basalt_test_0112($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 112A: Delete One Single Place (MD Admin)';
    $method = 'DELETE';
    $uri = __SERVER_URI__.'/json/places/2';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"places":{"deleted_places":[{"id":2,"name":"New Start","lang":"en","coords":"39.059283,-76.877007","address":"Queens Chapel United Methodist Church (TEST_EXTRA_INFO-2), 7410 Old Muirkirk Road, Beltsville, MD 20705 USA","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"owner_id":7,"latitude":39.059283,"longitude":-76.877007,"address_elements":{"venue":"Queens Chapel United Methodist Church","street_address":"7410 Old Muirkirk Road","extra_information":"TEST_EXTRA_INFO-2","town":"Beltsville","state":"MD","postal_code":"20705","nation":"USA"},"tag8":"20:00:00","tag9":"TEST_TAG-9-2"}]}}';
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 112, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 112, $title);
    }

    $title = 'Places Test 112B: Delete Multiple Discrete Places (MD Admin)';
    $uri = __SERVER_URI__.'/json/places/3,12,678,789,800';
    $expected_result = '{"places":{"deleted_places":[{"id":3,"name":"Dealing With Feelings","lang":"en","coords":"38.564376,-76.078324","address":"New Way of Life Club (TEST_EXTRA_INFO-3), 742 Race St., Cambridge, MD 21613 USA","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"owner_id":7,"latitude":38.564376,"longitude":-76.078324,"address_elements":{"venue":"New Way of Life Club","street_address":"742 Race St.","extra_information":"TEST_EXTRA_INFO-3","town":"Cambridge","county":"Dorchester","state":"MD","postal_code":"21613","nation":"USA"},"tag8":"12:00:00","tag9":"TEST_TAG-9-3"},{"id":12,"name":"Joy of Recovery","lang":"en","coords":"39.304185,-76.551059","address":"New Life Assembly, 5216 Wright Avenue, Baltimore, MD 21205 USA","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"owner_id":7,"latitude":39.304185,"longitude":-76.551059,"address_elements":{"venue":"New Life Assembly","street_address":"5216 Wright Avenue","town":"Baltimore","county":"Baltimore City","state":"MD","postal_code":"21205","nation":"USA"},"tag8":"19:00:00"},{"id":678,"name":"Message of Recovery","lang":"en","coords":"39.316534,-76.632293","address":"727 Druid Park Lake Dr., Baltimore, MD 21217 USA","read_token":1,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"owner_id":7,"latitude":39.316534,"longitude":-76.632293,"address_elements":{"street_address":"727 Druid Park Lake Dr.","town":"Baltimore","county":"Baltimore City","state":"MD","postal_code":"21217","nation":"USA"},"tag8":"14:00:00"},{"id":789,"name":"Todays Recovery","lang":"en","coords":"39.140463,-77.224896","address":"Seneca Creek Community Church, 13 Firstfield Rd, Gaithersburg, MD 20878 USA","read_token":1,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"owner_id":7,"latitude":39.140463,"longitude":-77.224896,"address_elements":{"venue":"Seneca Creek Community Church","street_address":"13 Firstfield Rd","town":"Gaithersburg","state":"MD","postal_code":"20878","nation":"USA"},"tag8":"19:30:00"},{"id":800,"name":"Live The Literature","lang":"en","coords":"39.413996,-76.576582","address":"St Thomas Episcopal Church, 1108 Providence Road, Towson, MD 21286 USA","read_token":1,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"owner_id":7,"latitude":39.413996,"longitude":-76.576582,"address_elements":{"venue":"St Thomas Episcopal Church","street_address":"1108 Providence Road","town":"Towson","county":"Baltimore","state":"MD","postal_code":"21286","nation":"USA"},"tag8":"19:00:00"}]}}';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 112, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 112, $title);
    }

    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);

    $title = 'Places Test 112C: Delete All Places I Can Edit (WV Admin)';
    $uri = __SERVER_URI__.'/json/places/';
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=WVAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/08-places-delete-tests-112C.json');
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 112, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 112, $title);
    }

    $title = 'Places Test 112D: Try Deleting Places I Have No Rights To (WVAdmin). We Expect a Simple Empty Response';
    $uri = __SERVER_URI__.'/json/places/54';
    $expected_result_code = 200;
    $expected_result = '{"places":[]}';
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 112, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 112, $title);
    }

    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);

    $title = 'Places Test 112E: Try Again, But This Time, With No Login (Error 403).';
    $uri = __SERVER_URI__.'/json/places/54';
    $api_key = NULL;
    $expected_result_code = 403;
    $expected_result = '';
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 112, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 112, $title);
    }
}

// --------------------

function basalt_test_define_0113() {
    basalt_run_single_direct_test(113, 'VARIOUS DELETE TESTS (XML)', '', 'places_tests_2');
}

function basalt_test_0113($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 113A: Delete One Single Place (MD Admin)';
    $method = 'DELETE';
    $uri = __SERVER_URI__.'/xml/places/2';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<deleted_places><value sequence_index="0"><id>2</id><name>New Start</name><lang>en</lang><coords>39.059283,-76.877007</coords><address>Queens Chapel United Methodist Church (TEST_EXTRA_INFO-2), 7410 Old Muirkirk Road, Beltsville, MD 20705 USA</address><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><owner_id>7</owner_id><latitude>39.059283</latitude><longitude>-76.877007</longitude><address_elements><venue>Queens Chapel United Methodist Church</venue><street_address>7410 Old Muirkirk Road</street_address><extra_information>TEST_EXTRA_INFO-2</extra_information><town>Beltsville</town><state>MD</state><postal_code>20705</postal_code><nation>USA</nation></address_elements><tag8>20:00:00</tag8><tag9>TEST_TAG-9-2</tag9></value></deleted_places></places>';
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 113, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 113, $title);
    }

    $title = 'Places Test 113B: Delete Multiple Discrete Places (MD Admin)';
    $uri = __SERVER_URI__.'/xml/places/3,12,678,789,800';
    $expected_result = get_xml_header('places').'<deleted_places><value sequence_index="0"><id>3</id><name>Dealing With Feelings</name><lang>en</lang><coords>38.564376,-76.078324</coords><address>New Way of Life Club (TEST_EXTRA_INFO-3), 742 Race St., Cambridge, MD 21613 USA</address><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><owner_id>7</owner_id><latitude>38.564376</latitude><longitude>-76.078324</longitude><address_elements><venue>New Way of Life Club</venue><street_address>742 Race St.</street_address><extra_information>TEST_EXTRA_INFO-3</extra_information><town>Cambridge</town><county>Dorchester</county><state>MD</state><postal_code>21613</postal_code><nation>USA</nation></address_elements><tag8>12:00:00</tag8><tag9>TEST_TAG-9-3</tag9></value><value sequence_index="1"><id>12</id><name>Joy of Recovery</name><lang>en</lang><coords>39.304185,-76.551059</coords><address>New Life Assembly, 5216 Wright Avenue, Baltimore, MD 21205 USA</address><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><owner_id>7</owner_id><latitude>39.304185</latitude><longitude>-76.551059</longitude><address_elements><venue>New Life Assembly</venue><street_address>5216 Wright Avenue</street_address><town>Baltimore</town><county>Baltimore City</county><state>MD</state><postal_code>21205</postal_code><nation>USA</nation></address_elements><tag8>19:00:00</tag8></value><value sequence_index="2"><id>678</id><name>Message of Recovery</name><lang>en</lang><coords>39.316534,-76.632293</coords><address>727 Druid Park Lake Dr., Baltimore, MD 21217 USA</address><read_token>1</read_token><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><owner_id>7</owner_id><latitude>39.316534</latitude><longitude>-76.632293</longitude><address_elements><street_address>727 Druid Park Lake Dr.</street_address><town>Baltimore</town><county>Baltimore City</county><state>MD</state><postal_code>21217</postal_code><nation>USA</nation></address_elements><tag8>14:00:00</tag8></value><value sequence_index="3"><id>789</id><name>Todays Recovery</name><lang>en</lang><coords>39.140463,-77.224896</coords><address>Seneca Creek Community Church, 13 Firstfield Rd, Gaithersburg, MD 20878 USA</address><read_token>1</read_token><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><owner_id>7</owner_id><latitude>39.140463</latitude><longitude>-77.224896</longitude><address_elements><venue>Seneca Creek Community Church</venue><street_address>13 Firstfield Rd</street_address><town>Gaithersburg</town><state>MD</state><postal_code>20878</postal_code><nation>USA</nation></address_elements><tag8>19:30:00</tag8></value><value sequence_index="4"><id>800</id><name>Live The Literature</name><lang>en</lang><coords>39.413996,-76.576582</coords><address>St Thomas Episcopal Church, 1108 Providence Road, Towson, MD 21286 USA</address><read_token>1</read_token><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><owner_id>7</owner_id><latitude>39.413996</latitude><longitude>-76.576582</longitude><address_elements><venue>St Thomas Episcopal Church</venue><street_address>1108 Providence Road</street_address><town>Towson</town><county>Baltimore</county><state>MD</state><postal_code>21286</postal_code><nation>USA</nation></address_elements><tag8>19:00:00</tag8></value></deleted_places></places>';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 113, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 113, $title);
    }

    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);

    $title = 'Places Test 113C: Delete All Places I Can Edit (WV Admin)';
    $uri = __SERVER_URI__.'/xml/places/';
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=WVAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').file_get_contents(dirname(__FILE__).'/08-places-delete-tests-113C.xml');
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 113, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 113, $title);
    }

    $title = 'Places Test 113D: Try Deleting Places I Have No Rights To (WVAdmin). We Expect a Simple Empty Response';
    $uri = __SERVER_URI__.'/xml/places/54';
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'</places>';
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 113, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 113, $title);
    }

    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);

    $title = 'Places Test 113E: Try Again, But This Time, With No Login (Error 403).';
    $uri = __SERVER_URI__.'/xml/places/54';
    $api_key = NULL;
    $expected_result_code = 403;
    $expected_result = '';
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 113, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 113, $title);
    }
}
?>
