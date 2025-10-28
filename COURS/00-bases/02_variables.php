<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les bases en PHP</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="img_div">
        <img src="./img/logo_poleS.png" alt="Logo poleS">
    </div>

    <h1>Les variables en PHP</h1>

    <div class="topnav">
        <a href="01_bases.php">01.Les bases</a>
        <a href="02_variables.php">02.Les variables</a>
        <a href="03_constantes.php">03.Les constantes</a>
        <a href="04_arithmetiques.php">04.Arithméthiques</a>
    </div>

    <?php
        echo '<p>Déclaration et affectation de variables</p>';

        $firstVar = 150;
        var_dump($firstVar);
        echo gettype($firstVar); // integer

        echo "<br>";

        $secondVar = "Alors est-ce qu'on va aimer PHP ?";
        var_dump($secondVar);
        echo gettype($secondVar); // string

        echo "<br>";

        $thirdVar = true;
        var_dump($thirdVar);
        echo gettype($thirdVar); // boolean

        echo "<br>";

    ?>




</body>
</html>