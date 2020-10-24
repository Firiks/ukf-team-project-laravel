<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZamestnanciTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zamestnanci', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('meno');
            $table->string('priezvisko');
            $table->string('email')->unique();
            $table->string('katedra');
            $table->string('fakulta');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zamestnanci');
    }
}
