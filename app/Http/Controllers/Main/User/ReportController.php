<?php

namespace App\Http\Controllers\Main\User;

use App\Http\Controllers\Controller;
use App\Exports\ReportExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{Employee, EmployeeEvaluation};
use Maatwebsite\Excel\Facades\Excel;
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

    public function pdf(Request $request)
    {
        // Prepare Date
        $dates = explode(' to ', $request->date_pdf);

        if(count($dates) == 2)
        {
            // Finding employee
            $employee_evals = EmployeeEvaluation::whereBetween('created_at', $dates)->get();
        }else{
            // Finding employee
            $employee_evals = EmployeeEvaluation::whereDate('created_at', $dates[0])->get();
        }

        $pdf = Pdf::loadView('Report.pdf', [
            'employee_evals' => $employee_evals,
            'title' => 'Evaluasi Petugas Loket',
        ])->setpaper('A4', 'portrait');

        // Showing The pdf
        return $pdf->stream('Daftar Penilaian.pdf');
    }

	public function excel(Request $request)
	{
        // Prepare Date
        $dates = explode(' to ', $request->date_excel);

		return Excel::download(new ReportExport($dates), 'Laporan Penilaian Pelanggan.xlsx');
	}
}
