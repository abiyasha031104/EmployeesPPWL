<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

 
    public function create()
    {
        return view('employees.create');
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'salary' => 'required|numeric',
            'email' => 'nullable|email|unique:employees',
            'phone' => 'nullable',
            'hire_date' => 'nullable|date',
            'department' => 'nullable',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')
            ->with('success', 'Employee created successfully.');
    }

  
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

  
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

 
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'salary' => 'required|numeric',
            'email' => 'nullable|email|unique:employees,email,' . $employee->id,
            'phone' => 'nullable',
            'hire_date' => 'nullable|date',
            'department' => 'nullable',
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')
            ->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully.');
    }
}
