<?php
session_start();

// Inclure la connexion à la base de données
require_once 'database/database.php';

//---------------------------
// Validation de formulaire
//---------------------------
// Créer un formulaire qui permet d'enregistrer un nouvel employé dans le BDD societe.

$message = '';  // variable pour afficher les messages d'erreur


// 3- Traitement de $_POST :
if (!empty($_POST)) {

    // Contrôles du formulaire :
    if (!isset($_POST['prenom']) || strlen($_POST['prenom']) < 3 || strlen($_POST['prenom']) > 20) {
        $message .= '<p class="error">Erreur: Le prénom doit comporter entre 3 et 20 caractères.</p>';
    }

    if (!isset($_POST['nom']) || strlen($_POST['nom']) < 3 || strlen($_POST['nom']) > 20) {
        $message .= '<p class="error">Erreur: Le nom doit comporter entre 3 et 20 caractères.</p>';
    }

    if (!isset($_POST['service']) || strlen($_POST['service']) < 3 || strlen($_POST['service']) > 30) {
        $message .= '<p class="error">Erreur: Le service doit comporter entre 3 et 30 caractères.</p>';
    }

    if (!isset($_POST['sexe']) || ($_POST['sexe'] != 'm' && $_POST['sexe'] != 'f')) {
        $message .= '<p class="error">Erreur: Le sexe n\'est pas valide.</p>';
    }

    if (!isset($_POST['date_embauche']) || !strtotime($_POST['date_embauche'])) {
        $message .= '<p class="error">Erreur: La date n\'est pas valide.</p>';
    }

    if (!isset($_POST['salaire']) || !is_numeric($_POST['salaire']) || $_POST['salaire'] <= 0) {
        $message .= '<p class="error">Erreur: Le salaire doit être un nombre positif.</p>';
    }
    
// 4 . Vérifications avec preg_match()

    // la fonction preg_match() va nous servir à vérifier un certain nombre d'élements grâce aux expressions régulières
    /**
     * Une expression régulière est une chaîne de caractères type, un motif (pattern), qui décrit un ensemble de chaînes de caractères possibles.   
     * C’est un modèle interprété par un moteur, lequel va essayer de trouver des correspondances du modèle dans le texte recherché.
     */
    // on va utiliser une série de symboles pour l'utiliser 
    // Exemple pour vérifier la date d'embauche dans le traitement du formulaire

    if (preg_match('/^\d{2}-\d{2}-\d{4}$/', $_POST['date_embauche'] == 0)) {
        $message .= '<p class="error">Erreur: La date fournie n\'est pas correcte.</p>';
    }


    // qu'est ce que c'est que ce charabia ? 

    // preg_math() la fonction preg_match recherche une correspondance entre la chaine de caractères reçue et l'expression entre ses ()
    // /^ début de la vérification, il va vérifier à partir du premier caractère de la chaîne
    // d{2}- il attend exactement 2 chiffres en premiers elements de la chaîne de caractères suivis de '-'
    // \d{2}- même chose qu'au dessus
    // \d{4} Cette fois ci il attend 4 chiffres
    // $/ il termine sa vérification ici, la chaîne ne doit pas contenir d'autres caractères après d{4}

    // En clair, l'expression attend un format de date ('01-05-2009') 2 chiffres - 2 chiffres - 4 chiffres
    // Attention !! preg_match ne vérifie que le format de la chaîne de caractères, il ne vérifiera pas si c'est bien une date qui y est entrée ( ou ce qu'on attend d'autre )

    //-----
    // Si la variable $message est vide, c'est que le formulaire est valide : on peut enregistrer en BDD :
    if (empty($message)) {

        $date = new DateTime($_POST['date_embauche']);
        $date_embauche = $date->format('Y-m-d');


        // Try,catch : 
        // try contient le code à tester qui pourrait potentiellement causer une Exception (une erreur), si c'est le cas, il transfert l'erreur au bloc catch qui se chargera de l'afficher 

        try {

            $request = $pdo->prepare("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES (:prenom, :nom, :sexe, :service, :date_embauche, :salaire)");

            $request->bindParam(':prenom', $_POST['prenom']);
            $request->bindParam(':nom', $_POST['nom']);
            $request->bindParam(':sexe', $_POST['sexe']);
            $request->bindParam(':service', $_POST['service']);
            $request->bindParam(':date_embauche', $date_embauche);
            $request->bindParam(':salaire', $_POST['salaire']);

            $result = $request->execute();
            var_dump($result);

            if ($result) {
                $message .= '<p class="success">L\'employé(e) a bien été ajouté(e).</p>';
            } else {
                $message .= '<p class="error">Erreur: Problème lors de l\'enregistrement de l\'employé(e).</p>';
            }
            // ATTENTION : lors du déploiement de l'application, on ne laisse JAMAIS apparaître les erreurs sur le client, on va préferer enregistrer l'erreur dans un fichier de logs par exemple avec error_log(), puis retourner une page 500 à l'utilisateur en le redirigeant dessus


            // error_log($e->getMessage(), 3, 'chemin/vers/l\'erreur');
            // header('Location: page_500.php');
            // exit;

        } catch (PDOException $e) {
            echo '<p class="error">Erreur : Erreur serveur lors de l\'insertion' . $e->getMessage() . '</p>';
            die; // Arrête le script si la connexion échoue
        }
    }

    // On stocke le message dans la session
    $_SESSION['message'] = $message;

    // Redirection vers le formulaire

    header('Location: formulaire.php');
    exit; // On sort du script après la redirection


    /*    Ajouter photo profil (BONUS)
 * 
 *  Objectif : Ajouter une photo de profil à l'utilisateur (il faudra créer un nouveau formulaire 'modif user' et une requête UPDATE pour la BDD et non INSERT INTO), l'image doit être nullable
 *
 *  Attention : Ajouter enctype="multipart/form-data" au formulaire pour que ça fonctionne
 *  
 *  Faites des recherches sur $_FILES et la fonction move_uploaded_file()
 *  
 *  1 . Ajouter un champ pour ajouter des fichiers dans le formulaire
 *       Il faudra récupérer tous les employés dans un select pour ajouter la photo au  salarié selectionné
 * 
 *  2 . Traiter le champ dans PHP (ajouter une limite de taille de 20mb)
 * 
 *  3 . La photo uploadée doit être enregistrée dans un dossier img,photo comme vous voudrez
 * 
 *  4 . Une fois la vérification faite, l'enregistrée dans la BDD sur l'utilisateur souhaité, ne pas oublier de selectionner un utilisateur (par son id)
 */

    /*
    if (isset($_FILES['photo']) && isset($_POST['submit_photo']) && isset($_POST['employe_id'])) {
        $employeId = $_POST['employe_id']; // L'ID de l'employé sélectionné

        if ($_FILES['photo']['size'] > 2000000) {
            $_SESSION['message'] = 'Votre image est trop grande';
        } else {
            try {
                // Mettre à jour l'enregistrement de l'employé avec la photo
                $updateDatas = "UPDATE employes SET photo_profil = :photo WHERE id = :id";
                $request = $pdo->prepare($updateDatas);
                $request->bindParam(':photo', $_FILES['photo']['name']);
                $request->bindParam(':id', $employeId); // Utiliser l'ID de l'employé sélectionné

                $resultat = $request->execute();

                if ($resultat) {
                    move_uploaded_file($_FILES['photo']['tmp_name'], './img/' . $_FILES['photo']['name']);
                    $_SESSION['message'] = 'La photo a bien été ajoutée';
                } else {
                    $_SESSION['message'] = 'Il y a eu un problème lors de l\'update de l\'utilisateur';
                }
            } catch (PDOException $e) {
                $errors[] = 'Erreur de connexion à la base de données: ' . $e->getMessage();
            }
        }

        // Stocker les erreurs dans la session
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        }
        header('Location: formulaire.php');
        exit;
    } 
*/
}
