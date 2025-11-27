<?php


/************************************************ Exercice 1 : Concaténation simple **********************************************
 *  
 *  1 . Créer deux variables nom et prenom et affecter les valeurs de son choix
 * 
 *  2 . Concatener ces deux variables pour afficher une chaîne de caractère du nom et prénom complets avec echo
 */

echo '<h2> Exercice 1 : Concaténation simple</h2>';

$nom = "nomDeFamille";
$prenom = "Prenom";

echo "$nom $prenom <br>";

/************************************************ Exercice 2 : Concatenation avec des phrases **********************************************
 * 
 *  1 . Créer une variable phrase1 qui contiendra la chaine de caractères : Le ciel est
 * 
 *  2 . Créer une variable phrase2 qui contiendra la chaine de caractères : bleu aujourd'hui 
 * 
 *  3 . Concatener les deux variables en utilisant variable . variable et afficher le resultat avec echo
 */

echo '<h2> Exercice 2 : Concatenation avec des phrases </h2>';


$phrase1 = "Le ciel est ";
$phrase2 = "bleu aujourd'hui";

echo $phrase1 . $phrase2;

/************************************************ Exercice 3 : Utilisation de virgules dans echo **********************************************
 * 
 *  1 . Créer trois variables mot1 qui contiendra : J'aime, mot2 : le et mot3 : PHP
 * 
 *  2 . Utiliser echo pour afficher les trois mots séparés par des virgules plutot que par le point de concatenation ( . )
 * 
 */
echo '<h2> Exercice 3 : Utilisation de virgules dans echo </h2>';

$mot1 = 'J\'aime ';
$mot2 = 'le ';
$mot3 = 'PHP ';

echo $mot1, $mot2, $mot3;

/************************************************ Exercice 4 : Concatenation avec l'opérateur combiné ".=" **********************************************
 * 
 *  1 . Créer une variable texte avec la valeur : je vais
 * 
 *  2 . Utiliser l'opérateur combiné pour ajouter : à la plage
 * 
 *  3 . Afficher le resultat
 * 
 */

echo '<h2> Exercice 4 : Concatenation avec l\'opérateur combiné </h2>';
$texte = 'je vais ';
$texte .= 'à la plage ';

//$texte = $texte . 'à la plage';

echo $texte;
/************************************************ Exercice 5 : Echapper les guillemets **********************************************
 * 
 *  1 . Créer une variable citation qui contiendra la chaine de caractères suivante : 'Il a dit : "Le PHP est fantastique"'
 * 
 *  2 . S'assurer que les guillemets dans la chaine sont correctement échappés pour éviter les erreurs de syntaxe
 * 
 *  3 . Afficher la citation
 * 
 */
echo '<h2> Exercice 5 : Echapper les guillemets </h2>';

$citation = 'Il a dit : "Le PHP est fantastique"';

echo $citation;

/************************************************ Exercice 6 : Quotes simples et doubles **********************************************
 * 
 *  1 . Créer une variable mot qui contiendra la chaine de caractères : PHP
 * 
 *  2 . Utiliser echo pour afficher cette variable à l'interieur d'une chaine entourée de quotes doubles (exemple : echo "le mot est : $mot")
 * 
 *  3 . Faire la même chose mais avec des quotes simple et observer la différence
 * 
 */
echo '<h2> Exercice 6 : Quotes simples et doubles </h2>';

$mot = 'PHP';

echo "Le mot est : '$mot'";



/************************************************ Exercice 7 : Utilisation de variables dans les chaines **********************************************
 * 
 *  1 . Créer une variable nom avec une valeur.
 * 
 *  2 . Utiliser echo pour afficher une phrase qui dit : "Bonjour, (nom), bienvenue sur notre site!", en utilisant la variable nom à la place de (nom)
 */
echo '<h2> Exercice 7 : Utilisation de variables dans les chaines </h2>';

$nom = "Gargino";

echo "Bonjour, $nom, bienvenue sur notre site !";

/************************************************ Exercice 8 : Concaténation et guillemets **********************************************
 * 
 *  1 . Créer une variable citation contenant la phrase suivante : 'la vie est belle'
 * 
 *  2 . Concatener cette phrase avec une deuxième chaine qui dit : ', surtout quand on code en PHP!'
 * 
 *  3 . Afficher la phrase complete en entourant le tout de guillemets doubles
 */
echo '<h2> Exercice 8: Concaténation et guillemets </h2>';

$citation = '"La vie est belle';
$citation .= ', surtout quand on code en PHP"';

echo $citation;
