<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('permissions')->delete();

       // crud exam
       $crudUser = new Permission();
       $crudUser->name = "crud-user";
       $crudUser->save();
       // crud course
       $crudPermission = new Permission();
       $crudPermission->name = "crud-permission";
       $crudPermission->save();
       // crud student
       $crudRole = new Permission();
       $crudRole->name = "crud-role";
       $crudRole->save();
    


       // attach roles permissions
       $admin = Role::whereName('admin')->first();

       $admin->detachPermissions([ $crudUser, $crudPermission,$crudRole]);
       $admin->attachPermissions([ $crudUser, $crudPermission,$crudRole]);
    }
}
