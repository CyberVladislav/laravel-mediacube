<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,4) as $index) {
            DB::table('departments')->insert([
                'name' => $faker->randomElement($array = array ('Football', 'Basketball', 'Baseball', 'Voleyball','Tennis', 'Running', 'Boxing', 'Swimming')),
           ]);
        }
    }
}
