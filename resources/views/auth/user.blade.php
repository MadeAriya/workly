<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mobile Performance List</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/lte/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/lte/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Pengguna</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Data Pengguna</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Data Pengguna</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                                            data-target="#modal-add-user">
                                            Tambah Pengguna
                                        </button>
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Username</th>
                                                    <th>Jabatan</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($user as $row)
                                                    <tr>
                                                        <th>{{ $row->id }}</th>
                                                        <th>{{ $row->username }}</th>
                                                        <th>{{ $row->jabatan }}</th>
                                                        <th>
                                                            <div class="btn-group">
                                                                <button type="button"
                                                                    class="btn btn-success" data-toggle="dropdown">Laporan</button>
                                                                <button type="button"
                                                                    class="btn btn-secondary dropdown-toggle dropdown-icon"
                                                                    data-toggle="dropdown">
                                                                    <span class="sr-only">Toggle Dropdown</span>
                                                                </button>
                                                                <div class="dropdown-menu" role="menu">
                                                                    <a class="dropdown-item" href="{{ route('user_agenda', $row->id) }}">Laporan Kinerja</a>
                                                                    <a class="dropdown-item" href="{{ route('user_weekly', $row->id) }}">Laporan Mingguan</a>
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-secondary"><a class="text-white" href="{{ route('user_absence', $row->id) }}">Absensi</a></button>
                                                        </th>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Username</th>
                                                    <th>Jabatan</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    

    <div class="modal fade" id="modal-add-user">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <select name="jabatan" id="jabatan" class="form-control">
                                <option value="admin">Administrator</option>
                                <option value="worker">Worker</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <script src="/lte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="/lte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/lte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/lte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/lte/plugins/jszip/jszip.min.js"></script>
    <script src="/lte/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/lte/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="/lte/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/lte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/lte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/lte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/lte/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/lte/js/demo.js"></script>

    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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

        $('#reservationdate').datetimepicker({
            format: 'L'
        });
    </script>
</body>

</html>
