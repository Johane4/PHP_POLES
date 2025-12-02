<?php
namespace Controllers;

use Models\Contact;

class ContactController extends BaseController {
    private $contactModel;

    public function __construct() {
        $this->contactModel = new Contact();
    }

    public function index() {
        $contacts = $this->contactModel->getAllContacts();
        // Utiliser render pour afficher la vue avec les données
        $this->render('contacts', ['contacts' => $contacts]);
    }

    public function add() {
        global $baseURL;
        
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name'], $_POST['email'], $_POST['phone'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        // Vérifie si l'ajout est réussi
        if ($this->contactModel->addContact($name, $email, $phone)) {
            // Redirection après succès
            header("Location: " . $baseURL . "/index");
            exit;
        } else {
            echo "Erreur lors de l'ajout du contact.";
        }
    }
        // Affiche le formulaire d'ajout si la requête n'est pas POST
        $this->render('contacts');
    }
}
?>
