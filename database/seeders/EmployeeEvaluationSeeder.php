<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EmployeeEvaluation;

class EmployeeEvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Factory for adding dummy score
        EmployeeEvaluation::factory(100)->create();
    }
}
