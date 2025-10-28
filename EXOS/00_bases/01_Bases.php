<?php

// N'oubliez pas de vérifier sur votre navigateur à chaque exercice 

/******************************************* Exercice 1 : Création script PHP basique *****************************************
 * 
 *  1 . Dans ce fichier, ouvrir une balise php;
 * 
 *  2 . Utiliser echo pour afficher le texte suivant : Hello World, Bienvenue sur mon premier script PHP;
 * 
 *  3 . Fermer la balise php;
 * 
 */

echo "Hello world, bienvenue sur mon premier script PHP <br>";


/******************************************* Exercice 2 : Echo et Print *****************************************
 *  Objectif : comprendre la différence entre echo et print
 * 
 *  1 . Utiliser echo pour afficher le texte : Bonjour tout le monde !. Suivi d'un saut de ligne
 * 
 *  2 . Utiliser ensuite print pour afficher le texte : Aujourd'hui, nous sommes le (date d'aujourd'hui + mois d'aujourd'hui). Suivi d'un saut de ligne
 */

echo "Bonjour tout le monde <br>" . "<br>";
print "Aujourd'hui nous sommes le 28 octobre 2025";
print "<br>";

/******************************************* Exercice 3 : HTML et PHP *****************************************
 *  Objectif : comprendre que PHP génére du HTML
 * 
 *  1 . Ecrire du code HTML à l'intérieur (code de démarrage HTML) avec un <h1></h1>;
 * 
 *  2 . A l'interieur des balises PHP, utiliser echo pour afficher un paragraphe <p></p> avec le texte suivant : Ce texte est affiché depuis PHP;
 * 
 */
?> <!-- On ferme la balise PHP -->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Exercice 3</h1>

    <?php echo "<p> Ce texte est affiché depuis PHP </p>" ?>

</body>

</html>

<?php
/******************************************* Exercice 4 : commentaires en PHP *****************************************
 *  Objectif : savoir commenter sur une ou plusieurs lignes (exercice cadeau)
 *  
 *  1. Ecrire un commentaire d'une ligne qui explique l'exercice 2
 * 
 *  2 . Ecrire un commentaire sur plusieurs lignes pour expliquer la différence entre echo et print
 * 
 *  3 . S'assurer que les commentaires ne sont pas visible sur le navigateur
 */

// cet exercice utilise echo pour afficher un texte et print pour en afficher un autre

/******************************************* La différence entre echo et print est minime *****************************************
 * 
 * echo accepte plusieurs arguments séparés par des virgules (exemple : echo "Coucou je m'appelle antoine","J'aimerais dire
 * quelques mots" et ne retourne rien)
 * 
 * print n'accepte qu'un argument (une erreur apparaitra si vous tentez de mettre une virgule après) et retourne toujours
 * true (ce qui fait qu'on peut l'utiliser en valeur de variable par exemple : $vraioufaux = print "ceci est un test", la
 * valeur de vraioufaux sera true (1));
 */


/******************************************* Exercice 5 : print_r() *****************************************
 *  Objectif : savoir utiliser la fonction print_r()
 * 
 *  1 . Créer un fichier print_r_test.php;
 * 
 *  2 . Déclarer un tableau associatif $personne avec les clés 'nom' et 'age' (les valeurs sont libre de choix)
 * 
 *  3 . Utiliser print_r() avec en paramètre le tableau pour afficher le contenu du tableau
 * 
 */

$personne = [
    'nom' => 'Coralie',
    'age' => 19
];

print_r($personne);


/******************************************* Exercice 6 : var_dump() *****************************************
 *  Objectif : savoir utiliser la fonction var_dump()
 * 
 *  1 . Créer une variable $nombre avec une valeur numerique et $str avec une valeur string;
 * 
 *  2 . Utiliser var_dump() avec en paramètre la variable $nombre et encore une fois var_dump() avec la variable $str;
 * 
 */

$nombre = 33;
$str = "est l'âge de pierre";

var_dump($nombre);
var_dump($str);

/******************************************* Exercice 7 : Texte avec HTML *****************************************
 *  Objectif : générer du texte HTML avec php
 * 
 *  1 . Utiliser echo pour afficher un texte en utilisant les balises suivantes (<b> pour bold = gras, <i> pour italique, <u> souligné) : exemple ("Ceci est mon paragraphe <b>gras</b> en <i>italique</i> et <u>souligné</u>)
 */

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Exercice 7</h1>
    <?php echo "<p> Ceci est mon pragraphe <b>gras</b> en <i>italique</i> et <u>souligné</u> </p>"; ?>
</body>

</html>


<?php
/******************************************* Exercice 8 : Commentaires et PHP *****************************************
 * Objectif : ecrire du code php et commenter ce que vous ecrivez
 *
 * 1 . Ecrire du code à l'interieur, exemple 
 * echo("<div>
 *          <h1>Bienvenue</h1>
 *          <h2> sur mon application </h2>
 *.     </div>");
 *
 * 2 . Inclure des commentaires pour expliquer ce qui y est fait

 */

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Exercice 8</h1>
    <!-- php genere du code HTML grâce à echo  -->
    <?php echo "<div> <h2> Bienvenue </h2> <h2> sur mon application </h2>" ?>
</body>

</html>


<?php
/******************************************* Exercice 9 : Balises PHP dans HTML *****************************************
 * Objectif : Inclure une date dans le HTML
 * 
 * 1 . Ecrire du code HTML avec un H1, un H2, et un paragraphe
 *
 * 2 . Utiliser PHP pour récupérer la date d'aujourd'hui et l'inclure dans le paragraphe HTML (chercher sur internet)
 */

$date = date("j F Y");
echo "<h2 Date </h2> <h2> La date d'aujourd'hui est la suivante </h2> <p> $date </p>";

/*
Pour la date en français 
setlocale(LC_TIME, 'french'); setlocale(LC_TIME, 'fra');
$date = strftime("%e %B %Y"); // %e : jour sans les zéro, %B : nom complet du mois, %Y : année méthode dépréciée
echo $date;
*/

/******************************************* Exercice 10 : Affichage dynamique *****************************************
 * Objectif : Afficher dynamiquement du contenu dans notre page HTML
 *
 * 1 . Déclarer une variable $message qui contiendra le texte que vous voudrez
 *
 * 2 . Utiliser echo pour générer du HTML, un H1 sera créé et y inclure la variable $message
 */
$message = "ce que vous voudrez";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Exercice 10</h1>
    <?php echo "<h3> $message </h3>"; ?>
</body>

</html>