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

baobab_run_tests(6, 'RESOURCE-NEUTRAL TAG STRING BASELINE SEARCHES', 'We search for resources with the baseline plugin (GET), which returns them as groups of IDs. We will not log in for any of these tests, so only publicly-visible resources should be returned.');

// -------------------------- DEFINITIONS AND TESTS -----------------------------------

function basalt_test_define_0006() {
    basalt_run_single_direct_test(6, 'Individual Tag Search (JSON)', 'Do a more comprehensive search on the tags in objects.', 'baseline_tests');
}

function basalt_test_0006($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Baseline Test 6A: Test With A Fairly Specific Tag 0 (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag0=Grace+United+Methodist+Church';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"places":[1592,1721]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 6, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 6, $title);
    }
    
    $title = 'Baseline Test 6B: Test With A Fairly Vague Tag 0 (Large Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag0=%Church%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/03-search_baseline_tests-6B-Value.txt');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 6, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 6, $title);
    }
    
    $title = 'Baseline Test 6C: Test With A Fairly Specific Tag 1 (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag1=1101+West+Pratt+Street';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"places":[187,310]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 6, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 6, $title);
    }
    
    $title = 'Baseline Test 6D: Test With A Fairly Vague Tag 1 (Large Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag1=11%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/03-search_baseline_tests-6D-Value.txt');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 6, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 6, $title);
    }
    
    $title = 'Baseline Test 6E: Test With A Fairly Specific Tag 2 (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag2=TAG-2-TEST-THINGS';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"things":[1732,1733,1734,1736]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 6, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 6, $title);
    }
    
    $title = 'Baseline Test 6F: Test With A Fairly Vague Tag 2 (Larger Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag2=TAG-2-TEST%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"people":[1725,1727,1729],"things":[1732,1733,1734,1736]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 6, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 6, $title);
    }
    
    $title = 'Baseline Test 6G: Test With A Fairly Specific Tag 3 (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag3=waldorf';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"places":[10,31,80]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 6, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 6, $title);
    }
    
    $title = 'Baseline Test 6H: Test With A Fairly Specific Tag 3, but A Common Tag (Large Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag3=baltimore';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/03-search_baseline_tests-6H-Value.txt');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 6, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 6, $title);
    }
    
    $title = 'Baseline Test 6I: Test With A Fairly Vague Tag 3 (Large Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag3=w%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/03-search_baseline_tests-6I-Value.txt');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 6, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 6, $title);
    }
    
    $title = 'Baseline Test 6J: Test With A Fairly Specific Tag 4 (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag4=Clarke+County';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"places":[995,1091,1260]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 6, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 6, $title);
    }
    
    $title = 'Baseline Test 6K: Test With Another Fairly Specific Tag 4 (Medium Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag4=Montgomery+County';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"places":[32,46,66,76,109,110,123,207,258,291,325,332,364,398,415,434,435,440,974,1142]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 6, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 6, $title);
    }
    
    $title = 'Baseline Test 6L: Test With A Fairly Vague Tag 4 (Large Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag4=%county';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/03-search_baseline_tests-6L-Value.txt');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 6, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 6, $title);
    }
    
    $title = 'Baseline Test 6M: Test With A Fairly Specific Tag 5 (Medium Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag5=DE';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"places":[1615,1616,1617,1618,1619,1620,1621,1622,1623,1624,1625,1626,1627,1628,1629,1630,1631,1632,1633,1634,1635,1636,1637,1638,1639,1640,1641,1642,1643,1644,1645,1646,1647,1648,1649,1650,1651,1652,1653,1654,1655,1656,1657,1658,1659,1660,1661,1662,1663,1664,1665,1666,1667,1668,1669,1670,1671,1672,1673,1674,1675,1676,1677,1678,1679,1680,1681,1682,1683,1684,1685,1686,1687,1688,1689,1690,1691,1692,1693,1694,1695,1696,1697,1698,1699,1700,1701,1702,1703,1704,1705,1706,1707,1708,1709,1710,1711,1712,1713,1714,1715,1716,1717,1718,1719,1720,1721,1722,1723,1724]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 6, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 6, $title);
    }
    
    $title = 'Baseline Test 6N: Test With A Fairly Vague Tag 5 (Large Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag5=D%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/03-search_baseline_tests-6N-Value.txt');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 6, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 6, $title);
    }
    
    $title = 'Baseline Test 6O: Test With A Fairly Specific Tag 6 (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag6=23455';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"places":[926,927,954,977,1089,1174,1181,1435]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 6, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 6, $title);
    }
    
    $title = 'Baseline Test 6P: Test With An Empty Tag 6 (Medium Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag6=';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"places":[402,450,473,1098,1126,1177,1316,1353,1383,1445,1473,1489,1497,1508,1513,1530,1531,1541,1546,1595,1606],"people":[1725,1726,1727,1728,1729],"things":[1732,1733,1734,1735,1736,1737,1738,1739,1740,1741,1742,1743,1744]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 6, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 6, $title);
    }
    
    $title = 'Baseline Test 6Q: Test With A vague Tag 6 (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag6=208%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"places":[32,76,110,119,123,137,207,222,258,282,291,325,332,364,398,415,419,435,440]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 6, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 6, $title);
    }
    
    $title = 'Baseline Test 6R: Test With A Fairly Specific Tag 7 (Large Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag7=USA';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/03-search_baseline_tests-6R-Value.txt');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 6, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 6, $title);
    }
    
    $title = 'Baseline Test 6S: Test With An Empty Tag 7 (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag7=';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"people":[1725,1726,1727,1728,1729],"things":[1732,1733,1734,1735,1736,1737,1738,1739,1740,1741,1742,1743,1744]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 6, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 6, $title);
    }
    
    $title = 'Baseline Test 6T: Test With A Fairly Specific Tag 8 (Medium Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag8=17:30:00';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"places":[7,53,65,176,311,334,362,363,902,903,904,907,985,986,1056,1101,1226,1227,1282,1284,1331,1405,1406,1442,1480,1545,1616,1657,1677,1684,1688]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 6, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 6, $title);
    }
    
    $title = 'Baseline Test 6U: Test With A Fairly Vague Tag 8 (Medium Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag8=17:%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"places":[7,51,52,53,59,65,176,211,308,309,311,328,333,334,362,363,902,903,904,907,985,986,1056,1073,1101,1221,1223,1224,1226,1227,1282,1284,1331,1344,1345,1405,1406,1442,1480,1545,1599,1616,1657,1677,1684,1688]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 6, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 6, $title);
    }
    
    $title = 'Baseline Test 6V: Test With A Blank Tag 8 (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag8=';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"people":[1725,1726,1727,1728,1729],"things":[1732,1733,1734,1735,1736,1737,1738,1739,1740,1741,1742,1743,1744]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 6, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 6, $title);
    }
    
    $title = 'Baseline Test 6W: Test With A Fairly Specific Tag 9 (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag9=TAG-9-TEST-PEOPLE';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"people":[1726,1728]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 6, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 6, $title);
    }
    
    $title = 'Baseline Test 6X: Test With A Fairly Vague Tag 9 (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag9=TAG-9-TEST%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"people":[1726,1728],"things":[1735,1743,1744]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 6, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 6, $title);
    }
    
    $title = 'Baseline Test 6Y: Test With An Empty Tag 9 (Large Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag9=';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = file_get_contents(dirname(__FILE__).'/03-search_baseline_tests-6Y-Value.txt');
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 6, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 6, $title);
    }
}

