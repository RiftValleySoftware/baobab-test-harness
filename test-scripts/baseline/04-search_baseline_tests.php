<?php
/***************************************************************************************************************************/
/**
    BASALT Extension Layer
    
    © Copyright 2018, Little Green Viper Software Development LLC/The Great Rift Valley Software Company
    
    LICENSE:
    

    Little Green Viper Software Development: https://littlegreenviper.com
*/
// ------------------------------ MAIN CODE -------------------------------------------

require_once(dirname(dirname(dirname(__FILE__))).'/php/run_baobab_tests.php');

baobab_run_tests(10, '10-15: LOCATION-CENTERED RESOURCE-NEUTRAL BASELINE SEARCHES', 'We use a radius/long-lat search to find resources with the baseline plugin, which returns them as groups of IDs.');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0010() {
    basalt_run_single_direct_test(10, 'Simple Location/Radius Search (JSON)', 'Search for all resources within 5Km of a spot in the Potomac River.', 'baseline_tests');
}

function basalt_test_0010($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Baseline Test 10: Do a 5KM Radius Search in the middle of the Potomac River (Medium Response).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_radius=5&search_longitude=-77.032081&search_latitude=38.877741';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"places":[1572,1466,1565,1499,1538,1517,1513,1465,1505,1527,1553,1510,1563,1555,1539,1492,1545,1531,1523,1525,1522,1488,1537,1554,1501,1507,1548,1478,1473,1460,1516,1232,1533,1569,1520,1496,1497,1493,1557,1469,1474,1498,1526,1560,1535,1543,1482,1503,1566,1462,1530,1540,1562,1558,1547,1481,1534,1500,1477,1463,1468,1567],"people":[1727,1726],"things":[1741,1744],"search_location":{"radius":5,"longitude":-77.032081,"latitude":38.877741}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 10, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 10, $title);
    }
}

// --------------------

function basalt_test_define_0011() {
    basalt_run_single_direct_test(11, 'Simple Location/Radius Search (XML)', 'Search for all resources within 5Km of a spot in the Potomac River.', 'baseline_tests');
}

function basalt_test_0011($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Baseline Test 11: Do a 5KM Radius Search in the middle of the Potomac River (Medium Response).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_radius=5&search_longitude=-77.032081&search_latitude=38.877741';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').'<places><value sequence_index="0">1572</value><value sequence_index="1">1466</value><value sequence_index="2">1565</value><value sequence_index="3">1499</value><value sequence_index="4">1538</value><value sequence_index="5">1517</value><value sequence_index="6">1513</value><value sequence_index="7">1465</value><value sequence_index="8">1505</value><value sequence_index="9">1527</value><value sequence_index="10">1553</value><value sequence_index="11">1510</value><value sequence_index="12">1563</value><value sequence_index="13">1555</value><value sequence_index="14">1539</value><value sequence_index="15">1492</value><value sequence_index="16">1545</value><value sequence_index="17">1531</value><value sequence_index="18">1523</value><value sequence_index="19">1525</value><value sequence_index="20">1522</value><value sequence_index="21">1488</value><value sequence_index="22">1537</value><value sequence_index="23">1554</value><value sequence_index="24">1501</value><value sequence_index="25">1507</value><value sequence_index="26">1548</value><value sequence_index="27">1478</value><value sequence_index="28">1473</value><value sequence_index="29">1460</value><value sequence_index="30">1516</value><value sequence_index="31">1232</value><value sequence_index="32">1533</value><value sequence_index="33">1569</value><value sequence_index="34">1520</value><value sequence_index="35">1496</value><value sequence_index="36">1497</value><value sequence_index="37">1493</value><value sequence_index="38">1557</value><value sequence_index="39">1469</value><value sequence_index="40">1474</value><value sequence_index="41">1498</value><value sequence_index="42">1526</value><value sequence_index="43">1560</value><value sequence_index="44">1535</value><value sequence_index="45">1543</value><value sequence_index="46">1482</value><value sequence_index="47">1503</value><value sequence_index="48">1566</value><value sequence_index="49">1462</value><value sequence_index="50">1530</value><value sequence_index="51">1540</value><value sequence_index="52">1562</value><value sequence_index="53">1558</value><value sequence_index="54">1547</value><value sequence_index="55">1481</value><value sequence_index="56">1534</value><value sequence_index="57">1500</value><value sequence_index="58">1477</value><value sequence_index="59">1463</value><value sequence_index="60">1468</value><value sequence_index="61">1567</value></places><people><value sequence_index="0">1727</value><value sequence_index="1">1726</value></people><things><value sequence_index="0">1741</value><value sequence_index="1">1744</value></things><search_location><radius>5</radius><longitude>-77.032081</longitude><latitude>38.877741</latitude></search_location></baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 11, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 11, $title);
    }
}

