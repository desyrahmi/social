<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;

class DatabaseSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run() {
  // $this->call(UsersTableSeeder::class);
  	DB::table('users')->delete();
  	DB::table('roles')->delete();
  	
  	$role = [
  	  'name' => 'admin',
  	  'display_name' => 'Administrator',
  	  'description' => 'Full Permission'
  	];
  	$role = Role::create($role);

  	$permissions = Permission::get();

  	foreach ($permissions as $key => $value) {
  	  $role->attachPermission($value);
  	}

  	$user = [
  	  'first_name' => 'Desy Nurbaiti',
  	  'last_name' => 'Rahmi',
  	  'username' => 'dsnrhm',
  	  'email' => 'desy@gmail.com',
  	  'password' => bcrypt('dsnrhm'),
  	];
  	$user = User::create($user);

  	$user->attachRole($role);
  }
}
