<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeEvaluation extends Model
{
    use HasFactory;

    const SCORE_VERY_GOOD = 5;
    const SCORE_GOOD = 4;
    const SCORE_NOT_BAD = 3;
    const SCORE_BAD = 2;
    const SCORE_REALLY_BAD = 1;
}
