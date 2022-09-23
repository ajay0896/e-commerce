<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="css/bootstrap.reboot.css"> --}}
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Ditail Produk {{$produk->name}}</title>
</head>
    @include('template.style')
<body>
    @include('template.nav')



    <div class="container mt-3">
        <a href="{{ route('home') }}" class="nav-link fs-3" >X <i style="fs-5">untuk kembali</i></a>


        @if (Session::has('status'))
        <div class="text-center">
            <span class="text-danger">{{ Session::get('status') }}</span>
        </div>
            @endif
    </div>
    @include('template.ditel')

    <div class="fixed-bottom">
        @include('template.footer')
    </div>

    <script src="js/bootstrap.min.js"></script>
</body>
</html>
