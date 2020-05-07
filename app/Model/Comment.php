<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';

    protected $fillable = [
    	'user_id', 'product_id', 'news_id', 'content', 'parent_id', 
    ];

    public function user()
    {
    	return $this->belongsTo('\App\Model\User', 'user_id', 'id');
    }

    public function news()
    {
    	return $this->belongsTo('\App\Model\News', 'news_id', 'id');
    }

    public function product()
    {
    	return $this->belongsTo('\App\Model\Product', 'product_id', 'id');
    }

}
