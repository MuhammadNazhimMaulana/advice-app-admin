<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function main()
    {
        $data = [
            'title' => 'Dashboard',
        ];

        return view('Main/dashboard', $data);
    }
}
