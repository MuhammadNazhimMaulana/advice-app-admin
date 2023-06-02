<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeEvaluation;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function main()
    {

        // Employee Evaluation this Month
        $evals = EmployeeEvaluation::whereMonth('created_at', Carbon::now()->month)->get()->groupBy('score');

        // Preparing List
        $labels_this_month = [];
        $total_score_this_month = [];
        foreach($evals as $eval){
            
            // Label
            array_push($labels_this_month, $eval[0]->score);

            // How many in that Label
            array_push($total_score_this_month, count($eval));
        }

        $data = [
            'title' => 'Dashboard',
            'labels_this_month' => $labels_this_month,
            'total_score_this_month' => $total_score_this_month,
        ];
        
        return view('Main/dashboard', $data);
    }
}
