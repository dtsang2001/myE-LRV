<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $fillable = [
    	'user_id', 'address', 'total_price', 'status', 'payment_method', 'shipping_method'
    ];

    public function user()
    {
    	return $this->belongsTo('\App\Model\User', 'user_id', 'id');
    }

    public function order_detail()
    {
    	return $this->hasMany('\App\Model\Order_Detail', 'order_id', 'id');
    }
}
