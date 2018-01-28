<?php

use Illuminate\Database\Seeder;
use App\FunEvents;

class FunEventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Let's truncate our existing records to start from scratch.
        FunEvents::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few fun envents in our database:
        for ($i = 0; $i < 5; $i++) {
            FunEvents::create([
                'title' => $faker->sentence,
                'body' => $faker->paragraph,
                'date' => $faker->DateTime,
                'venue'=> $faker->sentence,
                'price'=> $faker->digit,
            ]);
        }
    }
}
