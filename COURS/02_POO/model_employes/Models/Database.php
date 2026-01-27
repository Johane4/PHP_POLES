<?php

namespace Models;

// On peut très bien avoir une classe abstraite ici
/*abstract */class Database
{
    private $host = "localhost";
    private $db_name = "societe";
    private $username = "root";
    private $password = "root";
    public $pdo = null;

    public function getConnection()
    {
        try {
            $this->pdo = new \PDO(
                "mysql:host=$this->host;dbname=$this->db_name;charset=utf8",
                $this->username,
                $this->password,
                [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]
            );
        } catch (\PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }
        return $this->pdo;
    }
}

?>