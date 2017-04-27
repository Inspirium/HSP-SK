<?php

use Illuminate\Database\Seeder;

class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
        	['first_name' => 'Marija', 'last_name' => 'Jurić Zagorka'],
        	['first_name' => 'Vladimir', 'last_name' => 'Paar'],
        	['first_name' => 'Braća', 'last_name' => 'Grimm'],
        	['first_name' => 'Hans Christian', 'last_name' => 'Andersen'],
        ]);
    }
}
