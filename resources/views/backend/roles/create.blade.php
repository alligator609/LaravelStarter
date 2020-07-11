@extends('layouts.backend.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Roles</h1>
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
                          <h3 class="card-title">Create New Role</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                    <form role="form" action="{{route('backend.role.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                          <div class="card-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Name</label>
                              <input type="text" class="form-control" id="exampleInputName1" required name="name" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Display Name</label>
                              <input type="text" class="form-control" id="exampleInputDisplayName1" required name="display_name" placeholder="Display Name">
                            </div>
                            <div class="form-group">
                                <label>Role Description</label>
                                <textarea class="form-control" rows="3" name="description" placeholder="Enter description"></textarea>
                              </div>                       
                          </div>
                          <!-- /.card-body -->
          
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
