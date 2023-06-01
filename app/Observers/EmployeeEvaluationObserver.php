<?php

namespace App\Observers;

use App\Models\{EmployeeEvaluation, Employee};
use Illuminate\Support\Facades\DB;
use App\Mail\LowScoreMail;
use Illuminate\Support\Facades\Mail;
use Throwable;
use Illuminate\Support\Facades\Log;
class EmployeeEvaluationObserver
{
    /**
     * Handle the employeeEvaluation "created" event.
     *
     * @param  \App\Models\EmployeeEvaluation  $employeeEvaluation
     * @return void
     */
    public function created(EmployeeEvaluation $employeeEvaluation)
    {
        DB::beginTransaction();
        try {

            // Check inserted data
            if ($employeeEvaluation->score == EmployeeEvaluation::SCORE_BAD || $employeeEvaluation->score == EmployeeEvaluation::SCORE_REALLY_BAD)
            {
                // Finding Employee
                $employee = Employee::find($employeeEvaluation->employee_id);

                $data = [
                    'title' => 'Mail from Pos Indonesia',
                    'score' => $employeeEvaluation->score,
                    'message' => $employeeEvaluation->advice,
                    'employee' => $employee,
                ];

                // Send Email
                Mail::to('nazhimmaulana13@gmail.com')->send(new LowScoreMail($data));
            }

            
            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            Log::info($e);
        }
    }
}
