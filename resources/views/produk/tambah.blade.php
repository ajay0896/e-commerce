<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    @include('template.header')
    <title>Document</title>
</head>
    @include('template.style')
<body>

    <div class="container mt-2 d-flex justify-content-center ">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 30rem">
                
          
                <div class="card-body">
                    <div class="container">
                        <form action="{{ route('admin.tambahproduk') }}" class="form-group" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" name="name" required >
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Harga Produk</label>
                                <input type="number" class="form-control" name="harga" required placeholder="Rp.">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Foto</label>
                                <input type="file" class="btn btn-outline-warning" accept="iamge/*" name="foto" required >
                            </div>
                            <label class="form-control" for="kategori">Pilih kategori </label>
                            <select name="kategori_id" required id="" class="form-select ">
                                    @foreach ($kategori as $item)
                                        
                                    <option class="option" value="{{ $item->id }} ">{{ $item->name }}</option>
                                    @endforeach
                        
                                    
                                </select>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-success m-2" style="width: 400px ">kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="js/bootstrap.min.js"></script>
</body>
</html>
