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
    <div class="row py-5">
        <div class="col-12 text-center">
            <h1 class="text-white"><b>Tugas API SERVICE</b></h1> 
        </div>
    </div>
</div>


<div class="container mb-5 p-5 bg-light rounded-3">
    <!-- Alert & Tambah Data -->
    <div class="row">
        <div class="col-8">
            <a href="{{ route('read') }}" class="btn btn-success mb-5 me-3 text-white"><b class="fa fa-refresh"></b></a>
            <a href="{{ route('create') }}" class="btn btn-dark mb-5 text-white"><b>Tambah Data</b></a>
        </div>
        <div class="col-4">
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
            @if (session('success_edit'))
            <div class="alert alert-success">
                <b>{{ session('success_edit') }}</b>
            </div>
            @endif
            @if (session('success_delete'))
            <div class="alert alert-success">
                <b>{{ session('success_delete') }}</b>
            </div>
            @endif
            @if (session('error_delete'))
            <div class="alert alert-danger">
                <b>{{ session('error_delete') }}</b>
            </div>
            @endif
        </div>
    </div>
    
    <!-- Tabel -->
    <div class="row">
        <div class="col-lg-12 text-center">
            <table class="table align-middle">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Foto</th>
                    <th>Action</th>
                </tr>
                @foreach ($data as $dt)
                <tr>
                    <td>{{ $dt['id'] }}</td>
                    <td>{{ $dt['nama'] }}</td>
                    <td>{{ $dt['umur'] }} tahun</td>
                    <td><img src="{{ $dt['foto'] }}" alt="" width="150px"></td>
                    <td>
                        <a href="{{ route('edit', ['id'=>$dt['id']]) }}" class="btn btn-primary"><span class="fa fa-edit"></span></a>
                        <a href="{{ route('delete', ['id'=>$dt['id']]) }}" class="btn btn-danger" onclick="return confirm('Apakah benar ingin menghapus data atas nama {{ $dt['nama'] }}?');"><span class="fa fa-trash"></span></a>
                    </td>
                </tr>
                @endforeach
            </table>
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