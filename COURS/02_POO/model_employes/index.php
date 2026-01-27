<?php

require_once __DIR__ . '/autoload.php';

use Controllers\EmployesController;

$controller = new EmployesController();
$controller->addEmploye();
$controller->showEmployes();


?>