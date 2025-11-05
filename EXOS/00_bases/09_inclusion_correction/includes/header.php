<?php
// Ce fichier génère le header de chaque page, incluant le titre du site et une barre de navigation.
// Note : Il n'est pas nécessaire d'inclure config.php ici directement car ce fichier est généralement inclus après qu'un fichier parent (index.php) ait déjà inclus config.php.

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <header>
        <h1>Bienvenue sur <?php echo SITE_NAME; ?></h1>
        <nav>
            <?php
            echo __DIR__;
            ?>
            <ul>
                <li><a href="<?php echo BASE_URL; ?>index.php">Accueil</a></li>
                <li><a href="<?php echo BASE_URL; ?>welcome.php">Bienvenue</a></li>
                <li><a href="<?php echo BASE_URL; ?>app.php">App</a></li>
                <li><a href="<?php echo BASE_URL; ?>page.php">Page</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">