<?php

require_once "repository/Repository.php";
require_once 'models/User.php';

class UserRepository extends Repository
{

    public function getUser(string $email): ?User
    {
        $sql = "SELECT * FROM kelner.Uzytkownik u where u.email='$email';";
        return $this->universalReturnModelUser($sql);
    }

    public function getUserForId(string $id): ?User
    {
        $sql = "SELECT * FROM kelner.Uzytkownik u where u.IdUser='$id';";
        return $this->universalReturnModelUser($sql);
    }

    private function universalReturnModelUser(string $query): ?User
    {
        $stmt = $this->database->connect()->prepare($query);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user == false) {
            return null;
        }
        return new User(
            $user['email'],
            $user['haslo'],
            $user['imie'],
            $user['nazwisko'],
            $this->getUserPermission($user['IdUser']),
            $user['IdUser']
        );
    }

    public function getUsers(): array
    {
        $stmt = $this->database->connect()->prepare("SELECT * FROM kelner.Uzytkownik");
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result = [];
        foreach ($users as $user) {
            array_push($result, [
                'IdUser' => $user['IdUser'],
                'imie' => $user['imie'],
                'nazwisko' => $user['nazwisko'],
                'email' => $user['email'],
                'haslo' => $user['haslo'],
                'role' => $this->getUserPermission($user['IdUser'])
            ]);
        }
        return $result;
    }

    public function checkKey(string $key): ?array
    {
        $stmt = $this->database->connect()->prepare("SELECT * FROM kelner.usersTmp WHERE usersTmp.key='$key'");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addNewUser(string $name, string $surname, string $email, string $password, $idUserTmp)
    {
        $pdo = $this->database->connect();
        $pdo->beginTransaction();
        try {
            $sql = "INSERT INTO kelner.Uzytkownik VALUES (NULL,'$name','$surname', '$email', '$password');";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $sql2 = "SELECT * FROM kelner.Uzytkownik u WHERE u.email='$email'";
            $stmt = $pdo->prepare($sql2);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            $idUser = $res['IdUser'];

            /*
             * Zrobiony Trigger z tego
             */
            /*
            $sql3 = "INSERT INTO kelner.UprawnieniaUzytkownik VALUES(NULL,2,'$idUser')";
            $stmt = $pdo->prepare($sql3);
            $stmt->execute();
            */
            $sql4 = "DELETE FROM kelner.usersTmp WHERE usersTmp.id='$idUserTmp'";
            $res = $pdo->prepare($sql4);
            $res->execute();

            $pdo->commit();
        } catch (Exception $e) {
            echo $e->getMessage();
            $pdo->rollBack();
        }
    }

    public function getUserPermission(int $id)
    {
        $con = $this->database->connect();
        $stmt = $con->prepare("SELECT up.role
            FROM kelner.UprawnieniaUzytkownik upu
            left join kelner.Uprawnienia up on upu.IdUprawnienia=up.IdUprawnienia
            join kelner.Uzytkownik u on u.IdUser=upu.IdUzytkownik where u.IdUser='$id';");
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result = [];
        foreach ($res as $s) {
            array_push($result, $s['role']);
        }

        return $result;
    }

    public function getUserLocal(int $idUser)
    {
        $con = $this->database->connect();
        $stmt = $con->prepare("SELECT * FROM kelner.UzytkownikLokal WHERE IdUzytkownik='$idUser'");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result == false) {
            return null;
        }
        return $result;
    }

    public function getUserLocalWithName(int $idUser)
    {
        $con = $this->database->connect();
        $stmt = $con->prepare(" SELECT UL.IdLokal,
                                               l.NazwaLokalu
                                        FROM Lokal l
                                        LEFT JOIN UzytkownikLokal UL on l.IdLokal = UL.IdLokal
                                        WHERE UL.IdUzytkownik='$idUser'");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result == false) {
            return null;
        }
        return $result;
    }
}