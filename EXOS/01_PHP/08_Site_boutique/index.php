<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$baseUri = '/08_Site_boutique';
var_dump($baseUri);
echo 'Test d\'inclusion';
echo 'BADABOOOOOOUM !!!!';
require_once __DIR__ . '/controllers/router.php';
