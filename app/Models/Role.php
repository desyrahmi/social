<?php

namespace App\models;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
  protected $table = 'roles';
  protected $dates = ['created_at','updated_at'];
  protected $fillable = ['name', 'display_name', 'description'];
  
  public function roles() {
  	return $this->belongsToMany('App\Models\User', 'role_id', 'user_id', 'id');
  }
}
