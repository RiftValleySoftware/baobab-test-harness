<?php
/***************************************************************************************************************************/
/**
    BASALT Extension Layer
    
    © Copyright 2018, Little Green Viper Software Development LLC.
    
    This code is proprietary and confidential code, 
    It is NOT to be reused or combined into any application,
    unless done so, specifically under written license from Little Green Viper Software Development LLC.

    Little Green Viper Software Development: https://littlegreenviper.com
*/
// ------------------------------ MAIN CODE -------------------------------------------

require_once(dirname(dirname(dirname(__FILE__))).'/php/run_baobab_tests.php');

baobab_run_tests(10, 'LOCATION-CENTERED RESOURCE-NEUTRAL BASELINE SEARCHES', 'We use a radius/long-lat search to find resources with the baseline plugin, which returns them as groups of IDs.');

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
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
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
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
    }
}
?>
