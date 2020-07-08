@extends('layouts.backend.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>DataTables</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DataTables</li>
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
                              <h3 class="card-title">CATEGORIES LISTS</h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped text-center">
                                <thead>
                                  <tr>
                                    <th>Rendering engine</th>
                                    <th>Browser</th>
                                    <th>Platform(s)</th>
                                    <th>Engine version</th>
                                    <th>CSS grade</th>
                                  </tr>
                                  </thead>
                                  <tfoot>
                                      <tr>
                                        <th>Rendering engine</th>
                                        <th>Browser</th>
                                        <th>Platform(s)</th>
                                        <th>Engine version</th>
                                        <th>CSS grade</th>
                                      </tr>
                                  </tfoot>
                                  <tbody>
              
                                    <tr role="row" class="odd">
                                      <td tabindex="0" class="sorting_1">Gecko</td>
                                      <td>Firefox 1.0</td>
                                      <td style="">Win 98+ / OSX.2+</td>
                                      <td style="">1.7</td>
                                      <td style="">A</td>
                                    </tr><tr role="row" class="even">
                                      <td tabindex="0" class="sorting_1">Gecko</td>
                                      <td>Firefox 1.5</td>
                                      <td style="">Win 98+ / OSX.2+</td>
                                      <td style="">1.8</td>
                                      <td style="">A</td>
                                    </tr><tr role="row" class="odd">
                                      <td tabindex="0" class="sorting_1">Gecko</td>
                                      <td>Firefox 2.0</td>
                                      <td style="">Win 98+ / OSX.2+</td>
                                      <td style="">1.8</td>
                                      <td style="">A</td>
                                    </tr><tr role="row" class="even">
                                      <td tabindex="0" class="sorting_1">Gecko</td>
                                      <td>Firefox 3.0</td>
                                      <td style="">Win 2k+ / OSX.3+</td>
                                      <td style="">1.9</td>
                                      <td style="">A</td>
                                    </tr><tr role="row" class="odd">
                                      <td class="sorting_1" tabindex="0">Gecko</td>
                                      <td>Camino 1.0</td>
                                      <td style="">OSX.2+</td>
                                      <td style="">1.8</td>
                                      <td style="">A</td>
                                    </tr><tr role="row" class="even">
                                      <td class="sorting_1" tabindex="0">Gecko</td>
                                      <td>Camino 1.5</td>
                                      <td style="">OSX.3+</td>
                                      <td style="">1.8</td>
                                      <td style="">A</td>
                                    </tr><tr role="row" class="odd">
                                      <td class="sorting_1" tabindex="0">Gecko</td>
                                      <td>Netscape 7.2</td>
                                      <td style="">Win 95+ / Mac OS 8.6-9.2</td>
                                      <td style="">1.7</td>
                                      <td style="">A</td>
                                    </tr><tr role="row" class="even">
                                      <td class="sorting_1" tabindex="0">Gecko</td>
                                      <td>Netscape Browser 8</td>
                                      <td style="">Win 98SE+</td>
                                      <td style="">1.7</td>
                                      <td style="">A</td>
                                    </tr><tr role="row" class="odd">
                                      <td class="sorting_1" tabindex="0">Gecko</td>
                                      <td>Netscape Navigator 9</td>
                                      <td style="">Win 98+ / OSX.2+</td>
                                      <td style="">1.8</td>
                                      <td style="">A</td>
                                    </tr><tr role="row" class="even">
                                      <td class="sorting_1" tabindex="0">Gecko</td>
                                      <td>Mozilla 1.0</td>
                                      <td style="">Win 95+ / OSX.1+</td>
                                      <td style="">1</td>
                                      <td style="">A</td>
                                    </tr></tbody>

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
@endsection