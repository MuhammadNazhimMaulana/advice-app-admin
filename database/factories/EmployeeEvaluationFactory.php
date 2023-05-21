<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\EmployeeEvaluation;

class EmployeeEvaluationFactory extends Factory
{
    /**
    * The name of the model.
    *
    * @var string
    */
    protected $model = EmployeeEvaluation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' => $this->faker->numberBetween(1, 5),
            'score' => $this->faker->numberBetween(1, 5),
        ];
    }
}
