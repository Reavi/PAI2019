<?php

class Menu
{
    private $id;
    private $idPlace;
    private $name;
    private $position;
    public function __construct(
        int $id,
        int $idPlace,
        string $name,
        array $position

    )
    {
        $this->id = $id;
        $this->idPlace= $idPlace;
        $this->name = $name;
        $this->position=$position;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getIdPlace(): int
    {
        return $this->idPlace;
    }

    public function getPositionMenu(): array
    {
        return $this->position;
    }
    public function getName(): string
    {
        return $this->name;
    }
}

?>