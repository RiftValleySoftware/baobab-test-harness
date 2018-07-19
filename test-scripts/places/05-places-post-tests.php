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

baobab_run_tests(104, '104-105 : PLACES POST TESTS', '');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0104() {
    basalt_run_single_direct_test(104, 'Create New Places (JSON)', 'Using POST, We Create New Places In Several Ways.', 'places_tests_2');
}

function basalt_test_0104($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 104A: Do Not Log In, and Try to Create a Simple, Unadorned Place. We Expect This to Fail With A 403 (Forbidden).';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/places';
    $data = NULL;
    $api_key = '';
    $expected_result_code = 403;
    $expected_result = '';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 104, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 104, $title);
    }
    
    $title = 'Places Test 104B: Create a Simple, Unadorned Place.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/places';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = '{"places":{"new_place":{"id":1752,"name":"Base Class Instance ()","lang":"en","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 104, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 104, $title);
    }
    
    $title = 'Places Test 104C: Create a Place With Address Information But No Long/Lat.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/places?name=Another+New+Place&address_venue=The+Social+Security+Administration&address_extra_information=1100+West+High+Rise&address_street_address=6401+Security+Blvd.&address_town=Baltimore&address_county=Baltimore&address_state=MD&address_postal_code=21235&address_nation=USA';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"new_place":{"id":1753,"name":"Another New Place","lang":"en","address":"The Social Security Administration (1100 West High Rise), 6401 Security Blvd., Baltimore, MD 21235 USA","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"address_elements":{"venue":"The Social Security Administration","street_address":"6401 Security Blvd.","extra_information":"1100 West High Rise","town":"Baltimore","county":"Baltimore","state":"MD","postal_code":"21235","nation":"USA"}}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 104, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 104, $title);
    }
    
    $title = 'Places Test 104D: Create the Same Place, but Do A Geocode, and add tags.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/places?name=And+Another+New+Place&address_venue=The+Social+Security+Administration&address_extra_information=1100+West+High+Rise&address_street_address=6401+Security+Blvd.&address_town=Baltimore&address_county=Baltimore&address_state=MD&address_postal_code=21235&address_nation=USA&geocode&tag8=TAG=8&tag9=TAG-9';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"new_place":{"id":1754,"name":"And Another New Place","lang":"en","coords":"39.311331,-76.725716","address":"The Social Security Administration (1100 West High Rise), 6401 Security Blvd., Baltimore, MD 21235 USA","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.311331,"longitude":-76.725716,"address_elements":{"venue":"The Social Security Administration","street_address":"6401 Security Blvd.","extra_information":"1100 West High Rise","town":"Baltimore","county":"Baltimore","state":"MD","postal_code":"21235","nation":"USA"},"tag8":"TAG=8","tag9":"TAG-9"}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 104, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 104, $title);
    }
    
    $title = 'Places Test 104E: Create the Same Place, but with no address, and do a reverse geocode.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/json/places?name=And+Yet+Another+New+Place&latitude=39.311331&longitude=-76.725716&reverse-geocode&tag8=TAG=8&tag9=TAG-9';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"new_place":{"id":1755,"name":"And Yet Another New Place","lang":"en","coords":"39.311331,-76.725716","address":"6401 Security Boulevard, Woodlawn, MD 21207 US","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.311331,"longitude":-76.725716,"address_elements":{"street_address":"6401 Security Boulevard","town":"Woodlawn","county":"Baltimore County","state":"MD","postal_code":"21207","nation":"US"},"tag8":"TAG=8","tag9":"TAG-9"}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 104, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 104, $title);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0105() {
    basalt_run_single_direct_test(105, 'Create New Places (XML)', 'Using POST, We Create New Places In Several Ways.', 'places_tests_2');
}

function basalt_test_0105($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 105A: Do Not Log In, and Try to Create a Simple, Unadorned Place. We Expect This to Fail With A 403 (Forbidden).';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/places';
    $data = NULL;
    $api_key = '';
    $expected_result_code = 403;
    $expected_result = '';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 105, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 105, $title);
    }
    
    $title = 'Places Test 105B: Create a Simple, Unadorned Place.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/places';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MDAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<new_place><id>1752</id><name>Base Class Instance ()</name><lang>en</lang><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable></new_place></places>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 105, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 105, $title);
    }
    
    $title = 'Places Test 105C: Create a Place With Address Information But No Long/Lat.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/places?name=Another+New+Place&address_venue=The+Social+Security+Administration&address_extra_information=1100+West+High+Rise&address_street_address=6401+Security+Blvd.&address_town=Baltimore&address_county=Baltimore&address_state=MD&address_postal_code=21235&address_nation=USA';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<new_place><id>1753</id><name>Another New Place</name><lang>en</lang><address>The Social Security Administration (1100 West High Rise), 6401 Security Blvd., Baltimore, MD 21235 USA</address><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><address_elements><venue>The Social Security Administration</venue><street_address>6401 Security Blvd.</street_address><extra_information>1100 West High Rise</extra_information><town>Baltimore</town><county>Baltimore</county><state>MD</state><postal_code>21235</postal_code><nation>USA</nation></address_elements></new_place></places>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 105, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 105, $title);
    }
    
    $title = 'Places Test 105D: Create the Same Place, but Do A Geocode, and add tags.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/places?name=And+Another+New+Place&address_venue=The+Social+Security+Administration&address_extra_information=1100+West+High+Rise&address_street_address=6401+Security+Blvd.&address_town=Baltimore&address_county=Baltimore&address_state=MD&address_postal_code=21235&address_nation=USA&geocode&tag8=TAG=8&tag9=TAG-9';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<new_place><id>1754</id><name>And Another New Place</name><lang>en</lang><coords>39.311331,-76.725716</coords><address>The Social Security Administration (1100 West High Rise), 6401 Security Blvd., Baltimore, MD 21235 USA</address><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.311331</latitude><longitude>-76.725716</longitude><address_elements><venue>The Social Security Administration</venue><street_address>6401 Security Blvd.</street_address><extra_information>1100 West High Rise</extra_information><town>Baltimore</town><county>Baltimore</county><state>MD</state><postal_code>21235</postal_code><nation>USA</nation></address_elements><tag8>TAG=8</tag8><tag9>TAG-9</tag9></new_place></places>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 105, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 105, $title);
    }
    
    $title = 'Places Test 105E: Create the Same Place, but with no address, and do a reverse geocode.';
    $method = 'POST';
    $uri = __SERVER_URI__.'/xml/places?name=And+Yet+Another+New+Place&latitude=39.311331&longitude=-76.725716&reverse-geocode&tag8=TAG=8&tag9=TAG-9';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<new_place><id>1755</id><name>And Yet Another New Place</name><lang>en</lang><coords>39.311331,-76.725716</coords><address>6401 Security Boulevard, Woodlawn, MD 21207 US</address><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.311331</latitude><longitude>-76.725716</longitude><address_elements><street_address>6401 Security Boulevard</street_address><town>Woodlawn</town><county>Baltimore County</county><state>MD</state><postal_code>21207</postal_code><nation>US</nation></address_elements><tag8>TAG=8</tag8><tag9>TAG-9</tag9></new_place></places>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 105, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 105, $title);
    }
    
    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}
?>
