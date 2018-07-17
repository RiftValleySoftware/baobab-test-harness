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

baobab_run_tests(80, 'STRING SEARCH TESTS', '');

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
?>
