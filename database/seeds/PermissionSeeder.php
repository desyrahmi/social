<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder {
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run() {
  	DB::table('permissions')->insert([
  	  [
  	  	'name' => 'role-create',
  	  	'display_name' => 'Create Role',
  	  	'description' => 'Create New Role'
  	  ],
  	  [
  	  	'name' => 'role-list',
  	  	'display_name' => 'Display Role Listing',
  	  	'description' => 'List All Role'
  	  ],
  	  [
  	  	'name' => 'role-update',
  	  	'display_name' => 'Update Role',
  	  	'description' => 'Update Role Information'
  	  ],
  	  [
  	  	'name' => 'role-delete',
  	  	'display_name' => 'Delete Role',
  	  	'description' => 'Delete Role'
  	  ],
  	  [
  	  	'name' => 'user-create',
  	  	'display_name' => 'Create User',
  	  	'description' => 'Create New User'
  	  ],
  	  [
  	  	'name' => 'user-list',
  	  	'display_name' => 'Display User Listing',
  	  	'description' => 'List All User'
  	  ],
  	  [
  	  	'name' => 'user-update',
  	  	'display_name' => 'Update User',
  	  	'description' => 'Update User Information'
  	  ],
  	  [
  	  	'name' => 'user-delete',
  	  	'display_name' => 'Delete User',
  	  	'description' => 'Delete User'
  	  ],
  	  [
  	  	'name' => 'post-create',
  	  	'display_name' => 'Create Post',
  	  	'description' => 'Create New Post'
  	  ],
  	  [
  	  	'name' => 'post-list',
  	  	'display_name' => 'Display Post Listing',
  	  	'description' => 'List All Post'
  	  ],
  	  [
  	  	'name' => 'post-update',
  	  	'display_name' => 'Update Post',
  	  	'description' => 'Update Post Information'
  	  ],
  	  [
  	  	'name' => 'post-delete',
  	  	'display_name' => 'Delete Post',
  	  	'description' => 'Delete Post'
  	  ],
  	]);
  }
}