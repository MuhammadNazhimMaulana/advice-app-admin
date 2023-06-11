<?php

namespace App\Http\Controllers\Main\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeEvaluation\StoreRequest;
use App\Models\{EmployeeEvaluation, Employee};

class EmployeeEvaluationController extends Controller
{
    public function store(StoreRequest $request)
    {
        // Prepare Array of Scores
        $scores = [EmployeeEvaluation::SCORE_REALLY_BAD, EmployeeEvaluation::SCORE_BAD, EmployeeEvaluation::SCORE_NOT_BAD, EmployeeEvaluation::SCORE_GOOD, EmployeeEvaluation::SCORE_VERY_GOOD];

        // Store Data
        $evaluation = new EmployeeEvaluation;
        $evaluation->employee_id = $request->employee_id;
        $evaluation->score = $scores[$request->score - 1];
        $evaluation->advice = $request->advice;
        $evaluation->save();

        return response()->json([
            'success'=>'Data is successfully retrieved',
        ]);      
    }

    public function perofrmance()
    {
        // Get All Employee
        $employees = EmployeeEvaluation::get()->groupBy('employee_id');

        // Preparing List
        $person_andscore = [];
        foreach($employees as $employee)
        {
            $score = 0;

            // Scoring For Each People
            foreach($employee as $result){
                if($result->score == EmployeeEvaluation::SCORE_VERY_GOOD)
                {
                    $score += 5;
                }elseif($result->score == EmployeeEvaluation::SCORE_GOOD)
                {
                    $score += 4;
                }elseif($result->score == EmployeeEvaluation::SCORE_NOT_BAD)
                {
                    $score += 3;
                }elseif($result->score == EmployeeEvaluation::SCORE_BAD)
                {
                    $score += 2;
                }else{
                    $score += 1;
                }
            }

            // Label and Score
            $person_andscore[$employee[0]->employer->name] = $score;
        }

        // Sorting Array
        arsort($person_andscore);

        $data = [
            'people' => array_keys($person_andscore),
            'scores' => array_values($person_andscore),
            'title' => 'Performance',
        ];

        return view('Employee/performance', $data);          
    }
}
