<?php
namespace Controllers;

// use Models\Contact;
use Models\Entity\Contact;
use Models\Repository\ContactRepository;

class ContactController extends BaseController {
    public function index() { 
        $contact = new ContactRepository();
        $contacts = $contact->getAllContacts();
        // Utiliser render pour afficher la vue avec les données
        $this->render('contacts', ['contacts' => $contacts]);
    }

    public function add() {
        global $baseURL;
         
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name']) && isset($_POST['email'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $contact = new ContactRepository();;
            $contact->addContact($name, $email, $phone);

            // Redirige vers la liste des contacts
            header("Location: " . $baseURL . "/?action=index");
            exit;
        }
        // Affiche le formulaire d'ajout si la requête n'est pas POST
        $this->render('contacts');
    }

    // public function test()
    // {
    //     $contactRepo = new ContactRepository();

    //     // Ajouter un contact
    //     $newContact = new Contact();
    //     $newContact->setName("John Doe")
    //         ->setEmail("john.doe@example.com")
    //         ->setPhone("123456789");

    //     if ($contactRepo->addContact($newContact)) {
    //         echo "Contact ajouté avec succès.<br>";
    //     }

    //     // Récupérer tous les contacts
    //     $contacts = $contactRepo->getAllContacts();
    //     foreach ($contacts as $contact) {
    //         echo $contact['name'] . " - " . $contact['email'] . " - " . $contact['phone'] ."<br>";
    //     }

    //     // Récupérer un contact par ID
    //     $contact = $contactRepo->getContactById(1);
    //     if ($contact) {
    //         echo "Contact trouvé : " . $contact->getName() . "<br>";
    //     }
    // }
}
?>
