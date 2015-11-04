<?php

namespace tsc;

use Illuminate\Database\Eloquent\Model;
 
class tech extends Model
{

protected $fillable = array('name','department_id');

 public function notify()
    {
    	return $this->hasMany('tsc\Notify');
    }
}	
  
