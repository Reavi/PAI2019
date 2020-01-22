<?php

class Address
{
    private $id;
    private $miasto;
    private $ulica;
    private $kodpocztowy;
    private $blok;
    private $mieszkanie;

    public function __construct(
        int $id,
        string $miasto,
        string $ulica,
        string $kodpocztowy,
        int $blok,
        int $mieszkanie
    )
    {
        $this->id = $id;
        $this->miasto = $miasto;
        $this->ulica = $ulica;
        $this->kodpocztowy = $kodpocztowy;
        $this->blok = $blok;
        $this->mieszkanie = $mieszkanie;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getMiasto(): string
    {
        return $this->miasto;
    }

    public function getUlica(): string
    {
        return $this->ulica;
    }


    public function getKodPocztowy(): string
    {
        return $this->kodpocztowy;
    }

    public function getBlok(): int
    {
        return $this->blok;
    }

    public function getMieszkanie(): int
    {
        return $this->mieszkanie;
    }

}

?>