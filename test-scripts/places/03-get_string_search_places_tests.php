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

baobab_run_tests(80, '80-101 : STRING SEARCH TESTS', '');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0080() {
    basalt_run_single_direct_test(80, 'Search For Places Using Simple Name (JSON)', 'GET Simple Direct Name Search for \'Just For Today.\'', 'places_tests');
}

function basalt_test_0080($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 80A: Direct Search for \'JUST%20FOR%20TODAY\' in the Name (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_name=JUST%20FOR%20TODAY';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"results":[{"id":36,"name":"Just For Today","lang":"en","coords":"39.001841,-76.875474","address":"Greenbelt Step Club, 143 Centerway Rd., Greenbelt, MD 20768 USA"},{"id":126,"name":"Just For Today","lang":"en","coords":"39.213685,-76.846234","address":"Serenity Center, 9650 Basket Ring Rd., Columbia, MD 21045 USA"},{"id":252,"name":"Just For Today","lang":"en","coords":"39.089914,-76.884800","address":"Laurel Regional Hospital, 7100 Contee Road, Laurel, MD 20707 USA"},{"id":907,"name":"Just For Today","lang":"en","coords":"36.867034,-76.298849","address":"First Lutheran Church, 1301 Colley Avenue, Norfolk, VA 23517 USA"},{"id":909,"name":"Just For Today","lang":"en","coords":"38.787140,-77.451648","address":"St. Marks, 7803 Well St (@ Leland Ave.), Manassas, VA 20111 USA"},{"id":1124,"name":"Just For Today","lang":"en","coords":"39.034220,-77.394755","address":"Community Lutheran Church, 21014 Whitfield Pl, Sterling, VA 20164 USA"},{"id":1356,"name":"Just For Today","lang":"en","coords":"38.152832,-79.089080","address":"Valley Mission, 1513 W. Beverley Street, Staunton, VA 24401 USA"},{"id":1387,"name":"Just for Today","lang":"en","coords":"37.402618,-77.421136","address":"Bellwood Baptist Church, 9138 Quinnford Blvd, North Chesterfield, VA 23237 USA"},{"id":1462,"name":"Just For Today","lang":"en","coords":"38.889818,-76.981679","address":"Mount Moriah Baptist Church, 1636 E Capitol Street NE, Washington, DC 20003 USA"},{"id":1676,"name":"Just For Today","lang":"en","coords":"39.757597,-75.536810","address":"1212 Corporation, 2700 North Washington Street., Wilmington, DE 19802 USA"},{"id":1680,"name":"Just for Today","lang":"en","coords":"39.301083,-75.608130","address":"Asbury Methodist, 20 W. Mt. Vernon St., Smyrna, DE 19977 USA"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 80, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 80, $title);
    }
    
    $title = 'Places Test 80B: Simple Wildcard Search for \'%just for today\' in the Name (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_name=%just+for%20today';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"results":[{"id":36,"name":"Just For Today","lang":"en","coords":"39.001841,-76.875474","address":"Greenbelt Step Club, 143 Centerway Rd., Greenbelt, MD 20768 USA"},{"id":126,"name":"Just For Today","lang":"en","coords":"39.213685,-76.846234","address":"Serenity Center, 9650 Basket Ring Rd., Columbia, MD 21045 USA"},{"id":252,"name":"Just For Today","lang":"en","coords":"39.089914,-76.884800","address":"Laurel Regional Hospital, 7100 Contee Road, Laurel, MD 20707 USA"},{"id":907,"name":"Just For Today","lang":"en","coords":"36.867034,-76.298849","address":"First Lutheran Church, 1301 Colley Avenue, Norfolk, VA 23517 USA"},{"id":909,"name":"Just For Today","lang":"en","coords":"38.787140,-77.451648","address":"St. Marks, 7803 Well St (@ Leland Ave.), Manassas, VA 20111 USA"},{"id":1094,"name":"Living Just For Today","lang":"en","coords":"37.331813,-79.242753","address":"Saint Andrew Pressbyterian Church, 21206 Timberlake Rd., Lynchburg, VA 24502 USA"},{"id":1095,"name":"Living Just for Today","lang":"en","coords":"37.331813,-79.242753","address":"St. Andrews Presbyterian Church, 21206 Timberlake Road, Lynchburg, VA 24502 USA"},{"id":1124,"name":"Just For Today","lang":"en","coords":"39.034220,-77.394755","address":"Community Lutheran Church, 21014 Whitfield Pl, Sterling, VA 20164 USA"},{"id":1355,"name":"Living Just For Today","lang":"en","coords":"37.331813,-79.242753","address":"St. Andrews Presbyterian Church., 21206 Timberlake Road, Lynchburg, VA 24502 USA"},{"id":1356,"name":"Just For Today","lang":"en","coords":"38.152832,-79.089080","address":"Valley Mission, 1513 W. Beverley Street, Staunton, VA 24401 USA"},{"id":1387,"name":"Just for Today","lang":"en","coords":"37.402618,-77.421136","address":"Bellwood Baptist Church, 9138 Quinnford Blvd, North Chesterfield, VA 23237 USA"},{"id":1462,"name":"Just For Today","lang":"en","coords":"38.889818,-76.981679","address":"Mount Moriah Baptist Church, 1636 E Capitol Street NE, Washington, DC 20003 USA"},{"id":1676,"name":"Just For Today","lang":"en","coords":"39.757597,-75.536810","address":"1212 Corporation, 2700 North Washington Street., Wilmington, DE 19802 USA"},{"id":1680,"name":"Just for Today","lang":"en","coords":"39.301083,-75.608130","address":"Asbury Methodist, 20 W. Mt. Vernon St., Smyrna, DE 19977 USA"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 80, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 80, $title);
    }
    
    $title = 'Places Test 80C: Expanded Wildcard Search for \'%juSt+%%20tOdaY%\' in the Name (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_name=%juSt+%%20tOdaY%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"results":[{"id":36,"name":"Just For Today","lang":"en","coords":"39.001841,-76.875474","address":"Greenbelt Step Club, 143 Centerway Rd., Greenbelt, MD 20768 USA"},{"id":126,"name":"Just For Today","lang":"en","coords":"39.213685,-76.846234","address":"Serenity Center, 9650 Basket Ring Rd., Columbia, MD 21045 USA"},{"id":252,"name":"Just For Today","lang":"en","coords":"39.089914,-76.884800","address":"Laurel Regional Hospital, 7100 Contee Road, Laurel, MD 20707 USA"},{"id":907,"name":"Just For Today","lang":"en","coords":"36.867034,-76.298849","address":"First Lutheran Church, 1301 Colley Avenue, Norfolk, VA 23517 USA"},{"id":909,"name":"Just For Today","lang":"en","coords":"38.787140,-77.451648","address":"St. Marks, 7803 Well St (@ Leland Ave.), Manassas, VA 20111 USA"},{"id":1000,"name":"Just 4 Today","lang":"en","coords":"37.309915,-79.949977","address":"Trinity Lutheran Church, 4040 Williamson Road NW, Roanoke, VA 24012 USA"},{"id":1094,"name":"Living Just For Today","lang":"en","coords":"37.331813,-79.242753","address":"Saint Andrew Pressbyterian Church, 21206 Timberlake Rd., Lynchburg, VA 24502 USA"},{"id":1095,"name":"Living Just for Today","lang":"en","coords":"37.331813,-79.242753","address":"St. Andrews Presbyterian Church, 21206 Timberlake Road, Lynchburg, VA 24502 USA"},{"id":1124,"name":"Just For Today","lang":"en","coords":"39.034220,-77.394755","address":"Community Lutheran Church, 21014 Whitfield Pl, Sterling, VA 20164 USA"},{"id":1353,"name":"Just For Today Group","lang":"en","coords":"38.882648,-77.171423","address":"Unity Club, 116 W Broad St, Falls Church, VA USA"},{"id":1355,"name":"Living Just For Today","lang":"en","coords":"37.331813,-79.242753","address":"St. Andrews Presbyterian Church., 21206 Timberlake Road, Lynchburg, VA 24502 USA"},{"id":1356,"name":"Just For Today","lang":"en","coords":"38.152832,-79.089080","address":"Valley Mission, 1513 W. Beverley Street, Staunton, VA 24401 USA"},{"id":1387,"name":"Just for Today","lang":"en","coords":"37.402618,-77.421136","address":"Bellwood Baptist Church, 9138 Quinnford Blvd, North Chesterfield, VA 23237 USA"},{"id":1462,"name":"Just For Today","lang":"en","coords":"38.889818,-76.981679","address":"Mount Moriah Baptist Church, 1636 E Capitol Street NE, Washington, DC 20003 USA"},{"id":1676,"name":"Just For Today","lang":"en","coords":"39.757597,-75.536810","address":"1212 Corporation, 2700 North Washington Street., Wilmington, DE 19802 USA"},{"id":1680,"name":"Just for Today","lang":"en","coords":"39.301083,-75.608130","address":"Asbury Methodist, 20 W. Mt. Vernon St., Smyrna, DE 19977 USA"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 80, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 80, $title);
    }
    
    $title = 'Places Test 80D: Empty Name Search (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_name=';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"results":[]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 80, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 80, $title);
    }
}

// --------------------

function basalt_test_define_0081() {
    basalt_run_single_direct_test(81, 'Search For Places Using Simple Name (XML)', 'GET Simple Direct Name Search for \'Just For Today.\'', 'places_tests');
}

function basalt_test_0081($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 81A: Direct Search for \'JUST%20FOR%20TODAY\' in the Name (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_name=JUST%20FOR%20TODAY';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<results><value sequence_index="0"><id>36</id><name>Just For Today</name><lang>en</lang><coords>39.001841,-76.875474</coords><address>Greenbelt Step Club, 143 Centerway Rd., Greenbelt, MD 20768 USA</address></value><value sequence_index="1"><id>126</id><name>Just For Today</name><lang>en</lang><coords>39.213685,-76.846234</coords><address>Serenity Center, 9650 Basket Ring Rd., Columbia, MD 21045 USA</address></value><value sequence_index="2"><id>252</id><name>Just For Today</name><lang>en</lang><coords>39.089914,-76.884800</coords><address>Laurel Regional Hospital, 7100 Contee Road, Laurel, MD 20707 USA</address></value><value sequence_index="3"><id>907</id><name>Just For Today</name><lang>en</lang><coords>36.867034,-76.298849</coords><address>First Lutheran Church, 1301 Colley Avenue, Norfolk, VA 23517 USA</address></value><value sequence_index="4"><id>909</id><name>Just For Today</name><lang>en</lang><coords>38.787140,-77.451648</coords><address>St. Marks, 7803 Well St (@ Leland Ave.), Manassas, VA 20111 USA</address></value><value sequence_index="5"><id>1124</id><name>Just For Today</name><lang>en</lang><coords>39.034220,-77.394755</coords><address>Community Lutheran Church, 21014 Whitfield Pl, Sterling, VA 20164 USA</address></value><value sequence_index="6"><id>1356</id><name>Just For Today</name><lang>en</lang><coords>38.152832,-79.089080</coords><address>Valley Mission, 1513 W. Beverley Street, Staunton, VA 24401 USA</address></value><value sequence_index="7"><id>1387</id><name>Just for Today</name><lang>en</lang><coords>37.402618,-77.421136</coords><address>Bellwood Baptist Church, 9138 Quinnford Blvd, North Chesterfield, VA 23237 USA</address></value><value sequence_index="8"><id>1462</id><name>Just For Today</name><lang>en</lang><coords>38.889818,-76.981679</coords><address>Mount Moriah Baptist Church, 1636 E Capitol Street NE, Washington, DC 20003 USA</address></value><value sequence_index="9"><id>1676</id><name>Just For Today</name><lang>en</lang><coords>39.757597,-75.536810</coords><address>1212 Corporation, 2700 North Washington Street., Wilmington, DE 19802 USA</address></value><value sequence_index="10"><id>1680</id><name>Just for Today</name><lang>en</lang><coords>39.301083,-75.608130</coords><address>Asbury Methodist, 20 W. Mt. Vernon St., Smyrna, DE 19977 USA</address></value></results></places>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 81, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 81, $title);
    }
    
    $title = 'Places Test 81B: Simple Wildcard Search for \'%just for today\' in the Name (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_name=%just+for%20today';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<results><value sequence_index="0"><id>36</id><name>Just For Today</name><lang>en</lang><coords>39.001841,-76.875474</coords><address>Greenbelt Step Club, 143 Centerway Rd., Greenbelt, MD 20768 USA</address></value><value sequence_index="1"><id>126</id><name>Just For Today</name><lang>en</lang><coords>39.213685,-76.846234</coords><address>Serenity Center, 9650 Basket Ring Rd., Columbia, MD 21045 USA</address></value><value sequence_index="2"><id>252</id><name>Just For Today</name><lang>en</lang><coords>39.089914,-76.884800</coords><address>Laurel Regional Hospital, 7100 Contee Road, Laurel, MD 20707 USA</address></value><value sequence_index="3"><id>907</id><name>Just For Today</name><lang>en</lang><coords>36.867034,-76.298849</coords><address>First Lutheran Church, 1301 Colley Avenue, Norfolk, VA 23517 USA</address></value><value sequence_index="4"><id>909</id><name>Just For Today</name><lang>en</lang><coords>38.787140,-77.451648</coords><address>St. Marks, 7803 Well St (@ Leland Ave.), Manassas, VA 20111 USA</address></value><value sequence_index="5"><id>1094</id><name>Living Just For Today</name><lang>en</lang><coords>37.331813,-79.242753</coords><address>Saint Andrew Pressbyterian Church, 21206 Timberlake Rd., Lynchburg, VA 24502 USA</address></value><value sequence_index="6"><id>1095</id><name>Living Just for Today</name><lang>en</lang><coords>37.331813,-79.242753</coords><address>St. Andrews Presbyterian Church, 21206 Timberlake Road, Lynchburg, VA 24502 USA</address></value><value sequence_index="7"><id>1124</id><name>Just For Today</name><lang>en</lang><coords>39.034220,-77.394755</coords><address>Community Lutheran Church, 21014 Whitfield Pl, Sterling, VA 20164 USA</address></value><value sequence_index="8"><id>1355</id><name>Living Just For Today</name><lang>en</lang><coords>37.331813,-79.242753</coords><address>St. Andrews Presbyterian Church., 21206 Timberlake Road, Lynchburg, VA 24502 USA</address></value><value sequence_index="9"><id>1356</id><name>Just For Today</name><lang>en</lang><coords>38.152832,-79.089080</coords><address>Valley Mission, 1513 W. Beverley Street, Staunton, VA 24401 USA</address></value><value sequence_index="10"><id>1387</id><name>Just for Today</name><lang>en</lang><coords>37.402618,-77.421136</coords><address>Bellwood Baptist Church, 9138 Quinnford Blvd, North Chesterfield, VA 23237 USA</address></value><value sequence_index="11"><id>1462</id><name>Just For Today</name><lang>en</lang><coords>38.889818,-76.981679</coords><address>Mount Moriah Baptist Church, 1636 E Capitol Street NE, Washington, DC 20003 USA</address></value><value sequence_index="12"><id>1676</id><name>Just For Today</name><lang>en</lang><coords>39.757597,-75.536810</coords><address>1212 Corporation, 2700 North Washington Street., Wilmington, DE 19802 USA</address></value><value sequence_index="13"><id>1680</id><name>Just for Today</name><lang>en</lang><coords>39.301083,-75.608130</coords><address>Asbury Methodist, 20 W. Mt. Vernon St., Smyrna, DE 19977 USA</address></value></results></places>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 81, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 81, $title);
    }
    
    $title = 'Places Test 81C: Expanded Wildcard Search for \'%juSt+%%20tOdaY%\' in the Name (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_name=%juSt+%%20tOdaY%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<results><value sequence_index="0"><id>36</id><name>Just For Today</name><lang>en</lang><coords>39.001841,-76.875474</coords><address>Greenbelt Step Club, 143 Centerway Rd., Greenbelt, MD 20768 USA</address></value><value sequence_index="1"><id>126</id><name>Just For Today</name><lang>en</lang><coords>39.213685,-76.846234</coords><address>Serenity Center, 9650 Basket Ring Rd., Columbia, MD 21045 USA</address></value><value sequence_index="2"><id>252</id><name>Just For Today</name><lang>en</lang><coords>39.089914,-76.884800</coords><address>Laurel Regional Hospital, 7100 Contee Road, Laurel, MD 20707 USA</address></value><value sequence_index="3"><id>907</id><name>Just For Today</name><lang>en</lang><coords>36.867034,-76.298849</coords><address>First Lutheran Church, 1301 Colley Avenue, Norfolk, VA 23517 USA</address></value><value sequence_index="4"><id>909</id><name>Just For Today</name><lang>en</lang><coords>38.787140,-77.451648</coords><address>St. Marks, 7803 Well St (@ Leland Ave.), Manassas, VA 20111 USA</address></value><value sequence_index="5"><id>1000</id><name>Just 4 Today</name><lang>en</lang><coords>37.309915,-79.949977</coords><address>Trinity Lutheran Church, 4040 Williamson Road NW, Roanoke, VA 24012 USA</address></value><value sequence_index="6"><id>1094</id><name>Living Just For Today</name><lang>en</lang><coords>37.331813,-79.242753</coords><address>Saint Andrew Pressbyterian Church, 21206 Timberlake Rd., Lynchburg, VA 24502 USA</address></value><value sequence_index="7"><id>1095</id><name>Living Just for Today</name><lang>en</lang><coords>37.331813,-79.242753</coords><address>St. Andrews Presbyterian Church, 21206 Timberlake Road, Lynchburg, VA 24502 USA</address></value><value sequence_index="8"><id>1124</id><name>Just For Today</name><lang>en</lang><coords>39.034220,-77.394755</coords><address>Community Lutheran Church, 21014 Whitfield Pl, Sterling, VA 20164 USA</address></value><value sequence_index="9"><id>1353</id><name>Just For Today Group</name><lang>en</lang><coords>38.882648,-77.171423</coords><address>Unity Club, 116 W Broad St, Falls Church, VA USA</address></value><value sequence_index="10"><id>1355</id><name>Living Just For Today</name><lang>en</lang><coords>37.331813,-79.242753</coords><address>St. Andrews Presbyterian Church., 21206 Timberlake Road, Lynchburg, VA 24502 USA</address></value><value sequence_index="11"><id>1356</id><name>Just For Today</name><lang>en</lang><coords>38.152832,-79.089080</coords><address>Valley Mission, 1513 W. Beverley Street, Staunton, VA 24401 USA</address></value><value sequence_index="12"><id>1387</id><name>Just for Today</name><lang>en</lang><coords>37.402618,-77.421136</coords><address>Bellwood Baptist Church, 9138 Quinnford Blvd, North Chesterfield, VA 23237 USA</address></value><value sequence_index="13"><id>1462</id><name>Just For Today</name><lang>en</lang><coords>38.889818,-76.981679</coords><address>Mount Moriah Baptist Church, 1636 E Capitol Street NE, Washington, DC 20003 USA</address></value><value sequence_index="14"><id>1676</id><name>Just For Today</name><lang>en</lang><coords>39.757597,-75.536810</coords><address>1212 Corporation, 2700 North Washington Street., Wilmington, DE 19802 USA</address></value><value sequence_index="15"><id>1680</id><name>Just for Today</name><lang>en</lang><coords>39.301083,-75.608130</coords><address>Asbury Methodist, 20 W. Mt. Vernon St., Smyrna, DE 19977 USA</address></value></results></places>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 81, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 81, $title);
    }
    
    $title = 'Places Test 81D: Empty Name Search (Not Logged In)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_name=';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'</places>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 81, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 81, $title);
    }    
}

