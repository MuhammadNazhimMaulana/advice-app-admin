<?php

namespace App\Http\Controllers\Main\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{Employee, EmployeeEvaluation};
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    // Per Page
    const PAGE = 15;

    public function index()
    {
        // Get All Employee
        $comments = EmployeeEvaluation::paginate(self::PAGE);

        $data = [
            'comments' => $comments,
            'title' => 'Report',
        ];

        return view('Report/index', $data); 
    }

    public function pdf()
    {
        // Finding employee
        $employee_evals = EmployeeEvaluation::get();

        $pdf = Pdf::loadView('Report.pdf', [
            'employee_evals' => $employee_evals,
            'title' => 'Evaluasi Petugas Loket',
        ])->setpaper('A4', 'portrait');

        // Showing The pdf
        return $pdf->stream('Daftar Penilaian.pdf');
    }
}
