<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $employees = Employee::all();
        
        return view('employee', [
            'employees' => $employees,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();

        return view('crud/employee/create', [
            'departments' => $departments,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'patronymic' => 'nullable|max:255',
            'sex' => 'nullable|max:255',
            'salary' => 'nullable|numeric',
            'departments' => 'required|array|max:255',
        ]);

        $employee = Employee::create($storeData);
        $employee->departments()->attach($request->departments);
        
        return redirect('/employees')->with('success', 'Сотрудник добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all();

        return view('crud/employee/edit', [
            'employee' => $employee,
            'departments' => $departments
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'patronymic' => 'nullable|max:255',
            'sex' => 'nullable|max:255',
            'salary' => 'nullable|numeric',
        ]);
        $checkDepartments = $request->validate([
            'departments' => 'required|array|max:255'
        ]);
        Employee::whereId($id)->update($updateData);
        $employee = Employee::findOrFail($id)->departments()->sync($request->departments);

        return redirect('/employees')->with('success', 'Сотрудник успешно обновлён');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->departments()->detach();
        $employee->delete();

        return redirect('/employees')->with('success', 'Отдел успешно удалён');
    }
}
