<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BanqueClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banque_client')->insert(['banque_id'=> 1, 'client_id' => 1]);
        DB::table('banque_client')->insert(['banque_id'=> 1, 'client_id' => 2]);
        DB::table('banque_client')->insert(['banque_id'=> 2, 'client_id' => 2]);
        DB::table('banque_client')->insert(['banque_id'=> 1, 'client_id' => 3]);
        DB::table('banque_client')->insert(['banque_id'=> 2, 'client_id' => 3]);
        DB::table('banque_client')->insert(['banque_id'=> 3, 'client_id' => 3]);
        DB::table('banque_client')->insert(['banque_id'=> 1, 'client_id' => 4]);
        DB::table('banque_client')->insert(['banque_id'=> 2, 'client_id' => 4]);
        DB::table('banque_client')->insert(['banque_id'=> 3, 'client_id' => 4]);
        DB::table('banque_client')->insert(['banque_id'=> 4, 'client_id' => 4]);
    }
}
