<?php

/** Exercice 1 : Vérifier la validité d'un âge
 * 
 *  Objectif : Ecrire une condition qui vérifie si une variable age est valide (entre 0 et 120)
 *  
 *  Afficher un message indiquant si l'âge est valide ou non 
 * 
 * petit bonus : vérifier que l'âge est un nombre entier et non un décimal
 */

echo '<h2> Exercice 1 : Vérifier la validité </h2>';

$age = 40;
// is_float ou is_double => test si nombre est décimal

if ($age < 120 && $age > 0 && is_int($age)) { // is_int($age) verifie que l'âge est un nombre entier
    echo "$age est valide";
} else {
    echo "$age est invalide";
}

/** Exercice 2 : Calculer la réduction
 * 
 *  Objectif : Ecrire une condition qui applique une réduction de 10% si le montant est supérieur à 100 (créer une variable montant), et 5% si le montant est entre 50 et 100€, sinon, aucune réduction n'est appliquée
 *  BONUS : trouver comment avoir la moyenne en entier et non en décimal
 */

echo '<h2> Exercice 2 : Calculer la réduction </h2>';

$montant = 55;

if ($montant > 50) {
    if ($montant > 100) {
        echo "10% de réduction sur votre produit, le nouveau montant est de : " . $montant * 0.9;
    } else {
        echo "5% de réduction sont appliquées sur votre produit, le nouveau montant est de : " . round($montant * 0.95);
        // méthode round() qui arrondi une valeur à l'entier inférieur
    }
} else {
    echo "Aucune réduction appliquée, prix : $montant";
}

/** Exercice 3 : Afficher le jour de la semaine
 * 
 *  Objectif : Ecrire une condition 'switch' pour afficher un message en fonction du jour de la semaine, le jour est donnée par une variable $jour en number (1 pour lundi, 2 pour mardi etc...)
 * 
 */

echo '<h2> Exercice 3 : Jour de la semaine </h2>';

$jour = 3;

switch ($jour) {
    case 1:
        echo 'Ce jour est lundi';
        break;
    case 2:
        echo 'Ce jour est mardi';
        break;
    case 3:
        echo 'Ce jour est mercredi';
        break;
    case 4:
        echo 'Ce jour est jeudi';
        break;
    case 5:
        echo 'Ce jour est vendredi';
        break;
    case 6:
        echo 'Ce jour est samedi';
        break;
    case 7:
        echo 'Ce jour est dimanche';
        break;
    default: 
        echo 'Aucun jour trouvé';
}

/** Exercice 4 : Comparaison de chaines de caractères
 *  Objectif : Ecrire une condition qui compare si deux variables sont identiques, la condition doit vérifier le type ET la valeur 
 */
echo '<h2> Exercice 4 : Comparaison chaines de caractères </h2>';

$mot1 = "33";
$mot2 = 33;

if ($mot1 === $mot2) {
    echo "$mot1 et $mot2 sont identiques en valeur et type";
} else {
    echo "$mot1 et $mot2 sont différents en type et/ou en valeur";
}

/** Exercice 5 : Calcul de la moyenne
 *  
 *  Objectif : Ecrire un script qui vérifie si la moyenne trois notes est suffisante pour passer un examen, la moyenne doit être supérieure ou égale à 10 (afficher un message pour chacun des cas)
 * 
 */
echo '<h2> Exercice 5 : Calcul de la moyenne </h2>';

$note1 = 7;
$note2 = 14;
$note3 = 11;

$moyenne = round(($note1 + $note2 + $note3) / 3, 2); // affichage décimal limité a 2 chiffres après la virgule

if ($moyenne <= 20) {
    if ($moyenne < 10) {
        echo "Vous n\'avez pas la moyenne avec une note moyenne de $moyenne, vous êtes recalé(e)";
    } else {
        echo "Vous avez la moyenne avec une note moyenne de $moyenne, félicitations";
    }
}

/** Exercice 6 : Tester une variable indéfinie
 * 
 *  Objectif : Ecrire une condition qui utilisera 'isset()' pour vérifier si un variable $var est définie, si elle est définie, afficher sa valeur, sinon afficher un message indiquant qu'elle n'est pas définie
 * 
 * Tentez avec null, '', 0 
 */
echo '<h2> Exercice 6 : Variable définie </h2>';

$var = null;

if (isset($var)) {
    echo "$var est définie";
} else {
    echo "$var est undefined";
}

/** Exercice 7 : Valider un formulaire
 * 
 *  Objectif : Ecrire une condition qui vérifie si une variable $nom est vide avec empty(), si c'est le cas, afficher un message qui demandera à l'utilisateur de remplir le champ
 * 
 */

echo '<h2> Exercice 7 : Valider un formulaire </h2>';

$nom = "";

if (empty($nom)) {
    echo 'Le champ nom est vide, merci de le remplir';
} else {
    echo 'le champ n\'est pas vide';
}

/** Exercice 8 : Vérification d'un numéro pair ou impair
 * 
 *  Objectif : Ecrire une condition qui vérifie si une variable a une valeur paire ou impaire (utiliser modulo)
 * 
 */

echo '<h2> Exercice 8 : Verification pair/impair </h2>';

$nb = 5;

if ($nb % 2 === 0) {
    echo "$nb est pair";
} else {
    echo "$nb est impair";
}

/** Exercice 9 : Catégoriser une personne selon son âge
 * 
 *  Objectif : Ecrire une/des condition(s) qui classe une personne en 'enfant','adolescent','adulte' ou 'senior' selon son age
 * 
 */
echo '<h2> Exercice 9 : Catégoriser une personne selon son âge </h2>';

$age = 7;
if ($age >= 0 && $age <= 120) {
    if ($age < 12) {
        echo "Cette personne est un enfant";
    } else if ($age >= 12 && $age <= 18) {
        echo 'Cette personne est un adolescent';
    } else if ($age > 18 && $age <= 50) {
        echo 'Cette personne est un adulte';
    } else {
        echo 'Cette personne est un senior';
    }
} else {
    echo 'age invalide';
}


/** Exercice 10 : Vérifier la cohérence des réponses avec l'opérateur XOR
 * 
 *  Objectif : Ecrire des conditions et vérifier la cohérence de ces réponses
 * 
 *  Exemple : Nous avons une vérification a faire pour vérifier si l'utilisateur se connecte avec son empreinte digitale ou son mdp (il ne peut pas faire les deux en même temps)
 * 
 *  xor : L'une des deux conditions doit être vraie seulement, si les deux sont vraies, alors il retournera false
 *  contrairement à || (or) qui vérifiera si au moins l'une des deux conditions est vraie, même si les deux le sont
 * 
 */

echo '<h2> Exercice 10 : Vérifier avec XOR </h2>';

$digital = true;
$mdp = false;

if ($mdp xor $digital) {
    echo 'accès autorisé';
} else {
    echo 'accès refusé, le mdp OU le digital est autorisé';
}

?>
