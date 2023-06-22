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
        $date = $this->faker->dateTimeBetween('-2 months');

        return [
            'employee_id' => $this->faker->numberBetween(1, 5),
            'advice' => $this->faker->text(),
            'score' => $this->faker->randomElement([EmployeeEvaluation::SCORE_VERY_GOOD, EmployeeEvaluation::SCORE_GOOD, EmployeeEvaluation::SCORE_NOT_BAD, EmployeeEvaluation::SCORE_BAD, EmployeeEvaluation::SCORE_REALLY_BAD]),
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }
}
