<?php

use Illuminate\Database\Seeder;
use tsc\User;
use tsc\informer;
use tsc\tech;
class Usertableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
    	User::create([
             'name'=>'Sompong Kunu',
             'email'=>'sompong@g.com',
             'password'=>bcrypt('123456'),             
             'typ_use'=>'1'
    		]);
    	User::create([
             'name'=>'vorabhon chuaybhan',
             'email'=>'max003003003@gmail.com',
             'password'=>bcrypt('123456'),            
             'typ_use'=>'2'
    		]);
        $u=User::where('name','LIKE','vorabhon chuaybhan')->first();
    	informer::create([
                'id'=>$u->id,
                'name'=>$u->name
            ]);
    	User::create([
             'name'=>'mahanakon',
             'email'=>'maha@g.com',
             'password'=>bcrypt('123456'),
             'typ_use'=>'3'
    		]);
        $u=User::where('name','LIKE','mahanakon')->first();
       
        tech::create([
                'id'=>$u->id,
                'name'=>$u->name,
                'department_id'=>'2'
            ]);
    	
    	
    }
}
