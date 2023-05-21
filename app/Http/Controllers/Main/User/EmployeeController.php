<?php

namespace App\Http\Controllers\Main\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{Employee, EmployeeEvaluation};

class EmployeeController extends Controller
{
    public function index()
    {
        // Get All Employee
        $employees = Employee::get();

        $data = [
            'user' => Auth::user(),
            'employees' => $employees,
            'title' => 'Employee',
        ];

        return view('Employee/index', $data);   
    }

    public function detail(int $id)
    {
        // Get an employee
        $employee = Employee::find($id);

        // Employee Evaluation
        $eval = EmployeeEvaluation::where('employee_id', $employee->id)->get();

        $data = [
            'employee' => $employee,
            'employee_eval' => $eval,
            'title' => 'Employee',
        ];

        return view('Employee/detail', $data);   
    }
}
