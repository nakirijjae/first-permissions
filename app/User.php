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
        'name', 'email', 'password', 'user_role',
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

    public function isSuperAdmin()
    {
      if ($this->user_role == 'superAdmin')
      {
          return true;
      }

      return false;
    }

    public function isAdminUser()
    {
      if ($this->user_role == 'adminUser')
      {
          return true;
      }

      return false;
    }

    public function isBasicUser()
    {
      if ($this->user_role == 'basicUser')
      {
          return true;
      }

      return false;
    }
}
