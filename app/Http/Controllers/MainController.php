<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;

class MainController extends Controller
{
    public function index(){

        $employees = Employee::all();
        $departments = Department::all();

        return view('main', [
            'employees' => $employees,
            'departments' => $departments,
        ]);
    }
}
