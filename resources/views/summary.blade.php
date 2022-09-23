<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    @include('template.header')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
    @include('template.style')
<body>
    @include('template.nav')
<div class="container mt-5">
    <div>
        <h3 class="text-warning"><i class="bi bi-receipt"></i> Summary</h3>
    </div>
    <hr>
</div>
@foreach ($detailtransaksi as $item)
    <div class="d-flex justify-content-center">
        
      
        <div class="card m-3 p-3">
            <div class="row">
                <div class="col-4 p-4">
                    <img src="{{ asset($item->produk->foto) }}" class="img-thumbnail">
                </div>
         
   


                <div class="col-6">
                    <div class="card-body">
                        <h3 class="card-title">{{ $item->produk->name }}</h3>
                        <h3 class="card-title"><span class="text-warning">Invoice :</span> {{ $item->transaksi->kode }}</h3>
                        <hr>
                        <p class="card-text">Harga : Rp. {{ number_format($item->produk->harga ,0,'.','.') }}</p>
                        <p class="card-text">QTY : {{ ($item->qty) }} pcs</p>
                        <hr>
                        <p class="card-text">Total Harga : Rp. {{ number_format($item->totalharga ,0,'.','.') }} </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
        @endforeach

    {{-- <div class="">
        @include('template.footer')
    </div> --}}

    <script src="js/bootstrap.min.js"></script>

</body>
</html>
