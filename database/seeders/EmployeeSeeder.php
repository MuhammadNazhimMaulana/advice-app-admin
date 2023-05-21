<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creating Employee
        Employee::create([
            'name' => 'Budi',
            'email' => 'budi@gmail.com',
            'phone' => '08'.time(),
            'counter_number' => 1,
            'gender' => 'male',

        ]);

        sleep(1);

        // Creating Employee
        Employee::create([
            'name' => 'Khaliza',
            'email' => 'khaliza@gmail.com',
            'phone' => '08'.time(),
            'counter_number' => 2,
            'gender' => 'female',

        ]);

        sleep(1);

        // Creating Employee
        Employee::create([
            'name' => 'Aris',
            'email' => 'aris@gmail.com',
            'phone' => '08'.time(),
            'counter_number' => 3,
            'gender' => 'male',

        ]);

        sleep(1);

        // Creating Employee
        Employee::create([
            'name' => 'Kemala',
            'email' => 'kemala@gmail.com',
            'phone' => '08'.time(),
            'counter_number' => 4,
            'gender' => 'female',

        ]);

        sleep(1);

        // Creating Employee
        Employee::create([
            'name' => 'Wulan',
            'email' => 'wulan@gmail.com',
            'phone' => '08'.time(),
            'counter_number' => 5,
            'gender' => 'female',

        ]);
    }
}
