<?php

require_once "repository/Repository.php";
require_once "models/Address.php";

class AddressRepository extends Repository
{
    public function getAddress(string $miasto,
                               string $ulica,
                               string $kodpocztowy,
                               int $blok,
                               int $mieszkanie)
    {
        $stmt = $this->database->connect()->prepare(" SELECT 
                * 
                FROM kelner.Adres
                WHERE Miasto='$miasto' AND 
                Ulica='$ulica' AND 
                KodPocztowy='$kodpocztowy' AND 
                NumerBloku='$blok' AND 
                NumerMieszkania=$mieszkanie;
                ");
        $stmt->execute();
        $address = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($address == false) {
            return null;
        }
        return new Address(
            $address['IdAdres'],
            $address['Miasto'],
            $address['Ulica'],
            $address['KodPocztowy'],
            $address['NumerBloku'],
            $address['NumerMieszkania']
        );

    }

    public function getAddressForId(int $id)
    {
        $stmt = $this->database->connect()->prepare(" SELECT 
                * 
                FROM kelner.Adres
                WHERE IdAdres='$id'");
        $stmt->execute();
        $address=$stmt->fetch(PDO::FETCH_ASSOC);
        return new Address(
            $address['IdAdres'],
            $address['Miasto'],
            $address['Ulica'],
            $address['KodPocztowy'],
            $address['NumerBloku'],
            $address['NumerMieszkania']
        );
    }

    public function addAddress(string $miasto,
                               string $ulica,
                               string $kodpocztowy,
                               int $blok,
                               int $mieszkanie)
    {
        if ($this->getAddress($miasto, $ulica, $kodpocztowy, $blok, $mieszkanie) != null) {
            return false;
        }
        $stmt = $this->database->connect()->prepare("INSERT INTO kelner.Adres 
            VALUES (NULL,'$miasto','$ulica', '$kodpocztowy', '$blok','$mieszkanie');
            ");
        $stmt->execute();
        return true;
    }
}