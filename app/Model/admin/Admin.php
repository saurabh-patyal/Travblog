<?php

namespace App\Model\admin;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password','status'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
    	return $this->belongsToMany('App\Model\admin\Role');
    }
}