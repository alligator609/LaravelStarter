<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('roles')->delete();

 // Create Admin role
 $admin = new Role();
 $admin->name = "admin";
 $admin->display_name = "Admin";
 $admin->save();

 // Create Editor role
 $editor = new Role();
 $editor->name = "editor";
 $editor->display_name = "Editor";
 $editor->save();

 // Create Author role
 $teacher = new Role();
 $teacher->name = "user";
 $teacher->display_name = "User";
 $teacher->save();
    }
}
