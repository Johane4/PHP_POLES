<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableaux</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="img_div">
        <img src="./img/logo_poleS.png" alt="Logo poleS">
    </div>

     <h1>Les tableaux</h1>

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
    echo '<h2> Les tableaux ou array </h2>';
    //--------------------
    echo '<p>Un tableau, ou array en anglais, est une variable améliorée dans laquelle on stocke une multitude de valeurs. Ces valeurs peuvent être de n\'importe quel type. Elles possèdent un indice dont la numérotation par défaut commence à 0.</p>';

    // Déclaration d'un array (méthode 1) :
    $liste = array("grégoire", 'nathalie', 'émilie', 'françois', 'georges');

    echo '<pre>
            <p>Déclaration d\'un array (méthode 1) :</p>
            <p>$liste = array("grégoire", "nathalie", "émilie", "françois", "georges");</p>
            <p>echo \'Le type de $liste est : \' . gettype($liste);  // affiche le type array</p>
            <p>// echo $liste;// erreur de type "Array to string conversion" car on ne peut pas afficher directement un array avec un echo</p>
            <p>var_dump($liste);  // affiche le contenu du tableau plus certaines informations comme les types</p>
        </pre>';  // pre est une balise HTML qui permet de formater l\'affichage du var_dump

    echo 'Le type de $liste est : ' . gettype($liste) . '<br>';  // affiche le type array
    // echo $liste;  // erreur de type "Array to string conversion" car on ne peut pas afficher directement un array avec un echo
    echo "Avec var_dump() :";
    var_dump($liste);

    echo '<pre>
            <p>print_r($liste);  // print_r est plus synthétique que var_dump : il n\'affiche pas le type des éléments contenus dans l\'array</p>
        </pre>';

    echo "Avec print_r() :";
    echo print_r($liste);
       /* 
        array_merge() => pour fusionner deux tableaux 
        array_push() ou $array[] = "valeur" => pour ajouter un élément dans un tableau
    
    */

    // fonction d'affichage d'un print_r avec balises pre :
    function debug($param) {
        echo '<pre class="debug">' .
                print_r($param, true) .
            '</pre>';
    }

  

    // Autre méthode de déclaration d'un array :
    echo '<pre>
            <p>$tab = [\'France\', \'Italie\', \'Espagne\', \'Portugal\'];</p>
            <p>$tab[] = \'Suisse\'; // les [] vides permettent d\'ajouter une valeur à la fin de notre array</p>
            <p>debug($tab); // Cette fonction a été créée</p>
            <p>echo $tab[1]; // Entre [] l\'indice de notre élément dans le tableau</p>
        </pre>';

    $tab = ['France', 'Italie', 'Espagne', 'Portugal'];
    $tab[] = 'Suisse';  // les [] vides permettent d'ajouter une valeur à la fin de notre array
    // Ajouter un nouvel élément au début du tableau
    echo "<p>Pour ajouter un nouvel élément au début du tableau</p>";
    echo "array_unshift('nom tab', 'Belgique')";
    debug($tab);
    // Afficher "Italie" à partir de notre tableau $tab :
    echo $tab[1] . '<br>';

    //--------------  
    // Tableau associatif :
    echo '<h4>Tableau associatif</h4>
      <p>Un tableau associatif est un tableau dans lequel on choisit la dénomination des indices.</p>';

    // $couleur = array(
    //     'j' => 'jaune',
    //     'b' => 'bleu',
    //     'v' => 'vert'
    // );

    $couleur = [
        'j' => 'jaune',
        'b' => 'bleu',
        'v' => 'vert'
    ];

     // Ajouter un nouvel élément au début du tableau
    array_unshift($tab, ['r' => 'rouge']);

    echo '<pre>
        <p>$couleur = array(</p>
        <p>    \'j\' => \'jaune\',<br>
             \'b\' => \'bleu\',<br>
             \'v\' => \'vert\'</p>
        <p>);</p>
      </pre>';

    // $day = [
    //     '1' => 'lundi',
    //     '2' => 'mardi',
    // ];

    //  echo $day['1'];

    // Pour accéder à un élément du tableau associatif :
    echo '<p>Pour accéder à un élément du tableau associatif :</p>';

    echo '<pre>
            <p>echo \'La seconde couleur de notre tableau est le \' . $couleur[\'b\'];</p>
            <p>echo "La seconde couleur de notre tableau est le $couleur[b]";// affiche bleu. Un array écrit entre des guillemets perd les quotes autour de son indice</p>
        </pre>';

    echo 'La seconde couleur de notre tableau est le ' . $couleur['b'] . '<br>';
    echo "La seconde couleur de notre tableau est le $couleur[b] <br>"; // affiche bleu. Un array écrit dans des guillemets ou des quotes perd les quotes autour de son indice

    // Mesurer la taille d'un array :
    echo '<p>Mesurer la taille d\'un array :</p>';

    echo '<pre>
            <p>echo \'Taille du tableau $couleur : \' . count($couleur);</p>
            <p>echo \'Taille du tableau $couleur : \' . sizeof($couleur);<br><br>// count() et sizeof() font la même chose : ils comptent le nombre d\'éléments contenus dans l\'array indiqué</p>
        </pre>';

    echo 'Taille du tableau $couleur : ' . count($couleur) . '<br>';
    echo 'Taille du tableau $couleur : ' . sizeof($couleur) . '<br>';  // count() et sizeof() font la même chose : ils comptent le nombre d'éléments contenus dans l'array indiqué

    //--------------------
    echo '<h2> Array multidimensionnel </h2>';
    //--------------------
    echo '<p>Nous parlons de tableau multidimensionnel quand un tableau est contenu dans un autre tableau. Chaque tableau représente une dimension.</p>';

    // création d'un array multidimensionnel :

    $tab_multi = [
        0 => [
            'prenom'    => 'Julien',
            'nom'       => 'Dupon',
            'telephone' => '0601020304',
            'domiciliation' => [
                "numero" => "30",
                "rue" => "rue de Issa",
                "ville" => "IssaLand"
            ],
        ],
        1 => [
            'prenom'    => 'Nicolas',
            'nom'       => 'Duran',
            'telephone' => '0601020304'
        ],
        2 => [
            'prenom'    => 'Pierre',
            'nom'       => 'Dulac'
        ]
    ]; // il est possible de choisir le nom des indices dans cet array multidimensionnel

    echo "affichage du prénom: " . $tab_multi[0]['prenom'] . "<br>";
    echo "affichage de la rue : " . $tab_multi[0]['domiciliation']['rue'];

    // exemple de modification d'indices dans le tableau
//    $tab_multi = [
//         'personne_1' => [
//             'prenom'    => 'Julien',
//             'nom'       => 'Dupon',
//             'telephone' => '0601020304'
//         ],
//         'personne_2' => [
//             'prenom'    => 'Nicolas',
//             'nom'       => 'Duran',
//             'telephone' => '0601020304'
//         ],
//         'personne_3' => [
//             'prenom'    => 'Pierre',
//             'nom'       => 'Dulac'
//         ]
//     ];


    //echo "affichage du prénom: " . $tab_multi['personne_2']['prenom'];


    // $tab_multi = array(
    //     0 => array(
    //         'prenom' => 'Julien',
    //         'nom'    => 'Dupon',
    //         'telephone' => '0601020304'
    //     ),
    //     1 => array(
    //         'prenom' => 'Nicolas',
    //         'nom'    => 'Duran',
    //         'telephone' => '0601020304'
    //     ),
    //     2 => array(
    //         'prenom' => 'Pierre',
    //         'nom'    => 'Dulac'
    //     )
    // ); 

    echo '<pre>
            <p>// création d\'un array multidimensionnel :</p>
            <p>$tab_multi = array(</p>
            <p>    0 => array(</p>
            <p>        \'prenom\' => \'Julien\',</p>
            <p>        \'nom\'    => \'Dupon\',</p>
            <p>        \'telephone\' => \'0601020304\'</p>
            <p>    ),</p>
            <p>    1 => array(</p>
            <p>        \'prenom\' => \'Nicolas\',</p>
            <p>        \'nom\'    => \'Duran\',</p>
            <p>        \'telephone\' => \'0601020304\'</p>
            <p>    ),</p>
            <p>    2 => array(</p>
            <p>        \'prenom\' => \'Pierre\',</p>
            <p>        \'nom\'    => \'Dulac\'</p>
            <p>    )</p>
            <p>); // il est possible de choisir le nom des indices dans cet array multidimensionnel</p>
        </pre>';

    echo '<p>debug($tab_multi);// Affiche le tableau</p>';
    debug($tab_multi);

    // Accéder à la valeur "Julien" dans cet array :
    echo '<p>Accéder à la valeur "Julien" dans cet array :</p>';
    echo '<pre><p>echo $tab_multi[0][\'prenom\'];</p></pre>';
    echo $tab_multi[0]['prenom'];  // affiche Julien. Nous entrons d'abord à l'indice [0] de $tab_multi, pour ensuite aller à l'indice ['prenom'] dans le sous-tableau
    echo '<hr>';

    // Parcourir le tableau multidimensionnel avec une boucle for :
    echo '<p>Parcourir le tableau multidimensionnel avec une boucle for :</p>';

    echo '<pre>';
        echo '<p>...</p>';
    echo '</pre>';

    // Possible car les indices sont numériques.
    for ($i = 0; $i < count($tab_multi); $i++) {
        echo $tab_multi[$i]['prenom'] . '<br>';
    }
    echo '<hr>';

   

    ?>

</body>
</html>