<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    @include('template.header')
    <title>Keranjang</title>
</head>
@include('template.style')

<body>
    @include('template.nav')
    <div class="container mt-5">
        <div>
            <h3 class="text-warning"><i class="bi bi-cart4"></i> Keranjang</h3>
        </div>
        <hr>
        <h5 class="text-center">
            @if (Session::has('status'))
                <div> <span style="color: red">{{ Session::get('status') }} </span></div>
            @endif
        </h5>
    </div>


    @foreach ($detailtransaksi as $item)
        <div class="d-flex justify-content-center">
            <div class="card m-3 p-3" style="width: 50rem">
                <div class="row">

                    <div class="col-3 p-4">
                        <img src="{{ asset($item->produk->foto) }}" class="img-thumbnail">
                    </div>

                    <div class="col-6">
                        <div class="card-body p-2">
                            <h5 class="card-title">{{ $item->produk->name }}</h5>
                            <hr>
                            <p class="card-text">Harga Rp. {{ number_format($item->produk->harga), 0, ',', '.' }}
                            </p>
                            <form action="{{ route('pelanggan.updatekeranjang', $item->id) }}" method="POST"
                                class="form-group">
                                @csrf
                                <input type="number" name="qty" class="form-control" value="{{ $item->qty }}"
                                    required>
                            </form>
                            <span class="text-primary"> Tekan enter untuk ubah qty</span>
                            <br>
                            <p class="card-text">Total Rp. {{ number_format($item->totalharga), 0, ',', '.' }}</p>
                        </div>
                    </div>

                    <div class="col-3 mt-4 p-5">
                        <a href="{{ route('bayar', $item->id) }}" class="btn btn-info d-block">Bayar</a>
                        <a href="{{ route('pelanggan.deletekeranjang', $item->id) }}"
                            class="btn btn-danger mt-1 d-block">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach






    <script src="js/bootstrap.min.js"></script>
</body>

</html>
