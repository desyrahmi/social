<?php

namespace App\Models;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission {
  protected $table = 'permissions';
  protected $dates = ['created_at','updated_at'];
  protected $fillable = ['name', 'display_name', 'description'];

  public function roles() {
  	return $this->belongsToMany('App\Models\Role', 'permission_role', 'permission_id', 'role_id');
  }
}