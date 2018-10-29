/***************************************************************************************************************************/
/**
    BASALT Extension Layer
    
    © Copyright 2018, Little Green Viper Software Development LLC/The Great Rift Valley Software Company
    
    LICENSE:
    
    FOR OPEN-SOURCE (COMMERCIAL OR FREE):
    This code is released as open source under the GNU Plublic License (GPL), Version 3.
    You may use, modify or republish this code, as long as you do so under the terms of the GPL, which requires that you also
    publish all modificanions, derivative products and license notices, along with this code.
    
    UNDER SPECIAL LICENSE, DIRECTLY FROM LITTLE GREEN VIPER OR THE GREAT RIFT VALLEY SOFTWARE COMPANY:
    It is NOT to be reused or combined into any application, nor is it to be redistributed, republished or sublicensed,
    unless done so, specifically WITH SPECIFIC, WRITTEN PERMISSION from Little Green Viper Software Development LLC,
    or The Great Rift Valley Software Company.

    Little Green Viper Software Development: https://littlegreenviper.com
    The Great Rift Valley Software Company: https://riftvalleysoftware.com

    Little Green Viper Software Development: https://littlegreenviper.com
*/

var testsToRun_mysql = Array();
var testsToRun_pgsql = Array();
var ajaxLoader = new ajaxLoader();

function runTests(inTestNameArray) {
    var tests_displayed = document.getElementById('tests-displayed');
    tests_displayed.innerHTML = '';
    
    for (var i = 0; i < inTestNameArray.length; i++) {
        var testName = inTestNameArray[i];
        if (testName) {
            testsToRun_mysql.push(testName);
            testsToRun_pgsql.push(testName);
        };
    };
    
    nextTest();
};

function nextTest() {
    var progress_report = document.getElementById('progress-report');
            
    if(testsToRun_mysql.length || testsToRun_pgsql.length) {
        var db = 'MySQL';
        
        var testName = '';
        
        if(testsToRun_mysql.length) {
            testName = testsToRun_mysql.shift();
        } else {
            db = 'Postgres';
            testName = testsToRun_pgsql.shift();
        };
        
        if (progress_report) {
            progress_report.innerHTML = 'Running ' + testName.toString() + ' (' + db + ').';
        };
        
        ajaxLoader.ajaxRequest('test-scripts/' + testName.toString() + '.php', runTestCallback, 'GET');
    } else {
        if (progress_report) {
            progress_report.innerHTML = '';
        };
        
        ajaxLoader.ajaxRequest('php/done_testing.php?start_time='+start_time, dunTestCallback, 'GET');
    };
};

function displayCallback (in_response_object) {
    if (in_response_object.responseText) {
        document.getElementById('test-results-displayed').innerHTML = in_response_object.responseText;
    };
};

function dunTestCallback (in_response_object) {
    var tests_displayed = document.getElementById('tests-displayed');
    
    if (tests_displayed) {
        var tests_wrapped_up = document.getElementById('tests-wrapped-up');
        if (tests_wrapped_up) {
            var throbber_container = document.getElementById('throbber-container');
            
            if (throbber_container) {
                throbber_container.style.display = 'none';
            };
            
            tests_wrapped_up.style.display = 'table';
        };
    };

    ajaxLoader.ajaxRequest('php/display_results.php', displayCallback, 'GET');
};

function runTestCallback (in_response_object) {
    if (in_response_object.responseText) {
        var tests_displayed = document.getElementById('tests-displayed');
        tests_displayed.innerHTML += in_response_object.responseText;
    };
    
    if (testsToRun_mysql.length) {
        ajaxLoader.ajaxRequest('php/set_mysql.php', setDBCallback, 'GET');
    } else {
        ajaxLoader.ajaxRequest('php/set_pgsql.php', setDBCallback, 'GET');
    };
};

function setDBCallback (in_response_object) {
    nextTest();
};