// --------------------

function basalt_test_define_0007() {
    basalt_run_single_direct_test(7, 'Individual Tag Search (XML)', 'Do a more comprehensive search on the tags in objects.', 'baseline_tests');
}

function basalt_test_0007($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Baseline Test 6A: Test With A Fairly Specific Tag 0 (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag0=Grace+United+Methodist+Church';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').'<places><value sequence_index="0">1592</value><value sequence_index="1">1721</value></places></baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 7, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 7, $title);
    }
        
    $title = 'Baseline Test 7B: Test With A Fairly Vague Tag 0 (Large Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag0=%Church%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').file_get_contents(dirname(__FILE__).'/03-search_baseline_tests-7B-Value.txt').'</baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 7, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 7, $title);
    }
    
    $title = 'Baseline Test 7C: Test With A Fairly Specific Tag 1 (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag1=1101+West+Pratt+Street';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').'<places><value sequence_index="0">187</value><value sequence_index="1">310</value></places></baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 7, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 7, $title);
    }
    
    $title = 'Baseline Test 7D: Test With A Fairly Vague Tag 1 (Large Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag1=11%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').file_get_contents(dirname(__FILE__).'/03-search_baseline_tests-7D-Value.txt').'</baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 7, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 7, $title);
    }
    
    $title = 'Baseline Test 7E: Test With A Fairly Specific Tag 2 (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag2=TAG-2-TEST-THINGS';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').'<things><value sequence_index="0">1732</value><value sequence_index="1">1733</value><value sequence_index="2">1734</value><value sequence_index="3">1736</value></things></baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 7, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 7, $title);
    }
    
    $title = 'Baseline Test 7F: Test With A Fairly Vague Tag 2 (Larger Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag2=TAG-2-TEST%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').'<people><value sequence_index="0">1725</value><value sequence_index="1">1727</value><value sequence_index="2">1729</value></people><things><value sequence_index="0">1732</value><value sequence_index="1">1733</value><value sequence_index="2">1734</value><value sequence_index="3">1736</value></things></baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 7, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 7, $title);
    }
    
    $title = 'Baseline Test 7G: Test With A Fairly Specific Tag 3 (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag3=waldorf';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').'<places><value sequence_index="0">10</value><value sequence_index="1">31</value><value sequence_index="2">80</value></places></baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 7, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 7, $title);
    }
    
    $title = 'Baseline Test 7H: Test With A Fairly Specific Tag 3, but A Common Tag (Large Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag3=baltimore';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').file_get_contents(dirname(__FILE__).'/03-search_baseline_tests-7H-Value.txt').'</baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);

    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 7, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 7, $title);
    }
    
    $title = 'Baseline Test 7I: Test With A Fairly Vague Tag 3 (Large Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag3=w%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').file_get_contents(dirname(__FILE__).'/03-search_baseline_tests-7I-Value.txt').'</baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 7, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 7, $title);
    }
    
    $title = 'Baseline Test 7J: Test With A Fairly Specific Tag 4 (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag4=Clarke+County';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').'<places><value sequence_index="0">995</value><value sequence_index="1">1091</value><value sequence_index="2">1260</value></places></baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 7, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 7, $title);
    }
    
    $title = 'Baseline Test 7K: Test With Another Fairly Specific Tag 4 (Medium Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag4=Montgomery+County';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').'<places><value sequence_index="0">32</value><value sequence_index="1">46</value><value sequence_index="2">66</value><value sequence_index="3">76</value><value sequence_index="4">109</value><value sequence_index="5">110</value><value sequence_index="6">123</value><value sequence_index="7">207</value><value sequence_index="8">258</value><value sequence_index="9">291</value><value sequence_index="10">325</value><value sequence_index="11">332</value><value sequence_index="12">364</value><value sequence_index="13">398</value><value sequence_index="14">415</value><value sequence_index="15">434</value><value sequence_index="16">435</value><value sequence_index="17">440</value><value sequence_index="18">974</value><value sequence_index="19">1142</value></places></baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);

    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 7, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 7, $title);
    }
    
    $title = 'Baseline Test 7L: Test With A Fairly Vague Tag 4 (Large Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag4=%county';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').file_get_contents(dirname(__FILE__).'/03-search_baseline_tests-7L-Value.txt').'</baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 7, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 7, $title);
    }
    
    $title = 'Baseline Test 7M: Test With A Fairly Specific Tag 5 (Medium Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag5=DE';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').file_get_contents(dirname(__FILE__).'/03-search_baseline_tests-7M-Value.txt').'</baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 7, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 7, $title);
    }
    
    $title = 'Baseline Test 7N: Test With A Fairly Vague Tag 5 (Large Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag5=D%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').file_get_contents(dirname(__FILE__).'/03-search_baseline_tests-7N-Value.txt').'</baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 7, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 7, $title);
    }
    
    $title = 'Baseline Test 7O: Test With A Fairly Specific Tag 6 (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag6=23455';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').'<places><value sequence_index="0">926</value><value sequence_index="1">927</value><value sequence_index="2">954</value><value sequence_index="3">977</value><value sequence_index="4">1089</value><value sequence_index="5">1174</value><value sequence_index="6">1181</value><value sequence_index="7">1435</value></places></baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 7, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 7, $title);
    }
    
    $title = 'Baseline Test 7P: Test With An Empty Tag 6 (Medium Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag6=';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').'<places><value sequence_index="0">402</value><value sequence_index="1">450</value><value sequence_index="2">473</value><value sequence_index="3">1098</value><value sequence_index="4">1126</value><value sequence_index="5">1177</value><value sequence_index="6">1316</value><value sequence_index="7">1353</value><value sequence_index="8">1383</value><value sequence_index="9">1445</value><value sequence_index="10">1473</value><value sequence_index="11">1489</value><value sequence_index="12">1497</value><value sequence_index="13">1508</value><value sequence_index="14">1513</value><value sequence_index="15">1530</value><value sequence_index="16">1531</value><value sequence_index="17">1541</value><value sequence_index="18">1546</value><value sequence_index="19">1595</value><value sequence_index="20">1606</value></places><people><value sequence_index="0">1725</value><value sequence_index="1">1726</value><value sequence_index="2">1727</value><value sequence_index="3">1728</value><value sequence_index="4">1729</value></people><things><value sequence_index="0">1732</value><value sequence_index="1">1733</value><value sequence_index="2">1734</value><value sequence_index="3">1735</value><value sequence_index="4">1736</value><value sequence_index="5">1737</value><value sequence_index="6">1738</value><value sequence_index="7">1739</value><value sequence_index="8">1740</value><value sequence_index="9">1741</value><value sequence_index="10">1742</value><value sequence_index="11">1743</value><value sequence_index="12">1744</value></things></baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 7, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 7, $title);
    }
    
    $title = 'Baseline Test 7Q: Test With A vague Tag 6 (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag6=208%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').'<places><value sequence_index="0">32</value><value sequence_index="1">76</value><value sequence_index="2">110</value><value sequence_index="3">119</value><value sequence_index="4">123</value><value sequence_index="5">137</value><value sequence_index="6">207</value><value sequence_index="7">222</value><value sequence_index="8">258</value><value sequence_index="9">282</value><value sequence_index="10">291</value><value sequence_index="11">325</value><value sequence_index="12">332</value><value sequence_index="13">364</value><value sequence_index="14">398</value><value sequence_index="15">415</value><value sequence_index="16">419</value><value sequence_index="17">435</value><value sequence_index="18">440</value></places></baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 7, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 7, $title);
    }
    
    $title = 'Baseline Test 7R: Test With A Fairly Specific Tag 7 (Large Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag7=USA';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').file_get_contents(dirname(__FILE__).'/03-search_baseline_tests-7R-Value.txt').'</baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 7, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 7, $title);
    }
    
    $title = 'Baseline Test 7S: Test With An Empty Tag 7 (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag7=';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').'<people><value sequence_index="0">1725</value><value sequence_index="1">1726</value><value sequence_index="2">1727</value><value sequence_index="3">1728</value><value sequence_index="4">1729</value></people><things><value sequence_index="0">1732</value><value sequence_index="1">1733</value><value sequence_index="2">1734</value><value sequence_index="3">1735</value><value sequence_index="4">1736</value><value sequence_index="5">1737</value><value sequence_index="6">1738</value><value sequence_index="7">1739</value><value sequence_index="8">1740</value><value sequence_index="9">1741</value><value sequence_index="10">1742</value><value sequence_index="11">1743</value><value sequence_index="12">1744</value></things></baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 7, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 7, $title);
    }
    
    $title = 'Baseline Test 7T: Test With A Fairly Specific Tag 8 (Medium Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag8=17:30:00';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').'<places><value sequence_index="0">7</value><value sequence_index="1">53</value><value sequence_index="2">65</value><value sequence_index="3">176</value><value sequence_index="4">311</value><value sequence_index="5">334</value><value sequence_index="6">362</value><value sequence_index="7">363</value><value sequence_index="8">902</value><value sequence_index="9">903</value><value sequence_index="10">904</value><value sequence_index="11">907</value><value sequence_index="12">985</value><value sequence_index="13">986</value><value sequence_index="14">1056</value><value sequence_index="15">1101</value><value sequence_index="16">1226</value><value sequence_index="17">1227</value><value sequence_index="18">1282</value><value sequence_index="19">1284</value><value sequence_index="20">1331</value><value sequence_index="21">1405</value><value sequence_index="22">1406</value><value sequence_index="23">1442</value><value sequence_index="24">1480</value><value sequence_index="25">1545</value><value sequence_index="26">1616</value><value sequence_index="27">1657</value><value sequence_index="28">1677</value><value sequence_index="29">1684</value><value sequence_index="30">1688</value></places></baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 7, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 7, $title);
    }
    
    $title = 'Baseline Test 7U: Test With A Fairly Vague Tag 8 (Medium Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag8=17:%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').'<places><value sequence_index="0">7</value><value sequence_index="1">51</value><value sequence_index="2">52</value><value sequence_index="3">53</value><value sequence_index="4">59</value><value sequence_index="5">65</value><value sequence_index="6">176</value><value sequence_index="7">211</value><value sequence_index="8">308</value><value sequence_index="9">309</value><value sequence_index="10">311</value><value sequence_index="11">328</value><value sequence_index="12">333</value><value sequence_index="13">334</value><value sequence_index="14">362</value><value sequence_index="15">363</value><value sequence_index="16">902</value><value sequence_index="17">903</value><value sequence_index="18">904</value><value sequence_index="19">907</value><value sequence_index="20">985</value><value sequence_index="21">986</value><value sequence_index="22">1056</value><value sequence_index="23">1073</value><value sequence_index="24">1101</value><value sequence_index="25">1221</value><value sequence_index="26">1223</value><value sequence_index="27">1224</value><value sequence_index="28">1226</value><value sequence_index="29">1227</value><value sequence_index="30">1282</value><value sequence_index="31">1284</value><value sequence_index="32">1331</value><value sequence_index="33">1344</value><value sequence_index="34">1345</value><value sequence_index="35">1405</value><value sequence_index="36">1406</value><value sequence_index="37">1442</value><value sequence_index="38">1480</value><value sequence_index="39">1545</value><value sequence_index="40">1599</value><value sequence_index="41">1616</value><value sequence_index="42">1657</value><value sequence_index="43">1677</value><value sequence_index="44">1684</value><value sequence_index="45">1688</value></places></baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 7, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 7, $title);
    }
    
    $title = 'Baseline Test 7V: Test With A Blank Tag 8 (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag8=';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').'<people><value sequence_index="0">1725</value><value sequence_index="1">1726</value><value sequence_index="2">1727</value><value sequence_index="3">1728</value><value sequence_index="4">1729</value></people><things><value sequence_index="0">1732</value><value sequence_index="1">1733</value><value sequence_index="2">1734</value><value sequence_index="3">1735</value><value sequence_index="4">1736</value><value sequence_index="5">1737</value><value sequence_index="6">1738</value><value sequence_index="7">1739</value><value sequence_index="8">1740</value><value sequence_index="9">1741</value><value sequence_index="10">1742</value><value sequence_index="11">1743</value><value sequence_index="12">1744</value></things></baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 7, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 7, $title);
    }
    
    $title = 'Baseline Test 7W: Test With A Fairly Specific Tag 9 (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag9=TAG-9-TEST-PEOPLE';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').'<people><value sequence_index="0">1726</value><value sequence_index="1">1728</value></people></baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 7, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 7, $title);
    }
    
    $title = 'Baseline Test 7X: Test With A Fairly Vague Tag 9 (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag9=TAG-9-TEST%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').'<people><value sequence_index="0">1726</value><value sequence_index="1">1728</value></people><things><value sequence_index="0">1735</value><value sequence_index="1">1743</value><value sequence_index="2">1744</value></things></baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 7, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 7, $title);
    }
    
    $title = 'Baseline Test 7Y: Test With An Empty Tag 9 (Large Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag9=';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').file_get_contents(dirname(__FILE__).'/03-search_baseline_tests-7Y-Value.txt').'</baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 7, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 7, $title);
    }
}

