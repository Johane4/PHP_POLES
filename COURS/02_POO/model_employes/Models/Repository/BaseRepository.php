<?php 
namespace Models\Repository;

use Models\Database;

abstract class BaseRepository /* extends Database */
// si Database est abstract alors on fait un héritagde la classe
{
    protected $pdo;

    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->getConnection();
        /* Plus besoin d'instancier Database avec l'héritage
            donc uniquement cette ligne $this->pdo->getConnection();
        */
    }

    public function findAll($table)
    {
        $sql = "SELECT * FROM $table";
        $query = $this->pdo->query($sql);
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}

?>