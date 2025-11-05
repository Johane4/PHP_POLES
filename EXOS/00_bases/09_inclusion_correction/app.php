<?php

// parametre de config donc éléments essentiels et importants !
require 'config/config.php';

// Le fichier est crucial au fonctionnement du script. S'il manque, le script s'arrête avec une erreur fatale
require 'settings/settings.php';

// Le fichier peut être inclus plusieurs fois ou lorsque son absence n'empêche pas l'exécution du script
include 'includes/header.php';

if ($debugMode) {
    echo "<p>Le mode debug est activé.</p>";
}

// Le fichier peut être inclus plusieurs fois ou lorsque son absence n'empêche pas l'exécution du script
include 'includes/footer.php';