// --------------------

function basalt_test_define_0008() {
    basalt_run_single_direct_test(8, 'Combined Tag Search (JSON)', 'Search with combinations of tags.', 'baseline_tests');
}

function basalt_test_0008($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Baseline Test 8A: See what the Tag 0 search for "Grace%" gives us: (Medium Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag0=Grace%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"places":[17,102,158,274,280,315,377,400,408,441,949,1050,1278,1330,1476,1592,1621,1626,1646,1704,1717,1721]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 8, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 8, $title);
    }
    
    $title = 'Baseline Test 8B: See what the Tag 5 search for "WV" gives us: (Medium Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag5=wv';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"places":[1590,1591,1592,1593,1594,1595,1596,1597,1598,1599,1600,1601,1602,1603,1604,1605,1606,1607,1608]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 8, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 8, $title);
    }
    
    $title = 'Baseline Test 8C: See what the Tag 0 search for "Grace%" and the Tag 5 search for "WV" gives us: (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/json/baseline/search/?search_tag0=Grace%&search_tag5=wv';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = '{"baseline":{"places":[1592]}}';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 8, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 8, $title);
    }
}

// --------------------

function basalt_test_define_0009() {
    basalt_run_single_direct_test(9, 'Combined Tag Search (XML)', 'Search with combinations of tags.', 'baseline_tests');
}

