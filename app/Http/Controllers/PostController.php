<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Models\Post;
use App\Models\User;

use Validator;
use Auth;
use Session;

class PostController extends Controller {
  public function index() {
    if(Auth::user()->hasRole('admin')) {
      $posts = Post::get();
    } else {
      $posts = Post::where('user_id', Auth::user()->id)->get();
    }
  	return view('posts.list', compact('posts'));
  }

  public function add() {
  	return view('posts.add');
  }

  public function create(Request $request) {
  	$rules = array(
  	  'title' => 'required',
  	  'content' => 'required'
  	);

  	$validator = Validator::make($request->all(), $rules);
  	if($validator->fails()) {
      Session::flash('fail', 'Cannot add the post.');
  	  return redirect()->route('post.add');
  	} else {
  	  $post = new Post();
  	  $post->title = $request->title;
  	  $post->content = $request->content;
  	  $post->user_id = Auth::user()->id;
  	  if($post->save()) {
        Session::flash('success', 'Post Created.');
  	  	return redirect()->route('dashboard');
  	  } else {
        Session::flash('fail', 'Cannot add the post.');
  	  	return redirect()->route('post.add');
  	  }
  	}
  }

  public function edit($id) {
  	$post = Post::find($id);
  	return view('posts.edit', compact('post'));
  }

  public function update(Request $request) {
  	$rules = array(
  	  'title' => 'required',
  	  'content' => 'required'
  	);
  	
  	$validator = Validator::make($request->all(), $rules);

  	if($validator->fails()) {
  	  return redirect()->route('post.edit', ['id' => $request->id]);
  	} else {
  	  $post = Post::find($request->id);
  	  $post->title = $request->title;
  	  $post->content = $request->content;
  	  if($post->save()) {
        Session::flash('success', 'Post Updated.');
  	  	return redirect()->route('posts');
  	  } else {
        Session::flash('fail', 'Cannot update the post.');
  	  	return redirect()->route('post.edit', ['id' => $request->id]);
  	  }
  	}
  }

  public function destroy($id) {
  	Post::find($id)->delete();
  	return redirect()->route('posts');
  }
}
