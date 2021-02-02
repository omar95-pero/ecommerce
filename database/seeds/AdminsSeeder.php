<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();


        for ($i = 0; $i < 100; $i++) {
            $array = [
                'name' => $faker->name,
                'email'  => $faker->email,
                'password'  => $faker->password,

            ];
            \App\Models\Admin::create($array);
        }
    }
}
