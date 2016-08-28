<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	protected $fillable = [
        'title', 
        'author',
        'description',
        'isbn',
        'quantities',
        'location',
        'image_url',
    ];
    
    protected $visible = array(
        'title', 
        'author',
        'description',
        'isbn',
        'quantities',
        'location',
        'image_url',
    );

    public function users()
    {
      return $this->belongsToMany('App\User', 'user_books')->withTimestamps();
    }
}
