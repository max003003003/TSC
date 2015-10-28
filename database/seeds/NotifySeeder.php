<?php

use Illuminate\Database\Seeder;
use tsc\Notify;
class NotifySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        Notify::truncate();
        foreach(range(1,50) as $i )
        {
            Notify::create([
              'name' => $faker->sentence(2),
              'Descrip' => $faker->sentence(4),
            ]);


        }
    }
}
