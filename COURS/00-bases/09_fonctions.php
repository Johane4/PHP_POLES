<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fonctions Prédéfinies et Utilisateur</title>
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
    echo '<h2> Quelques fonctions prédéfinies </h2>';
    //--------------------
    // Une fonction prédéfinie permet de réaliser un traitement spécifique prédéterminé dans le langage PHP. 

    //---
    // strpos :
    $email1 = 'prenom@site.fr';
    echo '<pre>echo strpos($email1, \'@\'); // affiche la position 6 de l\'@ en comptant à partir de 0</pre>';
    echo '<div class="output">' . strpos($email1, '@') . '</div>';  // affiche la position 6 de l'@ en comptant à partir de 0

    echo '<pre>echo strpos($email2, \'@\'); // cette ligne n\'affiche rien, pourtant la fonction retourne bien quelque chose : false</pre>';
    $email2 = 'bonjour';
    echo '<div class="output">' . var_dump(strpos($email2, '@')) . '</div>';  // affiche false, car l'@ n'est pas trouvé

    //---
    // strlen :
    $phrase = 'mettez une phrase ici à cet endroit';
    echo '<pre>echo strlen($phrase); // strlen retourne la taille d\'une chaine (nombre d\'octets de cette chaîne)</pre>';
    echo '<div class="output">' . strlen($phrase) . '</div>'; // strlen retourne la taille de la chaîne en octets

    //---
    // mb_strlen
    // Affichage du code avec une explication sur mb_strlen()
    echo '<pre>echo mb_strlen($phrase, \'UTF-8\'); // mb_strlen retourne la taille en caractères, en prenant en compte l\'encodage UTF-8</pre>';
    echo '<div class="output">' . mb_strlen($phrase, 'UTF-8') . '</div>'; // mb_strlen retourne la taille en caractères

    //---
    // substr :
    $texte = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum aperiam maiores tenetur veritatis ipsum debitis nostrum, nobis, quo at id dolore optio maxime natus quis? Accusantium debitis minima dignissimos necessitatibus!';
    echo '<pre>echo substr($texte, 0, 20) . \' ... <a href="">lire la suite</a>\'; // substr retourne une partie du string de la position 0 et sur 20 caractères</pre>';
    echo '<div class="output">' . substr($texte, 0, 20) . ' ... <a href="#">lire la suite</a></div>';  // retourne les premiers 20 caractères du texte

    //---
    // trim :
    $message = '     Hello world     ';
    echo '<pre>echo strlen($message); // on compte la taille avec les espaces</pre>';
    echo '<div class="output">' . strlen($message) . '</div>';  // affiche la longueur avec les espaces

    echo '<pre>echo strlen(trim($message)); // on compte la taille une fois les espaces supprimés avec trim en début et fin de string</pre>';
    echo '<div class="output">' . strlen(trim($message)) . '</div>';  // affiche la longueur après suppression des espaces

    //---
    // die() et exit() :
    // exit('un message');    // quitte le script après avoir affiché le message
    // die('un message');    // fait la même chose : die() est un alias de exit()

    //--------------------
    echo '<h2> Fonctions utilisateur </h2>';
    //--------------------
    // Des fonctions sont des morceaux de codes encapsulés dans des accolades et portant un nom, qu'on appelle au besoin pour exécuter le code qui s'y trouve.

    // Déclaration d'une fonction :
    function separation()
    {  // déclaration d'une fonction sans paramètre
        echo '<hr>';
    }

    // Appel de la fonction :
    echo '<pre>function separation() { echo \'<hr>\'; }</pre>';
    separation();   // on appelle la fonction

    //---
    // Fonction avec paramètre et return :
    function bonjour($qui)
    {  // $qui est un paramètre
        return 'Bonjour ' . $qui . '<br>'; // return renvoie le string qui le suit
    }

    echo '<pre>function bonjour($qui) { return \'Bonjour \' . $qui . \'<br>\'; }</pre>';
    echo '<div class="output">' . bonjour('Pierre') . '</div>';  // affiche 'Bonjour Pierre'
    echo '<div class="output">' . bonjour('Sabuj') . '</div>';  // affiche 'Bonjour Sabuj'

    //---
    // Exercice :
    function appliqueTva($nombre)
    {
        return $nombre * 1.2;
    }

    // Ecrivez une fonction appliqueTva2 qui calcule un nombre multiplié par un taux donnés lors de l'appel de la fonction.
    function appliqueTva2($nombre, $taux = 1.2)
    {  // paramètre par défaut
        return $nombre * $taux;
    }

    echo '<pre>function appliqueTva2($nombre, $taux = 1.2) { return $nombre * $taux; }</pre>';
    echo '<div class="output">' . appliqueTva2(100, 1.196) . '</div>'; // avec taux personnalisé
    echo '<div class="output">' . appliqueTva2(100) . '</div>'; // avec taux par défaut

    //---
    // Exercice :
    function meteo($saison)
    {
        echo "Nous sommes en $saison. <br>";
    }

    echo '<pre>function meteo($saison) { echo "Nous sommes en $saison. <br>"; }</pre>';
    meteo('automne');
    meteo('printemps');

    // Au sein d'une nouvelle fonction exoMeteo, afficher l'article "au" ou "en" selon la saison (en été, en hiver, en automne, au printemps). 

    function exoMeteo($saison)
    {
        if ($saison === 'printemps') {
            $article = 'au';
        } else {
            $article = 'en';
        }
        echo "Nous sommes $article $saison <br>";
    }

    echo '<pre>function exoMeteo($saison) { if ($saison === \'printemps\') { $article = \'au\'; } else { $article = \'en\'; } echo "Nous sommes $article $saison <br>"; }</pre>';
    exoMeteo('été');
    exoMeteo('printemps');

    //--------------------
    // Variables locales et variables globales :

    // De l'espace local à l'espace global :
    function jourSemaine()
    {
        $jour = 'mardi';  // variable locale à la fonction
        return $jour;  // return permet de sortir une valeur de la fonction
    }

    echo '<pre>function jourSemaine() { $jour = \'mardi\'; return $jour; }</pre>';
    echo '<div class="output">' . jourSemaine() . '</div>';  // affiche 'mardi'

    echo '<br>';

    // De l'espace global à l'espace local :
    $pays = 'France';  // variable globale

    function affichePays()
    {
        global $pays; // le mot clé "global" permet de récupérer une variable globale au sein de l'espace local de la fonction
        echo $pays;  // affiche France
    }

    echo '<pre>function affichePays() { global $pays; echo $pays; }</pre>';
    affichePays();
    ?>
</body>

</html>