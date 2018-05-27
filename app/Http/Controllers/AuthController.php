<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use Auth;
use Validator;
use Session;

class AuthController extends Controller {
  public function login() {
  	return view('form.login');
  }

  public function doLogin(Request $request) {
  	$rules = array(
  	  'userlogin' => 'required',
  	  'password' => 'required'
  	);

  	$validator = Validator::make($request->all(), $rules);
  	if($validator->fails()) {
  	  return redirect()->route('login')->withErrors($validator);
  	} else {
  	  $userdata = array(
  	  	'userlogin' => $request->userlogin,
  	  	'password' => $request->password,
  	  );
  	  if(Auth::attempt(array('email' => $userdata['userlogin'], 'password' => $userdata['password']), true)) {
  	  	Session::flash('Success', 'Welcome!');
  	  	return redirect()->route('dashboard');
  	  } elseif(Auth::attempt(array('username' => $userdata['userlogin'], 'password' => $userdata['password']), true)) {
  	  	Session::flash('Success', 'Welcome!');
  	  	return redirect()->route('dashboard');
  	  } else {
  	  	Session::flash('Fail', 'The username and password you entered did not match our records. Please double-check and try again.');
  	  	return redirect()->route('login');
  	  }
  	}
  }

  public function dashboard() {
    return view('index');
  }

  public function signup() {
  	return view('form.register');
  }

  public function register(Request $request) {
  	$rules = array(
	  'email' => 'required', 
	  'password' => 'required', 
	  'retype-password' => 'required', 
  	);

  	$validator = Validator::make($request->all(), $rules);
  	if($validator->fails()) {
  	  dd("VALIDATOR");
  	  return redirect()->route('signup')->withErrors($validator);
  	} else {
  	  if($request->input['retype-password'] != $request->input['password']) {
  	  	dd("SALAH PASSWORD");
  	  	return redirect()->route('signup')->withErrors('Password miss match');
  	  }

  	  $user = new User();
  	  if($request->first_name != null) {
  	  	$user->first_name = $request->first_name;
  	  }
  	  if($request->last_name != null) {
  	  	$user->last_name = $request->last_name;
  	  }
  	  if($request->place_of_birth != null) {
  	  	$user->place_of_birth = $request->place_of_birth;
  	  }
  	  if($request->date_of_birth != null) {
  	  	$user->date_of_birth = $request->date_of_birth;
  	  }
  	  if($request->gender != null) {
  	  	$user->gender = $request->gender;
  	  }
  	  if($request->address != null) {
  	  	$user->address = $request->address;
  	  }
  	  if($request->username != null) {
  	  	$user->username = $request->username;
  	  }
  	  $user->email = $request->email;
  	  $user->password = bcrypt($request->password);
  	  if($user->save()) {
  	  	return redirect()->route('index');
  	  } else {
  	  	return redirect()->route('signup');
  	  }
  	}
  }

  public function logout() {
    Auth::logout();
    return redirect()->route('dashboard');
  }
}
