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

  public function create(Request $request) {
    $fields = array('first_name', 'last_name', 'place_of_birth', 'date_of_birth', 'phone', 'address', 'gender', 'username', 'email', 'password');
    $user = new User();
    foreach ($fields as $field) {
      if($request[$field]) {
        if($field === 'password') {
          $user[$field] = bcrypt($request[$field]);
        } else {
          $user[$field] = $request[$field];
        }
      }
    }
    if($user->save()) {
      $user->attachRole($request->role);
      return redirect()->route('users');
    } else {
      return redirect()->route('user.add');
    }
  }

  public function edit($id) {
  	$user = User::find($id);
  	return view('users.update', compact('user'));
  }

  public function update(Request $request) {
  	$fields = array('first_name', 'last_name', 'place_of_birth', 'date_of_birth', 'phone', 'address', 'gender', 'username', 'email', 'password');
  	$user = User::find($request->id);

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
  	  return redirect()->route('users')->with('success', 'Profile Updated!');
  	} else {
  	  return redirect()->route('user.edit', ['id' => $request->id]);
  	}
  }

  public function destroy($id) {
    User::find($id)->delete();
    return redirect()->route('users');
  }
}