// --------------------

function basalt_test_define_0012() {
    basalt_run_single_direct_test(12, 'Simple Location/Radius Search (JSON)', 'Search for all resources within 10Km of Princeton, West Virginia.', 'baseline_tests');
}

function basalt_test_0012($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Baseline Test 12A: Search for all resources within 10Km of Princeton, West Virginia (Empty Response).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_radius=10&search_longitude=-81.094659&search_latitude=37.367334';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"search_location":{"radius":10,"longitude":-81.094659,"latitude":37.367334}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 12, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 12, $title);
    }
    
    $title = 'Baseline Test 12B: Try again, but at 50KM (Small Response).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_radius=50&search_longitude=-81.094659&search_latitude=37.367334';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"places":[1250,1059,1233,1283,962,1199,1391],"search_location":{"radius":50,"longitude":-81.094659,"latitude":37.367334}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 12, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 12, $title);
    }
    
    $title = 'Baseline Test 12B: Try again, but at 200KM (Medium Response).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_radius=200&search_longitude=-81.094659&search_latitude=37.367334';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"places":[1250,1059,1233,1283,962,1199,1391,974,1142,1313,1294,1028,999,1071,1007,1044,1021,1290,1182,1264,976,1146,953,1299,1048,1211,1000,1164,1345,979,956,1399,1254,933,1149,1304,1323,1002,1015,1055,1314,1127,1151,1150,1393,1395,1153,903,1325,1280,908,1031,1184,939,1351,941,1402,1138,894,1261,1231,1078,1312,990,1094,1095,1355,1277,940,1137,1430,1373,1438,1407,1099,893,963,1319,1152,1050,1330,1026,1266,1198,1255,1310,1087,906,988,1061,1212,1282,1331,943,1165,1054,1356,1270,992,1103,1237],"search_location":{"radius":200,"longitude":-81.094659,"latitude":37.367334}}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 12, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 12, $title);
    }
}

// --------------------

function basalt_test_define_0013() {
    basalt_run_single_direct_test(13, 'Simple Location/Radius Search (XML)', 'Search for all resources within 10Km of Princeton, West Virginia.', 'baseline_tests');
}

