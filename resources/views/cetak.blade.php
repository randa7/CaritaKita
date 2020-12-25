<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center" >{{ $post->judul }}</h1><br><br>
        <h5> Kategori : {{$post->kategori->nama}}</h5>
        <h5> Penulis : {{ $post->penulis->user->nama }}</h5>
        <p class="card-text deskripsi" style="text-align: justify;">{{ $post->isipost }}</p>	
    </div>
</body>
</html>

