<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @include('template.header')
    <title>Document</title>
</head>
@include('template.style')

<body>
    @include('template.nav')
    <div class="mt-5">
        <h5 class="text-center">
            @if (Session::has('status'))
                <div> <span style="color: red">{{ Session::get('status') }} </span></div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
        </h5>
    </div>

    <div class="container mt-3">


        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah
        </button>

        <!-- Modal -->
        <div class="modal " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title text-success mx-auto">Isi Data Produk</h2>

                    </div>
                    <div class="modal-body ">
                        @include('produk.tambah')
                    </div>

                </div>
            </div>
        </div>



        <table class="table table-warning">
            <thead>
                <tr>
                    <th scope="col">ID. </th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Name Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($produk as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            <img src="{{ asset($item->foto) }}" width="100" height="100">
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ number_format($item->harga, 0, '.', '.') }}</td>
                        <td>
                            <a href="{{ route('admin.tampiledit', $item->id) }}" class="btn btn-info">Edit</a>

                            <a href="{{ route('admin.deleteproduk', $item->id) }}"
                                onclick="return confirm('yakin akan hapus produk')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>




    <div class="fixed-bottom">
        @include('template.footer')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script></script>
</body>

</html>
