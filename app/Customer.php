<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Customer extends Model
{
	use SoftDeletes;

    protected $fillable = [
        'name', 'address', 'gender', 'card_numb'
    ];

    protected $dates = ['deleted_at'];

    public function getTransaction()
    {
        return $this->hasMany('App\Transaction', 'customer_id', 'id');
    }
}
