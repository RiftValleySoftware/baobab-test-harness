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

baobab_run_tests(76, 'LOCATION/RADIUS SEARCH TESTS', '');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0076() {
    basalt_run_single_direct_test(76, 'Search For Places (JSON)', 'GET Location Search In the Middle of Baltimore.', 'places_tests');
}

function basalt_test_0076($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 76A: Search 1Km Around Inner Harbor (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_latitude=39.2858&search_longitude=-76.6131&search_radius=1';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"results":[{"id":212,"name":"Recovery At The Harbor","lang":"en","coords":"39.280886,-76.614511","distance_in_km":0.559,"address":"Christ Lutheran Church, 701 South Charles Street, Baltimore, MD 21230 USA"},{"id":73,"name":"Meant to Be","lang":"en","coords":"39.278288,-76.616901","distance_in_km":0.896,"address":"High Rise, 911 Leadenhall Street, Baltimore, MD 21230 USA"},{"id":467,"name":"Grace, Mercy & Peace","lang":"en","coords":"39.277918,-76.615884","distance_in_km":0.907,"address":"Saints Stephen & James Church, 938 South Hanover Street, Baltimore, MD 21230 USA"}],"search_location":{"radius":1,"longitude":-76.6131,"latitude":39.2858}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 76, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 76, $title);
    }
    
    $title = 'Places Test 76B: Search 1Km Around Inner Harbor, with Details (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_latitude=39.2858&search_longitude=-76.6131&search_radius=1&show_details';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"results":[{"id":212,"name":"Recovery At The Harbor","lang":"en","coords":"39.280886,-76.614511","distance_in_km":0.559,"address":"Christ Lutheran Church, 701 South Charles Street, Baltimore, MD 21230 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":39.280886,"longitude":-76.614511,"address_elements":{"venue":"Christ Lutheran Church","street_address":"701 South Charles Street","town":"Baltimore","county":"Baltimore City","state":"MD","postal_code":"21230","nation":"USA"},"tag8":"20:00:00"},{"id":73,"name":"Meant to Be","lang":"en","coords":"39.278288,-76.616901","distance_in_km":0.896,"address":"High Rise, 911 Leadenhall Street, Baltimore, MD 21230 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":39.278288,"longitude":-76.616901,"address_elements":{"venue":"High Rise","street_address":"911 Leadenhall Street","town":"Baltimore","county":"Baltimore City","state":"MD","postal_code":"21230","nation":"USA"},"tag8":"20:00:00"},{"id":467,"name":"Grace, Mercy & Peace","lang":"en","coords":"39.277918,-76.615884","distance_in_km":0.907,"address":"Saints Stephen & James Church, 938 South Hanover Street, Baltimore, MD 21230 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":39.277918,"longitude":-76.615884,"address_elements":{"venue":"Saints Stephen & James Church","street_address":"938 South Hanover Street","town":"Baltimore","county":"Baltimore City","state":"MD","postal_code":"21230","nation":"USA"},"tag8":"9:00:00"}],"search_location":{"radius":1,"longitude":-76.6131,"latitude":39.2858}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 76, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 76, $title);
    }
}

// --------------------

function basalt_test_define_0077() {
    basalt_run_single_direct_test(77, 'Search For Places (XML)', 'GET Location Search In the Middle of Baltimore.', 'places_tests');
}

function basalt_test_0077($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 77A: Search 1Km Around Inner Harbor (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_latitude=39.2858&search_longitude=-76.6131&search_radius=1';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<results><value sequence_index="0"><id>212</id><name>Recovery At The Harbor</name><lang>en</lang><coords>39.280886,-76.614511</coords><distance_in_km>0.559</distance_in_km><address>Christ Lutheran Church, 701 South Charles Street, Baltimore, MD 21230 USA</address></value><value sequence_index="1"><id>73</id><name>Meant to Be</name><lang>en</lang><coords>39.278288,-76.616901</coords><distance_in_km>0.896</distance_in_km><address>High Rise, 911 Leadenhall Street, Baltimore, MD 21230 USA</address></value><value sequence_index="2"><id>467</id><name>Grace, Mercy &amp; Peace</name><lang>en</lang><coords>39.277918,-76.615884</coords><distance_in_km>0.907</distance_in_km><address>Saints Stephen &amp; James Church, 938 South Hanover Street, Baltimore, MD 21230 USA</address></value></results><search_location><radius>1</radius><longitude>-76.6131</longitude><latitude>39.2858</latitude></search_location></places>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 77, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 77, $title);
    }
    
    $title = 'Places Test 77B: Search 1Km Around Inner Harbor, with Details (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_latitude=39.2858&search_longitude=-76.6131&search_radius=1&show_details';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<results><value sequence_index="0"><id>212</id><name>Recovery At The Harbor</name><lang>en</lang><coords>39.280886,-76.614511</coords><distance_in_km>0.559</distance_in_km><address>Christ Lutheran Church, 701 South Charles Street, Baltimore, MD 21230 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>39.280886</latitude><longitude>-76.614511</longitude><address_elements><venue>Christ Lutheran Church</venue><street_address>701 South Charles Street</street_address><town>Baltimore</town><county>Baltimore City</county><state>MD</state><postal_code>21230</postal_code><nation>USA</nation></address_elements><tag8>20:00:00</tag8></value><value sequence_index="1"><id>73</id><name>Meant to Be</name><lang>en</lang><coords>39.278288,-76.616901</coords><distance_in_km>0.896</distance_in_km><address>High Rise, 911 Leadenhall Street, Baltimore, MD 21230 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>39.278288</latitude><longitude>-76.616901</longitude><address_elements><venue>High Rise</venue><street_address>911 Leadenhall Street</street_address><town>Baltimore</town><county>Baltimore City</county><state>MD</state><postal_code>21230</postal_code><nation>USA</nation></address_elements><tag8>20:00:00</tag8></value><value sequence_index="2"><id>467</id><name>Grace, Mercy &amp; Peace</name><lang>en</lang><coords>39.277918,-76.615884</coords><distance_in_km>0.907</distance_in_km><address>Saints Stephen &amp; James Church, 938 South Hanover Street, Baltimore, MD 21230 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>39.277918</latitude><longitude>-76.615884</longitude><address_elements><venue>Saints Stephen &amp; James Church</venue><street_address>938 South Hanover Street</street_address><town>Baltimore</town><county>Baltimore City</county><state>MD</state><postal_code>21230</postal_code><nation>USA</nation></address_elements><tag8>9:00:00</tag8></value></results><search_location><radius>1</radius><longitude>-76.6131</longitude><latitude>39.2858</latitude></search_location></places>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 77, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 77, $title);
    }
}

// --------------------

function basalt_test_define_0078() {
    basalt_run_single_direct_test(78, 'Search For Places (JSON)', 'GET Location Search In A Less Dense Area (WV). This Will Be 10Km Around Seneca Rock.', 'places_tests');
}

