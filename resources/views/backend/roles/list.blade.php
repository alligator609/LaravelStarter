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
                              <h3 class="card-title">ROLE LISTS</h3>
                              <div class="card-tools">
                              <a href="{{route('backend.role.create')}}" ><button type="button" class="btn btn-block btn-primary btn-sm">Add new</button></a>
                             
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
                                    <th>Action</th>
                                  </tr>
                                  </thead>
                                  <tfoot>
                                      <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                      </tr>
                                  </tfoot>
                                  <tbody>
                                    @foreach ($roles as $role)
                                    <tr>
                                      <td >{{$loop->iteration}}</td>
                                      <td>{{$role->name}}</td>
                                      <td>{{$role->display_name}}</td>
                                      <td>{{$role->description}}</td>
                                      <td>
                                       <a href="{{ route('backend.role.edit', $role->id) }}" class="btn btn-xs btn-default">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                                <button type="button" class="btn btn-default" data-roleid={{$role->id}} data-rolename={{$role->name}} data-toggle="modal" data-target="#modal-delete">
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


  {{-- modal --}}
  
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
          <form action="{{ route('backend.role.destroy', '1') }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
              <p>Do you really want to delete <b id="role_name"></b> role ? </p> 
              <input type="hidden" name="role_id" id="role_id" value="">
            
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
@endsection

@section('script')
<!-- DataTables -->
<script src="{{asset('assets/backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script>
  $(function () {
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
  
  $('#modal-delete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var role_id = button.data('roleid')
      var role_name = button.data('rolename') 
      var modal = $(this)
      modal.find('.modal-body #role_id').val(role_id);
      $('#role_name').html(role_name);
      
})
</script>
@endsection