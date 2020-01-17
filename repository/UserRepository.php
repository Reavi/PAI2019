<?php

require_once "repository/Repository.php";
require_once 'models/User.php';

class UserRepository extends Repository {

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
        AND Uzytkownik.IdUser=Uprawnienia.IdUprawnienia");

        //$stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($user == false) {
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

    public function getUsers(): array {
        $result = [];
        $stmt = $this->database->connect()->prepare("SELECT Uzytkownik.IdUser,
                Uzytkownik.imie,
                Uzytkownik.nazwisko,
                Uzytkownik.email,
                Uzytkownik.haslo,
                Uprawnienia.role 
        FROM Uzytkownik,Uprawnienia 
        WHERE Uzytkownik.IdUser=Uprawnienia.IdUprawnienia");
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
}