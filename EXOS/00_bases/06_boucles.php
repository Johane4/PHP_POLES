<?php

// afficher tous les résultats bien sur

/** Exercice 1 : Boucle while basique
 * 
 *  Objectif : Créer une boucle while qui affiche les nombres pairs de 0 à 20
 * 
 */
echo "<h2> Exercice 1 : Boucle while basique </h2>";
$pairs = 0;

while ($pairs <= 20) {
    if($pairs % 2 == 0) echo "$pairs <br>"; 
    ++$pairs;
}


/** Exercice 2 : Générer une liste d'années avec une boucle while
 * 
 *  Ojectif : Afficher les années de 2000 à l'année actuelle (qui doit être incluse) dans une liste non ordonnée (<ul>)
 * 
 */

echo "<h2> Exercice 2 : Generer une liste d'années avec une boucle while </h2>";

$annees = 2000;
$year = date("Y");

echo '<ul>';
while ($annees <= $year) { // l'année en brut acceptée
    echo "<li> $annees </li>";
    ++$annees;
}
echo '</ul>';



/** Exercice 3 : Boucle do...while
 * 
 *  Objectif : Utiliser une boucle do...while pour afficher les multiples de 3 inférieurs à 30. 
 * La variable de départ équivaut à 3
 * 
 * 
 */

echo '<h2> Exercice 3 : Boucle do...while </h2>';

$multiples = 3;


do {
    echo "$multiples <br>";
    $multiples += 3;
} while ($multiples <= 30);


/** Exercice 4 : Boucle for
 * 
 *  Objectif : Créer une boucle for qui affiche une table de multiplication (de 1 à 10) pour un nombre donné
 *  Affichage de l'opération et du résultat
 */

echo '<h2> Boucle for </h2>';

$nombre = 4;

for ($i = 1; $i < 11; $i++) {
    echo "<br> $nombre x $i = " . $nombre * $i;
}

/** Exercice 5 : Boucles imbriquées pour créer une grille
 * 
 *  Objectif : Créer une boucle for qui affiche une grille de 5x5 dans un tableau html (<table>).
 *             Chaque cellule doit contenir les coordonnées de la cellule (par exemple (1,1) pour la première cellule)
 * 1,1  1,2  1,3  1,4  1,5
 * 2,1  2,2  2,3 ...
 * ...
 * ...
 * ...
 * 5,1  5,2 ...
 */

echo '<h2> Exercice 5 : Boucles imbriquées pour créer une grille </h2>';

echo '<table style="border-collapse: collapse;">
        <tbody>';

for ($i = 1; $i <= 5; $i++) {
    echo '<tr>';
    for ($j = 1; $j <= 5; $j++) {
        echo '<td style="border: 1px solid black; padding: 8px; text-align: center; width: 40px; height: 40px;">' . $i . "," .$j . '</td>';
    }
    echo '</tr>';
}
echo '</tbody></table>';


/** Exercice 6 : foreach pour un tableau associatif
 * 
 *  Objectif : Créer un tableau associatif avec les informations suivantes : 'prenom','nom','email','age'
 *             Afficher chaque information sous la forme clé : valeur dans des paragraphes, l'email doit être dans un lien (<a>)
 * 
 */

echo '<h2> Foreach pour un tableau associatif </h2>';

$personne = [
    'prenom' => 'lucie',
    'nom' => 'Benziam',
    'email' => 'Benz.lucie@outlook.com',
    'age' => 24
];

foreach ($personne as $cle => $valeur) {
    if ($cle !== 'email') {
        echo "<p> $cle : $valeur</p>";
    } else {
        echo "$cle : <a href='lien'>  $valeur</a>";
    }
}

/** Exercice 7 : Foreach avec des clés personnalisées
 *  
 *  Objectif : Créer un tableau associatif représentant un menu de navigation, les clés seront les titres des pages ('accueil','produits','contact') et les valeurs les liens correspondants.
 * 
 * Afficher chaque element du menu sous forme de liens (<a href=valeur> </a>)
 * 
 * 
 */

echo '<h2> Exercice 7 : Foreach avec des clés personnalisées </h2>';

$navigationTab = [
    'accueil' => 'chemin_vers_page_accueil',
    'produits' => 'chemin_vers_page_produits',
    'contacts' => 'chemin_vers_page_contact'
];

echo '<nav><ul>';
foreach ($navigationTab as $cle => $valeur) {
    echo "<li> <a href=$valeur> $cle </a></li>";
}
echo '</ul></nav>';


