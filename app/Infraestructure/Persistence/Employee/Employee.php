<?php

namespace App\Infraestructure\Persistence\Employee;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table      = 'employees';
    protected $primaryKey = 'id';
    protected $fillable   = ['name', 'email', 'position','dateBirth','address','skills'];
    protected $casts      = [
        'skills' => 'array',
    ];

}
