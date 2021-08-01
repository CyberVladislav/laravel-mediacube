<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\DepartmentsEmployee;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'surname', 'patronymic', 'sex', 'salary'];

    public function departments()
    {
        return $this->belongsToMany('App\Models\Department', 'departments_employees', 'employee_id', 'department_id');
    }

    public function getId($qwe)
    {
        $department = DepartmentsEmployee::whereDepartment_idAndEmployee_id($qwe, $this->id)->first();
        if($department)
        return $department->department_id;
    }
}
