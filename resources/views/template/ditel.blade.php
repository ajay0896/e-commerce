<div class="container mt-3">
    <form action="{{ route('pelanggan.postkeranjang' ,$produk->id) }}" class="form-control" method="POST">
        @csrf
        <div class="row">
             

            <div class="col-md-4 p-3">
                <div class="card" style="18rem">
                        <img src="{{asset($produk->foto)}}" alt="" class="card-img-top p-3">
                </div>
            </div>

            <div class="col-md-4 p-3">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{$produk->name}}</h3>
                        <p class="card-title">Rp. {{number_format($produk->harga,0, '.', '.')}}</p>
                        <input type="number" class="form-control" name="qty" required placeholder="Banyak">
                        <h5 class="card-title mt-2">Deskripsi :</h5>
                        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maxime, aliquam!</p>
                    </div>
                </div>
            </div>


            <div class="col-md-4 p-3">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Kategori : {{$produk->kategori->name}}</h3>
                    </div>
                    <button class="btn btn-success m-2">Beli</button>
                </div>
            </div>

        </div>
    </form>
</div>
