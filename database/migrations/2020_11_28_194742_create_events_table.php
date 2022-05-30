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
            $table->boolean('public');
            $table->integer('participants_max')->unsigned()->nullable();
            $table->integer('participants')->default(0);
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->bigInteger('event_category_id')->unsigned()->nullable();
            $table->foreign('event_category_id')->references('id')->on('event_categories')->onDelete('set null')->onUpdate('set null');
            $table->bigInteger('faculty_id')->unsigned()->nullable();
            $table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('set null')->onUpdate('set null');
            $table->bigInteger('workplace_id')->unsigned()->nullable();
            $table->foreign('workplace_id')->references('id')->on('workplaces')->onDelete('set null')->onUpdate('set null');
            $table->bigInteger('room_id')->unsigned()->nullable();
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('set null')->onUpdate('set null');
            $table->dateTime('date')->nullable();
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
