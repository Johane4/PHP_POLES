<?php
require_once __DIR__ . '/../models/Contact.php';

class ContactController {
    private $contact;

    public function __construct() {
        $this->contact = new Contact();
    }

    public function index() {
        $contacts = $this->contact->getAllContacts();
        require __DIR__ . '/../views/contacts.php';
    }

    public function add() {
        global $baseURL;
         
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name']) && isset($_POST['email'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $this->contact->addContact($name, $email, $phone);
        }
         header("Location: " . $baseURL . "/index.php?action=index");
        exit;
    }
}
?>
