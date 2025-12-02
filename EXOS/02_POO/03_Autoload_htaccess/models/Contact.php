<?php
// require_once __DIR__ . '/../config/Database.php';
namespace Models;

use Config\Database;
use PDO;

class Contact {
    private $pdo;

    public function __construct() {
        $database = new Database();
        $this->pdo = $database->getConnection();
    }

    public function getAllContacts() {
        $query = "SELECT * FROM contacts ORDER BY created_at DESC";
        $result = $this->pdo->prepare($query);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addContact($name, $email, $phone) {
        $query = "INSERT INTO contacts (name, email, phone) VALUES (:name, :email, :phone)";
        $result = $this->pdo->prepare($query);
        $result->bindParam(":name", $name);
        $result->bindParam(":email", $email);
        $result->bindParam(":phone", $phone);
        return $result->execute();
    }
}
?>
