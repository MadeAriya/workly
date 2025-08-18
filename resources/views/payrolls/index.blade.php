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
    <!-- BS Stepper -->
    <link rel="stylesheet" href="../../plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- Theme style -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/lte/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="/lte/plugins/toastr/toastr.min.js"></script>
    <link rel="stylesheet" href="/lte/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('partials.sidebar')

        <script>
            var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
            });

            // $(document).ready(function() {
            @if (session()->has('success'))
                Toast.fire({
                    icon: 'success',
                    title: "{{ session('success') }}",
                });
            @endif

            @if (session()->has('error'))
                Toast.fire({
                    icon: 'error',
                    title: "{{ session('success') }}",
                });
            @endif
            // });
        </script>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Payroll</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Data Payroll</li>
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
                                        <h3 class="card-title">Data Payroll</h3>
                                        <div class="card-tools">
                                            <a href="{{ route('manage_payrolls.create') }}" class="btn btn-primary">Tambah Data</a>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Karyawan</th>
                                                    <th>Gaji Pokok</th>
                                                    <th>Tunjangan</th>
                                                    <th>Bonus</th>
                                                    <th>Potongan</th>
                                                    <th>Bpjs</th>
                                                    <th>Pajak</th>
                                                    <th>Gaji Bersih</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($payrolls as $row)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $row->user->username }}</td>
                                                        <td>{{ $row->gaji_pokok }}</td>
                                                        <td>{{ $row->tunjangan }}</td>
                                                        <td>{{ $row->bonus }}</td>
                                                        <td>{{ $row->potongan }}</td>
                                                        <td>{{ $row->bpjs }}</td>
                                                        <td>{{ $row->pajak }}</td>
                                                        <td>{{ $row->gaji_bersih }}</td>
                                                        <td><span class="badge {{ $row->status == 'final' ? 'bg-success' : 'bg-warning' }}">{{ $row->status }}</span></td>
                                                        <td>
                                                            <a href="#" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                                            <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                            <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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

    {{-- JQuery --}}
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
    <script src="/lte/plugins/chart.js/Chart.min.js"></script>
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
    </script>
</body>

</html>
