<?php

require_once "repository/Repository.php";

class CardRepository extends Repository
{


    public function addCard(string $name, string $surname, int $kod, string $data, int $iduser)
    {

        $stmt = $this->database->connect()->prepare("
        INSERT INTO kelner.Karta VALUES (NULL,'$name','$surname','$kod',$data,'$iduser');");
        $stmt->execute();
    }

}