<?php

namespace App\Domain\Services\User;

use App\Domain\Entities\User\User;
use App\Domain\Repositories\User\UserInterface;

class UserService
{
    private $userRepository;

    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create(array $params): User
    {
        // Generar un ID único para el usuario
        $id = uniqid();

        // Crear la entidad de usuario

        //dd($params);
        // Guardar el usuario utilizando el repositorio
        return $this->userRepository->create($params);
    }

}
