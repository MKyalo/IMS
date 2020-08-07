<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable=
    [
        'supplier_name','address','phone_number','email'.'location'
    ];

    public function product()
    {
    	return $this->hasMany('App\Product'); 
    }
}
