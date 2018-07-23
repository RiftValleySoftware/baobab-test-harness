<?php
    $filename = dirname(dirname(__FILE__)).'/config/s_config.class.php';
    
    $file_contents = file_get_contents($filename);
    
    $file_contents = preg_replace('|DB_TYPE_\', \'mysql\'|', 'DB_TYPE_\', \'pgsql\'', $file_contents);
    
    file_put_contents($filename, $file_contents);
?>