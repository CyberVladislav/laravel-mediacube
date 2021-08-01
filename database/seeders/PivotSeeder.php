<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,7) as $index) {
            DB::table('departments_employees')->insert([
                'department_id' => $index,
                'employee_id' => $index,
            ]);
        }
    }
}
