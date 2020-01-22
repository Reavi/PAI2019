<?php

require_once "repository/Repository.php";
require_once "models/PositionMenu.php";

class PositionMenuRepository extends Repository
{


    public function getAllPosition(int $idMenu): array
    {
        $stmt = $this->database->connect()->prepare("SELECT * FROM kelner.PozycjaWMenu WHERE IdMenu='$idMenu'");
        $stmt->execute();
        $positions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $positions;

    }

    public function addPosition(string $name,
                                string $price,
                                string $description,
                                int $idMenu)
    {

        $stmt = $this->database->connect()->prepare("INSERT INTO kelner.PozycjaWMenu VALUES(NULL,'$name','$price', '$idMenu','$description')");
        $stmt->execute();

    }

    public function deletePosition(int $id)
    {
        $con=$this->database->connect();
        $stmt=$con->prepare("DELETE FROM kelner.PozycjaWMenu WHERE IdPozycja=$id");
        $stmt->execute();
        return $stmt;
    }
}