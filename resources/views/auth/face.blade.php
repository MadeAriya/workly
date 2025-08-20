<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Mobile Performance List</title>
</head>

<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4 class="card-title">Absen Wajah</h4>
                    </div>
                    <div class="card-body text-center">
                        <p>Pastikan wajah Anda terlihat jelas di dalam frame.</p>
                        <div class="webcam-capture mx-auto"></div>
                        <button id="takeabsen" class="btn btn-primary w-50 mt-3">
                            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                            Ambil Gambar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    Webcam.set({
        height: 480,
        width: 640,
        image_format: 'jpeg',
        jpeg_quality: 80
    });
    Webcam.attach('.webcam-capture');

    $("#takeabsen").click(function(e) {
        Webcam.snap(function(uri) {
            image = uri;
        });
        // Contoh post ajax
        $.ajax({
            type: 'POST',
            url: "{{ route('manage_absensi.store') }}",
            data: {
                _token: "{{ csrf_token() }}",
                image: image,
            },
            cache: false,
            beforeSend: function() {
                $('#takeabsen').prop('disabled', true);
                $('#takeabsen .spinner-border').removeClass('d-none');
            },
            complete: function() {
                $('#takeabsen').prop('disabled', false);
                $('#takeabsen .spinner-border').addClass('d-none');
            },
            // Nangkep data json dari Network
            success: function(response) {
                if (response.success) {
                    window.location.href = response.redirectUrl;
                } else {
                    alert(response.message);
                }
            }
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
