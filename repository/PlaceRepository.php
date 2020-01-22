<?php

require_once "repository/Repository.php";
require_once "models/Place.php";

class PlaceRepository extends Repository
{

    public function getCityAll(): ?array
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM kelner.miasta');//widok
        $stmt->execute();

        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($res == false) {
            return null;
        }
        return $res;
    }

    public function getPlaceInCity(int $IdAdres)
    {
        $sql="SELECT l.IdLokal, l.NazwaLokalu, a.Miasto, a.Ulica, a.NumerBloku, a.NumerMieszkania
        FROM kelner.Lokal l LEFT JOIN kelner.Adres a on a.IdAdres=l.IdAdres";
        $stmt = $this->database->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPlaceForId(int $id): ?Place
    {
        $sql="SELECT * FROM kelner.Lokal WHERE IdLokal='$id'";
        return $this->universalReturnPlaceObj($sql);
    }

    private function universalReturnPlaceObj($sql): ?Place
    {
        $stmt = $this->database->connect()->prepare($sql);
        $stmt->execute();
        $places = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($places == false) {
            return null;
        }
        $ad = new AddressRepository();
        $adresik = $ad->getAddressForId($places['IdAdres']);
        return new Place(
            $places['IdLokal'],
            $places['NazwaLokalu'],
            $adresik
        );
    }


    public function addPlaces(string $namePlace,
                              int $idAddress)
    {
        $pdo=$this->database->connect();
        $pdo->beginTransaction();
        try{
            $stmt = $pdo->prepare("SELECT * FROM kelner.lokal WHERE lokal.NazwaLokalu='$namePlace' AND lokal.IdADres='$idAddress'");
            $res=$stmt->execute();

            if(!empty($res)){
                throw new Exception("jest juz identyczna placowka!");
            }


            $stmt = $pdo->prepare("INSERT INTO kelner.Lokal VALUES (NULL,'$namePlace','$idAddress');");
            $stmt->execute();

            $pdo->commit();
        }catch (Exception $e){

            $pdo->rollBack();
        }

        return true;
    }
}