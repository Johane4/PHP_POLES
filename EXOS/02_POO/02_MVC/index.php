<?php
require_once __DIR__ . '/controllers/ContactController.php';

$baseURL = '/PHP_POLES/COURS_POO/02_Exercices/02_Correction/02_MVC';

$controller = new ContactController();

$action = isset($_GET['action']) ?? 'index';


if ($action == 'add') {
    $controller->add();
} else {
    $controller->index();
}


?>
