<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BanqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banques')->insert(['nom'=> 'banque1', 'code' => 'code1']);
        DB::table('banques')->insert(['nom'=> 'banque2', 'code' => 'code2']);
        DB::table('banques')->insert(['nom'=> 'banque3', 'code' => 'code3']);
    }
}
