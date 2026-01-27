<?php

namespace Models\Entity;

class Employes extends BaseEntity
{
    private $prenom;
    private $nom;
    private $sexe;
    private $service;
    private $date_embauche;
    private $salaire;

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    public function getSexe()
    {
        return $this->sexe;
    }

    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
        return $this;
    }

    public function getService()
    {
        return $this->service;
    }

    public function setService($service)
    {
        $this->service = $service;
        return $this;
    }

    public function getDateEmbauche()
    {
        return $this->date_embauche;
    }

    public function setDateEmbauche($date)
    {
        $this->date_embauche = $date;
        return $this;
    }

    public function getSalaire()
    {
        return $this->salaire;
    }

    public function setSalaire($salaire)
    {
        $this->salaire = $salaire;
        return $this;
    }
}

?>