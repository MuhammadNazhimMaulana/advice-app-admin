<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeEvaluation extends Model
{
    use HasFactory;

    const SCORE_VERY_GOOD = "recommended";
    const SCORE_GOOD = 'memuaskan';
    const SCORE_NOT_BAD = 'sesuai janji';
    const SCORE_BAD = 'tidak puas';
    const SCORE_REALLY_BAD = 'kriminal';
}
