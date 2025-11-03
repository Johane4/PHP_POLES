<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boucles</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="img_div">
        <img src="./img/logo_poleS.png" alt="Logo poleS">
    </div>

     <h1>Les boucles</h1>

    <div class="topnav">
	    <a href="01_bases.php">01.Bases</a>
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
    echo '<h2> Structures itératives : les boucles </h2>';
    //--------------------
    // Les boucles sont destinées à répéter des lignes de codes de façon automatique.
    echo 'Les boucles sont destinées à répéter des lignes de codes de façon automatique.';

    // Boucle while :
    //--------------------
    echo '<h4>La boucle: while </h4>';
    //--------------------
    echo '<pre>';
    echo '<p>$i = 0;// valeur de départ de la boucle</p>';
    echo '<p>while ($i < 3) {// tant que $i est inférieur à 3, nous entrons dans la boucle</p>';
    echo '<p> echo "$i---";// affiche 0---1---2---</p>';
    echo '<p> $i++;// on n\'oublie pas d\'incrémenter à chaque tour de boucle pour ne pas avoir une boucle infinie</p>';
    echo '<p>}</p>';
    echo '<p>// Note : pas de ";" à la fin de cette boucle</p>';
    echo '</pre>';

    // exemple boucle while
    $i = 0;    // valeur de départ de la boucle
    while ($i < 3) {   // tant que $i est inférieur à 3, nous entrons dans la boucle
        echo "$i---";  // affiche 0---1---2---
        $i++;          // on n'oublie pas d'incrémenter à chaque tour de boucle pour ne pas avoir une boucle infinie
    } // Note : pas de ";" à la fin de cette boucle
    echo '<br>';

    // Boucle do while :
    //--------------------
    echo '<h4>La boucle do..while </h4>';
    //--------------------
    // La boucle do while a la particularité de s'exécuter au moins une fois (correspondant à "do"), puis tant que la condition while est vraie.
    echo '<p>La boucle do while a la particularité de s\'exécuter au moins une fois (correspondant à "do"), puis tant que la condition while est vraie.</p>';

    echo '<pre>';
    echo '<p>$j = 1;</p>';
    echo '<p> do {</p>';
    echo '<p>     echo \'Je fais un tour de boucle\';</p>';
    echo '<p>     $j++;</p>';
    echo '<p>} while ($j > 10);// la condition renvoie false ici, pourtant la boucle a bien tourné une fois. Attention au ";" après le while de cette boucle</p>';
    echo '</pre>';

    // exemple do... while
    $j = 1;
    do {
        echo 'Je fais un tour de boucle <br>';
        $j++;
    } while ($j > 10);  // la condition renvoie false ici, pourtant la boucle a bien tourné une fois. Attention au ";" après le while de cette boucle

    // Exemple d'utilisation : poser une question à l'internaute une première fois avec le "do", puis tant qu'il n'a pas répondu avec le "while".
    echo '<p>Exemple d\'utilisation : poser une question à l\'internaute une première fois avec le "do", puis tant qu\'il n\'a pas répondu avec le "while".</p>';

    //----------
    // Boucle for :
    //--------------------
    echo '<h4> La boucle: for </h4>';
    //--------------------
    // La boucle for est une autre syntaxe de la boucle while.
    echo '<p>La boucle for est une autre syntaxe de la boucle while.</p>';

    echo '<pre>';
    echo '<p>for ($i = 0; $i < 10; $i++) {// on trouve dans les parenthèses du for: valeur de départ; condition d\'entrée dans la boucle; variation de $i(incrémentation décrémentation ou autre chose)
        </p>';
    echo '<p> echo $i;  // affiche 0 à 9 en 10 tours</p>';
    echo '<p>}</p>';
    echo '</pre>';

    // exemple boucle for
    for ($i = 0; $i < 10; $i++) { // on trouve dans les parenthèses du for : valeur de départ; condition d'entrée dans la boucle; variation de $i (incrémentation décrémentation ou autre chose)
        echo $i . '<br>';  // affiche 0 à 9 en 10 tours
    }

    // Rappel : si on veut faire varier $i de 10 en 10, on écrit $i += 10 à la place de $i++
    /**
     *echo '<table border="1">';
    *	echo '<tr>';
    *		for ($chiffre = 0; $chiffre < 10; $chiffre++) {
    *			echo "<td> $chiffre </td>";	
    *		}
    *	echo '</tr>';
    *echo '</table>';
    **/

    echo '<hr>';
    //--------------------
    echo '<h4> Boucle foreach </h4>';
    //--------------------
    // La boucle foreach est un moyen simple de passer en revue un tableau ou un objet. Elle retourne une erreur si vous tentez de l'utiliser sur autre chose.
    echo '<p>La boucle foreach est un moyen simple de passer en revue un tableau ou un objet. Elle retourne une erreur si vous tentez de l\'utiliser sur autre chose.</p>';

    echo '<pre>';
    echo '<p>$tab = [\'azertyuiop\', \'AZERTYUIOP\', true, 2.09];';
    echo '<p>print_r($tab);</p>';
    echo '</pre>';

    $tab = ['azertyuiop', 'AZERTYUIOP', true, 2.09];
    print_r($tab);

    // exemple foreach
    foreach ($tab as $valeur) { // le mot clé "as" fait partie de la structure syntaxique de la foreach : il est obligatoire. $valeur vient parcourir la colonne des valeurs de l'array. Notez qu'on peut l'appeler comme on veut : c'est sa place après "as" qui détermine qu'elle parcourt les valeurs.
        echo $valeur . '<br>';    // on affiche successivement les éléments du tableau à chaque tour de boucle. La foreach s'arrête automatiquement à la fin du tableau.
    }



    // exemple foreach avec indice

     $tabAssoc = [
            "Fr" => 'France',
            "It" => 'Italie',
            "Es" => 'Espagne',
            "Pt" => 'Portugal'
        ];


    foreach ($tab as $indice => $valeur) {  // quand il y a 2 variables après "as", la première parcourt la colonne des indices (quelque soit son nom), et la seconde parcourt la colonne des valeurs (quelque soit son nom)
        echo $indice . ' correspond à ' . $valeur . '<br>';
    }

        echo "<p>Les pays du monde sont :</p>";
       

        foreach($tabAssoc as $index => $valeur) {
            echo '<p>'. $index . ' : ' . $valeur . '</p>';
        }

    ?>

</body>
</html>