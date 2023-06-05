<?php

namespace App\Http\Controllers\Main\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Employee\WarnRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\{Employee, EmployeeEvaluation};
use App\Mail\WarningMail;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;

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
        $label_and_score = [];
        foreach($evals as $eval){

            // Label and Score
            $label_and_score[$eval[0]->score] = count($eval);
        }
        
        // Find Max Score
        $max_value = max($label_and_score);

        // Find Max Label
        $max_label = array_search($max_value, $label_and_score);

        // Find JSON Data
        $informations = json_decode(file_get_contents('json/description.json'), true);

        $data = [
            'employee' => $employee,
            'labels' => array_keys($label_and_score),
            'total_score' => array_values($label_and_score),
            'desc' => $informations[$max_label][0]['description'],
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

    public function previewQr(int $id)
    {
        // Finding employee
        $employee = Employee::find($id);

        $pdf = Pdf::loadView('Employee.pdfQr', [
            'employee' => $employee,
            'title' => 'QR ' . $employee->name,
        ])->setpaper('A4', 'portrait');

        // Showing The pdf
        return $pdf->stream('List Manifest.pdf');
    }
}
