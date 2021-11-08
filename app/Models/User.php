<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The dates that will be mutated to Carbon timestamps.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'username', 'email', 'password', 'gender', 'contact_number', 'avatar', 'email_verified_at',
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

    /**
     * Get the dashboard route for the authenticated user.
     *
     * @return string
     */
    public function getDashboardRoute()
    {
        if (auth()->id() == 1) {
            return route('admin.dashboard');
        }

        return route('homePage');
    }

    /**
     * Get the full name of the user.
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Get the uri/path of the user's avatar.
     *
     * @return string
     */
    public function getAvatarPath()
    {
        return $this->avatar ? asset($this->avatar) : asset('/images/user-default.jpg');
    }
}
