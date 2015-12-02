<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable=['name'];
     public function profile()
    {
    	return $this->belongsTO("App\Profile");
    }
    public function notify()
    {
    return $this->belongsToMany('App\Notify');
	}
}
