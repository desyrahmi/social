<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Models\Post;
use App\Models\User;

use Validator;
use Auth;

class PostController extends Controller {
  public function index() {
  	$posts = Post::get();
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
  	  return redirect()->route('post.add');
  	} else {
  	  $post = new Post();
  	  $post->title = $request->title;
  	  $post->content = $request->content;
  	  $post->user_id = Auth::user()->id;
  	  if($post->save()) {
  	  	return redirect()->route('dashboard');
  	  } else {
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
  	// dd($request->id);
  	$validator = Validator::make($request->all(), $rules);

  	if($validator->fails()) {
  	  return redirect()->route('post.edit', ['id' => $request->id]);
  	} else {
  		// dd('sini');
  	  $post = Post::find($request->id);
  	  $post->title = $request->title;
  	  $post->content = $request->content;
  	  if($post->save()) {
  	  	return redirect()->route('posts');
  	  } else {
  	  	return redirect()->route('post.edit', ['id' => $request->id]);
  	  }
  	}
  }

  public function destroy($id) {
  	Post::find($id)->delete();
  	return redirect()->route('posts');
  }
}
