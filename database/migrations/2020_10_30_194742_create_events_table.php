<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_sk', 255);
            $table->string('slug_sk', 255)->nullable();
            $table->text('description_sk', 255)->nullable();
            $table->string('name_en', 255);
            $table->string('slug_en', 255)->nullable();
            $table->text('description_en', 255)->nullable();
            $table->bigInteger('event_category_id')->unsigned()->nullable();
            $table->foreign('event_category_id')->references('id')->on('event_categories')->onDelete('set null')->onUpdate('set null');
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
        Schema::dropIfExists('events');
    }
}
