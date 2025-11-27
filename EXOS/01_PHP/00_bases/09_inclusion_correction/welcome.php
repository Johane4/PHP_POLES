<?php

echo __DIR__;
require 'config/config.php';
include_once 'includes/functions.php';
include 'includes/header.php';
// Assure que le fichier n'est requis qu'une seule fois.
require_once 'database/db.php';

echo greet("Alice");



include 'includes/footer.php';
