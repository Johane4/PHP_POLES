<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Détail du produit</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="logo">
        <img src="./img/logo_poleS.png" alt="Logo poleS">
    </div>
    <?php
    //--------------------------
    // La superglobale $_GET
    //--------------------------
    // $_GET représente l'url. Il s'agit d'une superglobale, et comme toutes les superglobales, il s'agit d'un array. Superglobale signifie que ce tableau est disponible dans tous les contextes du script, y compris dans l'espace local des fonctions. 

    // Dans notre exemple, les informations transitent dans l'url de la manière suivante :     ?article=jean&couleur=bleu&prix=30
    // La syntaxe de l'url est donc :   page.php?indice1=valeur1&indiceN=valeurN
    // La superglobale $_GET transforme les informations passées dans l'url en cet array : $_GET = array('incide1' => 'valeur1', 'indiceN' => 'valeurN');  



    ?>
</body>

</html>