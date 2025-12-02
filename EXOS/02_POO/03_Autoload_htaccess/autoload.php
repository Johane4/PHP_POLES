<?php

// Autoload fonction pour charger automatiquement les classes
function autoload($class) {
    // Remplacer les backslashes par des slashes pour correspondre à la structure du projet
    $path = str_replace('\\', '/', $class);
    $file = __DIR__ . '/' . $path . '.php';

    if (file_exists($file)) {
        require $file;
    } else {
        throw new Exception("Classe '$class' non trouvée.");
    }
}

// Enregistrer la fonction autoload
spl_autoload_register('autoload');
