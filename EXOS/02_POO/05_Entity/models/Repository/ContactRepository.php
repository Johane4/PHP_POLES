<?php
namespace Models\Repository;

use Models\Entity\Contact;

class ContactRepository extends BaseRepository
{
    public function addContact(Contact $contact)
    {
        $sql = "INSERT INTO contacts (name, email, phone) VALUES (:name, :email, :phone)";
        $query = $this->db->prepare($sql);

        $query->bindValue(':name', $contact->getName());
        $query->bindValue(':email', $contact->getEmail());
        $query->bindValue(':phone', $contact->getPhone());

        return $query->execute();
    }

    public function getAllContacts()
    {
        return $this->findAll('contacts');
    }

    public function getContactById($id)
    {
        $data = $this->findById('contacts', $id);

        if ($data) {
            $contact = new Contact();
            $contact->setId($data->id)
                ->setName($data->name)
                ->setEmail($data->email)
                ->setPhone($data->phone);

            return $contact;
        }
        return null;
    }
}
