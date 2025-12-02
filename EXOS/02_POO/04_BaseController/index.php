<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/autoload.php';

use Controllers\ContactController;
$controller = new ContactController();

$baseURL = '/PHP_POLES/COURS_POO/02_Exercices/02_Correction/04_BaseController';

$action = $_GET['action'] ?? 'index';


if ($action == 'add') {
    $controller->add();
} else {
    $controller->index();
}

?>
