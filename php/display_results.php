<?php
/***************************************************************************************************************************/
/**
    BASALT Extension Layer
    
    © Copyright 2018, Little Green Viper Software Development LLC/The Great Rift Valley Software Company
    
    LICENSE:
    

    Little Green Viper Software Development: https://littlegreenviper.com
*/
    $logfile = file_get_contents(dirname(dirname(__FILE__)).'/test_report.txt');
    $we_got_problems = preg_match('|\* FAIL \*|', $logfile);
    $image = 'images/pass.gif';
    if ($we_got_problems) { 
        $image = 'images/fail.gif';
    }

    echo('<div class="pass_failimage_display_div"><img src="'.$image.'" title="'.($we_got_problems ? 'OMG ONOZ!' : 'WOO-HOO!').'" alt="Test Result Animated GIF" style="width:256px" /></div>');
?>