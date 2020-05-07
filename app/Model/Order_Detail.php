<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    protected $table = 'order_details';
    protected $fillable = [
    	'order_id', 'product_id', 'quantity', 'unit_price',
    ];

    public function orders()
    {
    	return $this->belongsTo('\App\Model\Orders', 'order_id', 'id');
    }
}
