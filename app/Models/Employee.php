<?php

// app/Models/Employee.php
// This model represents the 'employees' table in the database.
// The $fillable property allows mass assignment for the specified fields, which is important for security.
// By using Eloquent ORM, you can easily interact with the database using this model.

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // $fillable defines which attributes can be mass-assigned (e.g., via create or update)
    protected $fillable = ['name', 'position', 'system_working_on'];
}
