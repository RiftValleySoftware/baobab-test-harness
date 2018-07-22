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

baobab_run_tests(126, '126-129 : THINGS LARGE PUT TESTS', '');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0126() {
    basalt_run_single_direct_test(126, 'BASIC PUT TESTS (JSON)', '', 'things_tests_2');
}

function basalt_test_0126($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Things Test 126A: Change the Names of All the Visible Things (That We Can Edit)';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/json/things/?name=New+Name';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/03-basic-things-put-tests-126A.json');
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 126, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result, false);
        log_entry(true, 126, $title);
    }

    $title = 'Things Test 126B: List All The Things We Can See. We Will Notice A Couple That Weren\'t Changed. These were ones we don\'t have write permission for.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/things/';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"things":[{"id":1732,"name":"New Name","lang":"en","coords":"39.746352,-75.551615"},{"id":1733,"name":"New Name","lang":"en","coords":"39.648316,-77.719232"},{"id":1734,"name":"New Name","lang":"en","coords":"39.746352,-75.551615"},{"id":1735,"name":"New Name","lang":"en","coords":"37.510935,-77.595502"},{"id":1736,"name":"Yosemite","lang":"en","coords":"37.865100,-119.538300"},{"id":1737,"name":"New Name","lang":"en","coords":"37.510937,-77.595505"},{"id":1738,"name":"New Name","lang":"en","coords":"37.510940,-77.595600"},{"id":1739,"name":"Winnie The Pooh","lang":"en","coords":"37.510938,-77.595512"},{"id":1740,"name":"New Name","lang":"en"},{"id":1741,"name":"Singing Pete","lang":"en","coords":"38.871900,-77.056300"},{"id":1742,"name":"New Name","lang":"en"},{"id":1743,"name":"New Name","lang":"en"},{"id":1744,"name":"New Name","lang":"en","coords":"38.871900,-77.056300"}]}';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 126, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 126, $title);
    }

    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0127() {
    basalt_run_single_direct_test(127, 'BASIC PUT TESTS (XML)', '', 'things_tests_2');
}

function basalt_test_0127($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Things Test 127A: Change the Names of All the Visible Things (That We Can Edit)';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/xml/things/?name=New+Name';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('things').file_get_contents(dirname(__FILE__).'/03-basic-things-put-tests-127A.xml');
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 127, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result, false);
        log_entry(true, 127, $title);
    }

    $title = 'Things Test 127B: List All The Things We Can See. We Will Notice A Couple That Weren\'t Changed. These were ones we don\'t have write permission for.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/things/';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('things').'<value sequence_index="0"><id>1732</id><name>New Name</name><lang>en</lang><coords>39.746352,-75.551615</coords></value><value sequence_index="1"><id>1733</id><name>New Name</name><lang>en</lang><coords>39.648316,-77.719232</coords></value><value sequence_index="2"><id>1734</id><name>New Name</name><lang>en</lang><coords>39.746352,-75.551615</coords></value><value sequence_index="3"><id>1735</id><name>New Name</name><lang>en</lang><coords>37.510935,-77.595502</coords></value><value sequence_index="4"><id>1736</id><name>Yosemite</name><lang>en</lang><coords>37.865100,-119.538300</coords></value><value sequence_index="5"><id>1737</id><name>New Name</name><lang>en</lang><coords>37.510937,-77.595505</coords></value><value sequence_index="6"><id>1738</id><name>New Name</name><lang>en</lang><coords>37.510940,-77.595600</coords></value><value sequence_index="7"><id>1739</id><name>Winnie The Pooh</name><lang>en</lang><coords>37.510938,-77.595512</coords></value><value sequence_index="8"><id>1740</id><name>New Name</name><lang>en</lang></value><value sequence_index="9"><id>1741</id><name>Singing Pete</name><lang>en</lang><coords>38.871900,-77.056300</coords></value><value sequence_index="10"><id>1742</id><name>New Name</name><lang>en</lang></value><value sequence_index="11"><id>1743</id><name>New Name</name><lang>en</lang></value><value sequence_index="12"><id>1744</id><name>New Name</name><lang>en</lang><coords>38.871900,-77.056300</coords></value></things>';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 127, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 127, $title);
    }

    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0128() {
    basalt_run_single_direct_test(128, 'DELETE ALL PAYLOADS (JSON)', '', 'things_tests_2');
}