function basalt_test_0013($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Baseline Test 13A: Search for all resources within 10Km of Princeton, West Virginia (Empty Response).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_radius=10&search_longitude=-81.094659&search_latitude=37.367334';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').'<search_location><radius>10</radius><longitude>-81.094659</longitude><latitude>37.367334</latitude></search_location></baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 13, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 13, $title);
    }
    
    $title = 'Baseline Test 13B: Try again, but at 50KM (Small Response).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_radius=50&search_longitude=-81.094659&search_latitude=37.367334';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').'<places><value sequence_index="0">1250</value><value sequence_index="1">1059</value><value sequence_index="2">1233</value><value sequence_index="3">1283</value><value sequence_index="4">962</value><value sequence_index="5">1199</value><value sequence_index="6">1391</value></places><search_location><radius>50</radius><longitude>-81.094659</longitude><latitude>37.367334</latitude></search_location></baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 13, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 13, $title);
    }
    
    $title = 'Baseline Test 13B: Try again, but at 200KM (Medium Response).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_radius=200&search_longitude=-81.094659&search_latitude=37.367334';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').'<places><value sequence_index="0">1250</value><value sequence_index="1">1059</value><value sequence_index="2">1233</value><value sequence_index="3">1283</value><value sequence_index="4">962</value><value sequence_index="5">1199</value><value sequence_index="6">1391</value><value sequence_index="7">974</value><value sequence_index="8">1142</value><value sequence_index="9">1313</value><value sequence_index="10">1294</value><value sequence_index="11">1028</value><value sequence_index="12">999</value><value sequence_index="13">1071</value><value sequence_index="14">1007</value><value sequence_index="15">1044</value><value sequence_index="16">1021</value><value sequence_index="17">1290</value><value sequence_index="18">1182</value><value sequence_index="19">1264</value><value sequence_index="20">976</value><value sequence_index="21">1146</value><value sequence_index="22">953</value><value sequence_index="23">1299</value><value sequence_index="24">1048</value><value sequence_index="25">1211</value><value sequence_index="26">1000</value><value sequence_index="27">1164</value><value sequence_index="28">1345</value><value sequence_index="29">979</value><value sequence_index="30">956</value><value sequence_index="31">1399</value><value sequence_index="32">1254</value><value sequence_index="33">933</value><value sequence_index="34">1149</value><value sequence_index="35">1304</value><value sequence_index="36">1323</value><value sequence_index="37">1002</value><value sequence_index="38">1015</value><value sequence_index="39">1055</value><value sequence_index="40">1314</value><value sequence_index="41">1127</value><value sequence_index="42">1151</value><value sequence_index="43">1150</value><value sequence_index="44">1393</value><value sequence_index="45">1395</value><value sequence_index="46">1153</value><value sequence_index="47">903</value><value sequence_index="48">1325</value><value sequence_index="49">1280</value><value sequence_index="50">908</value><value sequence_index="51">1031</value><value sequence_index="52">1184</value><value sequence_index="53">939</value><value sequence_index="54">1351</value><value sequence_index="55">941</value><value sequence_index="56">1402</value><value sequence_index="57">1138</value><value sequence_index="58">894</value><value sequence_index="59">1261</value><value sequence_index="60">1231</value><value sequence_index="61">1078</value><value sequence_index="62">1312</value><value sequence_index="63">990</value><value sequence_index="64">1094</value><value sequence_index="65">1095</value><value sequence_index="66">1355</value><value sequence_index="67">1277</value><value sequence_index="68">940</value><value sequence_index="69">1137</value><value sequence_index="70">1430</value><value sequence_index="71">1373</value><value sequence_index="72">1438</value><value sequence_index="73">1407</value><value sequence_index="74">1099</value><value sequence_index="75">893</value><value sequence_index="76">963</value><value sequence_index="77">1319</value><value sequence_index="78">1152</value><value sequence_index="79">1050</value><value sequence_index="80">1330</value><value sequence_index="81">1026</value><value sequence_index="82">1266</value><value sequence_index="83">1198</value><value sequence_index="84">1255</value><value sequence_index="85">1310</value><value sequence_index="86">1087</value><value sequence_index="87">906</value><value sequence_index="88">988</value><value sequence_index="89">1061</value><value sequence_index="90">1212</value><value sequence_index="91">1282</value><value sequence_index="92">1331</value><value sequence_index="93">943</value><value sequence_index="94">1165</value><value sequence_index="95">1054</value><value sequence_index="96">1356</value><value sequence_index="97">1270</value><value sequence_index="98">992</value><value sequence_index="99">1103</value><value sequence_index="100">1237</value></places><search_location><radius>200</radius><longitude>-81.094659</longitude><latitude>37.367334</latitude></search_location></baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 13, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 13, $title);
    }
}

// --------------------

function basalt_test_define_0014() {
    basalt_run_single_direct_test(14, 'No Search Criteria Search (JSON)', 'Just find everything (no query arguments).', 'baseline_tests');
}

function basalt_test_0014($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Baseline Test 14A: Don\'t log in, and do a "blank" search (Large Response).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/04-search_baseline_tests-14A-Value.txt');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 14, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 14, $title);
    }
    
    $result_code = '';
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);

    $title = 'Baseline Test 14B: Log in, and do a "blank" search (Large Response).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/04-search_baseline_tests-14B-Value.txt');
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 14, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 14, $title);
    }
}

// --------------------

function basalt_test_define_0015() {
    basalt_run_single_direct_test(15, 'No Search Criteria Search (XML)', 'Just find everything (no query arguments).', 'baseline_tests');
}

function basalt_test_0015($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Baseline Test 15A: Don\'t log in, and do a "blank" search (Large Response).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').file_get_contents(dirname(__FILE__).'/04-search_baseline_tests-15A-Value.txt').'</baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 15, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 15, $title);
    }
    
    $result_code = '';
    $api_key = call_REST_API('GET', __SERVER_URI__.'/login?login_id=MainAdmin&password=CoreysGoryStory', NULL, NULL, $result_code);

    $title = 'Baseline Test 15B: Log in, and do a "blank" search (Large Response).';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search';
    $data = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').file_get_contents(dirname(__FILE__).'/04-search_baseline_tests-15B-Value.txt').'</baseline>';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 15, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 15, $title);
    }
}
?>
