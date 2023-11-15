<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RosterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Get all employee IDs
        $employeeIDs = DB::table('employees')->pluck('id');

        // Get all shift IDs
        $shiftIDs = DB::table('shifts')->pluck('id');

        for ($i = 0; $i < 100; $i++) {
            $employeeID = $faker->randomElement($employeeIDs);
            $shiftID = $faker->randomElement($shiftIDs);
            $date = $faker->dateTimeBetween('2023-10-01', '2023-12-31');
            $notes = $faker->optional()->realText(50);

            DB::table('rosters')->insert([
                'employee_id' => $employeeID,
                'shift_id' => $shiftID,
                'date' => $date,
                'notes' => $notes,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
