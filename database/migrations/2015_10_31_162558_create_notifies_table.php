<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotifiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('describe')->nullable();
            $table->string('location')->nullable();
            $table->string('status');            
            $table->integer('department_id')->foreign()->reference('department')->on('id');          
            $table->integer('tech_id')->foreign()->reference('tech')->on('id')->nullable();    
            $table->string('comment')->nullable();
            $table->integer('infomer_id')->foreign()->reference('informer')->on('id');
            $table->integer('rate_id')->foreign()->reference('ratings')->on('id')->nullable();
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
        Schema::drop('notifies');
    }
}
