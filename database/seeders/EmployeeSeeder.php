<?php

namespace Database\Seeders;

use App\Models\Employee;
use Faker\Factory;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        for ($i = 0; $i <= 100; $i++) {
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
    }
}
