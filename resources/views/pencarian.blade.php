@extends('partial.homepartial')

@section('title', 'Pencarian')

@section('content')

    <a class="btn btn-lg btn-info tombol6" href="{{ url('/') }}">Kembali ke Halaman Utama</a>

    @if ($post->isEmpty())
    <div class="container pencarian">
      <div class="hasil">
        <h2>Hasil pencarian tidak ditemukan</h2>
        <div class="rectangle"></div>
      </div>
    </div>

    @else
      <div class="container pencarian">
          <div class="hasil">
              <h2>Hasil Pencarian</h2>
              <div class="rectangle"></div>
          </div>
        <div class="mt-3 row posts">
      
      @foreach ($post as $p)
        <div class="col-sm-4">
          <div class="card tiap">
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
    @endif
      </div>
    </div>
@endsection