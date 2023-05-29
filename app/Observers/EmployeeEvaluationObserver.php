<?php

namespace App\Observers;

use App\Models\{EmployeeEvaluation, Employee};
use Illuminate\Support\Facades\DB;
use App\Mail\WarningMail;
use Illuminate\Support\Facades\Mail;
use Throwable;

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
            if ($employeeEvaluation->score < EmployeeEvaluation::SCORE_NOT_BAD)
            {
                // Finding Employee
                $employee = Employee::find($employeeEvaluation->employee_id);

                $data = [
                    'title' => 'Mail from Pos Indonesia',
                    'body' => 'Hati-Hati',
                    'employee' => $employee,
                ];

                // Send Email
                Mail::to('nazhimmaulana13@gmail.com')->send(new WarningMail($data));
            }

            
            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
        }
    }
}
