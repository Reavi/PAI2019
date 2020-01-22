<?php

class PositionMenu
{
    private $id;
    private $name;
    private $price;
    private $IdMenu;
    private $description;

    public function __construct(
        int $id,
        string $name,
        string $price,
        int $idMenu,
        string $description

    )
    {
        $this->id = $id;
        $this->IdMenu= $idMenu;
        $this->name = $name;
        $this->description=$description;
        $this->price=$price;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getIdMenu(): int
    {
        return $this->IdMenu;
    }

    public function getPrice(): string
    {
        return $this->price;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
}

?>