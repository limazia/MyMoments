<?php
require_once "database.php";
require_once "utils/core.php";

error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
date_default_timezone_set('America/Sao_Paulo');
header('Content-Type: text/html; charset=utf-8');

$config = new stdClass();

$config->instDir = dirname($_SERVER["SCRIPT_NAME"]);
if ($config->instDir == "/") unset($config->instDir);

//$config->url = "http://". $_SERVER["HTTP_HOST"];
$config->url = "http://" . $_SERVER["HTTP_HOST"] . $config->instDir;