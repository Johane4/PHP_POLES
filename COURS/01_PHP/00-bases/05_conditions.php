<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conditions</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="img_div">
        <img src="./img/logo_poleS.png" alt="Logo poleS">
    </div>

    <h1>Calculs arithmétiques</h1>

    <div class="topnav">
	    <a href="01_bases.php">01.Bases</a>
        <a href="02_variables.php">02.Les variables</a>
        <a href="03_constantes.php">03.Les constantes</a>
        <a href="04_arithmetiques.php">04.Arithmétiques</a>
        <a href="05_conditions.php">05.Conditions</a>
        <a href="06_tableaux.php">06.Tableaux</a>
        <a href="07_boucles.php">07.Boucles</a>
        <a href="08_dates.php">08.Dates</a>

    </div>

    <?php 
    echo '<h2>Structures conditionnelles - opérateurs de comparaison</h2>';

    $a = 10;
    $b = 50;
    $c = 2;

    // if... else
    if($a > $b) {
        echo '<p>$a est bien supérieur à $b</p>';
    } else {
        echo '<p>$a est inférieur à $b</p>';
    }

    // L'opérateur AND écrit &&

    if($a < $b && $b > $c ) {
        echo "<p>C'est okay pour les deux variables</p>";
    }

    // L'opérateur Ou écrit || (Ou logique)
    if($c < $a || $b < $a) {
        echo "<p>Avec le ou logique on est bon aussi !</p>";
    }

    // L'opérateur XOR écrit ^(Ou exclusif)
    $question1 = "mineur";
    $question2 = "je vote";

    // seulement une des deux conditions doit être vraie pour que tout soit retourné true, jamais plus d'une
    if($question1 == "mineur" XOR $question2 == "je vote"){
        echo "<p>Vos réponses sont cohérentes</p>";
    } else  {
        echo "<p>Vos réponses ne sont pas cohérentes</p>";
    }

    // Forme simplifiée : ternaire
    echo ($a === 10) ? '<p>$a est bien égale à 10</p>' : '<p>$a est différente de 10</p>';

    $day = "mardi";
    $month = "october";

    echo $day === "Mardi" ? "<p>On est bien Mardi</p>" : "<p>On est pas du tout ce jour là</p>" ;

    // équivalence if else
    if ($day === "Mardi") {
        echo "<p>On est bien Mardi</p>";
    } else {
        echo "<p>On est pas du tout ce jour là </p>";
    }

    // if($a === 10) => condition à vérifier
    // ? ... équivaut à => alors...instructions à éxecuter si la condition est vraie
    // : ... équivaut à else => sinon ... autre instructions à executer la elle est fausse

    // isset() & empty()
    // isset() teste si c'est défini (si existe) et a une valeur non NULL
    // empty() teste si c'est vide, c'est-à-dire 0, string vide '', NULL, false ou non défini

    $var1 = 0;
    $var2 = "";
    //$var3;

    /* méthode qui vérifie si la variables est vide, si elle est égale à 0 elle est considérée comme étant vide
        soit vraie
    */
    if(empty($var1)) {
      echo "0, donc var1 est vide, vraie ou non définie" ."<br>";  
    } else {
        echo "var1 n'est ni vide, elle est fausse et définie" ."<br>";
    }

    if(empty($var2)) {
      echo "0, donc var2 est vide, vraie ou non définie" ."<br>";  
    } else {
        echo "var2 n'est ni vide, elle est fausse et définie" ."<br>";
    }


    /* méthode qui vérifie si la variable existe avant tout traitement donc si on ne l'a pas définie elle renverra false
    */
    if(isset($var2)) echo "<p>var2 existe et est non NULL</p>";

    if(isset($var3)) {
        echo "<p>var3 existe et est non NULL sur la var3</p>";
    } else {
        echo "<p>var3 n'existe pas !</p>";
    }

    // PS: ces méthodes sont utiles lorque l'on veut récupérer des informations sur un formulaire par exemple et 
    // qu'on veut alerter l'utilisateur sur les champs à remplir !

    $color = "jaune";

    switch($color) {
        case "rouge":
            echo "<p>C'est ma couleur préférée</p>";
            break;
        case "Rouge":
            echo "<p>Je pense que j'aime aussi</p>";
            break;
        case "bleu":
            echo "<p>Comme le ciel</p>";
            break;
        default: 
            echo "Aucune des couleurs n'a été choisie";
    }

    // if($color === "rouge") {
    //      echo "<p>C'est ma couleur préférée</p>";
    // } elseif ($color === "Rouge") {
    //     echo "<p>Je pense que j'aime aussi</p>";
    // } elseif() ......

    ?>
</body>
</html>