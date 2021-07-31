<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,6) as $index) {
            DB::table('employees')->insert([
                'department_id'=> $faker->numberBetween(1,4),
                'name' => $faker->suffix(),
                'surname' => $faker->name(),
                'patronymic' => $faker->lastName(),
                'sex' => $faker->randomElement(['Man', 'Women']),
                'salary' => $faker->randomFloat(2, 10000, 1000000), 
            ]);
        }
    }
}
