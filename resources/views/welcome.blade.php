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
<style>
    .card {
        border: 2px solid orange;
        border-radius: 20px;
        width: 300px;
        height: 350px
    }

    .card-img-top {
        width: 300px;
        height: 200px;
    }

    .card:hover {
        height: 360px;
        box-shadow: -10px 10px 10px 10px rgb(210, 210, 210);
        margin-right: -10px;
        margin-bottom: -10px;
    }

    .card-img-top:hover {
        height: 210px;
    }
</style>

<body>
    @include('template.nav')
    <div class="mt-5">
        <h5 class="text-center">
            @if (Session::has('status'))
                <div> <span style="color: red">{{ Session::get('status') }} </span></div>
            @endif
        </h5>
    </div>
    @include('template.card')


    <div class="fixed-bottom">
        @include('template.footer')
    </div>

    <script src="js/bootstrap.min.js"></script>
</body>

</html>
