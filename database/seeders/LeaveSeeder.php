<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeaveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('leaves')->insert([
            [
                'employee_id' => 1,
                'leave_type' => 'vacation',
                'start_date' => '2023-12-25',
                'end_date' => '2024-01-01',
                'reason' => 'Vacation to visit family',
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'employee_id' => 2,
                'leave_type' => 'sick_leave',
                'start_date' => '2023-10-20',
                'end_date' => '2024-10-23',
                'reason' => 'Feeling unwell,Hospitalized',
                'status' => 'approved',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'employee_id' => 3,
                'leave_type' => 'personal_leave',
                'start_date' => '2023-12-20',
                'end_date' => '2024-01-03',
                'reason' => 'x-mas holiday',
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
