<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizatoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizatori', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('meno');
            $table->string('priezvisko');
            $table->string('spolocnost')->nullable();
            $table->string('email')->unique();
            $table->integer('telefon');
            $table->string('adresa');
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
        Schema::dropIfExists('organizatori');
    }
}
