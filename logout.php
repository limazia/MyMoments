<?php
require_once "inc/config.php";

session_start();

session_unset();
session_destroy();
header("Location: " . $config->url);
exit;
