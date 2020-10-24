<?php

use Illuminate\Database\Seeder;

class katedraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { DB::table('katedra')->insert(['nazov'=>"katedra informatiky",
        'fakulta'=>"fakulta prírodných vied",
        'univerzita'=>"Univerzita Konštantína Filozofa v Nitre"

    ]);
    }
}
