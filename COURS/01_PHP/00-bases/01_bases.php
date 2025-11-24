<?php

include 'includes/header.php';

echo '<p>Ouverture de passage PHP pour y insérer du code !</p>', "Avec echo";


?>

<div class="texte">
    <p>echo est une instruction qui peut prend plusieurs paramètres et qui permet d'afficher des éléments
        sur le navigateur
    </p>
</div>

<?php
print '<p>Ouverture de passage PHP pour y insérer du code avec print!</p>';
?>

<div class="texte">
    <p>print est une instruction (qui diffère peu du echo) qui peut prendre un seul paramètre et qui permet d'afficher des éléments
        sur le navigateur. Il renvoie toujours 1 donc vrai.
    </p>
</div>


<?php
echo '<p>Aujourd\'hui nous voyons comment échapper un mot avec apostrophe !</p>';
?>

<div class="texte">
    <h2>D'autres moyens d'affichages</h2>
    <ul>
        <li>print_r: affiche les informations d'une variable, de sorte à ce qu'elle soit lisible. Un peu moins utilisée</li>
        <li>var_dump: affiche les informations d'une variable, y compris son type et sa valeur</li>
    </ul>
</div>

<?php

/* 
            Pour faire un commentaire sur plusieurs lignes
        */

// Commentaire sur une seule ligne

# Commentaire sur une seule ligne
?>

</body>

</html>