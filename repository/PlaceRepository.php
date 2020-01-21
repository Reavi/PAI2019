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
        $stmt = $this->database->connect()->prepare("SELECT
                Lokal.IdLokal,
                Lokal.NazwaLokalu,
                Adres.Miasto,
                Adres.Ulica,
                Adres.NumerBloku,
                Adres.NumerMieszkania
            FROM kelner.Adres, kelner.Lokal
            WHERE Adres.IdAdres='$IdAdres' AND Adres.IdAdres=Lokal.IdAdres;");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPlace(string $email): ?Place
    {
        $stmt = $this->database->connect()->prepare("SELECT *
                FROM kelner.Lokal
                WHERE email='$email'");
        $stmt->execute();
        $places = $stmt->fetch(PDO::FETCH_ASSOC);
        return $this->universalReturn($places);
    }

    public function getPlaceForId(int $id): ?Place
    {
        $stmt = $this->database->connect()->prepare("SELECT *
                FROM kelner.Lokal
                WHERE IdLokal='$id'");
        $stmt->execute();
        $places = $stmt->fetch(PDO::FETCH_ASSOC);
        return $this->universalReturn($places);
    }

    private function universalReturn($places)
    {
        if ($places == false) {
            return null;
        }
        $ad = new AddressRepository();
        $adresik = $ad->getAddressForId($places['IdAdres']);
        $ur = new UserRepository();
        $owner = $ur->getUserForId($places['IdWlasciciela']);
        return new Place(
            $places['IdLokal'],
            $places['NazwaLokalu'],
            $adresik,
            $places['Email'],
            $places['Haslo'],
            $owner
        );
    }


    public function addPlaces(string $namePlace,
                              string $email,
                              string $password,
                              int $idown,
                              int $idAddress)
    {
        if ($this->getPlace($email) != null) {
            return false;
        }
        $stmt = $this->database->connect()->prepare("INSERT INTO kelner.Lokal 
                VALUES (NULL,'$namePlace','$idAddress', '$email', '$password','$idown');");
        $stmt->execute();
        return true;
    }
}