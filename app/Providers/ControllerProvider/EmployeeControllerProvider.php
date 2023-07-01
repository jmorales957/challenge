<?php

namespace App\Providers\ControllerProvider;

use App\Domain\UseCases\Employee\Create\EmployeeCreate;
use App\Domain\UseCases\Employee\Delete\EmployeeDelete;
use App\Domain\UseCases\Employee\GetAll\EmployeeGetAll;
use App\Domain\UseCases\Employee\GetById\EmployeeGetById;
use App\Domain\UseCases\Employee\Update\EmployeeUpdate;
use App\Http\Controllers\Employee\EmployeeController;
use Illuminate\Support\ServiceProvider;

class EmployeeControllerProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(EmployeeController::class, function ($app) {
            return new EmployeeController(
                $app->make(EmployeeCreate::class),
                $app->make(EmployeeGetById::class),
                $app->make(EmployeeUpdate::class),
                $app->make(EmployeeDelete::class),
                $app->make(EmployeeGetAll::class),
            );
        });
    }
}
