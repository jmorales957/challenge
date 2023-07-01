<?php

namespace App\Domain\Entities\Employee;

class Employee
{
    private int $id;
    private string $name;
    private string $email;
    private string $position;
    private string $dateBirth;
    private string $address;
    private array $skills;

    public function __construct(
        string $name,
        string $email,
        string $position,
        string $dateBirth,
        string $address,
        array $skills
    ) {
        $this->name      = $name;
        $this->email     = $email;
        $this->position  = $position;
        $this->dateBirth = $dateBirth;
        $this->address   = $address;
        $this->skills    = $skills;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function toArray(): array
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'email'     => $this->email,
            'position'  => $this->position,
            'dateBirth' => $this->dateBirth,
            'address'   => $this->address,
            'skills'    => $this->skills
        ];
    }
}
