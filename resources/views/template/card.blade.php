<div class="container mt-3">
    <div class="row">
        @foreach ($data as $item)
            <div class="col-3 m-4">
                <div class="card">
                    <img src="{{ asset($item->foto) }}" alt="{{ $item->name }}" class=" card-img-top p-3">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $item->name }}</h5>
                        <p class="card-text text-center">Rp.{{ number_format($item->harga, 0, '.', '.') }}</p>
                        <a href="{{ route('detail', $item->id) }}" class="btn btn-warning d-block fw-bold">Ditail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
