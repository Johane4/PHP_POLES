<?php

require_once __DIR__ . "/../config/Database.php";

class Contact
{

    private $pdo;

    public function __construct()
    {
        try {
            $database = new Database();
            $this->pdo = $database->getConnection();
        } catch (PDOException $e) {
            die("Erreur de connexion à la base : " . $e->getMessage());
        }
    }

    // Ajouter un contact
    public function addContact($name, $email, $phone)
    {
        try {
            $query = "INSERT INTO contacts (name, email, phone) 
                      VALUES (:name, :email, :phone)";

            $stmt = $this->pdo->prepare($query);

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);

            return $stmt->execute(); // ✔ return true/false
        } catch (PDOException $e) {
            // Log interne ou affichage dev
            echo "Erreur lors de l'ajout du contact : " . $e->getMessage();
            return false;
        }
    }

    // Récupérer tous les contacts
    public function getAllContacts()
    {
        try {
            $query = "SELECT * FROM contacts";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des contacts : " . $e->getMessage();
            return false;
        }
    }
}
