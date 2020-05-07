<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product_Image extends Model
{
    protected $table = 'product_images';
    protected $fillable = [
    	'product_id', 'url',
    ];

    public function product()
    {
    	return $this->belongsTo('\App\Model\Product', 'product_id', 'id');
    }
}
