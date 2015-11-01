<?php

use Illuminate\Database\Seeder;
use tsc\tech;

class techSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	tech::truncate();
    	tech::create([
             'name'=>'Sompong Kunu',
             'department_id'=>'1'
    		]);
    	tech::create([
             'name'=>'Somsri mari',
             'department_id'=>'2'
    		]);

        
    }
}
