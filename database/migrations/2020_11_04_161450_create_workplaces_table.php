<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkplacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workplaces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_sk', 255);
            $table->string('slug_sk', 255)->nullable();
            $table->string('name_en', 255);
            $table->string('slug_en', 255)->nullable();
            $table->string('code', 6)->nullable();
            $table->bigInteger('faculty_id')->unsigned()->nullable();
            $table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('set null')->onUpdate('set null');
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
        Schema::dropIfExists('workplaces');
    }
}
