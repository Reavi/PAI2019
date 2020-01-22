<?php

require_once "repository/Repository.php";

class ErrorRepository extends Repository {


    public function addError(string $email, string $text)
    {

        if(isset($_SESSION['id']) && isset($_SESSION['idPlace'])){
            $ur=new UserRepository();
            $user=$ur->getUser($email);
            if($user==null){
                $pr=new PlaceRepository();
                $user=$pr->getPlace($email);
            }
            $id=$user->getId();
        }elseif(isset($_SESSION['id'])){
            $ur=new UserRepository();
            $user=$ur->getUser($email);
            $id=$user->getId();
        }else{
            $pr=new PlaceRepository();
            $user=$pr->getPlace($email);
            $id=$user->getId();
        }
        $stmt = $this->database->connect()->prepare("INSERT INTO kelner.Zgloszenia 
                VALUES (NULL,'$text','$id',false,NULL);");
        $stmt->execute();
    }

}