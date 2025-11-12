 <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    /** -----------------------------------------
     *  Exercice 1 : Validation de formulaire
     * ------------------------------------------
     * 
     *  Objectif : Vérifier si tous les champs du formulaire ont été remplis et afficher un message d'erreur pour chaque champ manquant
     * 
     *  1 . S'assurer que tous les champs sont remplis avant d'afficher les données
     * 
     */

    echo '<h2>Exercice 1 : Validation de formulaire</h2>';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (
            !empty($_POST['name'])
            && !empty($_POST['firstname'])
            && !empty($_POST['email'])
            && !empty($_POST['city'])
            && !empty($_POST['mdp'])
            && !empty($_POST['country'])
        ) {
            echo "<p>Voici les informations fournies : Ville = {$_POST['city']}, Code postal = {$_POST['cp']}, Adresse = {$_POST['adresse']}</p>";
        } else {
            echo "<p style='color:red;'>Tous les champs doivent être remplis.</p>";
        }
    }
    ?>

 <hr>

 <?php
    /** -----------------------------------------
     *  Exercice 2 : Affichage sécurisé
     * ------------------------------------------
     * Utilisation de htmlspecialchars() pour éviter les XSS.
     */
    echo '<h2>Exercice 2 : Affichage sécurisé</h2>';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (
            !empty($_POST['name'])
            && !empty($_POST['firstname'])
            && !empty($_POST['email'])
            && !empty($_POST['city'])
            && !empty($_POST['mdp'])
            && !empty($_POST['country'])
        ) {
            echo "<p>Ville : " . htmlspecialchars($_POST['city']) . ", Code postal : " . htmlspecialchars($_POST['cp']) . ", Adresse : " . htmlspecialchars($_POST['adresse']) . "</p>";
        } else {
            echo "<p style='color:red;'>Tous les champs doivent être remplis.</p>";
        }
    }
    ?>

 <hr>

 <?php
    /** -----------------------------------------
     *  Exercice 3 : Réaffichage des données
     * ------------------------------------------
     * Les champs du formulaire sont déjà pré-remplis au-dessus.
     */
    echo '<h2>Exercice 3 : Réafficher les données précédentes</h2>';
    echo "<p>Les champs saisis sont automatiquement réaffichés grâce aux valeurs dans les inputs.</p>";
    ?>

 <hr>

 <?php
    /** -----------------------------------------
     *  Exercice 4 : Limitation de longueur du mot de passe
     * ------------------------------------------
     * Vérifier que le mot de passe ne dépasse pas 130 caractères.
     */
    echo '<h2>Exercice 4 : Limitation de longueur du mot de passe</h2>';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['mdp'])) {
            if (mb_strlen($_POST['mdp']) > 130) {
                echo "<p style='color:red;'>La longueur de votre mot de passe ne doit pas dépasser 130 caractères !</p>";
            } else {
                echo "<p>Merci, la longueur de votre mot de passe est correcte.</p>";
            }
        } else {
            echo "<p style='color:red;'>Le champ mot de passe est vide.</p>";
        }
    }
    ?>

 <hr>

 <?php
    /** -----------------------------------------
     *  Exercice 5 : Conversion de données
     * ------------------------------------------
     * Convertir la ville en majuscules et afficher un message.
     */
    echo '<h2>Exercice 5 : Conversion de données</h2>';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['city'])) {
            $ville = strtoupper($_POST['city']);
            echo "<p>Votre ville : <strong>$ville</strong> est bien enregistrée. Merci pour votre soumission !</p>";
        } else {
            echo "<p style='color:red;'>La ville n'a pas été renseignée.</p>";
        }
    }
    ?>