function basalt_test_0128($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Things Test 128A: Delete the Payloads of All the Visible Things (That We Can Edit)';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/json/things/?remove_payload';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/03-basic-things-put-tests-128A.json');
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 128, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result, false);
        log_entry(true, 128, $title);
    }

    $title = 'Things Test 128B: List All The Things We Can Write. There Should Be No Payloads.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/things/?writeable&show_details';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = '{"things":[{"id":1732,"name":"Worth Enough","lang":"en","coords":"39.746352,-75.551615","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.746352,"longitude":-75.551615,"key":"basalt-test-0171: Worth Enough","description":"IMAGE","tag2":"TAG-2-TEST-THINGS","tag3":"TAG-3-TEST-THINGS-1732"},{"id":1733,"name":"Another World","lang":"en","coords":"39.648316,-77.719232","read_token":0,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.648316,"longitude":-77.719232,"key":"basalt-test-0171: Another World","description":"IMAGE","tag2":"TAG-2-TEST-THINGS","tag3":"TAG-3-TEST-THINGS-1733"},{"id":1734,"name":"Top Shot","lang":"en","coords":"39.746352,-75.551615","read_token":1,"write_token":7,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":39.746352,"longitude":-75.551615,"key":"basalt-test-0171: Top Shot","description":"IMAGE","tag2":"TAG-2-TEST-THINGS","tag3":"TAG-3-TEST-THINGS-1734"},{"id":1735,"name":"The Great Shadow","lang":"en","coords":"37.510935,-77.595502","read_token":0,"write_token":11,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.510935,"longitude":-77.595502,"key":"basalt-test-0171: The Great Shadow","description":"TEXT","tag2":"TAG-2-TEST-THINGS","tag3":"TAG-3-TEST-THINGS-1735","tag9":"TAG-9-TEST-THINGS"},{"id":1737,"name":"Tom And Jerry","lang":"en","coords":"37.510937,-77.595505","read_token":0,"write_token":12,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.510937,"longitude":-77.595505,"key":"basalt-test-0171: Tom And Jerry","description":"VIDEO","tag2":"TAG-2-TEST-THINGS","tag3":"TAG-3-TEST-THINGS-1737"},{"id":1738,"name":"Brown And Williamson Phone Message","lang":"en","coords":"37.510940,-77.595600","read_token":1,"write_token":10,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":37.51094,"longitude":-77.5956,"key":"basalt-test-0171: Brown And Williamson Phone Message","description":"AUDIO","tag3":"TAG-3-TEST-THINGS-1738"},{"id":1740,"name":"Crickets","lang":"en","read_token":0,"write_token":8,"last_access":"1970-01-02 00:00:00","writeable":true,"key":"basalt-test-0171: Crickets","description":"AUDIO","tag2":"TAG-2-TEST-THINGS","tag3":"TAG-3-TEST-THINGS-1740"},{"id":1742,"name":"Spinning Earth","lang":"en","read_token":0,"write_token":12,"last_access":"1970-01-02 00:00:00","writeable":true,"key":"basalt-test-0171: Spinning Earth","description":"IMAGE","tag2":"TAG-2-TEST-THINGS","tag3":"TAG-3-TEST-THINGS-1742"},{"id":1743,"name":"The Three Musketeers In Dutch","lang":"en","read_token":0,"write_token":11,"last_access":"1970-01-02 00:00:00","writeable":true,"key":"basalt-test-0171: The Three Musketeers In Dutch","description":"TEXT","tag2":"TAG-2-TEST-THINGS","tag3":"TAG-3-TEST-THINGS-1743","tag9":"TAG-9-TEST-THINGS"},{"id":1744,"name":"The Divine Comedy Illustrated.","lang":"en","coords":"38.871900,-77.056300","read_token":1,"write_token":9,"last_access":"1970-01-02 00:00:00","writeable":true,"latitude":38.8719,"longitude":-77.0563,"key":"basalt-test-0171: The Divine Comedy Illustrated.","description":"EPUB","tag2":"TAG-2-TEST-THINGS","tag3":"TAG-3-TEST-THINGS-1744","tag9":"TAG-9-TEST-THINGS"}]}';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 128, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result, false);
        log_entry(true, 128, $title);
    }

    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}

// --------------------

function basalt_test_define_0129() {
    basalt_run_single_direct_test(129, 'DELETE ALL PAYLOADS (xml)', '', 'things_tests_2');
}

