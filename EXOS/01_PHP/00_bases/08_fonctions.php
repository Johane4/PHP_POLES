<?php

/*

1. Fonction sans paramètres et sans valeur de retour
Exercice : Créez une fonction appelée greet() qui affiche "Hello, world!" lorsqu'elle est appelée.
*/

echo '<h2> Exercice 1 </h2>';
function greet()
{
    echo 'Hello, world!';
}

greet();

/*
2. Fonction avec paramètres et sans valeur de retour
Exercice : Créez une fonction appelée greetUser() qui prend un paramètre $name et affiche "Hello, [name]!" où [name] est la valeur passée à la fonction.
*/

echo '<h2> Exercice 2 </h2>';
function greetUser($name)
{
    echo "Hello, $name";
}

greetUser('Nawal');

/*
3. Fonction avec paramètres et avec valeur de retour
Exercice : Créez une fonction appelée sum() qui prend deux paramètres $a et $b, les additionne, et retourne le résultat.
*/

echo '<h2> Exercice 3 </h2>';

function sum($a, $b)
{
    return $a + $b;
}

$somme = sum(2, 7);

echo $somme;

/*
4. Fonction qui calcule la somme des nombres d'un tableau
Exercice : Créez une fonction appelée sumArray($numbers) qui prend un tableau de nombres $numbers en paramètre et retourne la somme de tous les éléments du tableau.
*/
echo '<h2> Exercice 4 </h2>';
function sumArray(array $numbers)
{
    $somme = 0;
    for ($i = 0; $i < count($numbers); $i++) {
        $somme += $numbers[$i];
    }
    return $somme;
}

$somme = sumArray([33, 28, 730, 55, 209, 88]);

echo $somme;
/*
5. Fonction avec paramètre par défaut
Exercice : Créez une fonction appelée greetWithTime() qui prend deux paramètres, un nom $name et un moment de la journée $timeOfDay (par défaut "day"), et qui affiche "Good [timeOfDay], [name]!

Rappel = vous pouvez ajouter une valeur au paramètre de fonction directement comme on a vu (exemple : function salut($name='Cynthia'){echo "Salut $name";})
".
*/

echo '<h2> Exercice 5 </h2>';

function greetWithTime($name, $timeOfDay = "day")
{
    echo "Good $timeOfDay, $name ! ";
}

greetWithTime('Audrey');

/*
6. Fonction qui retourne un tableau
Exercice : Créez une fonction appelée getFruits() qui ne prend aucun paramètre et retourne un tableau contenant trois noms de fruits.
*/

echo '<h2> Exercice 6 </h2>';

function getFruits()
{
    return ['orange', 'banane', 'citron'];
}

$tabFruit = getFruits();

var_dump($tabFruit);

/*
7. Fonction avec une chaîne de caractères comme paramètre
Exercice : Créez une fonction appelée reverseString($str) qui prend une chaîne de caractères $str en paramètre et retourne cette chaîne en ordre inversé.
*/

echo '<h2> Exercice 7 </h2>';

function reverseString($str)
{
    return join(array_reverse(str_split($str)));
}

$madara = reverseString('Madara');

echo $madara;
/*
8. Fonction avec paramètres et vérification de type
Exercice : Créez une fonction appelée divide($a, $b) qui prend deux paramètres $a et $b. La fonction doit vérifier que $b n'est pas égal à 0 avant de diviser $a par $b et retourner le résultat. Si $b est égal à 0, la fonction doit retourner un message d'erreur.
*/

echo '<h2> Exercice 8 </h2>';

function divide($a, $b)
{
    if ($b !== 0) {
        return $a / $b;
    } else {
        return 'Erreur, on ne peut pas diviser par 0';
    }
}

$divide = divide(21, 3);

echo $divide;

/*
9. Fonction qui utilise une boucle pour générer un résultat
Exercice : Créez une fonction appelée generateMultiplicationTable($number) qui prend un nombre $number en paramètre et retourne un tableau contenant la table de multiplication de ce nombre de 1 à 10.
*/

echo '<h2> Exercice 9 </h2>';

/* Si on devait typer le paramètre et la fonction ça donnerait ça :
int $number => integer pour forcer le paramètre à être un entier
: array => la fonction doit retourner un tableau
*/
function generateMultiplicationTable(int $number): array
{
    $tab = [];
    for ($i = 0; $i <= 10; ++$i) {
        $tab[] = $number * $i;
    }

    return $tab;
}

$multiple = generateMultiplicationTable(4);

echo '<pre>';
var_dump($multiple);
echo '</pre>';


/*
10. Fonction avec une condition complexe
Exercice : Créez une fonction appelée checkEligibility($age, $hasLicense) qui prend en paramètre un âge $age et un booléen $hasLicense. La fonction doit retourner "Eligible" si l'utilisateur a 18 ans ou plus et possède un permis de conduire, sinon "Not Eligible".

*/

echo '<h2> Exercice 10 </h2>';

function checkEligibility($age, $hasLicense)
{
    if ($age >= 18 && $hasLicense) {
        return 'Eligible';
    } else {
        return 'Not Eligible';
    }
}

$eligible = checkEligibility(18, true);

echo $eligible;
