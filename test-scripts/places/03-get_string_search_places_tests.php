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
    $title = 'Places Test 80A: Direct Search for \'JUST FOR TODAY\' in the Name (Not Logged In)';
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
    
}

// --------------------

function basalt_test_define_0081() {
    basalt_run_single_direct_test(81, 'Search For Places Using Simple Name (XML)', 'GET Simple Direct Name Search for \'Just For Today.\'', 'places_tests');
}

function basalt_test_0081($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Places Test 81A: Direct Search for \'JUST FOR TODAY\' in the Name (Not Logged In)';
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
    
}
?>
