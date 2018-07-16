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
    define('LGV_CONFIG_CATCHER', '1');
    require_once(dirname(__FILE__).'/config/s_config.class.php');
    require_once(dirname(__FILE__).'/php/testing_functions.php');

    date_default_timezone_set ( 'UTC' );
    global $test_name_array;
    
    function iterate_directory( $in_dirname
                                ) {
        global $test_name_array;
        $iterator = new DirectoryIterator($in_dirname);

        foreach ($iterator as $fileinfo) {
            if (('.' === substr($fileinfo->getBasename(), 0, 1))) {
                continue;
            } elseif (('php' === $fileinfo->getExtension()) && ('index.php' != $fileinfo->getBasename())) {
                $test_name_array[] = basename(dirname($fileinfo->getPathname())).'/'.substr($fileinfo->getBasename(), 0, -4);
            } elseif (!$fileinfo->isDot() && $fileinfo->isDir()) {
                iterate_directory($fileinfo->getPathname());
            }
        }
    }
    
    $test_name_array = [];
    
    iterate_directory(dirname(__FILE__).'/test-scripts/');    
    
    if (isset($test_name_array) && is_array($test_name_array) && count($test_name_array)) {
        sort($test_name_array);
        $test_name_array = "Array('".implode("','", $test_name_array)."')";
    } else {
        $test_name_array = "Array('')";
    }
    
    start_log();
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>BAOBAB Test Harness</title>
        <link rel="shortcut icon" href="icon.png" type="image/png" />
        <style>
            *{margin:0;padding:0}
            body {
                font-family: Arial, San-serif;
                text-align:center;
                }
            
            div.timing_report,
            div.test_report {
                margin-top: 1em;
                margin-bottom: 1em;
                margin-left: 1em;
            }
            
            div.timing_report {
                font-style: italic;
                color: #930;
            }
            
            div.test_report {
                border-radius: 0.5em;
                padding: 0.25em;
                border: 1px dashed black;
            }
            
            div.test_report.good_report {
                background-color: #dfd;
            }
            
            div.test_report.bad_report {
                background-color: #fdd;
            }
            
            div.closed,
            div.open,
            div.inner_closed {
                display: table;
                margin:auto;
            }
            
            div.inner_closed,
            div.inner_open {
                margin-top:0.25em;
                margin-bottom: 0.25em;
            }
            
            div.indent_1 {
                margin-left:1em;
            }
            
            div.main_div {
                margin-top:0.25em;
                margin-bottom: 0.25em;
                margin-left:1em;
                padding: 0.5em;
            }
            
            div.inner_div {
                margin-top:0.25em;
                padding: 0.25em;
            }
            
            .explain {
                font-style: italic;
                display:block;
                margin:0.5em;
                text-align:left;
            }
            
            h1.header {
                font-size: x-large;
            }
            
            h2.header {
                font-size: large;
            }
            
            div.closed,
            div.open {
                margin-top:0.5em;
                border:1px solid #555;
                border-radius:0.25em;
                padding: 0.25em;
                min-width:30em;
            }
            
            div.open div.container {
                margin:auto;
                display: table;
                text-align:left;
            }
            
            div.closed div.container {
                display: none;
            }
            
            h3.inner_header {
                font-size: medium;
                display:table;
                margin:auto;
            }
            
            div.inner_open {
                border:1px dashed #555;
                border-radius:0.25em;
                padding: 0.25em;
            }
            
            div.inner_closed h2.inner_header {
            }
            
            div.inner_open h3.inner_header {
                display:block;
                text-align:left;
            }
            
            div.inner_open div.inner_container {
                display: table;
                margin:auto;
            }
            
            div.inner_closed div.inner_container {
                display: none;
            }
            
            div.test-wrapper {
                display: table;
                margin:auto;
                padding: 0.25em;
                margin-top:1em;
                min-width:30em;
            }
            
            div.collection_wrapper {
            }
            
            div#tests-wrapped-up {
                margin:auto;
            }
        </style>
        <script type="text/javascript" src="js/ajaxLoader.js"></script>
        <script type="text/javascript" src="js/runTests.js"></script>
        <script type="text/javascript">
            function toggle_main_state(in_id) {
                var item = document.getElementById(in_id);
                
                if ( item.className == 'closed' ) {
                    item.className = 'open';
                } else {
                    item.className = 'closed';
                };
            };
            
            function toggle_inner_state(in_id) {
                var item = document.getElementById(in_id);
                
                if ( item.className == 'inner_closed' ) {
                    item.className = 'inner_open';
                } else {
                    item.className = 'inner_closed';
                };
                
            };
            
            function expose_tests() {
                var item = document.getElementById('throbber-container');
                
                if (item) {
                    item.style="display:none";
                };
                
                var item = document.getElementById('tests-wrapped-up');
                
                if (item) {
                    item.style="display:block";
                };
            };
        </script>
    </head>
    <body>
        <h1 style="text-align:center">BAOBAB SERVER TESTS</h1>
        <div style="text-align:center;padding:1em;">
            <div id="throbber-container" style="text-align:center">
                <h3 id="progress-report" style="margin-top:1em"></h3>
                <img src="images/throbber.gif" alt="throbber" style="position:absolute;width:190px;top:50%;left:50%;margin-top:-95px;margin-left:-95px" />
                <img src="icon.png" alt="icon" style="position:absolute;width:128px;top:50%;left:50%;margin-top:-64px;margin-left:-64px" />
            </div>
            <?php
            $start_time = microtime(true);
            ?>
            <div id="tests-wrapped-up" style="display:none">
                <img src="icon.png" style="display:block;margin:auto;width:80px" alt="" />
                <div id="tests-displayed"></div>
                <h3 style="margin-top:1em"><a href="./">RETURN TO MAIN ENVIRONMENT SETUP</a></h3>
            </div>
            <script type="text/javascript">
                runTests(<?php echo($test_name_array) ?>);
            </script>
        </div>
    </body>
</html>