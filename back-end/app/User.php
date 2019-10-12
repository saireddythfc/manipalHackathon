<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname','lname','phone','district','state', 'email', 'password',
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

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function creator()
    {
        return $this->hasOne('App\Creator');
    }

    public function investor()
    {
        return $this->hasOne('App\Investor');
    }

    public function seeker()
    {
        return $this->hasOne('App\Seeker');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function conversations()
    {
        return \App\Conversation::where('user1',$this->id)->orWhere('user2',$this->id)->get();
    }
}
