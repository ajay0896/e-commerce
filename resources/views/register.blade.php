<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    @include('template.header')
    <title>Document</title>
</head>
    @include('template.style')
<body>
    @include('template.nav')

    <div class="container mt-5 d-flex justify-content-center ">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 30rem;  box-shadow:40px 25px 10px -20px rgb(187, 187, 187);">
                <h2 class="text-center mt-4">Silahkan isi cuy</h2>
                <div class="d-flex justify-content-center">
                    <img src="img/user.png" style="width: 8rem" alt="" class="card-img-top">
                </div>
                <div class="card-body">
                    <form action="{{ route('postregister') }}" class="form-group" method="POST">
                        @csrf
                        <input type="text" class="form-control mb-2 text-center" name="name" required placeholder="Masukan Username">
                        <input type="email" class="form-control mb-2 text-center" name="email" required placeholder="Masukan Email">
                        <input type="password" class="form-control mb-2 text-center" name="password" required placeholder="Masukan Kata Sandi">
                        <hr>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-success w-100 m-2">Sign Up</button>
                        </div>
                        <p class="text-center">Sudah punya akun. Kembali ke <a href="{{ route('login') }}" class="">Login</a>sdfasf </p>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="">
        @include('template.footer')
    </div>


    <script src="js/bootstrap.min.js"></script>
</body>
</html>
