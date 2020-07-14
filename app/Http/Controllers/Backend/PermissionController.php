<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Permission;
use App\Role;
use Brian2694\Toastr\Facades\Toastr;

class PermissionController extends BackendController{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions= Permission::get();
        $roles= Role::get();
        return view("backend.permission.list",compact('permissions','roles'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permission= Permission::create($request->all(['name','display_name','description']));
        foreach ($request->roles as $key => $value) {
            $role = Role::whereId($value)->first();           
            $role->detachPermissions([ $permission->name]);
            $role->attachPermissions([ $permission->name]);
        }
        Toastr::success('Permission created succesfully', 'Title', ["positionClass" => "toast-top-right"]);
        return redirect('/backend/permission/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission= Permission::findorfail($id);
        $roles= Role::get();
        return view("backend.permission.edit",compact('permission','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        
        $permission = Permission::findOrFail($id);
        //detach first
        $roles= Role::get();
        foreach ($roles as $key => $value) {        
            $value->detachPermissions([ $permission->name]);
        }

        $permission->update($request->all()); //update
        foreach ($request->roles as $key => $value) {
            $role = Role::whereId($value)->first();           
            $role->attachPermissions([ $permission->name]);
        }
        Toastr::success('Permission edited succesfully', 'Edited succesfully', ["positionClass" => "toast-top-right"]);
        return redirect('/backend/permission/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $permission = Permission::find($request->permission_id);
       // dd(json_decode($permission->roles));

        foreach ($permission->roles as $key => $value) {
            $role = Role::whereId($value->id)->first();           
            $role->detachPermissions([ $permission->name]);
        }
        $permission->delete();
        Toastr::success('Permission deleted succesfully', 'Title', ["positionClass" => "toast-top-right"]);
        return redirect("/backend/permission");
    }
}