// --------------------

function basalt_test_define_0082() {
    basalt_run_single_direct_test(82, 'Search For Places Using Venue Name (JSON)', 'GET Simple Direct Venue Search', 'places_tests');
}

function basalt_test_0082($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 82A: Direct Search for \'Grace United Methodist Church\' in the Venue (Not Logged In).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_venue=Grace+United+Methodist+Church';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"results":[{"id":1592,"name":"Hope Not Dope","lang":"en","coords":"39.440050,-78.977693","address":"Grace United Methodist Church, 30 S Mineral St, Keyser, WV 26726 USA"},{"id":1721,"name":"Recovery in the AM","lang":"en","coords":"39.746352,-75.551615","address":"Grace United Methodist Church, 900 North Washington Street, Wilmington, DE 19801 USA"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 82, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 82, $title);
    }
    
    $title = 'Places Test 82B: Wildcard Search for \'Grace%Church\' in the Venue (Not Logged In). This time, we get a bunch, including a name with a typo in it.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_venue=Grace%Church';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"results":[{"id":17,"name":"You Get What You Need","lang":"en","coords":"39.277995,-76.531749","address":"Grace Land United Methodist Church, 6714 Youngstown Ave, Dundalk, MD 21222 USA"},{"id":102,"name":"Recovery 101","lang":"en","coords":"39.278161,-76.531994","address":"Graceland United Methodist Church, 6714 Youngstown Avenue, Dundalk, MD 21222 USA"},{"id":158,"name":"Just the Desire","lang":"en","coords":"39.361616,-76.624006","address":"Grace Methodist Church, 5407 North Charles Street, Baltimore, MD 21210 USA"},{"id":274,"name":"Lighthouse","lang":"en","coords":"39.349467,-76.381543","address":"Grace Pointe Baptist Church, 12029 Eastern Ave., Middle River, MD 21220 USA"},{"id":280,"name":"Circle of Hope","lang":"en","coords":"39.451777,-76.638195","address":"Grace Fellowship Church, 9505 Deerco Rd., Timonium, MD 21093 USA"},{"id":400,"name":"Work Em Or Die","lang":"en","coords":"38.531145,-76.960221","address":"Grace Lutheran Church, 1200 Charles St, La Plata, MD 20646 USA"},{"id":408,"name":"IOUNA Group","lang":"en","coords":"39.278095,-76.531673","address":"Graceland United Methodist Church, 6714 Youngstown Rd., Dundalk, MD 21222 USA"},{"id":949,"name":"Last Connection","lang":"en","coords":"39.157497,-78.178983","address":"Grace Community Church, 2333 Roosevelt Blvd, Winchester, VA 22601 USA"},{"id":1050,"name":"Spiritual Principles","lang":"en","coords":"36.635530,-79.394291","address":"Grace Design Church, 1064 Franklin Turnpike, Danville, VA 24540 USA"},{"id":1278,"name":"NA @ Mill Creek","lang":"en","coords":"38.757642,-78.673448","address":"Grace United Christ Church, 10492 Orkney Grde, Mt Jackson, VA 22842 USA"},{"id":1330,"name":"Steps to Recovery","lang":"en","coords":"36.635530,-79.394291","address":"Grace Design Church, 1064 Franklin Turnpike, Danville, VA 24540 USA"},{"id":1476,"name":"New Gift Called Life","lang":"en","coords":"38.872609,-76.972421","address":"Grace Memorial Baptist Church, 2407 Minnesota Avenue SE, Washington, DC 20020 USA"},{"id":1592,"name":"Hope Not Dope","lang":"en","coords":"39.440050,-78.977693","address":"Grace United Methodist Church, 30 S Mineral St, Keyser, WV 26726 USA"},{"id":1621,"name":"Recovery in the AM","lang":"en","coords":"39.746352,-75.551615","address":"Grace United Methosist Church, 900 North Washington Street, Wilmington, DE 19801 USA"},{"id":1626,"name":"Recovery in the AM","lang":"en","coords":"39.746352,-75.551615","address":"Grace United Methosist Church, 900 North Washington Street, Wilmington, DE 19801 USA"},{"id":1646,"name":"Recovery in the AM","lang":"en","coords":"39.746352,-75.551615","address":"Grace United Methosist Church, 900 North Washington Street, Wilmington, DE 19801 USA"},{"id":1704,"name":"Recovery in the AM","lang":"en","coords":"39.746352,-75.551615","address":"Grace United Methosist Church, 900 North Washington Street, Wilmington, DE 19801 USA"},{"id":1721,"name":"Recovery in the AM","lang":"en","coords":"39.746352,-75.551615","address":"Grace United Methodist Church, 900 North Washington Street, Wilmington, DE 19801 USA"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 82, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 82, $title);
    }
    
    $title = 'Places Test 82C: Search for Records With Blank Venue Name.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_venue=';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/03-get_string_search_places_tests-82C.json');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 82, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 82, $title);
    }
}

// --------------------

function basalt_test_define_0083() {
    basalt_run_single_direct_test(83, 'Search For Places Using Venue Name (XML)', 'GET Simple Direct Venue Search', 'places_tests');
}

function basalt_test_0083($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $result_code = '';
    $title = 'Places Test 83A: Direct Search for \'Grace United Methodist Church\' in the Venue (Not Logged In).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_venue=Grace+United+Methodist+Church';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<results><value sequence_index="0"><id>1592</id><name>Hope Not Dope</name><lang>en</lang><coords>39.440050,-78.977693</coords><address>Grace United Methodist Church, 30 S Mineral St, Keyser, WV 26726 USA</address></value><value sequence_index="1"><id>1721</id><name>Recovery in the AM</name><lang>en</lang><coords>39.746352,-75.551615</coords><address>Grace United Methodist Church, 900 North Washington Street, Wilmington, DE 19801 USA</address></value></results></places>';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 83, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 83, $title);
    }
    
    $title = 'Places Test 83B: Wildcard Search for \'Grace%Church\' in the Venue (Not Logged In). This time, we get a bunch, including a name with a typo in it.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_venue=Grace%Church';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<results><value sequence_index="0"><id>17</id><name>You Get What You Need</name><lang>en</lang><coords>39.277995,-76.531749</coords><address>Grace Land United Methodist Church, 6714 Youngstown Ave, Dundalk, MD 21222 USA</address></value><value sequence_index="1"><id>102</id><name>Recovery 101</name><lang>en</lang><coords>39.278161,-76.531994</coords><address>Graceland United Methodist Church, 6714 Youngstown Avenue, Dundalk, MD 21222 USA</address></value><value sequence_index="2"><id>158</id><name>Just the Desire</name><lang>en</lang><coords>39.361616,-76.624006</coords><address>Grace Methodist Church, 5407 North Charles Street, Baltimore, MD 21210 USA</address></value><value sequence_index="3"><id>274</id><name>Lighthouse</name><lang>en</lang><coords>39.349467,-76.381543</coords><address>Grace Pointe Baptist Church, 12029 Eastern Ave., Middle River, MD 21220 USA</address></value><value sequence_index="4"><id>280</id><name>Circle of Hope</name><lang>en</lang><coords>39.451777,-76.638195</coords><address>Grace Fellowship Church, 9505 Deerco Rd., Timonium, MD 21093 USA</address></value><value sequence_index="5"><id>400</id><name>Work Em Or Die</name><lang>en</lang><coords>38.531145,-76.960221</coords><address>Grace Lutheran Church, 1200 Charles St, La Plata, MD 20646 USA</address></value><value sequence_index="6"><id>408</id><name>IOUNA Group</name><lang>en</lang><coords>39.278095,-76.531673</coords><address>Graceland United Methodist Church, 6714 Youngstown Rd., Dundalk, MD 21222 USA</address></value><value sequence_index="7"><id>949</id><name>Last Connection</name><lang>en</lang><coords>39.157497,-78.178983</coords><address>Grace Community Church, 2333 Roosevelt Blvd, Winchester, VA 22601 USA</address></value><value sequence_index="8"><id>1050</id><name>Spiritual Principles</name><lang>en</lang><coords>36.635530,-79.394291</coords><address>Grace Design Church, 1064 Franklin Turnpike, Danville, VA 24540 USA</address></value><value sequence_index="9"><id>1278</id><name>NA @ Mill Creek</name><lang>en</lang><coords>38.757642,-78.673448</coords><address>Grace United Christ Church, 10492 Orkney Grde, Mt Jackson, VA 22842 USA</address></value><value sequence_index="10"><id>1330</id><name>Steps to Recovery</name><lang>en</lang><coords>36.635530,-79.394291</coords><address>Grace Design Church, 1064 Franklin Turnpike, Danville, VA 24540 USA</address></value><value sequence_index="11"><id>1476</id><name>New Gift Called Life</name><lang>en</lang><coords>38.872609,-76.972421</coords><address>Grace Memorial Baptist Church, 2407 Minnesota Avenue SE, Washington, DC 20020 USA</address></value><value sequence_index="12"><id>1592</id><name>Hope Not Dope</name><lang>en</lang><coords>39.440050,-78.977693</coords><address>Grace United Methodist Church, 30 S Mineral St, Keyser, WV 26726 USA</address></value><value sequence_index="13"><id>1621</id><name>Recovery in the AM</name><lang>en</lang><coords>39.746352,-75.551615</coords><address>Grace United Methosist Church, 900 North Washington Street, Wilmington, DE 19801 USA</address></value><value sequence_index="14"><id>1626</id><name>Recovery in the AM</name><lang>en</lang><coords>39.746352,-75.551615</coords><address>Grace United Methosist Church, 900 North Washington Street, Wilmington, DE 19801 USA</address></value><value sequence_index="15"><id>1646</id><name>Recovery in the AM</name><lang>en</lang><coords>39.746352,-75.551615</coords><address>Grace United Methosist Church, 900 North Washington Street, Wilmington, DE 19801 USA</address></value><value sequence_index="16"><id>1704</id><name>Recovery in the AM</name><lang>en</lang><coords>39.746352,-75.551615</coords><address>Grace United Methosist Church, 900 North Washington Street, Wilmington, DE 19801 USA</address></value><value sequence_index="17"><id>1721</id><name>Recovery in the AM</name><lang>en</lang><coords>39.746352,-75.551615</coords><address>Grace United Methodist Church, 900 North Washington Street, Wilmington, DE 19801 USA</address></value></results></places>';    $result_code = '';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 83, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 83, $title);
    }
    
    $title = 'Places Test 83C: Search for Records With Blank Venue Name.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_venue=';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').file_get_contents(dirname(__FILE__).'/03-get_string_search_places_tests-83C.xml');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 83, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 83, $title);
    }
}

// --------------------

function basalt_test_define_0084() {
    basalt_run_single_direct_test(84, 'Search For Places Using Street Address (JSON)', 'GET Simple Direct Address Search', 'places_tests');
}

function basalt_test_0084($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 84A: Direct Search for \'5407 North Charles Street\' in the Street Address (Not Logged In).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_street_address=5407+North+Charles+Street';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"results":[{"id":158,"name":"Just the Desire","lang":"en","coords":"39.361616,-76.624006","address":"Grace Methodist Church, 5407 North Charles Street, Baltimore, MD 21210 USA"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 84, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 84, $title);
    }
    
    $title = 'Places Test 84B: Wildcard Search for \'%Charles+Street\' in the Street Address (Not Logged In).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_street_address=%Charles+Street';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"results":[{"id":158,"name":"Just the Desire","lang":"en","coords":"39.361616,-76.624006","address":"Grace Methodist Church, 5407 North Charles Street, Baltimore, MD 21210 USA"},{"id":179,"name":"For Professionals Only Group","lang":"en","coords":"39.313333,-76.616678","address":"Crossroads, 2100 North Charles Street, Baltimore, MD 21218 USA"},{"id":202,"name":"Work in Progress","lang":"en","coords":"39.315603,-76.617187","address":"Behavioral Health Clinic, 2310 North Charles Street, Baltimore, MD 21218 USA"},{"id":212,"name":"Recovery At The Harbor","lang":"en","coords":"39.280886,-76.614511","address":"Christ Lutheran Church, 701 South Charles Street, Baltimore, MD 21230 USA"},{"id":292,"name":"Recovery on Charles Street","lang":"en","coords":"39.315046,-76.616785","address":"Mosaic Health Center, 2225 North Charles Street, Baltimore, MD 21218 USA"},{"id":464,"name":"Firm Foundation","lang":"en","coords":"39.365194,-76.624188","address":"Church of the Redeemer, 5603 North Charles Street, Towson, MD 21210 USA"},{"id":470,"name":"Step Writing Meeting","lang":"en","coords":"39.365210,-76.624167","address":"Church of The Redeemer, 5603 North Charles Street, Baltimore, MD 21210 USA"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 84, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 84, $title);
    }
    
    $title = 'Places Test 84C: Search for Records With Blank Street Address.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_street_address=';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"results":[{"id":407,"name":"Friday Night Freedom","lang":"en","coords":"38.991616,-76.157166","address":"Calvary UMC, Queenstown, MD 21658 USA"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 84, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 84, $title);
    }
}

// --------------------

function basalt_test_define_0085() {
    basalt_run_single_direct_test(85, 'Search For Places Using Street Address (XML)', 'GET Simple Direct Address Search', 'places_tests');
}

function basalt_test_0085($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 85A: Direct Search for \'5407 North Charles Street\' in the Street Address (Not Logged In).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_street_address=5407+North+Charles+Street';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<results><value sequence_index="0"><id>158</id><name>Just the Desire</name><lang>en</lang><coords>39.361616,-76.624006</coords><address>Grace Methodist Church, 5407 North Charles Street, Baltimore, MD 21210 USA</address></value></results></places>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 85, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 85, $title);
    }
    
    $title = 'Places Test 85B: Wildcard Search for \'%Charles+Street\' in the Street Address (Not Logged In).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_street_address=%Charles+Street';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<results><value sequence_index="0"><id>158</id><name>Just the Desire</name><lang>en</lang><coords>39.361616,-76.624006</coords><address>Grace Methodist Church, 5407 North Charles Street, Baltimore, MD 21210 USA</address></value><value sequence_index="1"><id>179</id><name>For Professionals Only Group</name><lang>en</lang><coords>39.313333,-76.616678</coords><address>Crossroads, 2100 North Charles Street, Baltimore, MD 21218 USA</address></value><value sequence_index="2"><id>202</id><name>Work in Progress</name><lang>en</lang><coords>39.315603,-76.617187</coords><address>Behavioral Health Clinic, 2310 North Charles Street, Baltimore, MD 21218 USA</address></value><value sequence_index="3"><id>212</id><name>Recovery At The Harbor</name><lang>en</lang><coords>39.280886,-76.614511</coords><address>Christ Lutheran Church, 701 South Charles Street, Baltimore, MD 21230 USA</address></value><value sequence_index="4"><id>292</id><name>Recovery on Charles Street</name><lang>en</lang><coords>39.315046,-76.616785</coords><address>Mosaic Health Center, 2225 North Charles Street, Baltimore, MD 21218 USA</address></value><value sequence_index="5"><id>464</id><name>Firm Foundation</name><lang>en</lang><coords>39.365194,-76.624188</coords><address>Church of the Redeemer, 5603 North Charles Street, Towson, MD 21210 USA</address></value><value sequence_index="6"><id>470</id><name>Step Writing Meeting</name><lang>en</lang><coords>39.365210,-76.624167</coords><address>Church of The Redeemer, 5603 North Charles Street, Baltimore, MD 21210 USA</address></value></results></places>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 85, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 85, $title);
    }
    
    $title = 'Places Test 85C: Search for Records With Blank Street Address.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_street_address=';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<results><value sequence_index="0"><id>407</id><name>Friday Night Freedom</name><lang>en</lang><coords>38.991616,-76.157166</coords><address>Calvary UMC, Queenstown, MD 21658 USA</address></value></results></places>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 85, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 85, $title);
    }
}

// --------------------

function basalt_test_define_0086() {
    basalt_run_single_direct_test(86, 'Search For Places Using Extra Information (JSON)', 'GET Simple Direct Extra Info Search', 'places_tests');
}

function basalt_test_0086($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 86A: Direct Search for \'TEST_EXTRA_INFO-6\' in Extra Information (Not Logged In). We will get one result.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_extra_information=TEST_EXTRA_INFO-6';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"results":[{"id":6,"name":"Search For Serenity","lang":"en","coords":"38.761961,-76.913016","address":"Prince Georges Health Dept (TEST_EXTRA_INFO-6), 9314 Piscataway Rd, Clinton, MD 20735 USA"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 86, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 86, $title);
    }
    
    $title = 'Places Test 86B: Wildcard Search for \'TEST_EXTRA_INFO-%\' in Extra Information (Not Logged In). We will get six results.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_extra_information=TEST_EXTRA_INFO-%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"results":[{"id":2,"name":"New Start","lang":"en","coords":"39.059283,-76.877007","address":"Queens Chapel United Methodist Church (TEST_EXTRA_INFO-2), 7410 Old Muirkirk Road, Beltsville, MD 20705 USA"},{"id":3,"name":"Dealing With Feelings","lang":"en","coords":"38.564376,-76.078324","address":"New Way of Life Club (TEST_EXTRA_INFO-3), 742 Race St., Cambridge, MD 21613 USA"},{"id":4,"name":"Hamilton Noon","lang":"en","coords":"39.350807,-76.562445","address":"Faith Community UMC (TEST_EXTRA_INFO-4), 5315 Harford Rd., Baltimore, MD 21214 USA"},{"id":5,"name":"What We Can Do at Noon Group","lang":"en","coords":"38.357291,-75.600070","address":"Salisbury Substance Abuse Community Center (TEST_EXTRA_INFO-5), 726 South Salisbury Boulevard, Suite E, Salisbury, MD 21801 USA"},{"id":6,"name":"Search For Serenity","lang":"en","coords":"38.761961,-76.913016","address":"Prince Georges Health Dept (TEST_EXTRA_INFO-6), 9314 Piscataway Rd, Clinton, MD 20735 USA"},{"id":7,"name":"Addicts With Feelings","lang":"en","coords":"38.567626,-76.064512","address":"Dri-Doc Recovery Wellness Center (TEST_EXTRA_INFO-7), 206 Ocean Gateway, Cambridge, MD 21613 USA"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 86, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 86, $title);
    }
    
    $title = 'Places Test 86C: Search for Records With Blank Extra Information. The first six results will not be included in the response.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_extra_information=';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/03-get_string_search_places_tests-86C.json');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 86, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 86, $title);
    }
}

