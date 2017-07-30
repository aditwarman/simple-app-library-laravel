<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	protected $table = 'transaction';

    protected $fillable = [
        'customer_id', 'book_id', 'duration', 'etc'
    ];

    public function getBook ()
    {
    	return $this->hasOne('App\Book', 'id', 'book_id');
    }
}
