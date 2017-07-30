<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
	use SoftDeletes;

    protected $fillable = [
        'title', 'author', 'publisher', 'description', 'published_date'
    ];

    protected $dates = ['deleted_at'];
}
