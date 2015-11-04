<?php

use Illuminate\Database\Seeder;
use tsc\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
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
