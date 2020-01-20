<?php

class Place
{
    private $id;
    private $name ;
    private $address;
    private $email;
    private $password;
    private $owner;

    public function __construct(
        int $id,
        string $name,
        Address $address,
        string $email,
        string $password,
        User $owner
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->email = $email;
        $this->password = $password;
        $this->owner = $owner;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }


    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getOwner(): User
    {
        return $this->owner;
    }

}

?>