// --------------------

function basalt_test_define_0087() {
    basalt_run_single_direct_test(87, 'Search For Places Using Extra Information (XML)', 'GET Simple Direct Extra Info Search', 'places_tests');
}

function basalt_test_0087($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 87A: Direct Search for \'TEST_EXTRA_INFO-6\' in Extra Information (Not Logged In). We will get one result.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_extra_information=TEST_EXTRA_INFO-6';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<results><value sequence_index="0"><id>6</id><name>Search For Serenity</name><lang>en</lang><coords>38.761961,-76.913016</coords><address>Prince Georges Health Dept (TEST_EXTRA_INFO-6), 9314 Piscataway Rd, Clinton, MD 20735 USA</address></value></results></places>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 87, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 87, $title);
    }
    
    $title = 'Places Test 87B: Wildcard Search for \'TEST_EXTRA_INFO-%\' in Extra Information (Not Logged In). We will get six results.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_extra_information=TEST_EXTRA_INFO-%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<results><value sequence_index="0"><id>2</id><name>New Start</name><lang>en</lang><coords>39.059283,-76.877007</coords><address>Queens Chapel United Methodist Church (TEST_EXTRA_INFO-2), 7410 Old Muirkirk Road, Beltsville, MD 20705 USA</address></value><value sequence_index="1"><id>3</id><name>Dealing With Feelings</name><lang>en</lang><coords>38.564376,-76.078324</coords><address>New Way of Life Club (TEST_EXTRA_INFO-3), 742 Race St., Cambridge, MD 21613 USA</address></value><value sequence_index="2"><id>4</id><name>Hamilton Noon</name><lang>en</lang><coords>39.350807,-76.562445</coords><address>Faith Community UMC (TEST_EXTRA_INFO-4), 5315 Harford Rd., Baltimore, MD 21214 USA</address></value><value sequence_index="3"><id>5</id><name>What We Can Do at Noon Group</name><lang>en</lang><coords>38.357291,-75.600070</coords><address>Salisbury Substance Abuse Community Center (TEST_EXTRA_INFO-5), 726 South Salisbury Boulevard, Suite E, Salisbury, MD 21801 USA</address></value><value sequence_index="4"><id>6</id><name>Search For Serenity</name><lang>en</lang><coords>38.761961,-76.913016</coords><address>Prince Georges Health Dept (TEST_EXTRA_INFO-6), 9314 Piscataway Rd, Clinton, MD 20735 USA</address></value><value sequence_index="5"><id>7</id><name>Addicts With Feelings</name><lang>en</lang><coords>38.567626,-76.064512</coords><address>Dri-Doc Recovery Wellness Center (TEST_EXTRA_INFO-7), 206 Ocean Gateway, Cambridge, MD 21613 USA</address></value></results></places>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 87, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 87, $title);
    }
    
    $title = 'Places Test 87C: Search for Records With Blank Extra Information. The first six results will not be included in the response.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_extra_information=';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
        $expected_result = get_xml_header('places').file_get_contents(dirname(__FILE__).'/03-get_string_search_places_tests-87C.xml');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 87, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 87, $title);
    }
}

// --------------------

function basalt_test_define_0088() {
    basalt_run_single_direct_test(88, 'Search For Places Using The Town (JSON)', 'GET Simple Direct Town Search', 'places_tests');
}

function basalt_test_0088($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 88A: Direct Search for \'Reisterstown\' in Town (Not Logged In).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_town=Reisterstown';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"results":[{"id":27,"name":"Give Yourself a Break","lang":"en","coords":"39.449777,-76.817337","address":"Hannah More School, 12039 Reisterstown Road, Reisterstown, MD 21136 USA"},{"id":237,"name":"Thursday Night NA","lang":"en","coords":"39.461964,-76.828132","address":"Reisterstown UMC, 308 Main Street, Reisterstown, MD 21136 USA"},{"id":429,"name":"Promise Is Freedom","lang":"en","coords":"39.461931,-76.828401","address":"Reisterstown United Methodist, 308 Main St., Reisterstown, MD 21136 USA"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 88, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 88, $title);
    }
    
    $title = 'Places Test 88B: Wildcard Search for \'%town\' in Town (Not Logged In).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_town=%town';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"results":[{"id":27,"name":"Give Yourself a Break","lang":"en","coords":"39.449777,-76.817337","address":"Hannah More School, 12039 Reisterstown Road, Reisterstown, MD 21136 USA"},{"id":113,"name":"Change is Progress","lang":"en","coords":"39.660893,-77.177017","address":"Trinity Evangelical Luthern Church, 38 West Baltimore Street, Taneytown, MD 21787 USA"},{"id":121,"name":"End of the Road","lang":"en","coords":"39.639858,-77.722257","address":"Saint Johns Lutheran Church, 141 South Potomac Street, Hagerstown, MD 21740 USA"},{"id":136,"name":"Living Clean","lang":"en","coords":"38.299990,-76.641784","address":"St Pauls UM Church, 25550 Point Lookout Rd, Leonardtown, MD 20650 USA"},{"id":195,"name":"Blast of Recovery","lang":"en","coords":"39.363107,-76.776496","address":"MT. OLIVE METHODIST CHURCH, 5115 OLD COURT RD, Randallstown, MD 21133 USA"},{"id":204,"name":"We Do Recover","lang":"en","coords":"37.556953,-77.473032","address":"644 Frederick St., Hagerstown, MD 21740 USA"},{"id":220,"name":"Saturday Nite Live","lang":"en","coords":"39.235261,-76.069465","address":"Eastern Shore Alano Club, 114 B South Lynchberg Road, Chestertown, MD 21620 USA"},{"id":231,"name":"Steps to Serenity","lang":"en","coords":"38.598738,-76.585174","address":"St. Nicholas Lutheran Church, 1450 Plum Point Rd, Huntingtown, MD 20639 USA"},{"id":237,"name":"Thursday Night NA","lang":"en","coords":"39.461964,-76.828132","address":"Reisterstown UMC, 308 Main Street, Reisterstown, MD 21136 USA"},{"id":251,"name":"Hope and Gratitude","lang":"en","coords":"39.754601,-77.575332","address":"Robert W. Johnson Community Ctr, 109 W. North Ave., Hagerstown, MD 21740 USA"},{"id":278,"name":"Seeking Serenity","lang":"en","coords":"39.212076,-76.074883","address":"Eastern Shore Alano Club, 114 B South Lynchberg Road, Chestertown, MD 21620 USA"},{"id":388,"name":"Hope and Gratitude","lang":"en","coords":"39.648316,-77.719232","address":"Robert W. Johnson Communiy Center, 109 West North Avenue, Hagerstown, MD 21740 USA"},{"id":406,"name":"Blast of Recovery","lang":"en","coords":"39.359964,-76.774110","address":"MT. OLIVE METHODIST CHURCH, 5115 OLD COURT RD, Randallstown, MD 21133 USA"},{"id":407,"name":"Friday Night Freedom","lang":"en","coords":"38.991616,-76.157166","address":"Calvary UMC, Queenstown, MD 21658 USA"},{"id":417,"name":"Addicts Only","lang":"en","coords":"39.612423,-77.747649","address":"Concordia Lutheran Church, 17906 Garden Lane, Hagerstown, MD 21740 USA"},{"id":429,"name":"Promise Is Freedom","lang":"en","coords":"39.461931,-76.828401","address":"Reisterstown United Methodist, 308 Main St., Reisterstown, MD 21136 USA"},{"id":1289,"name":"In Step","lang":"en","coords":"37.161831,-76.464000","address":"Grafton Baptist Church, 5540 George Washington Memorial Hwy, Yorktown, VA 23692 USA"},{"id":1596,"name":"Miracles Do Happen","lang":"en","coords":"39.266987,-77.841195","address":"St. James Catholic Church, 49 Crosswinds Dr., Charles Town, WV 25414 USA"},{"id":1605,"name":"Never Alone, Never Again","lang":"en","coords":"39.290657,-77.862412","address":"Asbury United Methodist Church, 110 W North St, Charles Town, WV 25414 USA"},{"id":1630,"name":"Road To Freedom","lang":"en","coords":"38.692209,-75.385222","address":"Wesley UMC - Jones Hall, 120 E. Laurel St., Georgetown, DE 19947 USA"},{"id":1635,"name":"Each One Teach One","lang":"en","coords":"39.453844,-75.708962","address":"Dale United Methodist Church, 407 East Lake Street, Middletown, DE 19709 USA"},{"id":1658,"name":"Keep It Real","lang":"en","coords":"38.690886,-75.382713","address":"St. Pauls Church, 122 E. Pine St, Georgetown, DE 19904 USA"},{"id":1668,"name":"New Horizons","lang":"en","coords":"38.692183,-75.388337","address":"Georgetown Presbyterian Church, 203 North Bedford Street, Georgetown, DE 19947 USA"},{"id":1699,"name":"Freedom to Change","lang":"en","coords":"38.692159,-75.388387","address":"Georgetown Presbyterian Church, 203 North Bedford Street, Georgetown, DE 19947 USA"},{"id":1716,"name":"Down Home Group","lang":"en","coords":"39.449341,-75.718408","address":"Forest Presbyterian Church, 44 West Main St., Middletown, DE 19709 USA"},{"id":1717,"name":"Women Empowering Women","lang":"en","coords":"38.693070,-75.381850","address":"Grace UMC, 7 S. King St., Georgetown, DE 19947 USA"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 88, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 88, $title);
    }
    
    $title = 'Places Test 88C: Search for Records With Blank Town.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_town=';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"results":[{"id":1530,"name":"Womens Step and Traditions","lang":"en","coords":"38.915964,-77.009504","address":"St. Martins Church, 1908 N. Capitol Street, DC USA"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 88, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 88, $title);
    }
}

// --------------------

function basalt_test_define_0089() {
    basalt_run_single_direct_test(89, 'Search For Places Using The Town (XML)', 'GET Simple Direct Town Search', 'places_tests');
}

function basalt_test_0089($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 89A: Direct Search for \'Reisterstown\' in Town (Not Logged In).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_town=Reisterstown';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<results><value sequence_index="0"><id>27</id><name>Give Yourself a Break</name><lang>en</lang><coords>39.449777,-76.817337</coords><address>Hannah More School, 12039 Reisterstown Road, Reisterstown, MD 21136 USA</address></value><value sequence_index="1"><id>237</id><name>Thursday Night NA</name><lang>en</lang><coords>39.461964,-76.828132</coords><address>Reisterstown UMC, 308 Main Street, Reisterstown, MD 21136 USA</address></value><value sequence_index="2"><id>429</id><name>Promise Is Freedom</name><lang>en</lang><coords>39.461931,-76.828401</coords><address>Reisterstown United Methodist, 308 Main St., Reisterstown, MD 21136 USA</address></value></results></places>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 89, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 89, $title);
    }
    
    $title = 'Places Test 89B: Wildcard Search for \'%town\' in Town (Not Logged In).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_town=%town';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<results><value sequence_index="0"><id>27</id><name>Give Yourself a Break</name><lang>en</lang><coords>39.449777,-76.817337</coords><address>Hannah More School, 12039 Reisterstown Road, Reisterstown, MD 21136 USA</address></value><value sequence_index="1"><id>113</id><name>Change is Progress</name><lang>en</lang><coords>39.660893,-77.177017</coords><address>Trinity Evangelical Luthern Church, 38 West Baltimore Street, Taneytown, MD 21787 USA</address></value><value sequence_index="2"><id>121</id><name>End of the Road</name><lang>en</lang><coords>39.639858,-77.722257</coords><address>Saint Johns Lutheran Church, 141 South Potomac Street, Hagerstown, MD 21740 USA</address></value><value sequence_index="3"><id>136</id><name>Living Clean</name><lang>en</lang><coords>38.299990,-76.641784</coords><address>St Pauls UM Church, 25550 Point Lookout Rd, Leonardtown, MD 20650 USA</address></value><value sequence_index="4"><id>195</id><name>Blast of Recovery</name><lang>en</lang><coords>39.363107,-76.776496</coords><address>MT. OLIVE METHODIST CHURCH, 5115 OLD COURT RD, Randallstown, MD 21133 USA</address></value><value sequence_index="5"><id>204</id><name>We Do Recover</name><lang>en</lang><coords>37.556953,-77.473032</coords><address>644 Frederick St., Hagerstown, MD 21740 USA</address></value><value sequence_index="6"><id>220</id><name>Saturday Nite Live</name><lang>en</lang><coords>39.235261,-76.069465</coords><address>Eastern Shore Alano Club, 114 B South Lynchberg Road, Chestertown, MD 21620 USA</address></value><value sequence_index="7"><id>231</id><name>Steps to Serenity</name><lang>en</lang><coords>38.598738,-76.585174</coords><address>St. Nicholas Lutheran Church, 1450 Plum Point Rd, Huntingtown, MD 20639 USA</address></value><value sequence_index="8"><id>237</id><name>Thursday Night NA</name><lang>en</lang><coords>39.461964,-76.828132</coords><address>Reisterstown UMC, 308 Main Street, Reisterstown, MD 21136 USA</address></value><value sequence_index="9"><id>251</id><name>Hope and Gratitude</name><lang>en</lang><coords>39.754601,-77.575332</coords><address>Robert W. Johnson Community Ctr, 109 W. North Ave., Hagerstown, MD 21740 USA</address></value><value sequence_index="10"><id>278</id><name>Seeking Serenity</name><lang>en</lang><coords>39.212076,-76.074883</coords><address>Eastern Shore Alano Club, 114 B South Lynchberg Road, Chestertown, MD 21620 USA</address></value><value sequence_index="11"><id>388</id><name>Hope and Gratitude</name><lang>en</lang><coords>39.648316,-77.719232</coords><address>Robert W. Johnson Communiy Center, 109 West North Avenue, Hagerstown, MD 21740 USA</address></value><value sequence_index="12"><id>406</id><name>Blast of Recovery</name><lang>en</lang><coords>39.359964,-76.774110</coords><address>MT. OLIVE METHODIST CHURCH, 5115 OLD COURT RD, Randallstown, MD 21133 USA</address></value><value sequence_index="13"><id>407</id><name>Friday Night Freedom</name><lang>en</lang><coords>38.991616,-76.157166</coords><address>Calvary UMC, Queenstown, MD 21658 USA</address></value><value sequence_index="14"><id>417</id><name>Addicts Only</name><lang>en</lang><coords>39.612423,-77.747649</coords><address>Concordia Lutheran Church, 17906 Garden Lane, Hagerstown, MD 21740 USA</address></value><value sequence_index="15"><id>429</id><name>Promise Is Freedom</name><lang>en</lang><coords>39.461931,-76.828401</coords><address>Reisterstown United Methodist, 308 Main St., Reisterstown, MD 21136 USA</address></value><value sequence_index="16"><id>1289</id><name>In Step</name><lang>en</lang><coords>37.161831,-76.464000</coords><address>Grafton Baptist Church, 5540 George Washington Memorial Hwy, Yorktown, VA 23692 USA</address></value><value sequence_index="17"><id>1596</id><name>Miracles Do Happen</name><lang>en</lang><coords>39.266987,-77.841195</coords><address>St. James Catholic Church, 49 Crosswinds Dr., Charles Town, WV 25414 USA</address></value><value sequence_index="18"><id>1605</id><name>Never Alone, Never Again</name><lang>en</lang><coords>39.290657,-77.862412</coords><address>Asbury United Methodist Church, 110 W North St, Charles Town, WV 25414 USA</address></value><value sequence_index="19"><id>1630</id><name>Road To Freedom</name><lang>en</lang><coords>38.692209,-75.385222</coords><address>Wesley UMC - Jones Hall, 120 E. Laurel St., Georgetown, DE 19947 USA</address></value><value sequence_index="20"><id>1635</id><name>Each One Teach One</name><lang>en</lang><coords>39.453844,-75.708962</coords><address>Dale United Methodist Church, 407 East Lake Street, Middletown, DE 19709 USA</address></value><value sequence_index="21"><id>1658</id><name>Keep It Real</name><lang>en</lang><coords>38.690886,-75.382713</coords><address>St. Pauls Church, 122 E. Pine St, Georgetown, DE 19904 USA</address></value><value sequence_index="22"><id>1668</id><name>New Horizons</name><lang>en</lang><coords>38.692183,-75.388337</coords><address>Georgetown Presbyterian Church, 203 North Bedford Street, Georgetown, DE 19947 USA</address></value><value sequence_index="23"><id>1699</id><name>Freedom to Change</name><lang>en</lang><coords>38.692159,-75.388387</coords><address>Georgetown Presbyterian Church, 203 North Bedford Street, Georgetown, DE 19947 USA</address></value><value sequence_index="24"><id>1716</id><name>Down Home Group</name><lang>en</lang><coords>39.449341,-75.718408</coords><address>Forest Presbyterian Church, 44 West Main St., Middletown, DE 19709 USA</address></value><value sequence_index="25"><id>1717</id><name>Women Empowering Women</name><lang>en</lang><coords>38.693070,-75.381850</coords><address>Grace UMC, 7 S. King St., Georgetown, DE 19947 USA</address></value></results></places>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 89, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 89, $title);
    }
    
    $title = 'Places Test 89C: Search for Records With Blank Town.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_town=';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<results><value sequence_index="0"><id>1530</id><name>Womens Step and Traditions</name><lang>en</lang><coords>38.915964,-77.009504</coords><address>St. Martins Church, 1908 N. Capitol Street, DC USA</address></value></results></places>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 89, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 89, $title);
    }
}

// --------------------

