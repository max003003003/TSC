<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentNotifyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_notify', function (Blueprint $table) {
             $table->integer('notify_id')->unsigned();
             $table->integer('department_id')->unsigned();

            $table->foreign('notify_id')->references('id')->on('notifies')
                ->onUpdate('cascade')->onDelete('cascade');
            

            $table->foreign('department_id')->references('id')->on('departments')
                ->onUpdate('cascade')->onDelete('cascade');
            
            $table->primary(['notify_id', 'department_id']);
        });
       
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('department_notify');
    }
}
