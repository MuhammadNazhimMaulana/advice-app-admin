<?php

namespace App\Http\Controllers\Main\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{Auth, Hash};
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

    public function update(UpdateProfileRequest $request)
    {
        // Finding User
        $user = User::find($request->user_id);

        // Preparing to save user
        $user->username = $request->username;
        $user->email = $request->email;
        $user->name = $request->username;
        $user->password = Hash::make($request->password);
        $user->save();

        // Redirect
        return redirect('/admin/profile')->with('success', 'Profile Updated');
    }
}