function basalt_test_define_0090() {
    basalt_run_single_direct_test(90, 'Search For Places Using The County (JSON)', 'GET Simple Direct County Search. We "show_details", because the county is not listed in the short address.', 'places_tests');
}

function basalt_test_0090($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 90A: Direct Search for \'Montgomery\' in County (Not Logged In).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_county=Montgomery&show_details';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"results":[{"id":282,"name":"Stepping Free","lang":"en","coords":"39.115932,-77.265688","address":"Fairhaven UMC, 12801 Darnestown Rd, Gaithersburg, MD 20878 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":39.115932,"longitude":-77.265688,"address_elements":{"venue":"Fairhaven UMC","street_address":"12801 Darnestown Rd","town":"Gaithersburg","county":"Montgomery","state":"MD","postal_code":"20878","nation":"USA"},"tag8":"20:30:00"},{"id":419,"name":"Live and Let Live","lang":"en","coords":"39.115932,-77.265688","address":"Fairhaven UMC, 12801 Darnestown Rd, Gaithersburg, MD 20878 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":39.115932,"longitude":-77.265688,"address_elements":{"venue":"Fairhaven UMC","street_address":"12801 Darnestown Rd","town":"Gaithersburg","county":"Montgomery","state":"MD","postal_code":"20878","nation":"USA"},"tag8":"20:00:00"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 90, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 90, $title);
    }
    
    $title = 'Places Test 90B: Wildcard Search for \'%town\' in County (Not Logged In).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_county=Montgomery%&show_details';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"results":[{"id":32,"name":"Freedom in the Village","lang":"en","coords":"39.173076,-77.202278","address":"Christ the Servant Lutheran Church, 9801 Centerway Rd, Montgomery Village, MD 20886 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":39.173076,"longitude":-77.202278,"address_elements":{"venue":"Christ the Servant Lutheran Church","street_address":"9801 Centerway Rd","town":"Montgomery Village","county":"Montgomery County","state":"MD","postal_code":"20886","nation":"USA"},"tag8":"12:00:00"},{"id":46,"name":"Keys To Recovery","lang":"en","coords":"39.058500,-77.085700","address":"Veirs Mill Baptist Church, 12221 Veirs Mill Rd, Silver Spring, MD 20906 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":39.0585,"longitude":-77.0857,"address_elements":{"venue":"Veirs Mill Baptist Church","street_address":"12221 Veirs Mill Rd","town":"Silver Spring","county":"Montgomery County","state":"MD","postal_code":"20906","nation":"USA"},"tag8":"20:30:00"},{"id":66,"name":"Meetin in Wheaton","lang":"en","coords":"39.030064,-77.047802","address":"Hughes Methodist Church, 10700 Georgia Ave, Silver Spring, MD 20902 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":39.030064,"longitude":-77.047802,"address_elements":{"venue":"Hughes Methodist Church","street_address":"10700 Georgia Ave","town":"Silver Spring","county":"Montgomery County","state":"MD","postal_code":"20902","nation":"USA"},"tag8":"20:00:00"},{"id":76,"name":"Fresh Air","lang":"en","coords":"39.012393,-77.090854","address":"Cedar Lane UUC, 9601 Cedar Ln, Bethesda, MD 20814 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":39.012393,"longitude":-77.090854,"address_elements":{"venue":"Cedar Lane UUC","street_address":"9601 Cedar Ln","town":"Bethesda","county":"Montgomery County","state":"MD","postal_code":"20814","nation":"USA"},"tag8":"19:00:00"},{"id":109,"name":"Wednesdays Willingness","lang":"en","coords":"39.000184,-77.033644","address":"8818 Georgia Ave, 8818 Georgia Avenue, Silver Spring, MD 20910 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":39.000184,"longitude":-77.033644,"address_elements":{"venue":"8818 Georgia Ave","street_address":"8818 Georgia Avenue","town":"Silver Spring","county":"Montgomery County","state":"MD","postal_code":"20910","nation":"USA"},"tag8":"19:30:00"},{"id":110,"name":"Never Alone","lang":"en","coords":"39.173076,-77.202278","address":"Christ the Servant Lutheran Church, 9801 Centerway Rd, Montgomery Village, MD 20886 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":39.173076,"longitude":-77.202278,"address_elements":{"venue":"Christ the Servant Lutheran Church","street_address":"9801 Centerway Rd","town":"Montgomery Village","county":"Montgomery County","state":"MD","postal_code":"20886","nation":"USA"},"tag8":"19:30:00"},{"id":123,"name":"Another Way","lang":"en","coords":"39.114912,-77.245551","address":"Prince of Peace Lutheran Church, 11900 Darnestown Road, Gaithersburg, MD 20878 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":39.114912,"longitude":-77.245551,"address_elements":{"venue":"Prince of Peace Lutheran Church","street_address":"11900 Darnestown Road","town":"Gaithersburg","county":"Montgomery County","state":"MD","postal_code":"20878","nation":"USA"},"tag8":"20:00:00"},{"id":207,"name":"Freedom in the Village","lang":"en","coords":"39.173076,-77.202278","address":"Christ the Servant Lutheran Church, 9801 Centerway Rd, Montgomery Village, MD 20886 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":39.173076,"longitude":-77.202278,"address_elements":{"venue":"Christ the Servant Lutheran Church","street_address":"9801 Centerway Rd","town":"Montgomery Village","county":"Montgomery County","state":"MD","postal_code":"20886","nation":"USA"},"tag8":"12:00:00"},{"id":258,"name":"Serenity in the Park","lang":"en","coords":"39.093349,-77.144013","address":"Mt Calvary Baptist Church, 608 N Horners Ln, Rockville, MD 20850 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":39.093349,"longitude":-77.144013,"address_elements":{"venue":"Mt Calvary Baptist Church","street_address":"608 N Horners Ln","town":"Rockville","county":"Montgomery County","state":"MD","postal_code":"20850","nation":"USA"},"tag8":"19:30:00"},{"id":282,"name":"Stepping Free","lang":"en","coords":"39.115932,-77.265688","address":"Fairhaven UMC, 12801 Darnestown Rd, Gaithersburg, MD 20878 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":39.115932,"longitude":-77.265688,"address_elements":{"venue":"Fairhaven UMC","street_address":"12801 Darnestown Rd","town":"Gaithersburg","county":"Montgomery","state":"MD","postal_code":"20878","nation":"USA"},"tag8":"20:30:00"},{"id":291,"name":"Freedom in the Village","lang":"en","coords":"39.173076,-77.202278","address":"Christ the Servant Lutheran Church, 9801 Centerway Rd, Montgomery Village, MD 20886 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":39.173076,"longitude":-77.202278,"address_elements":{"venue":"Christ the Servant Lutheran Church","street_address":"9801 Centerway Rd","town":"Montgomery Village","county":"Montgomery County","state":"MD","postal_code":"20886","nation":"USA"},"tag8":"12:00:00"},{"id":325,"name":"Older Toddlers","lang":"en","coords":"39.012393,-77.090854","address":"Cedar Lane UUC, 9601 Cedar Ln, Bethesda, MD 20814 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":39.012393,"longitude":-77.090854,"address_elements":{"venue":"Cedar Lane UUC","street_address":"9601 Cedar Ln","town":"Bethesda","county":"Montgomery County","state":"MD","postal_code":"20814","nation":"USA"},"tag8":"19:00:00"},{"id":332,"name":"Talking Heads","lang":"en","coords":"38.980190,-77.076731","address":"Chevy Chase UMC, 7001 Connecticut Ave, Chevy Chase, MD 20815 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":38.98019,"longitude":-77.076731,"address_elements":{"venue":"Chevy Chase UMC","street_address":"7001 Connecticut Ave","town":"Chevy Chase","county":"Montgomery County","state":"MD","postal_code":"20815","nation":"USA"},"tag8":"18:00:00"},{"id":364,"name":"The Road We Travel","lang":"en","coords":"39.012393,-77.090854","address":"Cedar Lane UUC, 9601 Cedar Ln, Bethesda, MD 20814 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":39.012393,"longitude":-77.090854,"address_elements":{"venue":"Cedar Lane UUC","street_address":"9601 Cedar Ln","town":"Bethesda","county":"Montgomery County","state":"MD","postal_code":"20814","nation":"USA"},"tag8":"19:00:00"},{"id":398,"name":"Upcounty NA","lang":"en","coords":"39.148891,-77.168369","address":"Emory Grove UM Church, 8200 Emory Grove Rd, Gaithersburg, MD 20877 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":39.148891,"longitude":-77.168369,"address_elements":{"venue":"Emory Grove UM Church","street_address":"8200 Emory Grove Rd","town":"Gaithersburg","county":"Montgomery County","state":"MD","postal_code":"20877","nation":"USA"},"tag8":"19:30:00"},{"id":415,"name":"Beginning Miracles","lang":"en","coords":"38.980190,-77.076731","address":"Chevy Chase UMC, 7001 Connecticut Ave, Chevy Chase, MD 20815 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":38.98019,"longitude":-77.076731,"address_elements":{"venue":"Chevy Chase UMC","street_address":"7001 Connecticut Ave","town":"Chevy Chase","county":"Montgomery County","state":"MD","postal_code":"20815","nation":"USA"},"tag8":"19:30:00"},{"id":419,"name":"Live and Let Live","lang":"en","coords":"39.115932,-77.265688","address":"Fairhaven UMC, 12801 Darnestown Rd, Gaithersburg, MD 20878 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":39.115932,"longitude":-77.265688,"address_elements":{"venue":"Fairhaven UMC","street_address":"12801 Darnestown Rd","town":"Gaithersburg","county":"Montgomery","state":"MD","postal_code":"20878","nation":"USA"},"tag8":"20:00:00"},{"id":434,"name":"SYA","lang":"en","coords":"39.115082,-77.052670","address":"Norbeck Community Church, 2631 Norbeck Rd, Silver Spring, MD 20906 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":39.115082,"longitude":-77.05267,"address_elements":{"venue":"Norbeck Community Church","street_address":"2631 Norbeck Rd","town":"Silver Spring","county":"Montgomery County","state":"MD","postal_code":"20906","nation":"USA"},"tag8":"20:30:00"},{"id":435,"name":"Get Down","lang":"en","coords":"39.012393,-77.090854","address":"Cedar Lane UUC, 9601 Cedar Ln, Bethesda, MD 20814 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":39.012393,"longitude":-77.090854,"address_elements":{"venue":"Cedar Lane UUC","street_address":"9601 Cedar Ln","town":"Bethesda","county":"Montgomery County","state":"MD","postal_code":"20814","nation":"USA"},"tag8":"20:30:00"},{"id":440,"name":"Back to the Basics","lang":"en","coords":"39.120164,-77.181127","address":"Gaithersburg Kolmac Clinic, 15932-B Shady Grove Rd, Gaithersburg, MD 20877 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":39.120164,"longitude":-77.181127,"address_elements":{"venue":"Gaithersburg Kolmac Clinic","street_address":"15932-B Shady Grove Rd","town":"Gaithersburg","county":"Montgomery County","state":"MD","postal_code":"20877","nation":"USA"},"tag8":"20:45:00"},{"id":974,"name":"K.I.S.S. Group","lang":"en","coords":"37.131100,-80.406700","address":"St Thomas Episcopal Church, 103 E Main Street, Christiansburg, VA 24073 USA","last_access":"1970-01-02 00:00:00","owner_id":8,"latitude":37.1311,"longitude":-80.4067,"address_elements":{"venue":"St Thomas Episcopal Church","street_address":"103 E Main Street","town":"Christiansburg","county":"Montgomery County","state":"VA","postal_code":"24073","nation":"USA"},"tag8":"20:00:00"},{"id":1142,"name":"K.I.S.S. Group","lang":"en","coords":"37.131100,-80.406700","address":"St Thomas Episcopal Church, 103 E Main Street, Christiansburg, VA 24073 USA","last_access":"1970-01-02 00:00:00","owner_id":8,"latitude":37.1311,"longitude":-80.4067,"address_elements":{"venue":"St Thomas Episcopal Church","street_address":"103 E Main Street","town":"Christiansburg","county":"Montgomery County","state":"VA","postal_code":"24073","nation":"USA"},"tag8":"20:00:00"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 90, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 90, $title);
    }
    
    $title = 'Places Test 90C: Search for Records With Blank County.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_county=&show_details';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/03-get_string_search_places_tests-90C.json');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 90, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 90, $title);
    }
}

// --------------------

function basalt_test_define_0091() {
    basalt_run_single_direct_test(91, 'Search For Places Using The County (XML)', 'GET Simple Direct County Search. We "show_details", because the county is not listed in the short address.', 'places_tests');
}

