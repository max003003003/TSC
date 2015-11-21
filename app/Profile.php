<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $fillable=['name','tel','user_id','department_id'];
    public function user()
    {
    	return $this->belongsTo("App\User");
    }
    public function department()
    {
    	return $this->belongsTo("App\Department");
    }
}