function basalt_test_0078($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 78A: Search 10Km Around Seneca Rock, West Virginia (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_latitude=38.8348&search_longitude=-79.3762&search_radius=10';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"results":[],"search_location":{"radius":10,"longitude":-79.3762,"latitude":38.8348}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 78, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 78, $title);
    }
    
    $title = 'Places Test 78B: Search 100Km Around Seneca Rock, West Virginia (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_latitude=38.8348&search_longitude=-79.3762&search_radius=100';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"results":[{"id":900,"name":"No Name","lang":"en","coords":"38.478620,-78.876141","distance_in_km":58.804,"address":"Parkview Mennonite Church, 1600 College Avenue, Harrisonburg, VA 22802 USA"},{"id":1141,"name":"It Can Be Done","lang":"en","coords":"38.450259,-78.869204","distance_in_km":61.404,"address":"First Presbyterian Church, 17 Court Square, Harrisonburg, VA 22802 USA"},{"id":1244,"name":"It Can Be Done","lang":"en","coords":"38.450259,-78.869204","distance_in_km":61.404,"address":"First Presbyterian Church (side entrance, upstairs), 17 Court Square, Harrisonburg, VA 22802 USA"},{"id":1278,"name":"NA @ Mill Creek","lang":"en","coords":"38.757642,-78.673448","distance_in_km":61.649,"address":"Grace United Christ Church, 10492 Orkney Grde, Mt Jackson, VA 22842 USA"},{"id":1004,"name":"Courage To Change","lang":"en","coords":"38.448462,-78.864709","distance_in_km":61.825,"address":"Muhlenberg Lutheran Church, 281 East Market Street, Harrisonburg, VA 22801 USA"},{"id":1358,"name":"Courage To Change","lang":"en","coords":"38.448462,-78.864709","distance_in_km":61.825,"address":"Muhlenberg Lutheran Church, 281 East Market Street, Harrisonburg, VA 22801 USA"},{"id":1390,"name":"Courage To Change","lang":"en","coords":"38.448462,-78.864709","distance_in_km":61.825,"address":"Muhlenberg Lutheran Church, 281 East Market Street, Harrisonburg, VA 22801 USA"},{"id":902,"name":"It Can Be Done","lang":"en","coords":"38.431736,-78.883257","distance_in_km":62.002,"address":"Sunrise Church of the Brethren, 1496 S. Main Street, Harrisonburg, VA 22801 USA"},{"id":1405,"name":"It Can Be Done","lang":"en","coords":"38.431736,-78.883257","distance_in_km":62.002,"address":"Sunrise Church of the Brethren, 1496 S. Main Street, Harrisonburg, VA 22801 USA"},{"id":973,"name":"Never Alone Group","lang":"en","coords":"38.650577,-78.670047","distance_in_km":64.709,"address":"Reformation Lutheran Church, 9283 N. Congress Street, New Market, VA 22844 USA"},{"id":1361,"name":"Finding A New Way to Live","lang":"en","coords":"38.870390,-78.512461","distance_in_km":75.081,"address":"Woodstock Hospital, 759 South Main Street, Woodstock, VA 22664 USA"},{"id":1592,"name":"Hope Not Dope","lang":"en","coords":"39.440050,-78.977693","distance_in_km":75.512,"address":"Grace United Methodist Church, 30 S Mineral St, Keyser, WV 26726 USA"},{"id":1600,"name":"Serenty in Keyser","lang":"en","coords":"39.439644,-78.976670","distance_in_km":75.512,"address":"First United Methodist Church, 32 N. Davis Street, Keyser, WV 26726 USA"},{"id":1054,"name":"Triumph Over Tragedy","lang":"en","coords":"38.152832,-79.089080","distance_in_km":79.739,"address":"Valley Mission, 1513 W. Beverley Street, Staunton, VA 24401 USA"},{"id":1356,"name":"Just For Today","lang":"en","coords":"38.152832,-79.089080","distance_in_km":79.739,"address":"Valley Mission, 1513 W. Beverley Street, Staunton, VA 24401 USA"},{"id":992,"name":"A Chance for Gratitude","lang":"en","coords":"38.149735,-79.074769","distance_in_km":80.465,"address":"Central United Methodist Church, 14 N. Lewis Street, Staunton, VA 24401 USA"},{"id":1103,"name":"A Chance for Gratitude","lang":"en","coords":"38.149735,-79.074769","distance_in_km":80.465,"address":"Central United Methodist Church, 14 N. Lewis Street, Staunton, VA 24401 USA"},{"id":1237,"name":"A Chance for Gratitude","lang":"en","coords":"38.149735,-79.074769","distance_in_km":80.465,"address":"Central United Methodist Church (in basement on Beverly Street), 14 N. Lewis Street, Staunton, VA 24401 USA"},{"id":1411,"name":"Surrender To Win","lang":"en","coords":"38.662490,-78.457434","distance_in_km":82.128,"address":"Christ Episcopal Church, 16 Amiss Avenue, Luray, VA 22835 USA"},{"id":1381,"name":"Triumph Over Tragedy","lang":"en","coords":"38.127363,-79.030087","distance_in_km":84.136,"address":"Valley Community Services Board, 85 Sangers Lane, Staunton, VA 24401 USA"},{"id":1077,"name":"Together We Can","lang":"en","coords":"38.094198,-78.986572","distance_in_km":88.966,"address":"Augusta Medical Center (Community Bldg.), 96 Medical Center Drive, Fishersville, VA 22939 USA"},{"id":1001,"name":"Out of the Cage","lang":"en","coords":"38.986942,-78.364116","distance_in_km":89.393,"address":"Strasburg Christian Church, 165 High Street, Strasburg, VA 22657 USA"},{"id":1270,"name":"Triumph over Tragedy","lang":"en","coords":"38.038071,-79.024765","distance_in_km":93.612,"address":"Calvary United Methodist Church (no smoking on Grounds), 2917 Stuarts Draft Highway, Stuarts Draft, VA 24477 USA"},{"id":1163,"name":"Find A New Way To Live","lang":"en","coords":"38.069123,-78.891484","distance_in_km":94.943,"address":"Main Street Methodist Church, 601 W Main Street, Waynesboro, VA 22980 USA"},{"id":1432,"name":"Find A New Way To Live","lang":"en","coords":"38.069123,-78.891484","distance_in_km":94.943,"address":"Main Street Methodist Church, 601 W Main Street, Waynesboro, VA 22980 USA"},{"id":1441,"name":"Together we can","lang":"en","coords":"38.061728,-78.893316","distance_in_km":95.609,"address":"Waynesboro Library, 600 South Wayne Avenue, Waynesboro, VA 22980 USA"},{"id":1332,"name":"Serene in Green","lang":"en","coords":"38.297809,-78.498627","distance_in_km":96.968,"address":"Mt. Vernon United Methodist Church, 76 Garth Road, Stanardsville, VA 22973 USA"}],"search_location":{"radius":100,"longitude":-79.3762,"latitude":38.8348}}}';    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 78, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 78, $title);
    }
}

