<?php

use Illuminate\Database\Seeder;

class notifyseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $noti= new \App\Notify();
		$noti->describe="OS fail";
		$noti->location="lab com";	
		$noti->status="wait";
		$noti->department_id='1';
		$noti->infomer_id='1';
		$noti->tech_id='1';
		$noti->save();		

    }
}
