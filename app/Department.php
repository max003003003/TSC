<?php

namespace tsc;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function notify()
    {
    	return $this->hasMany('tsc\Notify');
    }

}
