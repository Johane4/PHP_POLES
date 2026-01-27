<?php
namespace Controllers;

class BaseController {
    protected function render($view, $data = []) {
        // Extrait les données pour les rendre disponibles sous forme de variables dans la vue
        extract($data);

        // Détermine le chemin de la vue à inclure
        $viewPath = __DIR__ . '/../views/' . $view . '.php';

        // Vérifie que la vue existe avant de l'inclure
        if (file_exists($viewPath)) {
           require __DIR__ . "/../views/inc/header.php";
            require $viewPath;
            require __DIR__ . "/../views/inc/footer.php";

            require __DIR__ . '/../views/layout.php';
        } else {
            echo "Vue introuvable : $viewPath";
        }
    }
}
