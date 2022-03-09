<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert(['nom'=> 'client1', 'prenom' => 'preClie1', 'cni' => '1278543', 'email' => 'client1@test.com']);
        DB::table('clients')->insert(['nom'=> 'client2', 'prenom' => 'preClie2', 'cni' => '1236558', 'email' => 'client2@test.com']);
        DB::table('clients')->insert(['nom'=> 'client3', 'prenom' => 'preClie3', 'cni' => '1236543', 'email' => 'client3@test.com']);
        DB::table('clients')->insert(['nom'=> 'client4', 'prenom' => 'preClie4', 'cni' => '8936543', 'email' => 'client4@test.com']);
    }
}
