<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
  use EntrustUserTrait;
  use Notifiable;

  protected $table = 'users';
  protected $dates = ['created_at','updated_at'];
  protected $fillable = ['first_name', 'last_name', 'place_of_birth', 'date_of_birth', 'gender', 'address', 'email', 'username', 'password'];
  protected $hidden = ['password', 'remember_token'];

  public function roles() {
  	return $this->belongsToMany('App\Models\Role', 'role_user', 'user_id', 'role_id');
  }

  // public function hasRole($name)

  public function posts() {
  	return $this->hasMany('App\Models\Post', 'user_id', 'id');
  }
}
