<?php
    require_once 'db.php';
    $connection = mysqli_connect($host, $user, $password, $database);

    if (!$connection) {
        die("Échec de la connexion : " . mysqli_connect_error());
    } else {
        echo("Connexion réussie");
    }

    echo("Connexion réussie");
?>
