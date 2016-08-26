<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	protected $fillable = [
        'title', 
        'author',
        'isbn',
        'quantities',
        'location',
        'image_url',
    ];
    
    protected $visible = array(
        'title', 
        'author',
        'isbn',
        'quantities',
        'location',
        'image_url',
    );
}
