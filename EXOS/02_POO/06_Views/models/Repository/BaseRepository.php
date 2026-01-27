<?php
namespace Models\Repository;

use Config\Database;
use PDO;

abstract class BaseRepository
{
    protected $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function findAll($tableName)
    {
        $sql = "SELECT * FROM $tableName";
        $query = $this->db->query($sql);

        if ($query) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        return null;
    }

    public function findById($tableName, $id)
    {
        $sql = "SELECT * FROM $tableName WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindParam(':id', $id);

        if ($query->execute()) {
            return $query->fetch(PDO::FETCH_OBJ);
        }
        return null;
    }
}
