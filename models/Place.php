<?php

class Place
{
    private $id;
    private $name ;
    private $address;

    public function __construct(
        int $id,
        string $name,
        Address $address
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
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

}

?>