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
            $table->integer('tech_id')->nullable();
            $table->foreign('tech_id')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');         

            $table->string('comment')->nullable();
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');
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
