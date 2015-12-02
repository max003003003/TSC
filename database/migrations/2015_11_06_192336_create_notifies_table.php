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
            $table->string('describe');
            $table->string('location');
            $table->string('status');    
            $table->integer('department_id');

            $table->integer('tech_id')->nullable;
                    

            $table->string('comment')->nullable();
            
            $table->integer('user_id');
            $table->integer('rate_id')->nullable();
            

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
