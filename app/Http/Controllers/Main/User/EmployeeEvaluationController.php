<?php

namespace App\Http\Controllers\Main\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeEvaluation\StoreRequest;
use App\Models\{EmployeeEvaluation, Employee};
use Carbon\Carbon;

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

    // View Performance
    public function perofrmance()
    {
        // Data
        $eval = new EmployeeEvaluation;

        // Get All Employee
        $employees = $eval->whereMonth('created_at', Carbon::now()->month)->get()->groupBy('employee_id');

        // Returning Months
        $group_months = $eval->get()->groupBy(function ($q) {
            return Carbon::parse($q->created_at)->format('F');
        })->toArray();

        // Getting LIst
        $person_andscore = $this->getScore($employees);

        $data = [
            'people' => array_keys($person_andscore),
            'scores' => array_values($person_andscore),
            'months' => array_keys($group_months),
            'title' => 'Performance',
        ];

        return view('Employee/performance', $data);          
    }

    // Api For Ajax
    public function updatePerformance(Request $request)
    {
        // Data
        $eval = EmployeeEvaluation::query();

        // Get All Employee
        $employees = $eval->whereMonth('created_at', Carbon::parse($request->months)->month)->get()->groupBy('employee_id');  
        
        // Getting LIst
        $person_andscore = $this->getScore($employees);

        return response()->json([
            'success'=>'Data is successfully retrieved',
            'people' => array_keys($person_andscore),
            'scores' => array_values($person_andscore)
        ]);
    }

    /** @return array  */
    private function getScore($employees): array
    {
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

        return $person_andscore;
    }
}