function basalt_test_0009($in_login = NULL, $in_hashed_password = NULL, $in_password = NULL) {
    $title = 'Baseline Test 9A: See what the Tag 0 search for "Grace%" gives us: (Medium Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag0=Grace%';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').'<places><value sequence_index="0">17</value><value sequence_index="1">102</value><value sequence_index="2">158</value><value sequence_index="3">274</value><value sequence_index="4">280</value><value sequence_index="5">315</value><value sequence_index="6">377</value><value sequence_index="7">400</value><value sequence_index="8">408</value><value sequence_index="9">441</value><value sequence_index="10">949</value><value sequence_index="11">1050</value><value sequence_index="12">1278</value><value sequence_index="13">1330</value><value sequence_index="14">1476</value><value sequence_index="15">1592</value><value sequence_index="16">1621</value><value sequence_index="17">1626</value><value sequence_index="18">1646</value><value sequence_index="19">1704</value><value sequence_index="20">1717</value><value sequence_index="21">1721</value></places></baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 9, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 9, $title);
    }
    
    $title = 'Baseline Test 9B: See what the Tag 5 search for "WV" gives us: (Medium Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag5=wv';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').'<places><value sequence_index="0">1590</value><value sequence_index="1">1591</value><value sequence_index="2">1592</value><value sequence_index="3">1593</value><value sequence_index="4">1594</value><value sequence_index="5">1595</value><value sequence_index="6">1596</value><value sequence_index="7">1597</value><value sequence_index="8">1598</value><value sequence_index="9">1599</value><value sequence_index="10">1600</value><value sequence_index="11">1601</value><value sequence_index="12">1602</value><value sequence_index="13">1603</value><value sequence_index="14">1604</value><value sequence_index="15">1605</value><value sequence_index="16">1606</value><value sequence_index="17">1607</value><value sequence_index="18">1608</value></places></baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 9, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 9, $title);
    }
    
    $title = 'Baseline Test 9C: See what the Tag 0 search for "Grace%" and the Tag 5 search for "WV" gives us: (Small Response)';
    $method = 'GET';
    $uri = __SERVER_URI__.'/xml/baseline/search/?search_tag0=Grace%&search_tag5=wv';
    $data = NULL;
    $api_key = NULL;
    $expected_result_code = 200;
    $expected_result = get_xml_header('baseline').'<places><value sequence_index="0">1592</value></places></baseline>';
    $result_code = '';
    
    test_header($title, $method, $uri, $expected_result_code);
    
    $st1 = microtime(true);
    $result = call_REST_API($method, $uri, $data, $api_key, $result_code);
    
    if ($result_code != $expected_result_code) {
        test_result_bad($result_code, $result, $st1, $expected_result);
        log_entry(false, 9, $title);
    } else {
        test_result_good($result_code, $result, $st1, $expected_result);
        log_entry(true, 9, $title);
    }
}
?>
