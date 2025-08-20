<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
        <li class="nav-item">
            <form action="{{ route('logout') }}" method="post">
                {{ csrf_field() }}
                <button class="btn btn-secondary">Logout</button>
            </form>
        </li>
        <li class="nav-item ml-2">
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-cogs mr-3"></i> Change Password
            </button>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/lte/img/your-logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Your Company</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">Selamat Kembali, {{ Auth::user()->username ?? '' }}</a>
                <p class="text-white">Sebagai, {{ Auth::user()->jabatan ?? '' }}</p>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                @if (Auth::check() && Auth::user()->jabatan === 'admin')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>
                                Administrasi
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('user.index') }}" class="nav-link">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>Manage Pekerja</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('manage_evaluasi') }}" class="nav-link">
                                    <i class="fas fa-chart-line nav-icon"></i>
                                    <p>Evaluasi Kerja</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('manage_payrolls') }}" class="nav-link">
                                    <i class="fas fa-file-invoice-dollar nav-icon"></i>
                                    <p>Payrolls</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('manage_slipgaji') }}" class="nav-link">
                                    <i class="fas fa-receipt nav-icon"></i>
                                    <p>Slip Gaji</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                <li class="nav-header">USER MENU</li>
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('manage_absensi') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-check"></i>
                        <p>
                            Absen
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('manage_calender') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Agenda
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('manage_agenda') }}" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Laporan Kinerja
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('manage_weekly') }}" class="nav-link">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>
                            Program Mingguan
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ganti Password</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="changePasswordForm" action="{{ route('changePassword') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="current_password">Password Lama</label>
                        <input type="password" id="current_password" name="current_password" class="form-control"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="new_password">Password Baru</label>
                        <input type="password" id="new_password" name="new_password" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="new_password_confirmation">Konfirmasi Password Baru</label>
                        <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                            class="form-control" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" form="changePasswordForm">Ganti Password</button>
            </div>
        </div>
    </div>
</div>