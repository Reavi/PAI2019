<?php

class User
{
    private $id;
    private $email;
    private $password;
    private $name;
    private $surname;
    private $role = ['ROLE_USER'];

    public function __construct(
        string $email,
        string $password,
        string $name,
        string $surname,
        string $role,
        int $id = null
    )
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;

        if ($role != 'ROLE_USER') {
            array_push($this->role, $role);
        }
        if ($id != null) {
            $this->id = $id;
        }

    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }


    public function getRole(): array
    {
        return $this->role;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }
    public function getRoleToString(): string
    {
        return implode( ", ", $this->role );
    }
    public function jsonSerialize()
    {
        return
        [
          'id' => $this->getId(),
          'name' => $this->getName(),
          'surname' => $this->getSurname(),
          'email' => $this->getEmail(),
          'role' => $this->getRole()
        ];
    }
}

?>