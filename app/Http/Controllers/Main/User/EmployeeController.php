<?php

namespace App\Http\Controllers\Main\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;

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
}
