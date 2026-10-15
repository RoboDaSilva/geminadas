<?php
require_once 'config.php';

//mysqli connection
$mysqli = new mysqli($CONFIG['db']['host'], $CONFIG['db']['user'], $CONFIG['db']['password'], $CONFIG['db']['name']);

/* change character set to utf8mb4 */
$mysqli->set_charset("utf8mb4");

//check connection
if ($mysqli->connect_errno) {
    printf("Connect failed: %s", $mysqli->connect_error);
} 
?>
