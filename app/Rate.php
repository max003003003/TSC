<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    //
    protected $fillable = ['1', '2', '3', '4','5','comment'];

       public function notify()
    {
    	return $this->belongsTo("App\Notify");
    }
}
