<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model  
{
    protected $fillable=
    [
        'serial_no',
        'product_name',
        'description',
        'purchase_date',
        'purchase_price',
        'retail_price',
        'category_id',
        'supplier_id',
        'quantity'
    ];

    public function category()
    {
    	return $this->belongsTo('App\Category'); 
    }

    public function supplier()
    {
    	return $this->belongsTo('App\Supplier');
    }
}
