<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/autoload.php';

use Controllers\ContactController;

$baseURL = '/PHP_POLES/COURS_POO/02_Exercices/02_Correction/05_Entity';

$controller = new ContactController();

$action = $_GET['action'] ?? 'index';

if ($action == 'add') {
    $controller->add();
} else if ($action == 'test') { // Ajout de l'action test
    $controller->test();
} else {
    $controller->index();
}
?>
