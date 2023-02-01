<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project API SERVICE</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <style>
        body {
            font-family: 'Roboto';
        }
    </style>
    
</head>

<body class="bg-secondary">

<!-- Judul -->
<div class="container">
    <div class="row pt-5">
        <div class="col-12 text-center">
            <h1 class="text-white"><b>Tugas API SERVICE</b></h1> 
            <h4 class="text-white">Edit Data ID = {{ $data['id'] }}</h4> 
        </div>
    </div>
</div>

<div class="container p-5">
    <!-- Form -->
    <div class="row justify-content-center">
            
        <div class="col-lg-6 p-5 bg-light rounded-3">
            @if (session('success'))
            <div class="alert alert-success">
                <b>{{ session('success') }}</b>
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger">
                <b>{{ session('error') }}</b>
            </div>
            @endif
            
            <form action="{{ route('update', $data['id']) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required value="{{ old('nama', $data['nama']) }}">
                    <label for="nama">Nama</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="umur" name="umur" placeholder="Umur" required value="{{ old('umur', $data['umur']) }}">
                    <label for="umur">Umur</label>
                </div>
                <div class="form-floating mb-3">
                    <img src="{{ $data['foto'] }}" alt="" width="200px">
                    <input type="hidden" value="{{ old('foto', $data['foto']) }}" name="foto_lama">
                </div>
                <div class="form-floating mb-3">
                    <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto">
                    <label for="foto">Foto</label>
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary btn-login text-uppercase fw-bold py-3" type="submit" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Footer  -->
<div class="container text-center mb-5">
    <p class="text-white">&copy; 2023 - Gary Alvaro</p>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function () {
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 5000);
    });
</script>

</body>
</html>