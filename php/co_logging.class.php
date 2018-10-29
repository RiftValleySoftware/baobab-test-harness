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
defined( 'LGV_CONFIG_CATCHER' ) or die ( 'Cannot Execute Directly' );	// Makes sure that this file is in the correct context.

/***************************************************************************************************************************/
/**
 */

class CO_Logging {
    static function basalt_logging_function($in_andisol_instance, $in_server_vars) {
        $log_display = $in_server_vars;
        $id = (NULL !== $in_andisol_instance->get_login_item()) ? $in_andisol_instance->get_login_item()->id() : '';
        $login_id = (NULL !== $in_andisol_instance->get_login_item()) ? $in_andisol_instance->get_login_item()->login_id : '';
        $id_entry = '' != $id ? "$id:$login_id" : '-';
        $date_entry = date('\[d\/M\/Y:H:m:s O\]');
        $request_entry = $_SERVER['REQUEST_METHOD'].' '.$_SERVER['REQUEST_URI'];
        $log_entry = $_SERVER['REMOTE_ADDR']. ' - '.$id_entry.' '.$date_entry.' "'.$request_entry.'"';
        $log_file = fopen(dirname(dirname(__FILE__)).'/log/test.log', 'a');
        fwrite($log_file, $log_entry."\n");
        fclose($log_file);
    }

    static function badger_low_level_logging_function($id, $in_sql, $in_params) {
        $id_entry = '' != $id ? "$id" : '-';
        $date_entry = date('\[d\/M\/Y:H:m:s O\]');
        $request_entry = $_SERVER['REQUEST_METHOD'].' '.$_SERVER['REQUEST_URI'];
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
        $bt_array = [];
        $bt_trace = '';
        $indent = '';
        foreach ($backtrace as $frame) {
            $bt_array[] = $frame['function'].' ('.$frame['file'].':'.$frame['line'].')';
            $bt_trace .= $indent.$bt_array[count($bt_array) - 1]."\n";
            $indent .= "\t";
        }

        if (!isset($in_params) || !$in_params || !is_array($in_params)) {
            $in_params = [];
        }

        $log_entry = $id_entry.' "SQL:'.$in_sql.'" "PARAMS:\''.implode('\',\'', $in_params).'\'" "BACKTRACE:'."\n$bt_trace".'"'."\n";
        $log_file = fopen(dirname(dirname(__FILE__)).'/log/test.log', 'a');
        fwrite($log_file, $log_entry."\n");
        fclose($log_file);
    }
}
