<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use Brian2694\Toastr\Facades\Toastr;

class RoleController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles= Role::get();
        return view("backend.roles.list",compact('roles'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.roles.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Role::create($request->all());
        Toastr::success('Role created succesfully', 'Title', ["positionClass" => "toast-top-right"]);
        return redirect('/backend/role/');
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
        $role = Role::find($id);
        return view("backend.roles.edit",compact('role'));
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
      $records = Role::findOrFail($id);
      $records->fill($request->all());
      $records->update();
      Toastr::success('Role updated succesfully', 'Title', ["positionClass" => "toast-top-right"]);
      return redirect('/backend/role/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $role = Role::find($request->role_id);

        //dd(json_decode($role->users->first()->id));
        if (empty($role->users->first())) 
        {
            $role->delete();
            Toastr::success('Role deleted succesfully', 'Title', ["positionClass" => "toast-top-right"]);
            return redirect("/backend/role");
        }
        else {
            Toastr::warning('This role has user assign to it', 'Title', ["positionClass" => "toast-top-right"]);
            return redirect("/backend/role");
            
        }

    }
}