function basalt_test_0091($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 91A: Direct Search for \'Montgomery\' in County (Not Logged In).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_county=Montgomery&show_details';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<results><value sequence_index="0"><id>282</id><name>Stepping Free</name><lang>en</lang><coords>39.115932,-77.265688</coords><address>Fairhaven UMC, 12801 Darnestown Rd, Gaithersburg, MD 20878 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>39.115932</latitude><longitude>-77.265688</longitude><address_elements><venue>Fairhaven UMC</venue><street_address>12801 Darnestown Rd</street_address><town>Gaithersburg</town><county>Montgomery</county><state>MD</state><postal_code>20878</postal_code><nation>USA</nation></address_elements><tag8>20:30:00</tag8></value><value sequence_index="1"><id>419</id><name>Live and Let Live</name><lang>en</lang><coords>39.115932,-77.265688</coords><address>Fairhaven UMC, 12801 Darnestown Rd, Gaithersburg, MD 20878 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>39.115932</latitude><longitude>-77.265688</longitude><address_elements><venue>Fairhaven UMC</venue><street_address>12801 Darnestown Rd</street_address><town>Gaithersburg</town><county>Montgomery</county><state>MD</state><postal_code>20878</postal_code><nation>USA</nation></address_elements><tag8>20:00:00</tag8></value></results></places>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 91, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 91, $title);
    }
    
    $title = 'Places Test 91B: Wildcard Search for \'%town\' in County (Not Logged In).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_county=Montgomery%&show_details';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<results><value sequence_index="0"><id>32</id><name>Freedom in the Village</name><lang>en</lang><coords>39.173076,-77.202278</coords><address>Christ the Servant Lutheran Church, 9801 Centerway Rd, Montgomery Village, MD 20886 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>39.173076</latitude><longitude>-77.202278</longitude><address_elements><venue>Christ the Servant Lutheran Church</venue><street_address>9801 Centerway Rd</street_address><town>Montgomery Village</town><county>Montgomery County</county><state>MD</state><postal_code>20886</postal_code><nation>USA</nation></address_elements><tag8>12:00:00</tag8></value><value sequence_index="1"><id>46</id><name>Keys To Recovery</name><lang>en</lang><coords>39.058500,-77.085700</coords><address>Veirs Mill Baptist Church, 12221 Veirs Mill Rd, Silver Spring, MD 20906 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>39.0585</latitude><longitude>-77.0857</longitude><address_elements><venue>Veirs Mill Baptist Church</venue><street_address>12221 Veirs Mill Rd</street_address><town>Silver Spring</town><county>Montgomery County</county><state>MD</state><postal_code>20906</postal_code><nation>USA</nation></address_elements><tag8>20:30:00</tag8></value><value sequence_index="2"><id>66</id><name>Meetin in Wheaton</name><lang>en</lang><coords>39.030064,-77.047802</coords><address>Hughes Methodist Church, 10700 Georgia Ave, Silver Spring, MD 20902 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>39.030064</latitude><longitude>-77.047802</longitude><address_elements><venue>Hughes Methodist Church</venue><street_address>10700 Georgia Ave</street_address><town>Silver Spring</town><county>Montgomery County</county><state>MD</state><postal_code>20902</postal_code><nation>USA</nation></address_elements><tag8>20:00:00</tag8></value><value sequence_index="3"><id>76</id><name>Fresh Air</name><lang>en</lang><coords>39.012393,-77.090854</coords><address>Cedar Lane UUC, 9601 Cedar Ln, Bethesda, MD 20814 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>39.012393</latitude><longitude>-77.090854</longitude><address_elements><venue>Cedar Lane UUC</venue><street_address>9601 Cedar Ln</street_address><town>Bethesda</town><county>Montgomery County</county><state>MD</state><postal_code>20814</postal_code><nation>USA</nation></address_elements><tag8>19:00:00</tag8></value><value sequence_index="4"><id>109</id><name>Wednesdays Willingness</name><lang>en</lang><coords>39.000184,-77.033644</coords><address>8818 Georgia Ave, 8818 Georgia Avenue, Silver Spring, MD 20910 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>39.000184</latitude><longitude>-77.033644</longitude><address_elements><venue>8818 Georgia Ave</venue><street_address>8818 Georgia Avenue</street_address><town>Silver Spring</town><county>Montgomery County</county><state>MD</state><postal_code>20910</postal_code><nation>USA</nation></address_elements><tag8>19:30:00</tag8></value><value sequence_index="5"><id>110</id><name>Never Alone</name><lang>en</lang><coords>39.173076,-77.202278</coords><address>Christ the Servant Lutheran Church, 9801 Centerway Rd, Montgomery Village, MD 20886 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>39.173076</latitude><longitude>-77.202278</longitude><address_elements><venue>Christ the Servant Lutheran Church</venue><street_address>9801 Centerway Rd</street_address><town>Montgomery Village</town><county>Montgomery County</county><state>MD</state><postal_code>20886</postal_code><nation>USA</nation></address_elements><tag8>19:30:00</tag8></value><value sequence_index="6"><id>123</id><name>Another Way</name><lang>en</lang><coords>39.114912,-77.245551</coords><address>Prince of Peace Lutheran Church, 11900 Darnestown Road, Gaithersburg, MD 20878 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>39.114912</latitude><longitude>-77.245551</longitude><address_elements><venue>Prince of Peace Lutheran Church</venue><street_address>11900 Darnestown Road</street_address><town>Gaithersburg</town><county>Montgomery County</county><state>MD</state><postal_code>20878</postal_code><nation>USA</nation></address_elements><tag8>20:00:00</tag8></value><value sequence_index="7"><id>207</id><name>Freedom in the Village</name><lang>en</lang><coords>39.173076,-77.202278</coords><address>Christ the Servant Lutheran Church, 9801 Centerway Rd, Montgomery Village, MD 20886 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>39.173076</latitude><longitude>-77.202278</longitude><address_elements><venue>Christ the Servant Lutheran Church</venue><street_address>9801 Centerway Rd</street_address><town>Montgomery Village</town><county>Montgomery County</county><state>MD</state><postal_code>20886</postal_code><nation>USA</nation></address_elements><tag8>12:00:00</tag8></value><value sequence_index="8"><id>258</id><name>Serenity in the Park</name><lang>en</lang><coords>39.093349,-77.144013</coords><address>Mt Calvary Baptist Church, 608 N Horners Ln, Rockville, MD 20850 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>39.093349</latitude><longitude>-77.144013</longitude><address_elements><venue>Mt Calvary Baptist Church</venue><street_address>608 N Horners Ln</street_address><town>Rockville</town><county>Montgomery County</county><state>MD</state><postal_code>20850</postal_code><nation>USA</nation></address_elements><tag8>19:30:00</tag8></value><value sequence_index="9"><id>282</id><name>Stepping Free</name><lang>en</lang><coords>39.115932,-77.265688</coords><address>Fairhaven UMC, 12801 Darnestown Rd, Gaithersburg, MD 20878 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>39.115932</latitude><longitude>-77.265688</longitude><address_elements><venue>Fairhaven UMC</venue><street_address>12801 Darnestown Rd</street_address><town>Gaithersburg</town><county>Montgomery</county><state>MD</state><postal_code>20878</postal_code><nation>USA</nation></address_elements><tag8>20:30:00</tag8></value><value sequence_index="10"><id>291</id><name>Freedom in the Village</name><lang>en</lang><coords>39.173076,-77.202278</coords><address>Christ the Servant Lutheran Church, 9801 Centerway Rd, Montgomery Village, MD 20886 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>39.173076</latitude><longitude>-77.202278</longitude><address_elements><venue>Christ the Servant Lutheran Church</venue><street_address>9801 Centerway Rd</street_address><town>Montgomery Village</town><county>Montgomery County</county><state>MD</state><postal_code>20886</postal_code><nation>USA</nation></address_elements><tag8>12:00:00</tag8></value><value sequence_index="11"><id>325</id><name>Older Toddlers</name><lang>en</lang><coords>39.012393,-77.090854</coords><address>Cedar Lane UUC, 9601 Cedar Ln, Bethesda, MD 20814 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>39.012393</latitude><longitude>-77.090854</longitude><address_elements><venue>Cedar Lane UUC</venue><street_address>9601 Cedar Ln</street_address><town>Bethesda</town><county>Montgomery County</county><state>MD</state><postal_code>20814</postal_code><nation>USA</nation></address_elements><tag8>19:00:00</tag8></value><value sequence_index="12"><id>332</id><name>Talking Heads</name><lang>en</lang><coords>38.980190,-77.076731</coords><address>Chevy Chase UMC, 7001 Connecticut Ave, Chevy Chase, MD 20815 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>38.98019</latitude><longitude>-77.076731</longitude><address_elements><venue>Chevy Chase UMC</venue><street_address>7001 Connecticut Ave</street_address><town>Chevy Chase</town><county>Montgomery County</county><state>MD</state><postal_code>20815</postal_code><nation>USA</nation></address_elements><tag8>18:00:00</tag8></value><value sequence_index="13"><id>364</id><name>The Road We Travel</name><lang>en</lang><coords>39.012393,-77.090854</coords><address>Cedar Lane UUC, 9601 Cedar Ln, Bethesda, MD 20814 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>39.012393</latitude><longitude>-77.090854</longitude><address_elements><venue>Cedar Lane UUC</venue><street_address>9601 Cedar Ln</street_address><town>Bethesda</town><county>Montgomery County</county><state>MD</state><postal_code>20814</postal_code><nation>USA</nation></address_elements><tag8>19:00:00</tag8></value><value sequence_index="14"><id>398</id><name>Upcounty NA</name><lang>en</lang><coords>39.148891,-77.168369</coords><address>Emory Grove UM Church, 8200 Emory Grove Rd, Gaithersburg, MD 20877 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>39.148891</latitude><longitude>-77.168369</longitude><address_elements><venue>Emory Grove UM Church</venue><street_address>8200 Emory Grove Rd</street_address><town>Gaithersburg</town><county>Montgomery County</county><state>MD</state><postal_code>20877</postal_code><nation>USA</nation></address_elements><tag8>19:30:00</tag8></value><value sequence_index="15"><id>415</id><name>Beginning Miracles</name><lang>en</lang><coords>38.980190,-77.076731</coords><address>Chevy Chase UMC, 7001 Connecticut Ave, Chevy Chase, MD 20815 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>38.98019</latitude><longitude>-77.076731</longitude><address_elements><venue>Chevy Chase UMC</venue><street_address>7001 Connecticut Ave</street_address><town>Chevy Chase</town><county>Montgomery County</county><state>MD</state><postal_code>20815</postal_code><nation>USA</nation></address_elements><tag8>19:30:00</tag8></value><value sequence_index="16"><id>419</id><name>Live and Let Live</name><lang>en</lang><coords>39.115932,-77.265688</coords><address>Fairhaven UMC, 12801 Darnestown Rd, Gaithersburg, MD 20878 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>39.115932</latitude><longitude>-77.265688</longitude><address_elements><venue>Fairhaven UMC</venue><street_address>12801 Darnestown Rd</street_address><town>Gaithersburg</town><county>Montgomery</county><state>MD</state><postal_code>20878</postal_code><nation>USA</nation></address_elements><tag8>20:00:00</tag8></value><value sequence_index="17"><id>434</id><name>SYA</name><lang>en</lang><coords>39.115082,-77.052670</coords><address>Norbeck Community Church, 2631 Norbeck Rd, Silver Spring, MD 20906 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>39.115082</latitude><longitude>-77.05267</longitude><address_elements><venue>Norbeck Community Church</venue><street_address>2631 Norbeck Rd</street_address><town>Silver Spring</town><county>Montgomery County</county><state>MD</state><postal_code>20906</postal_code><nation>USA</nation></address_elements><tag8>20:30:00</tag8></value><value sequence_index="18"><id>435</id><name>Get Down</name><lang>en</lang><coords>39.012393,-77.090854</coords><address>Cedar Lane UUC, 9601 Cedar Ln, Bethesda, MD 20814 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>39.012393</latitude><longitude>-77.090854</longitude><address_elements><venue>Cedar Lane UUC</venue><street_address>9601 Cedar Ln</street_address><town>Bethesda</town><county>Montgomery County</county><state>MD</state><postal_code>20814</postal_code><nation>USA</nation></address_elements><tag8>20:30:00</tag8></value><value sequence_index="19"><id>440</id><name>Back to the Basics</name><lang>en</lang><coords>39.120164,-77.181127</coords><address>Gaithersburg Kolmac Clinic, 15932-B Shady Grove Rd, Gaithersburg, MD 20877 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>39.120164</latitude><longitude>-77.181127</longitude><address_elements><venue>Gaithersburg Kolmac Clinic</venue><street_address>15932-B Shady Grove Rd</street_address><town>Gaithersburg</town><county>Montgomery County</county><state>MD</state><postal_code>20877</postal_code><nation>USA</nation></address_elements><tag8>20:45:00</tag8></value><value sequence_index="20"><id>974</id><name>K.I.S.S. Group</name><lang>en</lang><coords>37.131100,-80.406700</coords><address>St Thomas Episcopal Church, 103 E Main Street, Christiansburg, VA 24073 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>8</owner_id><latitude>37.1311</latitude><longitude>-80.4067</longitude><address_elements><venue>St Thomas Episcopal Church</venue><street_address>103 E Main Street</street_address><town>Christiansburg</town><county>Montgomery County</county><state>VA</state><postal_code>24073</postal_code><nation>USA</nation></address_elements><tag8>20:00:00</tag8></value><value sequence_index="21"><id>1142</id><name>K.I.S.S. Group</name><lang>en</lang><coords>37.131100,-80.406700</coords><address>St Thomas Episcopal Church, 103 E Main Street, Christiansburg, VA 24073 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>8</owner_id><latitude>37.1311</latitude><longitude>-80.4067</longitude><address_elements><venue>St Thomas Episcopal Church</venue><street_address>103 E Main Street</street_address><town>Christiansburg</town><county>Montgomery County</county><state>VA</state><postal_code>24073</postal_code><nation>USA</nation></address_elements><tag8>20:00:00</tag8></value></results></places>';    
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 91, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 91, $title);
    }
    
    $title = 'Places Test 91C: Search for Records With Blank County.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_county=&show_details';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = $expected_result = get_xml_header('places').file_get_contents(dirname(__FILE__).'/03-get_string_search_places_tests-91C.xml');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 91, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 91, $title);
    }
}

// --------------------

function basalt_test_define_0092() {
    basalt_run_single_direct_test(92, 'Search For Places Using The State (JSON)', 'GET Simple Direct State Search', 'places_tests');
}

function basalt_test_0092($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 92A: Direct Search for \'DE\' in State (Not Logged In).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_state=DE';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/03-get_string_search_places_tests-92A.json');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 92, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 92, $title);
    }
    
    $title = 'Places Test 92B: Wildcard Search for \'D%\' in State (Not Logged In).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_state=D%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/03-get_string_search_places_tests-92B.json');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 92, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 92, $title);
    }
    
    $title = 'Places Test 92C: Search for Records With Blank State.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_state=';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"results":[]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 92, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 92, $title);
    }
}

// --------------------

function basalt_test_define_0093() {
    basalt_run_single_direct_test(93, 'Search For Places Using The State (XML)', 'GET Simple Direct State Search', 'places_tests');
}

function basalt_test_0093($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 93A: Direct Search for \'DE\' in State (Not Logged In).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_state=DE';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').file_get_contents(dirname(__FILE__).'/03-get_string_search_places_tests-93A.xml');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 93, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 93, $title);
    }
    
    $title = 'Places Test 93B: Wildcard Search for \'D%\' in State (Not Logged In).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_state=D%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').file_get_contents(dirname(__FILE__).'/03-get_string_search_places_tests-93B.xml');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 93, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 93, $title);
    }
    
    $title = 'Places Test 93C: Search for Records With Blank State.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_state=';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'</places>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 93, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 93, $title);
    }
}

// --------------------

function basalt_test_define_0094() {
    basalt_run_single_direct_test(94, 'Search For Places Using The Postal Code (JSON)', 'GET Simple Direct Postal Code Search', 'places_tests');
}

function basalt_test_0094($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 94A: Direct Search for \'20001\' in Postal Code (Not Logged In).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_postal_code=20001';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"results":[{"id":1465,"name":"Into Action","lang":"en","coords":"38.895446,-77.013236","address":"Clean and Sober Street, 425 2nd Street NW, Washington, DC 20001 USA"},{"id":1499,"name":"Courthouse Recovery","lang":"en","coords":"38.896715,-77.016163","address":"First Trinity Luth Church, 501 4th Street NW, Washington, DC 20001 USA"},{"id":1505,"name":"Get It Right","lang":"en","coords":"38.895446,-77.013236","address":"Clean and Sober Street, 425 2nd Street NW, Washington, DC 20001 USA"},{"id":1510,"name":"Sunday Night Spiritual Group","lang":"en","coords":"38.899212,-77.018747","address":"St Marys Church, 727 5th St NW, Washington, DC 20001 USA"},{"id":1523,"name":"Regardless Of Sexual Identity","lang":"en","coords":"38.906370,-77.018642","address":"Metro Community Church, 474 Ridge Street NW, Washington, DC 20001 USA"},{"id":1525,"name":"Saturday Morning Relief","lang":"en","coords":"38.906370,-77.018642","address":"Metro Community Church, 474 Ridge Street NW, Washington, DC 20001 USA"},{"id":1527,"name":"New Way","lang":"en","coords":"38.895446,-77.013236","address":"Clean and Sober Street, 425 2nd Street NW, Washington, DC 20001 USA"},{"id":1534,"name":"11th Step Meeting","lang":"en","coords":"38.915991,-77.009100","address":"St Martins Church, 1908 North Capitol Street NW, Washington, DC 20001 USA"},{"id":1535,"name":"Illness In Recovery","lang":"en","coords":"38.917700,-77.021928","address":"Howard University Hospital, 2041 Georgia Avenue NW, Washington, DC 20001 USA"},{"id":1537,"name":"O Street Steps 123","lang":"en","coords":"38.908440,-77.011113","address":"SOME, 71 O Street NW, Washington, DC 20001 USA"},{"id":1538,"name":"Courthouse Recovery","lang":"en","coords":"38.896715,-77.016163","address":"First Trinity Luth Church, 501 4th Street NW, Washington, DC 20001 USA"},{"id":1540,"name":"Gift of Life","lang":"en","coords":"38.915991,-77.009100","address":"St. Martins Church, 1908 North Capitol Street NW, Washington, DC 20001 USA"},{"id":1543,"name":"Sunday Morning Steps & Traditions","lang":"en","coords":"38.917700,-77.021928","address":"Howard University Hospital, 2041 Georgia Avenue NW, Washington, DC 20001 USA"},{"id":1553,"name":"Another Level of Awareness","lang":"en","coords":"38.895446,-77.013236","address":"Community for Creative Non-Violence, 425 2nd Street NW, Washington, DC 20001 USA"},{"id":1563,"name":"Steps to the Courthouse","lang":"en","coords":"38.899237,-77.018581","address":"717 5th Street NW, Washington, DC 20001 USA"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 94, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 94, $title);
    }
    
    $title = 'Places Test 94B: Wildcard Search for \'200%\' in Postal Code (Not Logged In).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_postal_code=200%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/03-get_string_search_places_tests-94B.json');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 94, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 94, $title);
    }
    
    $title = 'Places Test 94C: Search for Records With Blank Postal Code.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_postal_code=';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"results":[{"id":402,"name":"Women Do Recover","lang":"en","coords":"38.805470,-76.903868","address":"Bells UMC, 6016 Allentown Rd, Suitland, MD USA"},{"id":450,"name":"Another Late Night","lang":"en","coords":"38.263355,-76.460681","address":"Beacon of Hope, 21681 Great Mills Lane, Lexington Park, MD USA"},{"id":473,"name":"Healthy Relationships","lang":"en","coords":"38.693076,-76.538482","address":"4075 Gordon Stinnet Blvd, Chesapeake Beach, MD USA"},{"id":1098,"name":"High Noon Hope","lang":"en","coords":"38.713577,-77.797551","address":"Warrenton Recovery Center, 30 John Marshall Street, Warrenton, VA USA"},{"id":1126,"name":"Gut Level","lang":"en","coords":"38.888283,-77.432494","address":"A New Beginning, 4213 Walney Rd, Chantilly, Va USA"},{"id":1177,"name":"One Day at a Time","lang":"en","coords":"36.727467,-78.128355","address":"105 Franklin Street, South Hill, VA USA"},{"id":1316,"name":"Sunday Sanity","lang":"en","coords":"38.868352,-77.107487","address":"Unitarian Universal Church of Arlington, 4444 Arlington Blvd., Arlington, Va USA"},{"id":1353,"name":"Just For Today Group","lang":"en","coords":"38.882648,-77.171423","address":"Unity Club, 116 W Broad St, Falls Church, VA USA"},{"id":1383,"name":"Exact Nature Mens Meeting","lang":"en","coords":"39.026405,-77.409253","address":"Riverside Presbyterian Church, 21631 Ridgetop Circle,Ste 100, Sterling, VA USA"},{"id":1445,"name":"Bottom of the Mountain","lang":"en","coords":"39.138115,-77.726004","address":"St. Andrews Presbyterian Church, 711 W. Main Street, Purcellville, VA USA"},{"id":1473,"name":"Foundations, Strength & Hope","lang":"en","coords":"38.911921,-77.044308","address":"Dupont Circle Club, 1623 Connecticut Ave. NW, Washington, DC USA"},{"id":1489,"name":"Meeting on the Avenue","lang":"en","coords":"38.959210,-77.072428","address":"Wesley UMC (NW), 5312 Connecticut Avenue, Washington, DC USA"},{"id":1497,"name":"Hope @ Hips","lang":"en","coords":"38.900464,-76.993342","address":"906 H Street  NE, Washington, DC USA"},{"id":1508,"name":"Fire Barrel","lang":"en","coords":"38.922873,-77.072022","address":"St. Lukes UMC, 3655 Calvert St. NW, Washington, DC USA"},{"id":1513,"name":"Live or Die","lang":"en","coords":"38.895347,-77.013259","address":"Clean and Sober Street, 425 2nd St NW, Washington, DC USA"},{"id":1530,"name":"Womens Step and Traditions","lang":"en","coords":"38.915964,-77.009504","address":"St. Martins Church, 1908 N. Capitol Street, DC USA"},{"id":1531,"name":"Mount Olivet Recovery","lang":"en","coords":"38.907665,-77.031004","address":"1306 Vermont Ave NW, Washington, DC USA"},{"id":1541,"name":"Wednesday Nite Mens Rap","lang":"en","coords":"38.889314,-76.932785","address":"St. Lukes Center, 4923 East Capitol St. SE, Washington, DC USA"},{"id":1546,"name":"Still I Rise Womens Rap","lang":"en","coords":"38.893362,-76.960075","address":"Varick Memorial AME Zion Church, 255 Anacostia Ave.  NE, Washington, DC USA"},{"id":1595,"name":"Steps to Recovery","lang":"en","coords":"39.454787,-77.970961","address":"400 W. Stephen St., Martinsburg, WV USA"},{"id":1606,"name":"Steps to Recovery","lang":"en","coords":"39.454787,-77.970961","address":"400 W. Stephen St., Martinsburg, WV USA"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 94, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 94, $title);
    }
}

// --------------------

function basalt_test_define_0095() {
    basalt_run_single_direct_test(95, 'Search For Places Using The Postal Code (XML)', 'GET Simple Direct Postal Code Search', 'places_tests');
}

