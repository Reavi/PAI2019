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
        $sql = "SELECT l.IdLokal, l.NazwaLokalu, a.Miasto, a.Ulica, a.NumerBloku, a.NumerMieszkania
        FROM kelner.Lokal l LEFT JOIN kelner.Adres a on a.IdAdres=l.IdAdres";
        $stmt = $this->database->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPlaceForId(int $id): ?Place
    {
        $sql = "SELECT * FROM kelner.Lokal WHERE IdLokal='$id'";
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
        $pdo = $this->database->connect();
        $pdo->beginTransaction();
        try {
            $stmt = $pdo->prepare("SELECT * FROM kelner.lokal WHERE lokal.NazwaLokalu='$namePlace' AND lokal.IdADres='$idAddress'");
            $res = $stmt->execute();

            if (!empty($res)) {
                throw new Exception("jest juz identyczna placowka!");
            }


            $stmt = $pdo->prepare("INSERT INTO kelner.Lokal VALUES (NULL,'$namePlace','$idAddress');");
            $stmt->execute();

            $pdo->commit();
        } catch (Exception $e) {

            $pdo->rollBack();
        }

        return true;
    }

    public function getTable(int $id): ?array
    {
        $con = $this->database->connect();
        $sqlold = "SELECT S.*
                FROM Stolik S
                LEFT JOIN Rezerwacje R on S.IdStolik = R.IdStolik 
                WHERE S.IdLokal='$id' 
                AND R.IdStolik IS NULL;";


        $sql = "SELECT S.*
                FROM Stolik S
                WHERE S.IdLokal = '$id'
                  AND S.IdStolik NOT IN
                      (
                          SELECT R.IdStolik
                          FROM Rezerwacje R
                      );";

        $stmt = $con->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    public function setReservation(int $idTable, int $idUser)
    {
        $con=$this->database->connect();
        $con->beginTransaction();
        try{
            $stmt=$con->prepare("SELECT * FROM Rezerwacje WHERE IdStolik='$idTable'");
            $stmt->execute();
            $res=$stmt->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($res)){
                throw new Exception("Ktoś w między czasie już zarezerwował stolik :(");
            }else{
                $date=date("Y-m-d H:i:s");
                $stmt=$con->prepare("INSERT INTO Rezerwacje VALUES(NULL,'$date','$idUser','$idTable',true) ");
                $stmt->execute();
                $con->commit();
            }

        }catch (Exception $e){
            $con->rollBack();
            return $e->getMessage();
        }

    }
}