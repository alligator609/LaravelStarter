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
                <li class="breadcrumb-item active">Permission</li>
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
                      <div class="card  card-primary">
                          <div class="card-header">
                              <h3 class="card-title">EDIT PERMISSION</h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <form role="form" action="{{route('backend.permission.update',$permission->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                  {{method_field('patch')}}
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Name</label>
                                     <input type="text" class="form-control" id="1epermissionname" value="{{$permission->name}}" required name="name" placeholder="Enter name">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Display Name</label>
                                      <input type="text" class="form-control" id="1epermissiondisplayname" value="{{$permission->display_name}}" required name="display_name" placeholder="Display Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Role Description</label>
                                        <textarea class="form-control" rows="3" name="description"  placeholder="Enter description">{{$permission->description}}</textarea>
                                    </div>

                                    
                                    <div class="form-group select2-purple">
                                        <label>Select Roles to access this permission</label>
                                        <select required class="js-example-basic-multiple" name="roles[]" data-placeholder="Select a Role" multiple="multiple" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                            @foreach ($roles as $role)
                                            @if($role->hasPermission( $permission->name))
                                            <option value="{{$role->id}}" selected >{{$role->name}}</option>                                              
                                             @else
                                             <option value="{{$role->id}}">{{$role->name}}</option> 
                                                 @endif
                                            @endforeach   
                                        </select>
                                        </div>       
                                      <!-- /.form-group -->
                                                            
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
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

@section('css')
<!-- Select2 -->
  <link rel="stylesheet" href="{{asset('assets/backend/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <!-- Select2 -->
@endsection

@section('script')
<!-- Select2 -->
<script src="{{asset('assets/backend/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Select2 -->

<script>
    $(function () {
       //Initialize Select2 Elements
       $('.js-example-basic-multiple').select2();
  
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection