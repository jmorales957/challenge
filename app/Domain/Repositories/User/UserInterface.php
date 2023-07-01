<?php

namespace App\Domain\Repositories\User;

use App\Domain\Entities\User\User;

interface UserInterface
{
    public function create(array $user): User;

    public function getId(): int;

    public function setId(int $id): void;

    public function getName(): string;

    public function setName(string $name): void;

    public function getEmail(): string;

    public function setEmail(string $email): void;

    public function getPassword(): string;

    public function setPassword(string $password): void;
}
