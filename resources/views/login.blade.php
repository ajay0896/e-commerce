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
            <div class="card" style="width: 30rem; box-shadow:30px 25px 10px -20px rgb(187, 187, 187); ">
                <h2 class="text-center mt-4">Login Cuy</h2>
                <div class="d-flex justify-content-center">
                    <img src="img/user.png" style="width: 8rem" alt="ini gambar user" class="card-img-top">
                </div>
                @if(Session::has('alert'))
                <div class="text-center"> <span style="color: red">{{ Session::get('alert') }} </span></div>
            @endif
                <div class="card-body">
                    <form action="{{ route('postlogin') }}" class="form-group" method="POST">
                        @csrf
                        <input type="email" class="form-control mb-2 text-center" name="email" required placeholder="Masukan Email">
                        <input type="password" class="form-control mb-2 text-center" name="password" required placeholder="Masukan Kata Sandi">
                        @if(Session::has('status'))
                            <div class="text-center bold"> <span style="color: red">{{ Session::get('status') }} </span></div>
                        @endif
                        <hr>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-info w-100 m-2">Login</button>
                        </div>
                        <p class="text-center">Belim punya aku? Silahkan <a href="{{ route('register') }}" class="">Registrasi</a> disini! </p>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="fixed-bottom">
        @include('template.footer')
    </div>



    <script src="js/bootstrap.min.js"></script>
</body>
</html>