function basalt_test_0095($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 95A: Direct Search for \'20001\' in Postal Code (Not Logged In).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_postal_code=20001';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<results><value sequence_index="0"><id>1465</id><name>Into Action</name><lang>en</lang><coords>38.895446,-77.013236</coords><address>Clean and Sober Street, 425 2nd Street NW, Washington, DC 20001 USA</address></value><value sequence_index="1"><id>1499</id><name>Courthouse Recovery</name><lang>en</lang><coords>38.896715,-77.016163</coords><address>First Trinity Luth Church, 501 4th Street NW, Washington, DC 20001 USA</address></value><value sequence_index="2"><id>1505</id><name>Get It Right</name><lang>en</lang><coords>38.895446,-77.013236</coords><address>Clean and Sober Street, 425 2nd Street NW, Washington, DC 20001 USA</address></value><value sequence_index="3"><id>1510</id><name>Sunday Night Spiritual Group</name><lang>en</lang><coords>38.899212,-77.018747</coords><address>St Marys Church, 727 5th St NW, Washington, DC 20001 USA</address></value><value sequence_index="4"><id>1523</id><name>Regardless Of Sexual Identity</name><lang>en</lang><coords>38.906370,-77.018642</coords><address>Metro Community Church, 474 Ridge Street NW, Washington, DC 20001 USA</address></value><value sequence_index="5"><id>1525</id><name>Saturday Morning Relief</name><lang>en</lang><coords>38.906370,-77.018642</coords><address>Metro Community Church, 474 Ridge Street NW, Washington, DC 20001 USA</address></value><value sequence_index="6"><id>1527</id><name>New Way</name><lang>en</lang><coords>38.895446,-77.013236</coords><address>Clean and Sober Street, 425 2nd Street NW, Washington, DC 20001 USA</address></value><value sequence_index="7"><id>1534</id><name>11th Step Meeting</name><lang>en</lang><coords>38.915991,-77.009100</coords><address>St Martins Church, 1908 North Capitol Street NW, Washington, DC 20001 USA</address></value><value sequence_index="8"><id>1535</id><name>Illness In Recovery</name><lang>en</lang><coords>38.917700,-77.021928</coords><address>Howard University Hospital, 2041 Georgia Avenue NW, Washington, DC 20001 USA</address></value><value sequence_index="9"><id>1537</id><name>O Street Steps 123</name><lang>en</lang><coords>38.908440,-77.011113</coords><address>SOME, 71 O Street NW, Washington, DC 20001 USA</address></value><value sequence_index="10"><id>1538</id><name>Courthouse Recovery</name><lang>en</lang><coords>38.896715,-77.016163</coords><address>First Trinity Luth Church, 501 4th Street NW, Washington, DC 20001 USA</address></value><value sequence_index="11"><id>1540</id><name>Gift of Life</name><lang>en</lang><coords>38.915991,-77.009100</coords><address>St. Martins Church, 1908 North Capitol Street NW, Washington, DC 20001 USA</address></value><value sequence_index="12"><id>1543</id><name>Sunday Morning Steps &amp; Traditions</name><lang>en</lang><coords>38.917700,-77.021928</coords><address>Howard University Hospital, 2041 Georgia Avenue NW, Washington, DC 20001 USA</address></value><value sequence_index="13"><id>1553</id><name>Another Level of Awareness</name><lang>en</lang><coords>38.895446,-77.013236</coords><address>Community for Creative Non-Violence, 425 2nd Street NW, Washington, DC 20001 USA</address></value><value sequence_index="14"><id>1563</id><name>Steps to the Courthouse</name><lang>en</lang><coords>38.899237,-77.018581</coords><address>717 5th Street NW, Washington, DC 20001 USA</address></value></results></places>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 95, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 95, $title);
    }
    
    $title = 'Places Test 95B: Wildcard Search for \'200%\' in Postal Code (Not Logged In).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_postal_code=200%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').file_get_contents(dirname(__FILE__).'/03-get_string_search_places_tests-95B.xml');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 95, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 95, $title);
    }
    
    $title = 'Places Test 95C: Search for Records With Blank Postal Code.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_postal_code=';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<results><value sequence_index="0"><id>402</id><name>Women Do Recover</name><lang>en</lang><coords>38.805470,-76.903868</coords><address>Bells UMC, 6016 Allentown Rd, Suitland, MD USA</address></value><value sequence_index="1"><id>450</id><name>Another Late Night</name><lang>en</lang><coords>38.263355,-76.460681</coords><address>Beacon of Hope, 21681 Great Mills Lane, Lexington Park, MD USA</address></value><value sequence_index="2"><id>473</id><name>Healthy Relationships</name><lang>en</lang><coords>38.693076,-76.538482</coords><address>4075 Gordon Stinnet Blvd, Chesapeake Beach, MD USA</address></value><value sequence_index="3"><id>1098</id><name>High Noon Hope</name><lang>en</lang><coords>38.713577,-77.797551</coords><address>Warrenton Recovery Center, 30 John Marshall Street, Warrenton, VA USA</address></value><value sequence_index="4"><id>1126</id><name>Gut Level</name><lang>en</lang><coords>38.888283,-77.432494</coords><address>A New Beginning, 4213 Walney Rd, Chantilly, Va USA</address></value><value sequence_index="5"><id>1177</id><name>One Day at a Time</name><lang>en</lang><coords>36.727467,-78.128355</coords><address>105 Franklin Street, South Hill, VA USA</address></value><value sequence_index="6"><id>1316</id><name>Sunday Sanity</name><lang>en</lang><coords>38.868352,-77.107487</coords><address>Unitarian Universal Church of Arlington, 4444 Arlington Blvd., Arlington, Va USA</address></value><value sequence_index="7"><id>1353</id><name>Just For Today Group</name><lang>en</lang><coords>38.882648,-77.171423</coords><address>Unity Club, 116 W Broad St, Falls Church, VA USA</address></value><value sequence_index="8"><id>1383</id><name>Exact Nature Mens Meeting</name><lang>en</lang><coords>39.026405,-77.409253</coords><address>Riverside Presbyterian Church, 21631 Ridgetop Circle,Ste 100, Sterling, VA USA</address></value><value sequence_index="9"><id>1445</id><name>Bottom of the Mountain</name><lang>en</lang><coords>39.138115,-77.726004</coords><address>St. Andrews Presbyterian Church, 711 W. Main Street, Purcellville, VA USA</address></value><value sequence_index="10"><id>1473</id><name>Foundations, Strength &amp; Hope</name><lang>en</lang><coords>38.911921,-77.044308</coords><address>Dupont Circle Club, 1623 Connecticut Ave. NW, Washington, DC USA</address></value><value sequence_index="11"><id>1489</id><name>Meeting on the Avenue</name><lang>en</lang><coords>38.959210,-77.072428</coords><address>Wesley UMC (NW), 5312 Connecticut Avenue, Washington, DC USA</address></value><value sequence_index="12"><id>1497</id><name>Hope @ Hips</name><lang>en</lang><coords>38.900464,-76.993342</coords><address>906 H Street  NE, Washington, DC USA</address></value><value sequence_index="13"><id>1508</id><name>Fire Barrel</name><lang>en</lang><coords>38.922873,-77.072022</coords><address>St. Lukes UMC, 3655 Calvert St. NW, Washington, DC USA</address></value><value sequence_index="14"><id>1513</id><name>Live or Die</name><lang>en</lang><coords>38.895347,-77.013259</coords><address>Clean and Sober Street, 425 2nd St NW, Washington, DC USA</address></value><value sequence_index="15"><id>1530</id><name>Womens Step and Traditions</name><lang>en</lang><coords>38.915964,-77.009504</coords><address>St. Martins Church, 1908 N. Capitol Street, DC USA</address></value><value sequence_index="16"><id>1531</id><name>Mount Olivet Recovery</name><lang>en</lang><coords>38.907665,-77.031004</coords><address>1306 Vermont Ave NW, Washington, DC USA</address></value><value sequence_index="17"><id>1541</id><name>Wednesday Nite Mens Rap</name><lang>en</lang><coords>38.889314,-76.932785</coords><address>St. Lukes Center, 4923 East Capitol St. SE, Washington, DC USA</address></value><value sequence_index="18"><id>1546</id><name>Still I Rise Womens Rap</name><lang>en</lang><coords>38.893362,-76.960075</coords><address>Varick Memorial AME Zion Church, 255 Anacostia Ave.  NE, Washington, DC USA</address></value><value sequence_index="19"><id>1595</id><name>Steps to Recovery</name><lang>en</lang><coords>39.454787,-77.970961</coords><address>400 W. Stephen St., Martinsburg, WV USA</address></value><value sequence_index="20"><id>1606</id><name>Steps to Recovery</name><lang>en</lang><coords>39.454787,-77.970961</coords><address>400 W. Stephen St., Martinsburg, WV USA</address></value></results></places>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 95, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 95, $title);
    }
}

// --------------------

function basalt_test_define_0096() {
    basalt_run_single_direct_test(96, 'Search For Places Using The Nation (JSON)', 'GET Simple Direct Nation Search', 'places_tests');
}

function basalt_test_0096($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 96A: Direct Search for \'US%\' in Nation (Not Logged In). We\'ll get the entire dataset.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_nation=US%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/03-get_string_search_places_tests-96A.json');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 96, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 96, $title);
    }
    
    $title = 'Places Test 96B: Search for Records With Blank Nation. We get nothing.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_nation=';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"results":[]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 96, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 96, $title);
    }
}

// --------------------

function basalt_test_define_0097() {
    basalt_run_single_direct_test(97, 'Search For Places Using The Nation (XML)', 'GET Simple Direct Nation Search', 'places_tests');
}

function basalt_test_0097($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 97A: Direct Search for \'US%\' in Nation (Not Logged In). We\'ll get the entire dataset.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_nation=US%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').file_get_contents(dirname(__FILE__).'/03-get_string_search_places_tests-97A.xml');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 97, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 97, $title);
    }
    
    $title = 'Places Test 97B: Search for Records With Blank Nation. We get nothing.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_nation=';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'</places>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 97, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 97, $title);
    }
}

// --------------------

function basalt_test_define_0098() {
    basalt_run_single_direct_test(98, 'Search For Places Using Tag 8 (JSON)', 'GET Simple Direct Tag 8 Search', 'places_tests');
}

function basalt_test_0098($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 98A: Direct Search for \'17:30:00\' (5:30PM) in Tag 8 (Not Logged In).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_tag8=17:30:00';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"results":[{"id":7,"name":"Addicts With Feelings","lang":"en","coords":"38.567626,-76.064512","address":"Dri-Doc Recovery Wellness Center (TEST_EXTRA_INFO-7), 206 Ocean Gateway, Cambridge, MD 21613 USA"},{"id":53,"name":"A New Beginning","lang":"en","coords":"39.304999,-76.591533","address":"Dees Place, 1212 N. Wolfe St., Baltimore, MD 21213 USA"},{"id":65,"name":"A New Beginning","lang":"en","coords":"39.304999,-76.591533","address":"Dees Place, 1212 N. Wolfe St., Baltimore, MD 21213 USA"},{"id":176,"name":"How It Works Group","lang":"en","coords":"38.367701,-75.554667","address":"Christ United Methodist, Phillip Morris Drive, Salisbury, MD 21804 USA"},{"id":311,"name":"A New Beginning","lang":"en","coords":"39.304999,-76.591533","address":"Dees Place, 1212 N. Wolfe St., Baltimore, MD 21213 USA"},{"id":334,"name":"Up From The Bottom","lang":"en","coords":"39.280641,-76.637616","address":"The Power House, 1352 James St., Baltimore, MD 21223 USA"},{"id":362,"name":"A New Beginning","lang":"en","coords":"39.304999,-76.591533","address":"Dees Place, 1212 N. Wolfe St., Baltimore, MD 21213 USA"},{"id":363,"name":"Faith in the Valley","lang":"en","coords":"39.292511,-76.566210","address":"Recovery for Life Club, 3717 East Baltimore Street, Baltimore, MD 21224 USA"},{"id":902,"name":"It Can Be Done","lang":"en","coords":"38.431736,-78.883257","address":"Sunrise Church of the Brethren, 1496 S. Main Street, Harrisonburg, VA 22801 USA"},{"id":903,"name":"Recovering Renegades","lang":"en","coords":"36.686785,-79.869039","address":"Agape Bible Christian Fellowship, 240 E Market Street, Martinsville, VA 24112 USA"},{"id":904,"name":"NA Sisters in Stride","lang":"en","coords":"37.567090,-77.419309","address":"Fifth Street Baptist Church, 2800 3rd Avenue, Richmond, VA 23222 USA"},{"id":907,"name":"Just For Today","lang":"en","coords":"36.867034,-76.298849","address":"First Lutheran Church, 1301 Colley Avenue, Norfolk, VA 23517 USA"},{"id":985,"name":"The Warriors","lang":"en","coords":"37.090458,-76.386789","address":"Agape Foundations, Inc., 3217 Commander Shepard Blvd, Hampton, VA 23666 USA"},{"id":986,"name":"We Do Recover","lang":"en","coords":"36.674606,-76.943258","address":"Franklin District Building, 161 Steward Drive, Franklin, VA 23851 USA"},{"id":1056,"name":"Friday Feelings","lang":"en","coords":"37.550900,-77.435129","address":"Greater Mount Moriah Baptist Church, 913 North 1st Street, Richmond, VA 23219 USA"},{"id":1101,"name":"Show Me How to Live","lang":"en","coords":"37.618656,-77.559043","address":"Parham Road Baptist Church, 2101 North Parham Road, Richmond, Va 23229 USA"},{"id":1226,"name":"Saturday Night Live","lang":"en","coords":"36.992785,-76.427244","address":"First Baptist Church Jefferson Park, 615 42nd St., Newport News, VA 23607 USA"},{"id":1227,"name":"Back to Life","lang":"en","coords":"36.867034,-76.298849","address":"1st Lutheran Church, 1301 Colley Avenue, Norfolk, VA 23517 USA"},{"id":1282,"name":"Stick and Stay","lang":"en","coords":"36.578311,-79.411342","address":"Ascension Lutheran hurch, 314 West Main Street, Danville, VA 24541 USA"},{"id":1284,"name":"Serene Women","lang":"en","coords":"37.604382,-77.472563","address":"Hatcher Memorial Baptist Church, 2300 Dumbarton Road, Richmond, VA 23228 USA"},{"id":1331,"name":"Survivors","lang":"en","coords":"36.578311,-79.411342","address":"Ascension Lutheran Church, 314 West Main Street, Danville, VA 24541 USA"},{"id":1405,"name":"It Can Be Done","lang":"en","coords":"38.431736,-78.883257","address":"Sunrise Church of the Brethren, 1496 S. Main Street, Harrisonburg, VA 22801 USA"},{"id":1406,"name":"Serenity Group","lang":"en","coords":"37.053782,-76.395470","address":"Riverside Behavioral Health Center, 2244 Executive Drive, Hampton, VA 23666 USA"},{"id":1442,"name":"More Will Be Revealed","lang":"en","coords":"37.530288,-77.414542","address":"Asbury Church Hill United Methodist Church, 324 North 29th Street, Richmond, VA 23223 USA"},{"id":1480,"name":"Whole Lava Love","lang":"en","coords":"38.933435,-77.035814","address":"St Stephens Church, 1530 Newton Street NW, Washington, DC 20010 USA"},{"id":1545,"name":"Progressive Recovery","lang":"en","coords":"38.906986,-77.031561","address":"Luther Place Memorial, 1226 Vermont Ave NW, Washington, DC 20009 USA"},{"id":1616,"name":"Last Chance for Recovery","lang":"en","coords":"39.752574,-75.510497","address":"Muslim Community Center, 2102 Governor Printz Boulevard, Wilmington, DE 19802 USA"},{"id":1657,"name":"Steps to Recovery","lang":"en","coords":"39.757625,-75.536837","address":"1212 Corporation, 2700 North Washington Street, Wilmington, DE 19802 USA"},{"id":1677,"name":"Get It Off Your Chest","lang":"en","coords":"39.757597,-75.536810","address":"1212 Corporation, 2700 North Washington Street, Wilmington, DE 19802 USA"},{"id":1684,"name":"Basic Text Group","lang":"en","coords":"39.746817,-75.547533","address":"First & Central Presbyterian Church, 1101 North Market Street, Wilmington, DE 19801 USA"},{"id":1688,"name":"No More Excuses","lang":"en","coords":"39.327508,-75.624644","address":"Nazarene Church, 1010 Clark Farm Road, Smyrna, DE 19977 USA"}]}}';    
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 98, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 98, $title);
    }
    
    $title = 'Places Test 98B: Wildcard Search for \'17:%\' in Tag 8 (Not Logged In).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_tag8=17:%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"results":[{"id":7,"name":"Addicts With Feelings","lang":"en","coords":"38.567626,-76.064512","address":"Dri-Doc Recovery Wellness Center (TEST_EXTRA_INFO-7), 206 Ocean Gateway, Cambridge, MD 21613 USA"},{"id":51,"name":"Recovery At Five","lang":"en","coords":"39.355390,-76.704266","address":"Park West Medical, 4120 Patterson Avenue, Baltimore, MD 21215 USA"},{"id":52,"name":"Gods Choice","lang":"en","coords":"39.294876,-76.621834","address":"410 W. Franklin St., Baltimore, MD 21201 USA"},{"id":53,"name":"A New Beginning","lang":"en","coords":"39.304999,-76.591533","address":"Dees Place, 1212 N. Wolfe St., Baltimore, MD 21213 USA"},{"id":59,"name":"G.O.D. (Good Orderly Direction)","lang":"en","coords":"39.290153,-76.624961","address":"Baltimore VA Medical Center, 10 North Greene Street, Baltimore, MD 21201 USA"},{"id":65,"name":"A New Beginning","lang":"en","coords":"39.304999,-76.591533","address":"Dees Place, 1212 N. Wolfe St., Baltimore, MD 21213 USA"},{"id":176,"name":"How It Works Group","lang":"en","coords":"38.367701,-75.554667","address":"Christ United Methodist, Phillip Morris Drive, Salisbury, MD 21804 USA"},{"id":211,"name":"Its About Change","lang":"en","coords":"39.298344,-76.664873","address":"St. Edwards Roman Catholic, 901 Poplar Grove St., Baltimore, MD 21216 USA"},{"id":308,"name":"G.O.D. (Good Orderly Direction)","lang":"en","coords":"39.288974,-76.626313","address":"Baltimore VA Medical Center, 10 North Greene Street, Baltimore, MD 21201 USA"},{"id":309,"name":"WE2 - Women Accepting Responsibility","lang":"en","coords":"39.311575,-76.675581","address":"Professional Building, 2200 Garrison Blvd, Baltimore, MD 21216 USA"},{"id":311,"name":"A New Beginning","lang":"en","coords":"39.304999,-76.591533","address":"Dees Place, 1212 N. Wolfe St., Baltimore, MD 21213 USA"},{"id":328,"name":"Dopeless Hope Fiends Group","lang":"en","coords":"39.378678,-76.727759","address":"St. Marks on the Hill, 1620 Reisterstown Road, Pikesville, MD 21208 USA"},{"id":333,"name":"A Way of Life Group","lang":"en","coords":"39.338587,-76.751470","address":"Executive West, 3104 Lord Baltimore Drive, Woodlawn, MD 21244 USA"},{"id":334,"name":"Up From The Bottom","lang":"en","coords":"39.280641,-76.637616","address":"The Power House, 1352 James St., Baltimore, MD 21223 USA"},{"id":362,"name":"A New Beginning","lang":"en","coords":"39.304999,-76.591533","address":"Dees Place, 1212 N. Wolfe St., Baltimore, MD 21213 USA"},{"id":363,"name":"Faith in the Valley","lang":"en","coords":"39.292511,-76.566210","address":"Recovery for Life Club, 3717 East Baltimore Street, Baltimore, MD 21224 USA"},{"id":902,"name":"It Can Be Done","lang":"en","coords":"38.431736,-78.883257","address":"Sunrise Church of the Brethren, 1496 S. Main Street, Harrisonburg, VA 22801 USA"},{"id":903,"name":"Recovering Renegades","lang":"en","coords":"36.686785,-79.869039","address":"Agape Bible Christian Fellowship, 240 E Market Street, Martinsville, VA 24112 USA"},{"id":904,"name":"NA Sisters in Stride","lang":"en","coords":"37.567090,-77.419309","address":"Fifth Street Baptist Church, 2800 3rd Avenue, Richmond, VA 23222 USA"},{"id":907,"name":"Just For Today","lang":"en","coords":"36.867034,-76.298849","address":"First Lutheran Church, 1301 Colley Avenue, Norfolk, VA 23517 USA"},{"id":985,"name":"The Warriors","lang":"en","coords":"37.090458,-76.386789","address":"Agape Foundations, Inc., 3217 Commander Shepard Blvd, Hampton, VA 23666 USA"},{"id":986,"name":"We Do Recover","lang":"en","coords":"36.674606,-76.943258","address":"Franklin District Building, 161 Steward Drive, Franklin, VA 23851 USA"},{"id":1056,"name":"Friday Feelings","lang":"en","coords":"37.550900,-77.435129","address":"Greater Mount Moriah Baptist Church, 913 North 1st Street, Richmond, VA 23219 USA"},{"id":1073,"name":"Rush Hour","lang":"en","coords":"38.278127,-77.448635","address":"Alano Promises Club, 11720 Main Street, Fredericksburg, VA 22408 USA"},{"id":1101,"name":"Show Me How to Live","lang":"en","coords":"37.618656,-77.559043","address":"Parham Road Baptist Church, 2101 North Parham Road, Richmond, Va 23229 USA"},{"id":1221,"name":"Staying Clean","lang":"en","coords":"37.551366,-77.456715","address":"St. Jamess Episcopal Parish House, 1205 West Franklin Street, Richmond, VA 23220 USA"},{"id":1223,"name":"New Hope","lang":"en","coords":"37.556953,-77.473032","address":"Union Street Church, 810 Main Street, Danville, VA 24541 USA"},{"id":1224,"name":"When at the End of the Road","lang":"en","coords":"36.824822,-76.097146","address":"St. Francis Episcopal Church, 509 S Rosemont Road, Virginia Beach, VA 23452 USA"},{"id":1226,"name":"Saturday Night Live","lang":"en","coords":"36.992785,-76.427244","address":"First Baptist Church Jefferson Park, 615 42nd St., Newport News, VA 23607 USA"},{"id":1227,"name":"Back to Life","lang":"en","coords":"36.867034,-76.298849","address":"1st Lutheran Church, 1301 Colley Avenue, Norfolk, VA 23517 USA"},{"id":1282,"name":"Stick and Stay","lang":"en","coords":"36.578311,-79.411342","address":"Ascension Lutheran hurch, 314 West Main Street, Danville, VA 24541 USA"},{"id":1284,"name":"Serene Women","lang":"en","coords":"37.604382,-77.472563","address":"Hatcher Memorial Baptist Church, 2300 Dumbarton Road, Richmond, VA 23228 USA"},{"id":1331,"name":"Survivors","lang":"en","coords":"36.578311,-79.411342","address":"Ascension Lutheran Church, 314 West Main Street, Danville, VA 24541 USA"},{"id":1344,"name":"The Journey Continues","lang":"en","coords":"36.824822,-76.097146","address":"St. Francis Episcopal Church, 509 S Rosemont Road, Virginia Beach, VA 23452 USA"},{"id":1345,"name":"Higher Power Hour","lang":"en","coords":"37.309915,-79.949977","address":"Trinity Lutheran Church, 4040 Williamson Road NW, Roanoke, VA 24012 USA"},{"id":1405,"name":"It Can Be Done","lang":"en","coords":"38.431736,-78.883257","address":"Sunrise Church of the Brethren, 1496 S. Main Street, Harrisonburg, VA 22801 USA"},{"id":1406,"name":"Serenity Group","lang":"en","coords":"37.053782,-76.395470","address":"Riverside Behavioral Health Center, 2244 Executive Drive, Hampton, VA 23666 USA"},{"id":1442,"name":"More Will Be Revealed","lang":"en","coords":"37.530288,-77.414542","address":"Asbury Church Hill United Methodist Church, 324 North 29th Street, Richmond, VA 23223 USA"},{"id":1480,"name":"Whole Lava Love","lang":"en","coords":"38.933435,-77.035814","address":"St Stephens Church, 1530 Newton Street NW, Washington, DC 20010 USA"},{"id":1545,"name":"Progressive Recovery","lang":"en","coords":"38.906986,-77.031561","address":"Luther Place Memorial, 1226 Vermont Ave NW, Washington, DC 20009 USA"},{"id":1599,"name":"Foundations","lang":"en","coords":"39.445315,-77.980260","address":"Callahan Counseling Services, 1020 Winchester Avenue, Martinsburg, WV 25401 USA"},{"id":1616,"name":"Last Chance for Recovery","lang":"en","coords":"39.752574,-75.510497","address":"Muslim Community Center, 2102 Governor Printz Boulevard, Wilmington, DE 19802 USA"},{"id":1657,"name":"Steps to Recovery","lang":"en","coords":"39.757625,-75.536837","address":"1212 Corporation, 2700 North Washington Street, Wilmington, DE 19802 USA"},{"id":1677,"name":"Get It Off Your Chest","lang":"en","coords":"39.757597,-75.536810","address":"1212 Corporation, 2700 North Washington Street, Wilmington, DE 19802 USA"},{"id":1684,"name":"Basic Text Group","lang":"en","coords":"39.746817,-75.547533","address":"First & Central Presbyterian Church, 1101 North Market Street, Wilmington, DE 19801 USA"},{"id":1688,"name":"No More Excuses","lang":"en","coords":"39.327508,-75.624644","address":"Nazarene Church, 1010 Clark Farm Road, Smyrna, DE 19977 USA"}]}}';    
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 98, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 98, $title);
    }
    
    $title = 'Places Test 98C: Search for Records With Blank Tag 8.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_tag8=';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"results":[]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 98, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 98, $title);
    }
}

