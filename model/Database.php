<?php

class Database{
    private $host;
    private $user;
    private $password;
    private $database;

    public function __construct($host,$user,$database,$password)
    {
        $this->host=$host;
        $this->user=$user;
        $this->password=$password;
        $this->database=$database;

    }
    public function connect() {
        $conn = new mysqli($this->host,$this->user,$this->password,$this->database);
        return $conn;
    }
}

?>