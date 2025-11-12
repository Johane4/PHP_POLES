<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Choix de Langue</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="header-img">
        <img src="./img/logo_poleS.png" alt="Logo poleS">
    </div>

    <?php

    //-------------------------
    // La superglobale $_COOKIE
    //-------------------------
    /*
    Un cookie est un petit fichier (4 Ko max) déposé par le serveur du site sur le poste de l'internaute, et qui peut contenir des informations. Les cookies sont automatiquement renvoyés au serveur web par le navigateur lorsque l'internaute navigue dans les pages concernées par les cookies. PHP permet de récupérer très facilement les données contenues dans un cookie : elles sont stockées dans la superglobale $_COOKIE.
    
    Précaution à prendre avec les cookies :
    Le cookie étant sauvegardé sur le poste de l'internaute, il peut être volé ou détourné. On n'y mettra donc pas d'informations sensibles (mots de passe, carte bancaire, ...), mais des informations relatives aux préférences ou aux traces de visite (produits consultés...).
    */



    // 1- Création du cookie :
    /*
        La méthode setcookie() permet de créer, modifier ou supprimer un cookie.

        Syntaxe : setcookie(nom, valeur, expiration, chemin, domaine, sécurité, httponly)

        - nom : Le nom du cookie.
        - valeur : La valeur du cookie.
        - expiration : La durée de vie du cookie en timestamp. Pour supprimer un cookie, 
        on donne une date passée.
        - chemin, domaine, sécurité, httponly : Options supplémentaires pour la portée 
        du cookie (facultatives).
    */





    // 2- On détermine la langue à afficher dans la variable $langue :



    // 3- Affichage de la langue :



    // 4. Suppression du cookie
    // Supprime le cookie en fixant une date d'expiration passée
    // Il n'existe pas de fonction prédéfinie pour supprimer un cookie. Dans ce cas, on le met à jour avec une date périmée ou à zéro, ou encore en ne mettant que le nom du cookie dans les () de setcookie.




    ?>

    <div class="language-selection">
        <h1>Votre langue : </h1>
        <ul>
            <li><a href="?langue=fr">Français</a></li>
            <li><a href="?langue=es">Espagnol</a></li>
            <li><a href="?langue=it">Italien</a></li>
            <li><a href="?langue=en">Anglais</a></li>
        </ul>

        <!-- Lien pour supprimer le cookie (méthode commentée) -->

        <!-- <a href="?delete_cookie=true">Supprimer le cookie</a> -->


        <!-- Formulaire pour supprimer le cookie -->
        <form action="" method="GET">
            <input type="hidden" name="delete_cookie" value="true"> <!-- champs caché -->
            <button type="submit">Supprimer le cookie</button>
        </form>
    </div>
</body>

</html>