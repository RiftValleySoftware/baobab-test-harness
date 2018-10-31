<?php
/***************************************************************************************************************************/
/**
    BASALT Extension Layer
    
    © Copyright 2018, Little Green Viper Software Development LLC/The Great Rift Valley Software Company
    
    LICENSE:
    

    Little Green Viper Software Development: https://littlegreenviper.com
*/
    define('LGV_CONFIG_CATCHER', '1');
    require_once(dirname(dirname(__FILE__)).'/config/s_config.class.php');
    require_once(dirname(dirname(__FILE__)).'/php/testing_functions.php');
    $start_time = floatval($_GET["start_time"]);
    end_log($start_time);
?>