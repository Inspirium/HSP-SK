<?php

use Illuminate\Database\Seeder;

class PropositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('propositions')->insert([
        	['title' => 'Fizika 1', 'status' => 'unfinished', 'owner_id' => 1, 'created_at' => date('Y-m-d H:i:s')],
        	['title' => 'Fizika 2', 'status' => 'unfinished', 'owner_id' => 1, 'created_at' => date('Y-m-d H:i:s')],
        	['title' => 'Fizika 3', 'status' => 'unfinished', 'owner_id' => 1, 'created_at' => date('Y-m-d H:i:s')],
        	['title' => 'Fizika 4', 'status' => 'unfinished', 'owner_id' => 1, 'created_at' => date('Y-m-d H:i:s')],
        ]);
    }
}
