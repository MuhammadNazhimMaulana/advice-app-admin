<?php

namespace App\Http\Controllers\Main\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Employee\WarnRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\{Employee, EmployeeEvaluation};
use App\Mail\WarningMail;
use Illuminate\Support\Facades\Mail;

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
        $evals = EmployeeEvaluation::where('employee_id', $employee->id)->get()->groupBy('score');

        // Preparing List
        $labels = [];
        $total_score = [];
        foreach($evals as $eval){
            
            // Label
            array_push($labels, $eval[0]->score);

            // How many in that Label
            array_push($total_score, count($eval));
        }

        $data = [
            'employee' => $employee,
            'labels' => $labels,
            'total_score' => $total_score,
            'title' => '',
        ];

        return view('Employee/detail', $data);   
    }

    public function warn(WarnRequest $request)
    {
        // Get All Employee
        $employee = Employee::find($request->id_employee);

        $data = [
            'title' => 'Mail from Pos Indonesia',
            'body' => $request->warn_message,
            'employee' => $employee,
        ];

        Mail::to('nazhimmaulana13@gmail.com')->send(new WarningMail($data));

        // Redirect
        return redirect('/admin/employee')->with('success', 'Warning Sent Succesfully');
    }
}
