<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class UserController extends Controller {
  public function index() {
  	$users = User::get();
  	return view('users.list', compact('users'));
  }

  public function profile($id) {
  	$user = User::find($id);
  	return view('users.profile', compact('user'));
  }

  public function add() {
  	$roles = Role::get();
  	return view('users.add', compact('roles'));
  }

  public function edit($id) {
  	$user = User::find($id);
  	return view('users.update', compact('user'));
  }

  public function update(Request $request) {
  	$fields = array('first_name', 'last_name', 'place_of_birth', 'date_of_birth', 'phone', 'address', 'gender', 'username', 'email', 'password');
  	$user = User::find($request->id);
  	dd($user);
  	foreach($fields as $field) {
  	  if($request[$field]) {
  	  	if($field === 'password') {
  	  	  $user[$field] = bcrypt($request[$field]);
  	  	} else {
  	  	  $user[$field] = $request[$field];
  	  	}
  	  }
  	}
  	if($user->save()) {
  	  dd('save');
  	  return redirect()->route('profile', ['id' => $request->id])->with('success', 'Profile Updated!');
  	} else {
  	  dd('Gagal save');
  	  return redirect()->route('update', ['id' => $request->id]);
  	}
  }
}
