<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mobile Performance List</title>

    <!-- dropzonejs -->
    <link rel="stylesheet" href="/lte/plugins/dropzone/min/dropzone.min.css">
    {{-- Summernote --}}
    <link rel="stylesheet" href="/lte/plugins/summernote/summernote-bs4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/lte/plugins/fontawesome-free/css/all.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="/lte/plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="/lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="/lte/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/lte/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="/lte/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="/lte/plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="/lte/plugins/dropzone/min/dropzone.min.css">
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
                            <h1>Tambah Data Kinerja</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Tambah Data Kinerja</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
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
                                    <h3 class="card-title"></h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="post" class="dropzone" action="{{ route('manage_agenda.store') }}"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="card-body">
                                        <div class="grid">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="nama">Nama Kegiatan</label>
                                                        <input type="text" class="form-control" id="nama"
                                                            placeholder="Enter name" name="nama">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Tanggal dan Waktu</label>
                                                        <div class="input-group date" id="reservationdatetime"
                                                            data-target-input="nearest">
                                                            <input type="text"
                                                                class="form-control datetimepicker-input"
                                                                data-target="#reservationdatetime" id="waktu"
                                                                name="waktu" />
                                                            <div class="input-group-append"
                                                                data-target="#reservationdatetime"
                                                                data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i
                                                                        class="fa fa-calendar"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                            <label for="tempat">Tempat Pelaksanaan</label>
                                            <input type="text" class="form-control" id="tempat"
                                                placeholder="Enter tempat" name="tempat">
                                        </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                            <label for="agenda">Agenda Yang Dilaksanakan</label>
                                            <input type="text" class="form-control" id="agenda"
                                                placeholder="Enter agenda" name="agenda">
                                        </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group d-flex">
                                            <div class="wrapper">
                                                <label for="pelaksanaan_kegiatan">Pelaksanaan Kegiatan</label>
                                                <textarea name="pelaksanaan_kegiatan" id="summernote" cols="30" rows="10"></textarea>
                                            </div>
                                            <div class="wrapper">
                                                <label for="hasil_kegiatan">Hasil Kegiatan</label>
                                                <textarea name="hasil_kegiatan" id="summernote2" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div id="preview_1"></div>
                                            <input type="file" name="dokumentasi_1" id="dokumentasi_1"
                                                class="dokumentasi_1">
                                            <div id="preview_2"></div>
                                            <input type="file" name="dokumentasi_2" id="dokumentasi_2">
                                            <div id="preview_3"></div>
                                            <input type="file" name="dokumentasi_3" id="dokumentasi_3">
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.row -->
                        </div><!-- /.container-fluid -->
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

    <!-- jQuery -->
    <script src="/lte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="/lte/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="/lte/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="/lte/plugins/dropzone/min/dropzone.min.js"></script>
    <script src="/lte/plugins/moment/moment.min.js"></script>
    <script src="/lte/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="/lte/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="/lte/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="/lte/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- BS-Stepper -->
    <script src="/lte/plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- dropzonejs -->
    <script src="/lte/plugins/dropzone/min/dropzone.min.js"></script>
    <script src="/lte/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/lte/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/lte/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        function setupImagePreview(inputId, previewId) {
            document.getElementById(inputId).addEventListener('change', function(event) {
                const file = event.target.files[0];
                const preview = document.getElementById(previewId);

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                } else {
                    preview.src = '#';
                    preview.style.display = 'none';
                }
            });
        }

        setupImagePreview('dokumentasi_1', 'preview_1');
        setupImagePreview('dokumentasi_2', 'preview_2');
        setupImagePreview('dokumentasi_3', 'preview_3');
        $(function() {
            bsCustomFileInput.init();
        });

        $(document).ready(function() {
            $('#summernote').summernote({
                height: 200
            });
        });
        $(document).ready(function() {
            $('#summernote2').summernote({
                height: 200
            });
        });

        // DropzoneJS Demo Code Start
        Dropzone.autoDiscover = false

        // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
        var previewNode = document.querySelector("#template")
        previewNode.id = ""
        var previewTemplate = previewNode.parentNode.innerHTML
        previewNode.parentNode.removeChild(previewNode)

        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            url: "/target-url", // Set the url
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoQueue: false, // Make sure the files aren't queued until manually added
            previewsContainer: "#previews", // Define the container to display the previews
            clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
        })

        myDropzone.on("addedfile", function(file) {
            // Hookup the start button
            file.previewElement.querySelector(".start").onclick = function() {
                myDropzone.enqueueFile(file)
            }
        })

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
        })

        myDropzone.on("sending", function(file) {
            // Show the total progress bar when upload starts
            document.querySelector("#total-progress").style.opacity = "1"
            // And disable the start button
            file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
        })

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function(progress) {
            document.querySelector("#total-progress").style.opacity = "0"
        })

        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.
        document.querySelector("#actions .start").onclick = function() {
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
        }
        document.querySelector("#actions .cancel").onclick = function() {
            myDropzone.removeAllFiles(true)
        }
        // DropzoneJS Demo Code End

        //Date and time picker
        $('#reservationdatetime').datetimepicker({
            icons: {
                time: 'far fa-clock'
            }
        });
    </script>
</body>

</html>
