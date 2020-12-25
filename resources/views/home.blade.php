@extends('partial.homepartial')

@section('title', 'Home')
<style>
    @media (max-width: 575.98px) { 
        .spasi{
            margin-top: 5%;
        }

        .pos{
            margin-top: 15%;
        }
    }
</style>
@section('content')



    <div class="container postingan">
    <br><br>
      <h1 class="pos" style="text-align: center">POSTINGAN</h1>
      <div class="rectangle"></div>
      <br><br>
        <div class="dropdown dropright kategori">
            <button class="btn btn-success btn-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            @if (isset($kategoriDipilih))
                Kategori {{ $kategoriDipilih->nama }} 
            @else
                Semua Kategori
            @endif
            </button>
            <br><br>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="/">Semua Kategori</a>
            @foreach ($kategori as $k)
                <a class="dropdown-item" href="/kategori/{{$k -> idkategori}}">{{$k -> nama}}</a>
            @endforeach
            </div>
        </div>

        <div class="mt-3 row posts" id="posts">
        @foreach ($post as $p)
            <div class="col-sm-4">
                <div class="card tiap spasi">
                    <img class="gambar_post" src="{{ Storage::url($p->file_gambar) }}" alt="gambar {{ $p->judul }}">
                    <div class="card-body text">
                        <h5 class="card-title judul_post">{{ $p->judul }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Kategori : {{ $p->kategori->nama }}</h6>
                        <h6 class="card-subtitle mb-2 text-muted">Penulis : {{ $p->penulis->user->nama }}</h6>
                        <p class="card-text">
                            {{ substr($p->isipost, 0, 80) }} ....
                        </p>
                        <a href="/detailpost/{{ $p->idpost }}" class="card-link">Selengkapnya</a>
                    </div>
                </div>
            </div>
            
        @endforeach
        </div>
    </div>

@endsection