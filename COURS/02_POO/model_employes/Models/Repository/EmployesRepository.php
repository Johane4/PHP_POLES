<?php

namespace Models\Repository;

use Models\Entity\Employes;

class EmployesRepository extends BaseRepository
{
    public function insertEmploye(Employes $employe)
    {
        $sql = "INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) 
                VALUES (:prenom, :nom, :sexe, :service, :date, :salaire)";
        $result = $this->pdo->prepare($sql);

        $result->bindValue(':prenom', $employe->getPrenom());
        $result->bindValue(':nom', $employe->getNom());
        $result->bindValue(':sexe', $employe->getSexe());
        $result->bindValue(':service', $employe->getService());
        $result->bindValue(':date', $employe->getDateEmbauche());
        $result->bindValue(':salaire', $employe->getSalaire());

        try {
            return $result->execute();
        } catch (\PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function getAllEmployes() {
        return $this->findAll('employes');
    }

}

?>