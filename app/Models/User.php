<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
  use EntrustUserTrait;

  protected $table = 'users';
  protected $dates = ['created_at','updated_at'];
  protected $fillable = ['first_name', 'last_name', 'identity_number', 'place_of_birth', 'date_of_birth', 'gender', 'address'];

  public function roles() {
  	return $this->belongsToMany('App\Models\Role', 'role_id', 'user_id', 'id');
  }

  // public function hasRole($name)

  public function posts() {
  	return $this->hasMany('App\Models\Post', 'user_id', 'id');
  }
}
