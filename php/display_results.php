<?php
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
    $logfile = file_get_contents(dirname(dirname(__FILE__)).'/test_report.txt');
    $we_got_problems = preg_match('|\* FAIL \*|', $logfile);
    $image = 'images/pass.gif';
    if ($we_got_problems) { 
        $image = 'images/fail.gif';
    }

    echo('<div class="pass_failimage_display_div"><img src="'.$image.'" title="'.($we_got_problems ? 'OMG ONOZ!' : 'WOO-HOO!').'" alt="Test Result Animated GIF" style="width:256px" /></div>');
?>