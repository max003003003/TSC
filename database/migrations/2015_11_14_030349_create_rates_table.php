<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('a')->nullable();
            $table->integer('b')->nullable();
            $table->integer('c')->nullable();
            $table->integer('d')->nullable();
            $table->string('e')->nullable();            
            $table->string('comment')->nullable();
            
            $table->integer('notify_id')->foreign('notify_id')->references('id')->on('notifies')
            ->onUpdate('cascade')->onDelete('cascade'); 

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
        Schema::drop('rates');
    }
}
