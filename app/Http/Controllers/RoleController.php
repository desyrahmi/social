<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;

use Validator;
use Auth;
use Session;
use DB;

class RoleController extends Controller {
  public function index() {
  	$roles = Role::get();
  	return view('roles.list', compact('roles'));
  }

  public function add() {
  	$permissions = Permission::get();
  	$initials = new \stdClass();
  	$initials->permissions = $permissions;
  	return view('roles.add', ['initials' => json_encode($initials), 'permissions' => $permissions]);
  }

  public function create(Request $request) {
    $role = new Role();
    $role->name = $request->name;
    $role->display_name = $request->display_name;
    $role->description = $request->description;
    $role->save();

    $permissions = json_decode($request->permissions);
    foreach ($permissions as $key => $value) {
      $role->attachPermission($value);
    }

    return redirect()->route('roles');
  }

  public function edit($id) {
    $role = Role::find($id);
    $permissions = Permission::get();
    $rolePermissions = DB::table('permission_role')->where('role_id', $id)->pluck('permission_id')->toArray();
    
    return view('roles.update', compact('role', 'permissions', 'rolePermissions'));
  }

  public function update(Request $request, $id) {
    $this->validate($request, [
      'name' => 'required',
      'display_name' => 'required',
      'description' => 'required',
      'permissions' => 'required',
    ]);

    $role = Role::find($id);
    $role->name = $request->name;
    $role->display_name = $request->display_name;
    $role->description = $request->description;
    $role->save();

    DB::table('permission_role')->where('role_id', $id)->delete();
    foreach ($request->permissions as $key => $value) {
      $role->attachPermission($value);
    }
    
    return redirect()->route('roles')->with('sussess', 'Role Updated!');
  }

  public function destroy($id) {
    Role::find($id)->delete();
    return redirect()->route('roles');
  }
}