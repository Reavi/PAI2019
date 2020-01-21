<?php

require_once "repository/Repository.php";
require_once 'models/User.php';

class UserRepository extends Repository
{

    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare("
        SELECT Uzytkownik.IdUser,
                Uzytkownik.imie,
                Uzytkownik.nazwisko,
                Uzytkownik.email,
                Uzytkownik.haslo,
                Uprawnienia.role 
        FROM Uzytkownik,Uprawnienia 
        WHERE email = '$email'
        AND Uzytkownik.IdUprawnienia=Uprawnienia.IdUprawnienia");
        //$stmt->bindParam(':email', $email, PDO::PARAM_STR);
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
            $user['role'],
            $user['IdUser']
        );
    }

    public function getUserForId(string $id): ?User
    {
        $stmt = $this->database->connect()->prepare("
        SELECT Uzytkownik.IdUser,
                Uzytkownik.imie,
                Uzytkownik.nazwisko,
                Uzytkownik.email,
                Uzytkownik.haslo,
                Uprawnienia.role 
        FROM Uzytkownik,Uprawnienia 
        WHERE IdUser = '$id'
        AND Uzytkownik.IdUprawnienia=Uprawnienia.IdUprawnienia");
        //$stmt->bindParam(':email', $email, PDO::PARAM_STR);
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
            $user['role'],
            $user['IdUser']
        );
    }

    public function getUsers(): array
    {
        $stmt = $this->database->connect()->prepare("SELECT u.IdUser,
                u.imie,
                u.nazwisko,
                u.email,
                u.haslo,
                up.role 
        FROM Uzytkownik u
        JOIN Uprawniena up ON u.IdUprawnienia=up.IdUprawnienia
        ");
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

}