function basalt_test_0129($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Things Test 129A: Delete the Payloads of All the Visible Things (That We Can Edit)';
    $method = 'PUT';
    $uri = __SERVER_URI__.'/xml/things/?remove_payload';
    $data = NULL;
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);
    $expected_result_code = 200;
    $expected_result = get_xml_header('things').file_get_contents(dirname(__FILE__).'/03-basic-things-put-tests-129A.xml');
    $result_code = '';

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 129, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result, false);
        log_entry(true, 129, $title);
    }

    $title = 'Things Test 129B: List All The Things We Can Write. There Should Be No Payloads.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/things/?writeable&show_details';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('things').'<value sequence_index="0"><id>1732</id><name>Worth Enough</name><lang>en</lang><coords>39.746352,-75.551615</coords><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.746352</latitude><longitude>-75.551615</longitude><key>basalt-test-0171: Worth Enough</key><description>IMAGE</description><tag2>TAG-2-TEST-THINGS</tag2><tag3>TAG-3-TEST-THINGS-1732</tag3></value><value sequence_index="1"><id>1733</id><name>Another World</name><lang>en</lang><coords>39.648316,-77.719232</coords><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.648316</latitude><longitude>-77.719232</longitude><key>basalt-test-0171: Another World</key><description>IMAGE</description><tag2>TAG-2-TEST-THINGS</tag2><tag3>TAG-3-TEST-THINGS-1733</tag3></value><value sequence_index="2"><id>1734</id><name>Top Shot</name><lang>en</lang><coords>39.746352,-75.551615</coords><read_token>1</read_token><write_token>7</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>39.746352</latitude><longitude>-75.551615</longitude><key>basalt-test-0171: Top Shot</key><description>IMAGE</description><tag2>TAG-2-TEST-THINGS</tag2><tag3>TAG-3-TEST-THINGS-1734</tag3></value><value sequence_index="3"><id>1735</id><name>The Great Shadow</name><lang>en</lang><coords>37.510935,-77.595502</coords><write_token>11</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.510935</latitude><longitude>-77.595502</longitude><key>basalt-test-0171: The Great Shadow</key><description>TEXT</description><tag2>TAG-2-TEST-THINGS</tag2><tag3>TAG-3-TEST-THINGS-1735</tag3><tag9>TAG-9-TEST-THINGS</tag9></value><value sequence_index="4"><id>1737</id><name>Tom And Jerry</name><lang>en</lang><coords>37.510937,-77.595505</coords><write_token>12</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.510937</latitude><longitude>-77.595505</longitude><key>basalt-test-0171: Tom And Jerry</key><description>VIDEO</description><tag2>TAG-2-TEST-THINGS</tag2><tag3>TAG-3-TEST-THINGS-1737</tag3></value><value sequence_index="5"><id>1738</id><name>Brown And Williamson Phone Message</name><lang>en</lang><coords>37.510940,-77.595600</coords><read_token>1</read_token><write_token>10</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>37.51094</latitude><longitude>-77.5956</longitude><key>basalt-test-0171: Brown And Williamson Phone Message</key><description>AUDIO</description><tag3>TAG-3-TEST-THINGS-1738</tag3></value><value sequence_index="6"><id>1740</id><name>Crickets</name><lang>en</lang><write_token>8</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><key>basalt-test-0171: Crickets</key><description>AUDIO</description><tag2>TAG-2-TEST-THINGS</tag2><tag3>TAG-3-TEST-THINGS-1740</tag3></value><value sequence_index="7"><id>1742</id><name>Spinning Earth</name><lang>en</lang><write_token>12</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><key>basalt-test-0171: Spinning Earth</key><description>IMAGE</description><tag2>TAG-2-TEST-THINGS</tag2><tag3>TAG-3-TEST-THINGS-1742</tag3></value><value sequence_index="8"><id>1743</id><name>The Three Musketeers In Dutch</name><lang>en</lang><write_token>11</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><key>basalt-test-0171: The Three Musketeers In Dutch</key><description>TEXT</description><tag2>TAG-2-TEST-THINGS</tag2><tag3>TAG-3-TEST-THINGS-1743</tag3><tag9>TAG-9-TEST-THINGS</tag9></value><value sequence_index="9"><id>1744</id><name>The Divine Comedy Illustrated.</name><lang>en</lang><coords>38.871900,-77.056300</coords><read_token>1</read_token><write_token>9</write_token><last_access>1970-01-02 00:00:00</last_access><writeable>1</writeable><latitude>38.8719</latitude><longitude>-77.0563</longitude><key>basalt-test-0171: The Divine Comedy Illustrated.</key><description>EPUB</description><tag2>TAG-2-TEST-THINGS</tag2><tag3>TAG-3-TEST-THINGS-1744</tag3><tag9>TAG-9-TEST-THINGS</tag9></value></things>';    

    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 129, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result, false);
        log_entry(true, 129, $title);
    }

    call_REST_API('GET', __SERVER_URI__.'/logout', NULL, $api_key, $result_code);
}
?>
