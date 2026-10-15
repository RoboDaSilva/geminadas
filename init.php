<?php

		function youtube($url)
			{
			  $url_string = parse_url($url, PHP_URL_QUERY);
			  parse_str($url_string, $args);
			  return isset($args['v']) ? $args['v'] : false;
			}

error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Configurations
require 'admin/config.php';

// Connections
require 'admin/db-connect.php';

// Format
require 'admin/library/Follk/Format.php';
$format = new Format();

// Db Adapter
require 'admin/library/Follk/DbAdapter.php';
$db_adapter = new DbAdapter();

// Verifica se é a index
$page = explode("/", $_SERVER['SCRIPT_NAME']);
$page = str_replace(".php", "", end($page));
$page = explode("-", $page);
$page = trim($page[0]);

$is_index = ($page == "index" || $page == "preview") ? true : false;

define('CAMINHO_WEB', 'http://www.geminadas.com/');
define("CAMINHO_ROOT", $_SERVER['DOCUMENT_ROOT']."/sistema/");

?>