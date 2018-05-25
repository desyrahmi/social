<?php

namespace App\models;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
  protected $table = 'roles';
  protected $dates = ['created_at','updated_at'];
  protected $fillable = ['name', 'display_name', 'description'];
  
  public function users() {
  	return $this->belongsToMany('App\Models\User', 'role_user', 'user_id', 'role_id');
  }

  public function permissions() {
  	return $this->belongsToMany('App\Models\Permission', 'permission_role', 'permission_id', 'role_id');
  }
}
