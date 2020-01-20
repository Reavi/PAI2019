<?php

require_once "repository/Repository.php";
require_once "models/Place.php";

class PlaceRepository extends Repository {

    public function getPlaces(string $email): Place
    {
        $stmt = $this->database->connect()->prepare("SELECT *
                FROM kelner.Lokal
                WHERE email='$email'");
        $stmt->execute();
        $places=$stmt->fetch(PDO::FETCH_ASSOC);
        $ad = new AddressRepository();
        $adresik=$ad->getAddressForId($places['IdAdres']);
        $ur = new UserRepository();
        $owner=$ur->getUserForId($places['IdWlasciciela']);
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
                              int $idAddress) {
        $stmt = $this->database->connect()->prepare("INSERT INTO kelner.Lokal 
                VALUES (NULL,'$namePlace','$idAddress', '$email', '$password','$idown');");
        $stmt->execute();
        return true;
    }
}