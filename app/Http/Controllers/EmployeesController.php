<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = Employee::query()->orderBy('updated_at', 'desc')->paginate(10);
        return view('employees.index', ['employees' => $employees]);
    }

    public function create()
    {
        return view('employees.create', [
            'companies' => Company::query()->select(['id', 'name'])->get()
        ]);
    }

    public function store(EmployeeRequest $request)
    {
        return response()->redirectToRoute('employees.index');
    }


    public function edit(Employee $employee)
    {
        return view('employees.edit', [
            'employee' => $employee,
            'companies' => Company::query()->select(['id', 'name'])->get()
        ]);
    }

    public function update(EmployeeRequest $request, Employee $employee)
    {
        return response()->redirectToRoute('employees.index');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->redirectToRoute('employees.index');
    }
}
