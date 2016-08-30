<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
		'name'
	];

	/*
    Model Relationships
     */
    
	public function users()
    {
      return $this->belongsToMany('App\User', 'user_roles')->withTimestamps();
    }
}
