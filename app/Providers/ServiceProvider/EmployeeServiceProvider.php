<?php

namespace App\Providers\ServiceProvider;

use App\Domain\Repositories\Employee\EmployeeInterface;
use App\Domain\Services\Employee\EmployeeService;
use App\Infraestructure\Persistence\Employee\EmployeeRepository;
use Illuminate\Support\ServiceProvider;

class EmployeeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(EmployeeInterface::class, EmployeeRepository::class);

        $this->app->bind(EmployeeService::class, function ($app) {
            return new EmployeeService(
                $app->make(EmployeeRepository::class)
            );
        });
    }
}
