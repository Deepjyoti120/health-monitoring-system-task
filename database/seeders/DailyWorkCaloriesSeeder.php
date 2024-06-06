<?php

namespace Database\Seeders;

use App\Constants\Constants;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DailyWorkCaloriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [[
            'user_id' => 1,
            'date' => date('d-m-Y'),
            'calories' => 0,
            // 'unit' => 'kcal',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'user_id' => 1,
            'date' => date('d-m-Y'),
            'calories' => 120,
            // 'unit' => 'kcal',
            'created_at' => now(),
            'updated_at' => now(),
        ]];
        DB::table(Constants::DAILY_WORK_CALORIES)->insert($data); 
    }
}
