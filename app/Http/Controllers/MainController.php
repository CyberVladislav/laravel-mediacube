<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class MainController extends Controller
{
    public function index(){

        $employees = Employee::all();

        return view('welcome', [
            'employees' => $employees,
        ]);
    }
}
