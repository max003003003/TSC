<?php

namespace tsc;

use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    public function department(){

    	return $this->belongTo('tsc\Department');
    }
    
}
