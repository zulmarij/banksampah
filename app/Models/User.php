<?php

namespace App\Models;

use App\Notifications\PasswordResetNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable
{
    use HasRoles, HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *n
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address', 'photo', 'token'
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

    public function deposit()
    {
        return $this->hasMany(Deposit::class);
    }

    public function savings()
    {
        return $this->hasMany(Savings::class);
    }

    public function pickup()
    {
        return $this->belongsTo('App\API\PickupController', 'user_id', 'id');
    }

    public function chat()
    {
        return $this->hasMany(Chat::class);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetNotification($token));
    }
}
