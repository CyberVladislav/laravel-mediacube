<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Department extends Model
{
    use HasFactory;

    public function employees()
    {
        return $this->belongsToMany('App\Models\Employee', 'departments_employees', 'department_id', 'employee_id');
    }
}
