<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        
        for($i=0;$i<=100;$i++){
            Employee::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->safeEmail,
                'phone_number' => $faker->phoneNumber,
                'hire_date' => $faker->dateTimeBetween('-5 years', '-1 year'),
                'department' => $faker->word,
                'job_title' => $faker->jobTitle,

            ]);
        }     
        /*
        DB::table('employees')->insert([
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'johndoe@example.com',
                'phone_number' => '123-456-7890',
                'hire_date' => '2023-01-01',
                'department' => 'Sales',
                'job_title' => 'Sales Representative',
                
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'email' => 'janesmith@example.com',
                'phone_number' => '987-654-3210',
                'hire_date' => '2022-05-15',
                'department' => 'Customer Support',
                'job_title' => 'Customer Support Specialist',
                
            ]
        ]);
        */
    }
}
