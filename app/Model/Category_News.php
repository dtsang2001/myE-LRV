<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category_News extends Model
{
    protected $table = 'category_news';
    protected $fillable = [
    	'name', 'slug',
    ];

    public function news()
    {
    	return $this->hasMany('\App\Model\News',  'category_news_id', 'id');
    }
}
