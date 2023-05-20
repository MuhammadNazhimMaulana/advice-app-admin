<?php

namespace App\Http\Controllers\Main\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        $data = [
            'user' => Auth::user(),
            'title' => 'Profile',
        ];

        return view('Profile/index', $data);        
    }
}
