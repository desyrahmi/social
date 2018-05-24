<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
  protected $table = 'posts';
  protected $dates = ['created_at','updated_at'];
  protected $fillable = ['title', 'content'];

  public function user() {
  	return $this->belongsTo('App\Models\User', 'user_id', 'id');
  }
}
