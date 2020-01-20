<?php

require_once "repository/Repository.php";
require_once "repository/PositionMenuRepository.php";
require_once "models/Menu.php";

class MenuRepository extends Repository
{


    public function getMenu(int $idLokal): ?Menu
    {

        $stmt = $this->database->connect()->prepare("SELECT * FROM kelner.Menu WHERE IdLokal=$idLokal");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result == false) {
            return null;
        }
        $positionMenuRepo = new PositionMenuRepository();
        return new Menu (
            $result['IdMenu'],
            $result['IdLokal'],
            $result['NazwaMenu'],
            $positionMenuRepo->getAllPosition($result['IdMenu'])
        );
    }
    public function getMenuForId(int $idmenu): ?Menu
    {

        $stmt = $this->database->connect()->prepare("SELECT * FROM kelner.Menu WHERE IdMenu=$idmenu");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result == false) {
            return null;
        }
        $positionMenuRepo = new PositionMenuRepository();
        return new Menu (
            $result['IdMenu'],
            $result['IdLokal'],
            $result['NazwaMenu'],
            $positionMenuRepo->getAllPosition($result['IdMenu'])
        );
    }
    public function addMenu(string $name,int $idPlace)
    {
        $stmt = $this->database->connect()->prepare("
        INSERT INTO kelner.Menu VALUES (NULL,'$idPlace','$name')");
        $stmt->execute();
    }

}