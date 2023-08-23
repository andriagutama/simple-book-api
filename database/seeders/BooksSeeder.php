<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Books;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i=0; $i<50; $i++) {
            Books::create([
                'name' => $faker->sentence,
                'author' => $faker->name,
                'publish_date' => $faker->date,
            ]);
        }
    }
}
