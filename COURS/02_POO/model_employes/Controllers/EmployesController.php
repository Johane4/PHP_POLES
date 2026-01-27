<?php
namespace Controllers;

use Models\Entity\Employes;
use Models\Repository\EmployesRepository;

class EmployesController
{
    public function addEmploye()
    {
        $employe = new Employes();
        $employe->setPrenom("Alice")
                ->setNom("Durand")
                ->setSexe("F")
                ->setService("Comptabilité")
                ->setDateEmbauche("2024-11-01")
                ->setSalaire(2500);

        $repository = new EmployesRepository();
        if ($repository->insertEmploye($employe)) {
            echo "L'employé a été ajouté avec succès.";
        } else {
            echo "Erreur lors de l'insertion.";
        }
    }

    public function showEmployes() {
        $employesRepo = new EmployesRepository();

        $employes = $employesRepo->getAllEmployes();

        foreach($employes as $employe) {
            echo $employe['prenom'] . " " . $employe['nom']  . " " . $employe['service'] . "<br>";
        }

        // var_dump($employes);
    }

    public function test() {
        //instancier les classes

    // getAllcontact avec echo

    // lancer les functions via index.php n'utilisez pas encore les vues !
    }
}


?>