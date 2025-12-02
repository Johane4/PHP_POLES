<?php
namespace Controllers;

use Models\Contact;

class ContactController {
    private $contactModel;

    public function __construct() {
        $this->contactModel = new Contact();
    }

    public function index() {
        $contacts = $this->contactModel->getAllContacts();
        require __DIR__ . '/../views/contacts.php';
    }

    public function add() {
        global $baseURL;
         
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name']) && isset($_POST['email'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $this->contactModel->addContact($name, $email, $phone);
        }
         header("Location: " . $baseURL . "/index");
        exit; // Toujours appeler exit() après une redirection
    }
}
?>
