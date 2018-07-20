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
    $logfile = file_get_contents(dirname(dirname(__FILE__)).'/test_report.txt');
    $we_got_problems = preg_match('|\* FAIL \*|', $logfile);
    $image = dirname(dirname(__FILE__)).'/images/pass.gif';
    if ($we_got_problems) { 
        $image = dirname(dirname(__FILE__)).'/images/fail.gif';
    }
    $image_data = base64_encode(file_get_contents($image));
    echo('<div class="pass_failimage_display_div"><img src="data:image/gif;base64,'.$image_data.'" title="'.($we_got_problems ? 'OMG ONOZ!' : 'WOO-HOO!').'" alt="Test Result Animated GIF" style="width:256px" /></div>');
?>