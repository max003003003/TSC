<?php

use Illuminate\Database\Seeder;

class department_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->truncate();
      
		$dep = new \App\Department();
		$dep->name = "CE";
		$dep->save();


		$dep = new \App\Department();
		$dep->name = "CPE";
		$dep->save();


		$dep = new \App\Department();
		$dep->name = "EE";
		$dep->save();


		$dep = new \App\Department();
		$dep->name = "ME";
		$dep->save();


		$dep = new \App\Department();
		$dep->name = "MME";
		$dep->save();
       
       $dep = new \App\Department();
		$dep->name = "โสตทัศนศึกษา";
		$dep->save();
       
       $dep = new \App\Department();
		$dep->name = "อาคารสถานที่และพัสดุ";
		$dep->save();
       
      
		
		


		
    }
}