// --------------------

function basalt_test_define_0099() {
    basalt_run_single_direct_test(99, 'Search For Places Using Tag 8 (XML)', 'GET Simple Direct Tag 8 Search', 'places_tests');
}

function basalt_test_0099($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 99A: Direct Search for \'17:30:00\' (5:30PM) in Tag 8 (Not Logged In).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_tag8=17:30:00';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<results><value sequence_index="0"><id>7</id><name>Addicts With Feelings</name><lang>en</lang><coords>38.567626,-76.064512</coords><address>Dri-Doc Recovery Wellness Center (TEST_EXTRA_INFO-7), 206 Ocean Gateway, Cambridge, MD 21613 USA</address></value><value sequence_index="1"><id>53</id><name>A New Beginning</name><lang>en</lang><coords>39.304999,-76.591533</coords><address>Dees Place, 1212 N. Wolfe St., Baltimore, MD 21213 USA</address></value><value sequence_index="2"><id>65</id><name>A New Beginning</name><lang>en</lang><coords>39.304999,-76.591533</coords><address>Dees Place, 1212 N. Wolfe St., Baltimore, MD 21213 USA</address></value><value sequence_index="3"><id>176</id><name>How It Works Group</name><lang>en</lang><coords>38.367701,-75.554667</coords><address>Christ United Methodist, Phillip Morris Drive, Salisbury, MD 21804 USA</address></value><value sequence_index="4"><id>311</id><name>A New Beginning</name><lang>en</lang><coords>39.304999,-76.591533</coords><address>Dees Place, 1212 N. Wolfe St., Baltimore, MD 21213 USA</address></value><value sequence_index="5"><id>334</id><name>Up From The Bottom</name><lang>en</lang><coords>39.280641,-76.637616</coords><address>The Power House, 1352 James St., Baltimore, MD 21223 USA</address></value><value sequence_index="6"><id>362</id><name>A New Beginning</name><lang>en</lang><coords>39.304999,-76.591533</coords><address>Dees Place, 1212 N. Wolfe St., Baltimore, MD 21213 USA</address></value><value sequence_index="7"><id>363</id><name>Faith in the Valley</name><lang>en</lang><coords>39.292511,-76.566210</coords><address>Recovery for Life Club, 3717 East Baltimore Street, Baltimore, MD 21224 USA</address></value><value sequence_index="8"><id>902</id><name>It Can Be Done</name><lang>en</lang><coords>38.431736,-78.883257</coords><address>Sunrise Church of the Brethren, 1496 S. Main Street, Harrisonburg, VA 22801 USA</address></value><value sequence_index="9"><id>903</id><name>Recovering Renegades</name><lang>en</lang><coords>36.686785,-79.869039</coords><address>Agape Bible Christian Fellowship, 240 E Market Street, Martinsville, VA 24112 USA</address></value><value sequence_index="10"><id>904</id><name>NA Sisters in Stride</name><lang>en</lang><coords>37.567090,-77.419309</coords><address>Fifth Street Baptist Church, 2800 3rd Avenue, Richmond, VA 23222 USA</address></value><value sequence_index="11"><id>907</id><name>Just For Today</name><lang>en</lang><coords>36.867034,-76.298849</coords><address>First Lutheran Church, 1301 Colley Avenue, Norfolk, VA 23517 USA</address></value><value sequence_index="12"><id>985</id><name>The Warriors</name><lang>en</lang><coords>37.090458,-76.386789</coords><address>Agape Foundations, Inc., 3217 Commander Shepard Blvd, Hampton, VA 23666 USA</address></value><value sequence_index="13"><id>986</id><name>We Do Recover</name><lang>en</lang><coords>36.674606,-76.943258</coords><address>Franklin District Building, 161 Steward Drive, Franklin, VA 23851 USA</address></value><value sequence_index="14"><id>1056</id><name>Friday Feelings</name><lang>en</lang><coords>37.550900,-77.435129</coords><address>Greater Mount Moriah Baptist Church, 913 North 1st Street, Richmond, VA 23219 USA</address></value><value sequence_index="15"><id>1101</id><name>Show Me How to Live</name><lang>en</lang><coords>37.618656,-77.559043</coords><address>Parham Road Baptist Church, 2101 North Parham Road, Richmond, Va 23229 USA</address></value><value sequence_index="16"><id>1226</id><name>Saturday Night Live</name><lang>en</lang><coords>36.992785,-76.427244</coords><address>First Baptist Church Jefferson Park, 615 42nd St., Newport News, VA 23607 USA</address></value><value sequence_index="17"><id>1227</id><name>Back to Life</name><lang>en</lang><coords>36.867034,-76.298849</coords><address>1st Lutheran Church, 1301 Colley Avenue, Norfolk, VA 23517 USA</address></value><value sequence_index="18"><id>1282</id><name>Stick and Stay</name><lang>en</lang><coords>36.578311,-79.411342</coords><address>Ascension Lutheran hurch, 314 West Main Street, Danville, VA 24541 USA</address></value><value sequence_index="19"><id>1284</id><name>Serene Women</name><lang>en</lang><coords>37.604382,-77.472563</coords><address>Hatcher Memorial Baptist Church, 2300 Dumbarton Road, Richmond, VA 23228 USA</address></value><value sequence_index="20"><id>1331</id><name>Survivors</name><lang>en</lang><coords>36.578311,-79.411342</coords><address>Ascension Lutheran Church, 314 West Main Street, Danville, VA 24541 USA</address></value><value sequence_index="21"><id>1405</id><name>It Can Be Done</name><lang>en</lang><coords>38.431736,-78.883257</coords><address>Sunrise Church of the Brethren, 1496 S. Main Street, Harrisonburg, VA 22801 USA</address></value><value sequence_index="22"><id>1406</id><name>Serenity Group</name><lang>en</lang><coords>37.053782,-76.395470</coords><address>Riverside Behavioral Health Center, 2244 Executive Drive, Hampton, VA 23666 USA</address></value><value sequence_index="23"><id>1442</id><name>More Will Be Revealed</name><lang>en</lang><coords>37.530288,-77.414542</coords><address>Asbury Church Hill United Methodist Church, 324 North 29th Street, Richmond, VA 23223 USA</address></value><value sequence_index="24"><id>1480</id><name>Whole Lava Love</name><lang>en</lang><coords>38.933435,-77.035814</coords><address>St Stephens Church, 1530 Newton Street NW, Washington, DC 20010 USA</address></value><value sequence_index="25"><id>1545</id><name>Progressive Recovery</name><lang>en</lang><coords>38.906986,-77.031561</coords><address>Luther Place Memorial, 1226 Vermont Ave NW, Washington, DC 20009 USA</address></value><value sequence_index="26"><id>1616</id><name>Last Chance for Recovery</name><lang>en</lang><coords>39.752574,-75.510497</coords><address>Muslim Community Center, 2102 Governor Printz Boulevard, Wilmington, DE 19802 USA</address></value><value sequence_index="27"><id>1657</id><name>Steps to Recovery</name><lang>en</lang><coords>39.757625,-75.536837</coords><address>1212 Corporation, 2700 North Washington Street, Wilmington, DE 19802 USA</address></value><value sequence_index="28"><id>1677</id><name>Get It Off Your Chest</name><lang>en</lang><coords>39.757597,-75.536810</coords><address>1212 Corporation, 2700 North Washington Street, Wilmington, DE 19802 USA</address></value><value sequence_index="29"><id>1684</id><name>Basic Text Group</name><lang>en</lang><coords>39.746817,-75.547533</coords><address>First &amp; Central Presbyterian Church, 1101 North Market Street, Wilmington, DE 19801 USA</address></value><value sequence_index="30"><id>1688</id><name>No More Excuses</name><lang>en</lang><coords>39.327508,-75.624644</coords><address>Nazarene Church, 1010 Clark Farm Road, Smyrna, DE 19977 USA</address></value></results></places>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 99, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 99, $title);
    }
    
    $title = 'Places Test 99B: Wildcard Search for \'17:%\' in Tag 8 (Not Logged In).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_tag8=17:%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<results><value sequence_index="0"><id>7</id><name>Addicts With Feelings</name><lang>en</lang><coords>38.567626,-76.064512</coords><address>Dri-Doc Recovery Wellness Center (TEST_EXTRA_INFO-7), 206 Ocean Gateway, Cambridge, MD 21613 USA</address></value><value sequence_index="1"><id>51</id><name>Recovery At Five</name><lang>en</lang><coords>39.355390,-76.704266</coords><address>Park West Medical, 4120 Patterson Avenue, Baltimore, MD 21215 USA</address></value><value sequence_index="2"><id>52</id><name>Gods Choice</name><lang>en</lang><coords>39.294876,-76.621834</coords><address>410 W. Franklin St., Baltimore, MD 21201 USA</address></value><value sequence_index="3"><id>53</id><name>A New Beginning</name><lang>en</lang><coords>39.304999,-76.591533</coords><address>Dees Place, 1212 N. Wolfe St., Baltimore, MD 21213 USA</address></value><value sequence_index="4"><id>59</id><name>G.O.D. (Good Orderly Direction)</name><lang>en</lang><coords>39.290153,-76.624961</coords><address>Baltimore VA Medical Center, 10 North Greene Street, Baltimore, MD 21201 USA</address></value><value sequence_index="5"><id>65</id><name>A New Beginning</name><lang>en</lang><coords>39.304999,-76.591533</coords><address>Dees Place, 1212 N. Wolfe St., Baltimore, MD 21213 USA</address></value><value sequence_index="6"><id>176</id><name>How It Works Group</name><lang>en</lang><coords>38.367701,-75.554667</coords><address>Christ United Methodist, Phillip Morris Drive, Salisbury, MD 21804 USA</address></value><value sequence_index="7"><id>211</id><name>Its About Change</name><lang>en</lang><coords>39.298344,-76.664873</coords><address>St. Edwards Roman Catholic, 901 Poplar Grove St., Baltimore, MD 21216 USA</address></value><value sequence_index="8"><id>308</id><name>G.O.D. (Good Orderly Direction)</name><lang>en</lang><coords>39.288974,-76.626313</coords><address>Baltimore VA Medical Center, 10 North Greene Street, Baltimore, MD 21201 USA</address></value><value sequence_index="9"><id>309</id><name>WE2 - Women Accepting Responsibility</name><lang>en</lang><coords>39.311575,-76.675581</coords><address>Professional Building, 2200 Garrison Blvd, Baltimore, MD 21216 USA</address></value><value sequence_index="10"><id>311</id><name>A New Beginning</name><lang>en</lang><coords>39.304999,-76.591533</coords><address>Dees Place, 1212 N. Wolfe St., Baltimore, MD 21213 USA</address></value><value sequence_index="11"><id>328</id><name>Dopeless Hope Fiends Group</name><lang>en</lang><coords>39.378678,-76.727759</coords><address>St. Marks on the Hill, 1620 Reisterstown Road, Pikesville, MD 21208 USA</address></value><value sequence_index="12"><id>333</id><name>A Way of Life Group</name><lang>en</lang><coords>39.338587,-76.751470</coords><address>Executive West, 3104 Lord Baltimore Drive, Woodlawn, MD 21244 USA</address></value><value sequence_index="13"><id>334</id><name>Up From The Bottom</name><lang>en</lang><coords>39.280641,-76.637616</coords><address>The Power House, 1352 James St., Baltimore, MD 21223 USA</address></value><value sequence_index="14"><id>362</id><name>A New Beginning</name><lang>en</lang><coords>39.304999,-76.591533</coords><address>Dees Place, 1212 N. Wolfe St., Baltimore, MD 21213 USA</address></value><value sequence_index="15"><id>363</id><name>Faith in the Valley</name><lang>en</lang><coords>39.292511,-76.566210</coords><address>Recovery for Life Club, 3717 East Baltimore Street, Baltimore, MD 21224 USA</address></value><value sequence_index="16"><id>902</id><name>It Can Be Done</name><lang>en</lang><coords>38.431736,-78.883257</coords><address>Sunrise Church of the Brethren, 1496 S. Main Street, Harrisonburg, VA 22801 USA</address></value><value sequence_index="17"><id>903</id><name>Recovering Renegades</name><lang>en</lang><coords>36.686785,-79.869039</coords><address>Agape Bible Christian Fellowship, 240 E Market Street, Martinsville, VA 24112 USA</address></value><value sequence_index="18"><id>904</id><name>NA Sisters in Stride</name><lang>en</lang><coords>37.567090,-77.419309</coords><address>Fifth Street Baptist Church, 2800 3rd Avenue, Richmond, VA 23222 USA</address></value><value sequence_index="19"><id>907</id><name>Just For Today</name><lang>en</lang><coords>36.867034,-76.298849</coords><address>First Lutheran Church, 1301 Colley Avenue, Norfolk, VA 23517 USA</address></value><value sequence_index="20"><id>985</id><name>The Warriors</name><lang>en</lang><coords>37.090458,-76.386789</coords><address>Agape Foundations, Inc., 3217 Commander Shepard Blvd, Hampton, VA 23666 USA</address></value><value sequence_index="21"><id>986</id><name>We Do Recover</name><lang>en</lang><coords>36.674606,-76.943258</coords><address>Franklin District Building, 161 Steward Drive, Franklin, VA 23851 USA</address></value><value sequence_index="22"><id>1056</id><name>Friday Feelings</name><lang>en</lang><coords>37.550900,-77.435129</coords><address>Greater Mount Moriah Baptist Church, 913 North 1st Street, Richmond, VA 23219 USA</address></value><value sequence_index="23"><id>1073</id><name>Rush Hour</name><lang>en</lang><coords>38.278127,-77.448635</coords><address>Alano Promises Club, 11720 Main Street, Fredericksburg, VA 22408 USA</address></value><value sequence_index="24"><id>1101</id><name>Show Me How to Live</name><lang>en</lang><coords>37.618656,-77.559043</coords><address>Parham Road Baptist Church, 2101 North Parham Road, Richmond, Va 23229 USA</address></value><value sequence_index="25"><id>1221</id><name>Staying Clean</name><lang>en</lang><coords>37.551366,-77.456715</coords><address>St. Jamess Episcopal Parish House, 1205 West Franklin Street, Richmond, VA 23220 USA</address></value><value sequence_index="26"><id>1223</id><name>New Hope</name><lang>en</lang><coords>37.556953,-77.473032</coords><address>Union Street Church, 810 Main Street, Danville, VA 24541 USA</address></value><value sequence_index="27"><id>1224</id><name>When at the End of the Road</name><lang>en</lang><coords>36.824822,-76.097146</coords><address>St. Francis Episcopal Church, 509 S Rosemont Road, Virginia Beach, VA 23452 USA</address></value><value sequence_index="28"><id>1226</id><name>Saturday Night Live</name><lang>en</lang><coords>36.992785,-76.427244</coords><address>First Baptist Church Jefferson Park, 615 42nd St., Newport News, VA 23607 USA</address></value><value sequence_index="29"><id>1227</id><name>Back to Life</name><lang>en</lang><coords>36.867034,-76.298849</coords><address>1st Lutheran Church, 1301 Colley Avenue, Norfolk, VA 23517 USA</address></value><value sequence_index="30"><id>1282</id><name>Stick and Stay</name><lang>en</lang><coords>36.578311,-79.411342</coords><address>Ascension Lutheran hurch, 314 West Main Street, Danville, VA 24541 USA</address></value><value sequence_index="31"><id>1284</id><name>Serene Women</name><lang>en</lang><coords>37.604382,-77.472563</coords><address>Hatcher Memorial Baptist Church, 2300 Dumbarton Road, Richmond, VA 23228 USA</address></value><value sequence_index="32"><id>1331</id><name>Survivors</name><lang>en</lang><coords>36.578311,-79.411342</coords><address>Ascension Lutheran Church, 314 West Main Street, Danville, VA 24541 USA</address></value><value sequence_index="33"><id>1344</id><name>The Journey Continues</name><lang>en</lang><coords>36.824822,-76.097146</coords><address>St. Francis Episcopal Church, 509 S Rosemont Road, Virginia Beach, VA 23452 USA</address></value><value sequence_index="34"><id>1345</id><name>Higher Power Hour</name><lang>en</lang><coords>37.309915,-79.949977</coords><address>Trinity Lutheran Church, 4040 Williamson Road NW, Roanoke, VA 24012 USA</address></value><value sequence_index="35"><id>1405</id><name>It Can Be Done</name><lang>en</lang><coords>38.431736,-78.883257</coords><address>Sunrise Church of the Brethren, 1496 S. Main Street, Harrisonburg, VA 22801 USA</address></value><value sequence_index="36"><id>1406</id><name>Serenity Group</name><lang>en</lang><coords>37.053782,-76.395470</coords><address>Riverside Behavioral Health Center, 2244 Executive Drive, Hampton, VA 23666 USA</address></value><value sequence_index="37"><id>1442</id><name>More Will Be Revealed</name><lang>en</lang><coords>37.530288,-77.414542</coords><address>Asbury Church Hill United Methodist Church, 324 North 29th Street, Richmond, VA 23223 USA</address></value><value sequence_index="38"><id>1480</id><name>Whole Lava Love</name><lang>en</lang><coords>38.933435,-77.035814</coords><address>St Stephens Church, 1530 Newton Street NW, Washington, DC 20010 USA</address></value><value sequence_index="39"><id>1545</id><name>Progressive Recovery</name><lang>en</lang><coords>38.906986,-77.031561</coords><address>Luther Place Memorial, 1226 Vermont Ave NW, Washington, DC 20009 USA</address></value><value sequence_index="40"><id>1599</id><name>Foundations</name><lang>en</lang><coords>39.445315,-77.980260</coords><address>Callahan Counseling Services, 1020 Winchester Avenue, Martinsburg, WV 25401 USA</address></value><value sequence_index="41"><id>1616</id><name>Last Chance for Recovery</name><lang>en</lang><coords>39.752574,-75.510497</coords><address>Muslim Community Center, 2102 Governor Printz Boulevard, Wilmington, DE 19802 USA</address></value><value sequence_index="42"><id>1657</id><name>Steps to Recovery</name><lang>en</lang><coords>39.757625,-75.536837</coords><address>1212 Corporation, 2700 North Washington Street, Wilmington, DE 19802 USA</address></value><value sequence_index="43"><id>1677</id><name>Get It Off Your Chest</name><lang>en</lang><coords>39.757597,-75.536810</coords><address>1212 Corporation, 2700 North Washington Street, Wilmington, DE 19802 USA</address></value><value sequence_index="44"><id>1684</id><name>Basic Text Group</name><lang>en</lang><coords>39.746817,-75.547533</coords><address>First &amp; Central Presbyterian Church, 1101 North Market Street, Wilmington, DE 19801 USA</address></value><value sequence_index="45"><id>1688</id><name>No More Excuses</name><lang>en</lang><coords>39.327508,-75.624644</coords><address>Nazarene Church, 1010 Clark Farm Road, Smyrna, DE 19977 USA</address></value></results></places>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 99, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 99, $title);
    }
    
    $title = 'Places Test 99C: Search for Records With Blank Tag 8.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_tag8=';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'</places>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 99, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 99, $title);
    }
}

