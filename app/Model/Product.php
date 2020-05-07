<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
    	'category_id', 'name', 'slug', 'unit_price', 'sale_price', 'unit_on_order', 'unit_in_stock', 'description', 'status',
    ];

    public function category()
    {
    	return $this->belongsTo('\App\Model\Category', 'category_id', 'id');
    }

    public function product_image()
    {
    	return $this->hasMany('\App\Model\Product_Image', 'product_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany('\App\Model\Comment', 'product_id', 'id');
    }
}
