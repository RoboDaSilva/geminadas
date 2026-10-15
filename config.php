<?php

$CONFIG = array();

/*
 * Environment
 */
$CONFIG['environment'] = "development";
//$CONFIG['environment'] = "testing";
//$CONFIG['environment'] = "production";


/*
 * Notifications
 */
$CONFIG['notifications'] = true;


/*
 * Tasks
 */
$CONFIG['tasks'] = true;


/*
 * URL
 */
$CONFIG['protocol'] = (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ? 'https' : 'http';
$CONFIG['host']     = str_replace(":{$_SERVER["SERVER_PORT"]}", "", $_SERVER['HTTP_HOST']);
$CONFIG['script']   = $_SERVER['SCRIPT_NAME'];
$CONFIG['params']   = $_SERVER['QUERY_STRING'];
$CONFIG['url']      = "{$CONFIG['protocol']}://{$CONFIG['host']}/{$CONFIG['script']}?{$CONFIG['params']}";


/*
 * Open Graph Protocol
 */
$CONFIG['og_protocol'] = true;


/*
 * Website
 */
$CONFIG['website'] = array();
$CONFIG['website']['name'] = "Geminadas";
$CONFIG['website']['desc'] = ""; /* Descrição do site, a metatag og:description recupera esse valor */


/*
 * Admin
 */
$CONFIG['admin'] = array();
$CONFIG['admin']['name'] = "SystemAdmin Follk";
$CONFIG['admin']['icon'] = "{$CONFIG['protocol']}://{$CONFIG['host']}/admin/skin/img/shortcut_icon.png";


/*
 * Database
 */
$CONFIG['db']                 = array();
$CONFIG['db']['host']         = "208.113.244.114";//ou mysql.geminadas.com
$CONFIG['db']['user']         = "geminada_site";
$CONFIG['db']['password']     = "Sov@SGi=Bus{x";
$CONFIG['db']['name']         = "geminada_site";

//$CONFIG['db']                 = array();
//$CONFIG['db']['host']         = "187.45.210.78";
//$CONFIG['db']['user']         = "jhuonas";
//$CONFIG['db']['password']     = "seiti@12";
//$CONFIG['db']['name']         = "geminada_sistema";

/*
 * Follk PHPMailer (Preferencialmente)
 * 
 * O host do From deve ser o mesmo do Transport
 */
$CONFIG['mail']                         = array();
$CONFIG['mail']['transport_host']       = "smtp.sitename.com";
$CONFIG['mail']['transport_port']       = "";
$CONFIG['mail']['transport_username']   = "";
$CONFIG['mail']['transport_password']   = "";

$CONFIG['mail']['defaultFrom_email']    = "";
$CONFIG['mail']['defaultFrom_name']     = "";
$CONFIG['mail']['defaultTo_email']      = "";
$CONFIG['mail']['defaultTo_name']       = "";
$CONFIG['mail']['defaultReplyTo_email'] = "";
$CONFIG['mail']['defaultReplyTo_name']  = "";


/*
 * Paginator
 */
$CONFIG['paginator']                     = array();
$CONFIG['paginator']['totalItemPerPage'] = 14;
?>
