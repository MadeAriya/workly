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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/lte/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/lte/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/lte/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/lte/plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="/lte/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
                width="60">
        </div>

        @include('partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        @if($slipgaji)
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>Slip Gaji</h3>
                                    <p>Slip Gaji bulan {{ $slipgaji->payroll->bulan }} telah terbit</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="{{ asset('uploads/slipgaji/' . $slipgaji->file_pdf) }}" target="_blank" class="small-box-footer">Download <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        @endif
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Agenda Sedang Berlangsung</h3>
                                </div>
                                <div class="card-body">
                                    @forelse ($events as $todo)
                                        <div class="card card-light card-outline">
                                            <div class="card-header">
                                                <h5 class="card-title">{{ $todo->title }}</h5>
                                                <div class="card-tools">
                                                    <a href="{{ route('manage_calender') }}" class="btn btn-tool">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <label for="">Agenda {{ $todo->title }} berlangsung
                                                    dari Hari ini hingga Tanggal {{ $todo->end }}</label>
                                            </div>
                                        </div>
                                    @empty
                                        <p>Tidak ada agenda yang sedang berlangsung.</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Agenda Akan Datang</h3>
                                </div>
                                <div class="card-body">
                                    @forelse ($soonEvents as $soon)
                                        <div class="card card-light card-outline">
                                            <div class="card-header">
                                                <h5 class="card-title">{{ $soon->title }}</h5>
                                                <div class="card-tools">
                                                    <a href="{{ route('manage_calender') }}" class="btn btn-tool">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <label for="">Agenda {{ $soon->title ?? '' }} akan berlangsung pada tanggal {{ $soon->start ?? ''}}</label>
                                            </div>
                                        </div>
                                    @empty
                                        <p>Tidak ada agenda yang akan datang.</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Program Mingguan Aktif</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Target/Tugas</th>
                                                <th>Periode</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($weeklies as $weekly)
                                            <tr>
                                                <td>
                                                    <ul>
                                                        @foreach($weekly->target as $targetItem)
                                                            <li>{{ $targetItem }}</li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>{{ $weekly->tanggalMulai->format('d-m-Y') }} - {{ $weekly->tanggalSelesai->format('d-m-Y') }}</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="2">Tidak ada program mingguan aktif untuk minggu ini.</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="/lte/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="/lte/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="/lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="/lte/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="/lte/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="/lte/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="/lte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="/lte/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="/lte/plugins/moment/moment.min.js"></script>
    <script src="/lte/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="/lte/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/lte/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/lte/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/lte/js/pages/dashboard.js"></script>
</body>

</html>