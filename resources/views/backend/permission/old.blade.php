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
                      <div class="card">
                          <div class="card-header">
                              <h3 class="card-title">PERMISSION LISTS</h3>
                              <div class="card-tools">
                                <button type="button" data-toggle="modal" data-target="#modal-create" class="btn btn-block btn-primary btn-sm">Add new</button>                        
                                </div>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped text-center">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Display Name</th>
                                    <th>Description</th>
                                    <th>All roles</th>
                                    <th>Action</th>
                                  </tr>
                                  </thead>
                                  <tfoot>
                                      <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>All roles</th>
                                        <th>Action</th>
                                      </tr>
                                  </tfoot>
                                  <tbody>
                                    @foreach ($permissions as $permission)
                                    <tr role="row" class="odd">
                                      <td >{{$loop->iteration}}</td>
                                      <td>{{$permission->name}}</td>
                                      <td>{{$permission->display_name}}</td>
                                      <td>{{$permission->description}}</td>
                                      <td>
                                        @foreach ($permission->roles as $item)                    
                                            {{ $loop->first ? '' : ', ' }}
                                            {{$item->name}}
                                        @endforeach                             
                                    
                                      </td>
                                      <td>
                                        <button type="button" class="btn btn-default" data-epermissionid="{{$permission->id}}" data-epermissionname="{{$permission->name}}" data-epermissiondisplayname="{{$permission->display_name}}" data-epermissiondes="{{$permission->description}}" data-toggle="modal" data-target="#modal-edit">
                                          <i class="fa fa-edit"></i>     
                                        </button>
                                                                
  
                                          <button type="button" class="btn btn-default" data-permissionid="{{$permission->id}}" data-permissionname="{{$permission->name}}" data-toggle="modal" data-target="#modal-delete">
                                            <i class="fa fa-times"></i>
                                          </button>
                                      </td>
                                      
                
                                    </tr>
                                        
                                    @endforeach
                                    
                                    </tbody>

                              </table>
                          </div>
                          <!-- /.card-body -->
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


   {{-- modal create --}}
  
   <div class="modal fade" id="modal-create">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title test-center">Create New Permission </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" action="{{route('backend.permission.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
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

                  <div class="form-group select2-purple">
                    <label>Select Roles to access this permission</label>
                    <select required class="js-example-basic-multiple" name="roles[]" data-placeholder="Select a Role" multiple="multiple" data-dropdown-css-class="select2-purple" style="width: 100%;">
                      @foreach ($roles as $role)
                      <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                    </div>      
                  <!-- /.form-group -->
                                                   
       
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  
   {{-- modal edit --}}
  
   <div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title test-center">Edit Permission </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" action="{{route('backend.permission.update','id')}}" method="POST" enctype="multipart/form-data">
            @csrf
      		{{method_field('patch')}}
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" hidden class="form-control" id="1epermissionid"  value="" name="id" placeholder="Enter name">
                  <input type="text" class="form-control" id="1epermissionname" value="" required name="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Display Name</label>
                  <input type="text" class="form-control" id="1epermissiondisplayname" value="" required name="display_name" placeholder="Display Name">
                </div>
                <div class="form-group">
                    <label>Role Description</label>
                    <textarea class="form-control" rows="3" name="description" id="1epermissionnamedes" placeholder="Enter description"></textarea>
                </div>

               <div class="form-group select2-purple">
                    <label>Select Roles to access this permission</label>
                    <select required class="js-example-basic-multiple" name="roles[]" data-placeholder="Select a Role" multiple="multiple" data-dropdown-css-class="select2-purple" style="width: 100%;">
                      
                      <?php
                    $value = Request::cookie('displayname');

                      ?>
                    {{ cookie('displayname') }}
                     @foreach($roles as $role)      
                     @if($role->hasPermission( 'tsest'))
                    <option value="{{$role->id}}" selected >{{$role->name}} {{Cookie::get('displayname')}}</option>    
                     @else
                     <option value="{{$role->id}}" >{{$role->name}} {{ $value}}</option>  
                      @endif
                      @endforeach
                    </select>
                    {{ cookie('displayname') }}
                    </div>      
                  <!-- /.form-group -->
                                                   
       
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

   {{-- modal delete --}}
  
   <div class="modal fade" id="modal-delete">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title test-center">Delete Confirmation </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('backend.permission.destroy', 'id') }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
              <p>Do you really want to delete <b id="permission_name"></b> permission? </p> 
              <input type="hidden" name="permission_id" id="permission_id" value="">
            
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button  type="submit" class="btn btn-danger">Delete</button>
        </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/backend/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection

@section('script')
<!-- DataTables -->
<script src="{{asset('assets/backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('assets/backend/plugins/select2/js/select2.full.min.js')}}"></script>

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
<script>

    
$('#modal-edit').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var name = button.data('epermissionname') 
      var description = button.data('epermissiondes') 
      var display_name = button.data('epermissiondisplayname')
      var permission_id = button.data('epermissionid') 

      var date = new Date();
        date.setTime(date.getTime()+(3*60*1000));
        var expires = "; expires="+date.toGMTString();

     document.cookie = "displayname="+display_name+"; path=/" +expires;

       console.log(display_name);
       console.log(document.cookie);
      var modal = $(this)
      modal.find('.modal-body #1epermissionname').val(name);
      modal.find('.modal-body #1epermissiondisplayname').val(display_name);
      modal.find('.modal-body #1epermissionid').val(permission_id);
      $('#1epermissionnamedes').html(description);
})
  
  $('#modal-delete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var permission_name = button.data('permissionname'); 
      var permission_id = button.data('permissionid');
      console.log(permission_name);
      var modal = $(this)
      modal.find('.modal-body #permission_id').val(permission_id);
      $('#permission_name').html(permission_name);
})
</script>
@endsection