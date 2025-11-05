<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inclusion de Fichiers PHP</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="img_div">
        <img src="./img/logo_poleS.png" alt="Logo poleS">
    </div>

    <div class="topnav">
        <a href="01_bases.php">01.Les bases</a>
        <a href="02_variables.php">02.Les variables</a>
        <a href="03_constantes.php">03.Les constantes</a>
        <a href="04_arithmetiques.php">04.Arithmétiques</a>
        <a href="05_conditions.php">05.Conditions</a>
        <a href="06_tableaux.php">06.Tableaux</a>
        <a href="07_boucles.php">07.Boucles</a>
        <a href="08_dates.php">08.Dates</a>
        <a href="09_fonctions.php">09.Fonctions</a>
        <a href="10_inclusion.php">10.Inclusion</a>
    </div>

    <?php
    //--------------------
    echo '<h2> Inclusion de fichiers </h2>';
    //--------------------

    echo '<p>Première inclusion : </p>';
    echo '<pre><p>include \'exemple.inc.php\'; // le fichier dont le chemin est spécifié est inclus ici. En cas d\'erreur lors de l\'inclusion du fichier, include génère une erreur de type warning et continue l\'exécution du script. Utilisé pour les fichiers non essentiels (exemple header, footer). Le script continue si le fichier est manquant.</p></pre>';
    include '10_01_exemple.inc.php';  // le fichier dont le chemin est spécifié est inclus ici. En cas d'erreur lors de l'inclusion du fichier, include génère une erreur de type warning et continue l'exécution du script

    echo '<p>Deuxième inclusion : </p>';
    echo '<pre><p>include_once \'exemple.inc.php\'; // le once vérifie si le fichier a déjà été inclus. Si c\'est le cas, il ne le ré-inclut pas. Utilisé pour éviter les inclusions multiples (exemple functions). Le fichier est inclus une seule fois.</p></pre>';
    include_once '10_01_exemple.inc.php';  // le once vérifie si le fichier a déjà été inclus. Si c'est le cas, il ne le ré-inclut pas.

    echo '<p>Troisième inclusion : </p>';
    echo '<pre><p>require \'exemple.inc.php\'; // le fichier est "requis" donc obligatoire : en cas d\'erreur lors de l\'inclusion du fichier, require génère une erreur de type "fatal error" et stoppe l\'exécution du script. Utilisé pour les fichiers essentiels (exemple configuration). Le script s’arrête si le fichier est manquant.</p></pre>';
    require '10_01_exemple.inc.php';  // le fichier est "requis" donc obligatoire : en cas d'erreur lors de l'inclusion du fichier, require génère une erreur de type "fatal error" et stoppe l'exécution du script 

    echo '<p>Quatrième inclusion : </p>';
    echo '<pre><p>require_once \'exemple.inc.php\'; // le once vérifie si le fichier a déjà été inclus. Si c\'est le cas, il ne le ré-inclut pas. Utilisé pour garantir qu’un fichier essentiel est requis une seule fois (exemple config pour la base de données).</p></pre>';
    require_once '10_01_exemple.inc.php';   // le once vérifie si le fichier a déjà été inclus. Si c'est le cas, il ne le ré-inclut pas.

    echo '<p>NB : Le "inc" dans le nom du fichier inclus est indicatif pour préciser aux développeurs qu\'il s\'agit d\'un fichier d\'inclusion, et donc pas d\'une page à part entière. Ce n\'est pas obligatoire mais utile.</p>';
    ?>
</body>
</html>
