<?php
namespace tsc;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use tsc\Department;

class departmentseedeer extends Seeder
{
     
    public function run()
    {

    	Department::truncate();

        Department::create([
        	'name'=>'it'
         ]);
        Department::create([
        	'name'=>'infrastruce'
         ]);
        Department::create([
        	'name'=>'vision'
         ]);
        Department::create([
        	'name'=>'elect'
         ]);
    }
}
