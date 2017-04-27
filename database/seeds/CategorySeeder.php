<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book_categories')->insert([
        	['name' => 'Antika', 'description' => ''],
        	['name' => 'Romantizam', 'description' => ''],
        	['name' => 'Znanstvena Fantastika', 'description' => ''],
        ]);
    }
}