/** Exercice 8 : Boucles imbriquées et conditions
 * 
 *  Objectif : Créer un tableau HTML de 10x10 dans lequel chaque cellule contient un nombre aléatoire entre 1 et 100. Regarder random_int pour la génération des nombres aléatoires 
 * 
 * 
 */

echo '<h2>Exercice 8 : boucles imbriquées et conditions </h2>';


echo '<table style="border: 1px solid black; padding: 20px;"><tbody">';

for ($i = 1; $i <= 10; $i++) {
    echo '<tr>';
     for ($j = 1; $j <= 10; $j++) {
        $aleat = random_int(1, 100); // random_int : genere un nombre entier aleatoire entre les valeurs passées en paramètres (1,100);
         // Ajoute un zéro devant si le nombre est inférieur à 10
        if ($aleat < 10) {
            $zero = '0' . $aleat;
        } else {
            $zero = $aleat; // Si >= 10, on garde tel quel
        }
        echo "<td style='border: 2px solid black; padding: 5px; text-align: center;'> $zero </td>";
    }

    echo '</tr>';
}

echo '</tbody></table>';


/** Exercice 09 : Tableau de tableaux avec foreach
 * 
 *  Objectif : Créer un tableau contenant trois sous tableaux, chacun représentera une personne avec les clés 'prenom','nom','age'. 
 * 
 *  Afficher toutes les informations sous forme de liste HTML ordonnées ('<ol>'), où chaque personne a sa propre sous-liste (<ul>)
 * 
 *  Résultat attendu : 
 * 
 *  <ol> 
 *      <li> Personne 1 </li>
 *  <ul> 
    *  <li> prénom : prenom </li>
    *  <li> nom : nom </li>
    *  <li> age: age </li>
 *  </ul>
 *  <li> Personne 2 </li>
 * 
 */

echo '<h2> Exercice 9 : Tableau de tableaux </h2>';

$tab = [
    'personne1' => [
        'prenom' => 'Daenerys',
        'nom' => 'Targaryen',
        'age' => 23
    ],
    'personne2' => [
        'prenom' => 'Rhaenyra',
        'nom' => 'Targaryen',
        'age' => 33
    ],
    'personne3' => [
        'prenom' => 'Daemon',
        'nom' => 'Targaryen',
        'age' => 49
    ]
];

echo "<ol>";

/* pour accéder et afficher la valeur d'un indice nous pouvons faire ceci
    <li>$valeur[prenom]</li> => mais cette version n'est pas la mieux adaptée. PHP peut considérer que
    prenom est une constante non déclarée ou dans le cas où l'indice n'est pas trouvé, il nous renverra une erreur
    Pour palier à ça il faut garder les '' autour de l'indice comme ceci:
    <li>{$valeur['prenom']}</li> => Bonne pratique !
*/

foreach($tab as $person => $valeur) {
    echo "
            <li>$person</li>
        <ul>
            <li>{$valeur['prenom']}</li>
            <li>{$valeur['nom']}</li>
            <li>{$valeur['age']} ans</li>
        </ul>
        
    ";
}


echo '</ol>';


// Version 2
echo "<h2>Version 2: boucles imbriquées</h2>";
echo "<ol>";

/*Dans cette version on a refait une boucle sur le tableau $valeur afin d'afficher les informations dans un seul li
    $pnj correspond au nom de chaque indice (prenom, nom et age)
    $info correspond a la valeur de chaque indice (Daemon, Targaryen, etc...)
    De ce fait nous n'avons plus de valeurs de type Array !!
*/
foreach($tab as $person => $valeur) {
    echo "
            <li>$person</li>";
    echo "<ul>";
    foreach($valeur as $pnj => $info) {
        echo '<li>' . $pnj. ' : ' . $info . '</li>';
    }

    echo "</ul>";              
}
echo '</ol>';



// Version 3
echo "<h2>Version 3: boucles imbriquées avec condition</h2>";
echo "<ol>";

/* Ici nous aurions très bien pu utiliser la première méthode pour n'afficher uniquement le prénom mais on veut montrer qu'il est possible de conditionner l'affichage d'un élément en cibler son indice
Donc en récupérer uniquement prenom pour afficher sa valeur dans un if
*/
foreach($tab as $person => $valeur) {
    echo "
            <li>$person</li>";
    echo "<ul>";
    foreach($valeur as $pnj => $info) {
        if ($pnj === 'prenom') {
            echo '<li>' . $pnj . ' : ' . $info . '</li>';
        } else {
            echo "<li>Pas de prénoms</li>";
        }
    }

    echo "</ul>";              
}
echo '</ol>';


?>