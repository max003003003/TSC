<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Notify extends Model {
	protected $guarded = array();

  public function rate()
    {
    	return $this->hasOne("App\Rate");
    }
  
  	public function department()
  	{

		return $this->belongsToMany('App\Department');

  	}
  	public function tech()
  	{
  		 return $this->belongsToMany("App\User");
  	}
     

}