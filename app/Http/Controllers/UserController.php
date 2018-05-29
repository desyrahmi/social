<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

use Auth;
use Validator;
use Session;
use Hash;

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
    $fields = array('first_name', 'last_name', 'place_of_birth', 'date_of_birth', 'phone', 'address', 'gender', 'username', 'email');
    $user = User::find($request->id);

    if(Hash::check($request->password, Auth::user()->password)) {
      foreach ($fields as $field) {
        $user[$field] = $request[$field];
      }

      if($user->save()) {
        Session::flash('success', 'Profile Updated!');
        return redirect()->route('profile', ['id' => $request->id]);
      } else {
        Session::flash('fail', 'Failed to update!');
        return redirect()->route('profile', ['id' => $request->id]);
      }
    } else {
      dd('salah');
      Session::flash('fail', 'Enter the correct password!');
      return redirect()->route('profile', ['id' => $request->id]);
    }
  }

  public function updatepassword(Request $request) {
    $rules = array(
      'oldpassword' => 'required',
      'password' => 'required',
      'retypepassword' => 'required'
    );

    $user = User::find($request->id);

    $validator = Validator::make($request->all(), $rules);
    if($validator->fails()) {
      Session::flash('fail', 'Data Cannot be blank!');
      return redirect()->route('user.editprofile', ['id' => $request->id]);
    } else {
      if($request->password === $request->retypepassword) {
        if(Hash::check($request->oldpassword, $user->password)) {
          $user->password = bcrypt($request->password);
          if($user->save()) {
            return redirect()->route('profile', ['id' => $request->id]);
          }
        } else {
          Session::flash('fail', 'Your enter the wrong old password!');
          return redirect()->route('user.editprofile', ['id' => $request->id]);
        }
      } else {
        return redirect()->route('user.editprofile', ['id' => $request->id]);
      }
    }
  }

  public function updatepasswordadm(Request $request) {
    $rules = array(
      'password' => 'required',
      'retypepassword' => 'required'
    );

    $user = User::find($request->id);

    $validator = Validator::make($request->all(), $rules);
    if($validator->fails()) {
      Session::flash('fail', 'Data Cannot be blank!');
      return redirect()->route('user.edit', ['id' => $request->id]);
    } else {
      if($request->password === $request->retypepassword) {
        $user->password = bcrypt($request->password);
        if($user->save()) {
          return redirect()->route('users');
        }
      } else {
        return redirect()->route('user.edit', ['id' => $request->id]);
      }
    }
  }

  public function destroy($id) {
    User::find($id)->delete();
    return redirect()->route('users');
  }
}
