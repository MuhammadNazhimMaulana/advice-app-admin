<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'username' => 'MANAGER',
            'name' => 'MANAGER',
            'email' => 'managaer@gmail.com',
            'password' => bcrypt('demodemo123'),
        ]);
        $user->assignRole(User::ROLE_MANAGER);

        // Create Avatar
        // $avatar = new UserAvatar;
        // $avatar->user_id = $user->id;
        // $avatar->path = env('PICTURE_PATH');
        // $avatar->url = env('PICTURE_URL');
        // $avatar->save();  

        sleep(1);

        $user = User::create([
            'username' => 'HEAD_OFFICE',
            'name' => 'HEAD_OFFICE',
            'email' => 'headoffice@gmail.com',
            'password' => bcrypt('demodemo123'),
        ]);
        $user->assignRole(User::ROLE_HEAD_OFFICE);

        // Create Avatar
        // $avatar = new UserAvatar;
        // $avatar->user_id = $user->id;
        // $avatar->path = env('PICTURE_PATH');
        // $avatar->url = env('PICTURE_URL');
        // $avatar->save();  

        sleep(1);

    }
}