// --------------------

function basalt_test_define_0100() {
    basalt_run_single_direct_test(100, 'Search For Places Using Tag 9 (JSON)', 'GET Simple Direct Tag 9 Search', 'places_tests_2');
}

function basalt_test_0100($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 100A: Direct Search for \'TEST_TAG-9-5\' in Tag 9 (Not Logged In). We will get one result.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_tag9=TEST_TAG-9-5&show_details';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"results":[{"id":5,"name":"What We Can Do at Noon Group","lang":"en","coords":"38.357291,-75.600070","address":"Salisbury Substance Abuse Community Center (TEST_EXTRA_INFO-5), 726 South Salisbury Boulevard, Suite E, Salisbury, MD 21801 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":38.357291,"longitude":-75.60007,"address_elements":{"venue":"Salisbury Substance Abuse Community Center","street_address":"726 South Salisbury Boulevard, Suite E","extra_information":"TEST_EXTRA_INFO-5","town":"Salisbury","county":"Wicomico","state":"MD","postal_code":"21801","nation":"USA"},"tag8":"12:00:00","tag9":"TEST_TAG-9-5"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 100, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 100, $title);
    }
    
    $title = 'Places Test 100B: Wildcard Search for \'TEST_TAG-9-%\' in Tag 9 (Not Logged In). We will get six results.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?search_tag9=TEST_TAG-9-%&show_details';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"places":{"results":[{"id":2,"name":"New Start","lang":"en","coords":"39.059283,-76.877007","address":"Queens Chapel United Methodist Church (TEST_EXTRA_INFO-2), 7410 Old Muirkirk Road, Beltsville, MD 20705 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":39.059283,"longitude":-76.877007,"address_elements":{"venue":"Queens Chapel United Methodist Church","street_address":"7410 Old Muirkirk Road","extra_information":"TEST_EXTRA_INFO-2","town":"Beltsville","state":"MD","postal_code":"20705","nation":"USA"},"tag8":"20:00:00","tag9":"TEST_TAG-9-2"},{"id":3,"name":"Dealing With Feelings","lang":"en","coords":"38.564376,-76.078324","address":"New Way of Life Club (TEST_EXTRA_INFO-3), 742 Race St., Cambridge, MD 21613 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":38.564376,"longitude":-76.078324,"address_elements":{"venue":"New Way of Life Club","street_address":"742 Race St.","extra_information":"TEST_EXTRA_INFO-3","town":"Cambridge","county":"Dorchester","state":"MD","postal_code":"21613","nation":"USA"},"tag8":"12:00:00","tag9":"TEST_TAG-9-3"},{"id":4,"name":"Hamilton Noon","lang":"en","coords":"39.350807,-76.562445","address":"Faith Community UMC (TEST_EXTRA_INFO-4), 5315 Harford Rd., Baltimore, MD 21214 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":39.350807,"longitude":-76.562445,"address_elements":{"venue":"Faith Community UMC","street_address":"5315 Harford Rd.","extra_information":"TEST_EXTRA_INFO-4","town":"Baltimore","county":"Baltimore City","state":"MD","postal_code":"21214","nation":"USA"},"tag8":"12:00:00","tag9":"TEST_TAG-9-4"},{"id":5,"name":"What We Can Do at Noon Group","lang":"en","coords":"38.357291,-75.600070","address":"Salisbury Substance Abuse Community Center (TEST_EXTRA_INFO-5), 726 South Salisbury Boulevard, Suite E, Salisbury, MD 21801 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":38.357291,"longitude":-75.60007,"address_elements":{"venue":"Salisbury Substance Abuse Community Center","street_address":"726 South Salisbury Boulevard, Suite E","extra_information":"TEST_EXTRA_INFO-5","town":"Salisbury","county":"Wicomico","state":"MD","postal_code":"21801","nation":"USA"},"tag8":"12:00:00","tag9":"TEST_TAG-9-5"},{"id":6,"name":"Search For Serenity","lang":"en","coords":"38.761961,-76.913016","address":"Prince Georges Health Dept (TEST_EXTRA_INFO-6), 9314 Piscataway Rd, Clinton, MD 20735 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":38.761961,"longitude":-76.913016,"address_elements":{"venue":"Prince Georges Health Dept","street_address":"9314 Piscataway Rd","extra_information":"TEST_EXTRA_INFO-6","town":"Clinton","county":"Prince Georges County","state":"MD","postal_code":"20735","nation":"USA"},"tag8":"18:30:00","tag9":"TEST_TAG-9-6"},{"id":7,"name":"Addicts With Feelings","lang":"en","coords":"38.567626,-76.064512","address":"Dri-Doc Recovery Wellness Center (TEST_EXTRA_INFO-7), 206 Ocean Gateway, Cambridge, MD 21613 USA","last_access":"1970-01-02 00:00:00","owner_id":7,"latitude":38.567626,"longitude":-76.064512,"address_elements":{"venue":"Dri-Doc Recovery Wellness Center","street_address":"206 Ocean Gateway","extra_information":"TEST_EXTRA_INFO-7","town":"Cambridge","county":"Dorchester","state":"MD","postal_code":"21613","nation":"USA"},"tag8":"17:30:00","tag9":"TEST_TAG-9-7"}]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 100, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 100, $title);
    }
    
    $title = 'Places Test 100C: Search for Records With Blank Tag 9. The first six results will not be included in the response.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/places?tag9=&show_details';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/03-get_string_search_places_tests-100C.json');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_json(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 100, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 100, $title);
    }
}

// --------------------

function basalt_test_define_0101() {
    basalt_run_single_direct_test(101, 'Search For Places Using Tag 9 (XML)', 'GET Simple Direct Tag 9 Search', 'places_tests_2');
}

function basalt_test_0101($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 101A: Direct Search for \'TEST_TAG-9-5\' in Tag 9 (Not Logged In). We will get one result.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_tag9=TEST_TAG-9-5&show_details';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<results><value sequence_index="0"><id>5</id><name>What We Can Do at Noon Group</name><lang>en</lang><coords>38.357291,-75.600070</coords><address>Salisbury Substance Abuse Community Center (TEST_EXTRA_INFO-5), 726 South Salisbury Boulevard, Suite E, Salisbury, MD 21801 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>38.357291</latitude><longitude>-75.60007</longitude><address_elements><venue>Salisbury Substance Abuse Community Center</venue><street_address>726 South Salisbury Boulevard, Suite E</street_address><extra_information>TEST_EXTRA_INFO-5</extra_information><town>Salisbury</town><county>Wicomico</county><state>MD</state><postal_code>21801</postal_code><nation>USA</nation></address_elements><tag8>12:00:00</tag8><tag9>TEST_TAG-9-5</tag9></value></results></places>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 101, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 101, $title);
    }
    
    $title = 'Places Test 101B: Wildcard Search for \'TEST_TAG-9-%\' in Tag 9 (Not Logged In). We will get six results.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?search_tag9=TEST_TAG-9-%&show_details';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').'<results><value sequence_index="0"><id>2</id><name>New Start</name><lang>en</lang><coords>39.059283,-76.877007</coords><address>Queens Chapel United Methodist Church (TEST_EXTRA_INFO-2), 7410 Old Muirkirk Road, Beltsville, MD 20705 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>39.059283</latitude><longitude>-76.877007</longitude><address_elements><venue>Queens Chapel United Methodist Church</venue><street_address>7410 Old Muirkirk Road</street_address><extra_information>TEST_EXTRA_INFO-2</extra_information><town>Beltsville</town><state>MD</state><postal_code>20705</postal_code><nation>USA</nation></address_elements><tag8>20:00:00</tag8><tag9>TEST_TAG-9-2</tag9></value><value sequence_index="1"><id>3</id><name>Dealing With Feelings</name><lang>en</lang><coords>38.564376,-76.078324</coords><address>New Way of Life Club (TEST_EXTRA_INFO-3), 742 Race St., Cambridge, MD 21613 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>38.564376</latitude><longitude>-76.078324</longitude><address_elements><venue>New Way of Life Club</venue><street_address>742 Race St.</street_address><extra_information>TEST_EXTRA_INFO-3</extra_information><town>Cambridge</town><county>Dorchester</county><state>MD</state><postal_code>21613</postal_code><nation>USA</nation></address_elements><tag8>12:00:00</tag8><tag9>TEST_TAG-9-3</tag9></value><value sequence_index="2"><id>4</id><name>Hamilton Noon</name><lang>en</lang><coords>39.350807,-76.562445</coords><address>Faith Community UMC (TEST_EXTRA_INFO-4), 5315 Harford Rd., Baltimore, MD 21214 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>39.350807</latitude><longitude>-76.562445</longitude><address_elements><venue>Faith Community UMC</venue><street_address>5315 Harford Rd.</street_address><extra_information>TEST_EXTRA_INFO-4</extra_information><town>Baltimore</town><county>Baltimore City</county><state>MD</state><postal_code>21214</postal_code><nation>USA</nation></address_elements><tag8>12:00:00</tag8><tag9>TEST_TAG-9-4</tag9></value><value sequence_index="3"><id>5</id><name>What We Can Do at Noon Group</name><lang>en</lang><coords>38.357291,-75.600070</coords><address>Salisbury Substance Abuse Community Center (TEST_EXTRA_INFO-5), 726 South Salisbury Boulevard, Suite E, Salisbury, MD 21801 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>38.357291</latitude><longitude>-75.60007</longitude><address_elements><venue>Salisbury Substance Abuse Community Center</venue><street_address>726 South Salisbury Boulevard, Suite E</street_address><extra_information>TEST_EXTRA_INFO-5</extra_information><town>Salisbury</town><county>Wicomico</county><state>MD</state><postal_code>21801</postal_code><nation>USA</nation></address_elements><tag8>12:00:00</tag8><tag9>TEST_TAG-9-5</tag9></value><value sequence_index="4"><id>6</id><name>Search For Serenity</name><lang>en</lang><coords>38.761961,-76.913016</coords><address>Prince Georges Health Dept (TEST_EXTRA_INFO-6), 9314 Piscataway Rd, Clinton, MD 20735 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>38.761961</latitude><longitude>-76.913016</longitude><address_elements><venue>Prince Georges Health Dept</venue><street_address>9314 Piscataway Rd</street_address><extra_information>TEST_EXTRA_INFO-6</extra_information><town>Clinton</town><county>Prince Georges County</county><state>MD</state><postal_code>20735</postal_code><nation>USA</nation></address_elements><tag8>18:30:00</tag8><tag9>TEST_TAG-9-6</tag9></value><value sequence_index="5"><id>7</id><name>Addicts With Feelings</name><lang>en</lang><coords>38.567626,-76.064512</coords><address>Dri-Doc Recovery Wellness Center (TEST_EXTRA_INFO-7), 206 Ocean Gateway, Cambridge, MD 21613 USA</address><last_access>1970-01-02 00:00:00</last_access><owner_id>7</owner_id><latitude>38.567626</latitude><longitude>-76.064512</longitude><address_elements><venue>Dri-Doc Recovery Wellness Center</venue><street_address>206 Ocean Gateway</street_address><extra_information>TEST_EXTRA_INFO-7</extra_information><town>Cambridge</town><county>Dorchester</county><state>MD</state><postal_code>21613</postal_code><nation>USA</nation></address_elements><tag8>17:30:00</tag8><tag9>TEST_TAG-9-7</tag9></value></results></places>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 101, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 101, $title);
    }
    
    $title = 'Places Test 101C: Search for Records With Blank Tag 9. The first six results will not be included in the response.';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/places?tag9=&show_details';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('places').file_get_contents(dirname(__FILE__).'/03-get_string_search_places_tests-101C.xml');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = clean_last_access_xml(call_REST_API($method, $uri, $data, $api_key, $result_code));
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 101, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 101, $title);
    }
}
?>