// --------------------

function basalt_test_define_0079() {
    basalt_run_single_direct_test(79, 'Search For Places (XML)', 'GET Location Search In A Less Dense Area (WV).', 'places_tests');
}

function basalt_test_0079($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 79A: Search 10Km Around Seneca Rock, West Virginia (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_latitude=38.8348&search_longitude=-79.3762&search_radius=10';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<search_location><radius>10</radius><longitude>-79.3762</longitude><latitude>38.8348</latitude></search_location></places>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 79, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 79, $title);
    }
    
    $title = 'Places Test 79B: Search 100Km Around Seneca Rock, West Virginia (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_latitude=38.8348&search_longitude=-79.3762&search_radius=100';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<results><value sequence_index="0"><id>900</id><name>No Name</name><lang>en</lang><coords>38.478620,-78.876141</coords><distance_in_km>58.804</distance_in_km><address>Parkview Mennonite Church, 1600 College Avenue, Harrisonburg, VA 22802 USA</address></value><value sequence_index="1"><id>1141</id><name>It Can Be Done</name><lang>en</lang><coords>38.450259,-78.869204</coords><distance_in_km>61.404</distance_in_km><address>First Presbyterian Church, 17 Court Square, Harrisonburg, VA 22802 USA</address></value><value sequence_index="2"><id>1244</id><name>It Can Be Done</name><lang>en</lang><coords>38.450259,-78.869204</coords><distance_in_km>61.404</distance_in_km><address>First Presbyterian Church (side entrance, upstairs), 17 Court Square, Harrisonburg, VA 22802 USA</address></value><value sequence_index="3"><id>1278</id><name>NA @ Mill Creek</name><lang>en</lang><coords>38.757642,-78.673448</coords><distance_in_km>61.649</distance_in_km><address>Grace United Christ Church, 10492 Orkney Grde, Mt Jackson, VA 22842 USA</address></value><value sequence_index="4"><id>1004</id><name>Courage To Change</name><lang>en</lang><coords>38.448462,-78.864709</coords><distance_in_km>61.825</distance_in_km><address>Muhlenberg Lutheran Church, 281 East Market Street, Harrisonburg, VA 22801 USA</address></value><value sequence_index="5"><id>1358</id><name>Courage To Change</name><lang>en</lang><coords>38.448462,-78.864709</coords><distance_in_km>61.825</distance_in_km><address>Muhlenberg Lutheran Church, 281 East Market Street, Harrisonburg, VA 22801 USA</address></value><value sequence_index="6"><id>1390</id><name>Courage To Change</name><lang>en</lang><coords>38.448462,-78.864709</coords><distance_in_km>61.825</distance_in_km><address>Muhlenberg Lutheran Church, 281 East Market Street, Harrisonburg, VA 22801 USA</address></value><value sequence_index="7"><id>902</id><name>It Can Be Done</name><lang>en</lang><coords>38.431736,-78.883257</coords><distance_in_km>62.002</distance_in_km><address>Sunrise Church of the Brethren, 1496 S. Main Street, Harrisonburg, VA 22801 USA</address></value><value sequence_index="8"><id>1405</id><name>It Can Be Done</name><lang>en</lang><coords>38.431736,-78.883257</coords><distance_in_km>62.002</distance_in_km><address>Sunrise Church of the Brethren, 1496 S. Main Street, Harrisonburg, VA 22801 USA</address></value><value sequence_index="9"><id>973</id><name>Never Alone Group</name><lang>en</lang><coords>38.650577,-78.670047</coords><distance_in_km>64.709</distance_in_km><address>Reformation Lutheran Church, 9283 N. Congress Street, New Market, VA 22844 USA</address></value><value sequence_index="10"><id>1361</id><name>Finding A New Way to Live</name><lang>en</lang><coords>38.870390,-78.512461</coords><distance_in_km>75.081</distance_in_km><address>Woodstock Hospital, 759 South Main Street, Woodstock, VA 22664 USA</address></value><value sequence_index="11"><id>1592</id><name>Hope Not Dope</name><lang>en</lang><coords>39.440050,-78.977693</coords><distance_in_km>75.512</distance_in_km><address>Grace United Methodist Church, 30 S Mineral St, Keyser, WV 26726 USA</address></value><value sequence_index="12"><id>1600</id><name>Serenty in Keyser</name><lang>en</lang><coords>39.439644,-78.976670</coords><distance_in_km>75.512</distance_in_km><address>First United Methodist Church, 32 N. Davis Street, Keyser, WV 26726 USA</address></value><value sequence_index="13"><id>1054</id><name>Triumph Over Tragedy</name><lang>en</lang><coords>38.152832,-79.089080</coords><distance_in_km>79.739</distance_in_km><address>Valley Mission, 1513 W. Beverley Street, Staunton, VA 24401 USA</address></value><value sequence_index="14"><id>1356</id><name>Just For Today</name><lang>en</lang><coords>38.152832,-79.089080</coords><distance_in_km>79.739</distance_in_km><address>Valley Mission, 1513 W. Beverley Street, Staunton, VA 24401 USA</address></value><value sequence_index="15"><id>992</id><name>A Chance for Gratitude</name><lang>en</lang><coords>38.149735,-79.074769</coords><distance_in_km>80.465</distance_in_km><address>Central United Methodist Church, 14 N. Lewis Street, Staunton, VA 24401 USA</address></value><value sequence_index="16"><id>1103</id><name>A Chance for Gratitude</name><lang>en</lang><coords>38.149735,-79.074769</coords><distance_in_km>80.465</distance_in_km><address>Central United Methodist Church, 14 N. Lewis Street, Staunton, VA 24401 USA</address></value><value sequence_index="17"><id>1237</id><name>A Chance for Gratitude</name><lang>en</lang><coords>38.149735,-79.074769</coords><distance_in_km>80.465</distance_in_km><address>Central United Methodist Church (in basement on Beverly Street), 14 N. Lewis Street, Staunton, VA 24401 USA</address></value><value sequence_index="18"><id>1411</id><name>Surrender To Win</name><lang>en</lang><coords>38.662490,-78.457434</coords><distance_in_km>82.128</distance_in_km><address>Christ Episcopal Church, 16 Amiss Avenue, Luray, VA 22835 USA</address></value><value sequence_index="19"><id>1381</id><name>Triumph Over Tragedy</name><lang>en</lang><coords>38.127363,-79.030087</coords><distance_in_km>84.136</distance_in_km><address>Valley Community Services Board, 85 Sangers Lane, Staunton, VA 24401 USA</address></value><value sequence_index="20"><id>1077</id><name>Together We Can</name><lang>en</lang><coords>38.094198,-78.986572</coords><distance_in_km>88.966</distance_in_km><address>Augusta Medical Center (Community Bldg.), 96 Medical Center Drive, Fishersville, VA 22939 USA</address></value><value sequence_index="21"><id>1001</id><name>Out of the Cage</name><lang>en</lang><coords>38.986942,-78.364116</coords><distance_in_km>89.393</distance_in_km><address>Strasburg Christian Church, 165 High Street, Strasburg, VA 22657 USA</address></value><value sequence_index="22"><id>1270</id><name>Triumph over Tragedy</name><lang>en</lang><coords>38.038071,-79.024765</coords><distance_in_km>93.612</distance_in_km><address>Calvary United Methodist Church (no smoking on Grounds), 2917 Stuarts Draft Highway, Stuarts Draft, VA 24477 USA</address></value><value sequence_index="23"><id>1163</id><name>Find A New Way To Live</name><lang>en</lang><coords>38.069123,-78.891484</coords><distance_in_km>94.943</distance_in_km><address>Main Street Methodist Church, 601 W Main Street, Waynesboro, VA 22980 USA</address></value><value sequence_index="24"><id>1432</id><name>Find A New Way To Live</name><lang>en</lang><coords>38.069123,-78.891484</coords><distance_in_km>94.943</distance_in_km><address>Main Street Methodist Church, 601 W Main Street, Waynesboro, VA 22980 USA</address></value><value sequence_index="25"><id>1441</id><name>Together we can</name><lang>en</lang><coords>38.061728,-78.893316</coords><distance_in_km>95.609</distance_in_km><address>Waynesboro Library, 600 South Wayne Avenue, Waynesboro, VA 22980 USA</address></value><value sequence_index="26"><id>1332</id><name>Serene in Green</name><lang>en</lang><coords>38.297809,-78.498627</coords><distance_in_km>96.968</distance_in_km><address>Mt. Vernon United Methodist Church, 76 Garth Road, Stanardsville, VA 22973 USA</address></value></results><search_location><radius>100</radius><longitude>-79.3762</longitude><latitude>38.8348</latitude></search_location></places>';    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 79, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 79, $title);
    }
}
?>
