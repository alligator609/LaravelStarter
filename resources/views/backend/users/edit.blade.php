@extends('layouts.backend.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit user</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Roles</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <!-- left column -->
                  <div class="col-md-12">
                      <!-- general form elements -->
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Edit user role</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('backend.user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                          <div class="card-body">                      
                         <div class="form-group">
                              <label for="exampleInputPassword1">Name</label>
                              <input type="text" name="name" disabled required value="{{old('name',$user->name) }}" placeholder="Enter name here" id="name" class="form-control">
                            </div>
                            <div class="form-group select2-purple">
                                <label>Select Roles</label>
                                <select required name="role" class="form-control">
                                    <option value="" disabled {{old('role','selected') }}>Select class</option>
                                    @foreach($roles as $role)
                                    <option value="{{$role->id}}" {{ (old('role') | $role->id) == $user->roles->first()->id ? 'selected' : '' }}>{{$role->display_name}}</option>
                                    @endforeach
                                </select>
                                </div>         
                              <!-- /.form-group -->                    
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">{{ $user->exists ? 'Update' : 'Save' }}</button>
                            <a href="{{ route('backend.user.index') }}">
                              <button type="submit" class="btn btn-default float-right">Cancel</button></a>                          
                        </div>
                        </form>
                      </div>
                      <!-- /.card -->
                  </div>
                  <!--/.col (left) -->
            

              </div>
              <!-- /.row -->
          </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div> <!-- Content Wrapper end -->
@endsection