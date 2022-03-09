<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comptes')->insert(['client_id'=> 1, 'banque_id' => 1, 'libelle' => 'Acc1-' . date(now()), 'solde' => 0]);
        DB::table('comptes')->insert(['client_id'=> 2, 'banque_id' => 1, 'libelle' => 'Acc2-' . date(now()), 'solde' => 0]);
        DB::table('comptes')->insert(['client_id'=> 3, 'banque_id' => 2, 'libelle' => 'Acc3-' . date(now()), 'solde' => 0]);
        DB::table('comptes')->insert(['client_id'=> 4, 'banque_id' => 3, 'libelle' => 'Acc4-' . date(now()), 'solde' => 0]);
    }
}
