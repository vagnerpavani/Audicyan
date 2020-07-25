<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function instruments()
    {
        return $this->belongsToMany('App\Instrument');
    }
    
    public function skills()
    {
        return $this->belongsToMany('App\Skill');
    }

    public function materials()
    {
        return $this->hasMany('App\Material');
    }
    
    public function matchs()
    {
        return $this->belongsToMany('App\User', 'match', 'user_id', 'other_user_id');
    }

}
