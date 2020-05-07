<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    
    protected $fillable = [
    	'category_news_id', 'user_id', 'title', 'image', 'slug', 'content',
    ];

    public function catgory_news()
    {
    	return $this->belongsTo('\App\Model\Category_News', 'category_news_id', 'id');
    }

    public function user()
    {
    	return $this->belongsTo('\App\Model\User', 'user_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany('\App\Model\Comment', 'news_id', 'id');
    }
}
