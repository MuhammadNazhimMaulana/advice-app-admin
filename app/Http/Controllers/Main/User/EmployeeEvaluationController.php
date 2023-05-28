<?php

namespace App\Http\Controllers\Main\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeEvaluation\StoreRequest;
use App\Models\EmployeeEvaluation;

class EmployeeEvaluationController extends Controller
{
    public function store(StoreRequest $request)
    {
        // Store Data
        return response()->json([
            'success'=>'Data is successfully retrieved',
        ]);      
    }
}
