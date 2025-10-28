<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les arithmétiques en PHP</title>
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

    </div>

    <?php
    //--------------------
    echo '<h2> Opérateurs arithmétiques </h2>';
    //--------------------
    $a = 10;
    $b = 2;
   echo '<pre>
        <p>$a = 10;<br>$b = 2;</p>
        <p>1. $a + $b;</p>
        <p>2. $a - $b;</p>
        <p>3. $a * $b;</p>
        <p>4. $a / $b;</p>
        <p>5. $a % $b;</p><br> NB: modulo = reste de la division entière. Exemple 3 % 2 = si on a 3 billes réparties entre 2 personnes, il nous en reste 1 dans la main</p>
      </pre><br>';

    echo $a + $b . '<br>';   // affiche 12
    echo $a - $b . '<br>';   // affiche 8
    echo $a * $b . '<br>';   // affiche 20
    echo $a / $b . '<br>';   // affiche 5
    echo $a % $b . '<br>';   // affiche 0. modulo = reste de la division entière. Exemple 3%2 = si on a 3 billes réparties entre 2 personnes, il nous en reste 1 dans la main 

    //------------------
    // Opération et affectation combinées :
    //--------------------
    echo '<h2>Opération et affectation combinées</h2>';
    //--------------------
    $a = 10;
    $b = 2;

    $a += $b;    // équivaut à $a = $a + $b, $a vaut donc au final 12
    $a -= $b;    // équivaut à $a = $a - $b, $a vaut donc au final 10
    $a *= $b;    // équivaut à $a = $a * $b, $a vaut donc au final 20
    $a /= $b;    // équivaut à $a = $a / $b, $a vaut donc au final 10
    $a %= $b;    // équivaut à $a = $a % $b, $a vaut donc au final 0

    echo '<pre>
        <p>$a = 10;<br>$b = 2;</p>
        <p>1. $a += $b;// équivaut à $a = $a + $b</p>
        <p>2. $a -= $b;// équivaut à $a = $a - $b</p>
        <p>3. $a *= $b;// équivaut à $a = $a * $b</p>
        <p>4. $a /= $b;// équivaut à $a = $a / $b</p>
        <p>5. $a %= $b;// équivaut à $a = $a % $b</p>
      </pre><br>';

    // Exemple d'utilisation : pratique pour faire des calculs de quantités dans les paniers d'achat (+= et -=)

    //--------------------
    echo '<h2>Incrémenter et décrémenter</h2>';
    //--------------------
    //------------------
    // Incrémenter et décrémenter :
    $i = 0;
    $i++;    // on ajoute 1 à $i qui vaut au final 1
    $i--;    // on retire 1 à $i qui vaut au final 0

    $i = 0;
    $k = ++$i; // la variable $i est incrémentée de 1, puis elle est retournée : on affecte donc 1 à $k

    echo '<pre>
        <p>$i = 0;</p>
        <p>$i++;// on ajoute 1 à $i qui vaut au final 1</p>
        <p>$i--;// on soustrait 1 à $i qui vaut au final 0</p>
        <p></p>
        <p>$i = 0</p>
        <p>$k = ++$i;// la variable $i est incrémentée de 1, puis elle est retournée : on affecte donc 1 à $k</p>
      </pre><br>';

    echo '$i vaut ' . $i . '<br>'; // 1
    echo '$k vaut ' . $k . '<br>'; // 1


    $i = 0;
    $k = $i++;   // la variable $i est d'abord retournée, puis elle est incrémentée de 1

    echo '<pre>
        <p>$i = 0;</p>
        <p>$k = $i++;// la variable $i est d\'abord retournée, puis elle est incrémentée de 1</p>
      </pre><br>';

    echo '$i vaut ' . $i . '<br>'; // 1
    echo '$k vaut ' . $k . '<br>'; // 1
    ?>

</body>
</html>
