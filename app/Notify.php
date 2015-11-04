<?php

namespace tsc;

use Illuminate\Database\Eloquent\Model;
class Notify extends Model

{
	protected $fillable = ['describe','location','status','department_id','infomer_id','tech_id','comment','rate_id'];

    public function department(){

    	return $this->belongsTo('tsc\Department');
    }
    public function tech(){

  		return $this->belongsTo('tsc\tech');
    }
    
    
}
