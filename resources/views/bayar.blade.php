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

    <div class="d-flex justify-content-center">

        <div class="card m-3 p-3">
            <div class="row">
                <div class="col-4 p-4">
                    <img src="{{ asset($produk->foto) }}">
                </div>
            </div>
        </div>
        <div class="card m-3 p-3" style="width: 50rem">
            <div class="row">



                <div class="col-10">
                    <div class="card-body">
                        <h3 class="card-title">{{ $produk->name }}</h3>
                        <p class="card-text">Harga : Rp. {{ number_format($produk->harga ,0,'.','.') }}</p>
                        <p class="card-text">QTY : {{ ($detailtransaksi->qty) }} pcs</p>
                        <p class="card-text">Total Harga : Rp. {{ number_format($detailtransaksi->totalharga ,0,'.','.') }} </p>
                        <hr>
                        <h4 class="card-title mb-2">Bukti Pembayaran</h4>
                        <form action="{{ route('pelanggan.prosesbayar' , $detailtransaksi->id) }}" method="POST" enctype="multipart/form-data" class="form-group" >
                            @csrf
                            <input type="file" class="form-control form-control-sm" name="bukti_transaksi" accept="image/*" required placeholder="foto Bukti Pembayaran">
                            <button class="btn btn-success mt-3 d-block">Kirim</button>
                        </form>
                    </div>
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
