<?php

namespace App\Providers\UseCaseProvider;

use App\Domain\Services\Employee\EmployeeService;
use App\Infraestructure\Persistence\Employee\EmployeeRepository;
use Illuminate\Support\ServiceProvider;

class EmployeeUseCaseProvider extends ServiceProvider
{
    public function register()
    {

        $this->app->bind(EmployeeService::class, function ($app) {
            return new EmployeeService(
                $app->make(EmployeeRepository::class)
            );
        });
    }
}
