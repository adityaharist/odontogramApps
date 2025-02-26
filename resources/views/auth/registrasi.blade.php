<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Laravel</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
</head>
<body>
    <div class="text-center mt-5">
        <h2>Registrasi Aplikasi</h2>
        <p>Silahkan isi formulir berikut untuk registrasi aplikasi</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-start">
                    <form action="{{ route('registrasi.submit') }}" method="post">
                        @csrf
                        <label>Nama Lengkap</label>
                        <input type="text" name="name" class="form-control mb-2">
                        <label>Email Address</label>
                        <input type="text" name="email" class="form-control mb-2">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control mb-2">
                        <button class="btn btn-primary">Submit Registrasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>