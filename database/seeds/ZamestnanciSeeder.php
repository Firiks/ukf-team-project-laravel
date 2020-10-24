<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ZamestnanciSeeder extends Seeder
{
    public function run() {
DB::table('zamestnanci')->insert([
    'meno'=>"Dominik",
    'priezvisko'=>"Halvonik",
    'email'=>"dhalvonik@gmail.com",
    'katedra'=>"katedra_informatiky",
    'fakulta'=>"fakulta prírodných vied",
]);
    }

}
