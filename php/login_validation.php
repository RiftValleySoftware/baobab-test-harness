<?php
/***************************************************************************************************************************/
/**
    BASALT Extension Layer
    
    © Copyright 2018, Little Green Viper Software Development LLC/The Great Rift Valley Software Company
    
    LICENSE:
    

    Little Green Viper Software Development: https://littlegreenviper.com
*/
defined( 'LGV_CONFIG_CATCHER' ) or die ( 'Cannot Execute Directly' );	// Makes sure that this file is in the correct context.

/***************************************************************************************************************************/
/**
 */
function baobab_test_harness_login_validation_function($in_login_id, $in_password, $in_server_vars) {
    if (preg_match('|TEST\-SCRAG\-BASALT\-LOGIN|', $_SERVER['QUERY_STRING'])) {
        return false;
    }
    
    return true;
}
