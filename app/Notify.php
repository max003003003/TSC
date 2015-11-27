<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Notify extends Model {
	protected $guarded = array();

  public function rate()
    {
    	return $this->hasOne("App\Rate");
    }
  public function user()
  	{
  		return $this->hasOne("App\User");
  	}


}