<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'avatar', 'email', 'phone', 'address', 'password', 'level',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isLevel()
    {
        return $this->level;
    }

    public function orders()
    {
        return $this->hasMany('\App\Model\Orders', 'user_id', 'id');
    }

    public function news()
    {
        return $this->hasMany('\App\Model\News', 'user_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany('\App\Model\Comment', 'user_id', 'id');
    }
}
