<?php

namespace App\Models;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission {
  protected $table = 'permissions';
  protected $dates = ['created_at','updated_at'];
  protected $fillable = ['name', 'display_name', 'description'];
}