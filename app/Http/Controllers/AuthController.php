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
  	  	Session::flash('success', 'Welcome!');
  	  	return redirect()->route('dashboard');
  	  } elseif(Auth::attempt(array('username' => $userdata['userlogin'], 'password' => $userdata['password']), true)) {
  	  	Session::flash('success', 'Welcome!');
  	  	return redirect()->route('dashboard');
  	  } else {
  	  	Session::flash('fail', 'The username and password you entered did not match our records. Please double-check and try again.');
  	  	return redirect()->route('login');
  	  }
  	}
  }

  public function dashboard() {
    $posts = Post::with('user')->orderBy('created_at', 'desc')->get();
    return view('index', compact('posts'));
  }

  public function signup() {
  	return view('form.register');
  }

  public function checkemail(Request $request) {
    if($request->email) {
      $email = $request->email;
      $data = User::where('email', $email)->count();
      if($data > 0) {
        echo 'not unique';
      } else {
        echo 'unique';
      }
    }
  }

  public function register(Request $request) {
  	$rules = array(
      'first_name' => 'required',
      'last_name' => 'required',
      'email' => 'required',
      'password' => 'required',
      'retypepassword' => 'required'
    );

    $validator = Validator::make($request->all(), $rules);

    if($validator->fails()) {
      return redirect()->route('signup')->withErrors($validator);
    } else {
      if($request->password != $request->retypepassword) {
        Session:;flash('fail', 'Password Miss Match');
        return redirect()->route('signup');
      } else {
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if($user->save()) {
          $user->attachRole(2);
          Session::flash('success', 'Regristation Success!');
          return redirect()->route('dashboard');
        } else {
          Session::flash('fail', 'Regristration failed.');
          return redirect()->route('signup');
        }
      }
    }
  }

  public function logout() {
    Auth::logout();
    return redirect()->route('dashboard');
  }
}
