<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTechesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('teches', function (Blueprint $table) {
            $table->integer('id')->unique()->primary();
            $table->integer('department_id')->foreign()->reference('department')->on('id');   
            $table->string('name');           
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
        Schema::drop('teches');
    }
}
