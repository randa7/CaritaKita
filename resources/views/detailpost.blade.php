@extends('partial.homepartial')

@section('title', 'Detail_Post')

<style>
  .center{
    margin-left: 30%;
  }
  .judul{
    margin-left: 40%;
  }

  .posting{
    margin-top: 5%;
  }
  .tombol {
    padding: 10px;
    font-size: 20px;
}

.tombol2 {
    padding: 10px;
    font-size: 20px;
}

.tombol3 {
    margin: 0;
    background-color: rgb(148, 81, 0);
    color: rgb(255, 255, 255);
}

.tombol4 {
    margin-left: 50px;
    margin-top: 50px;
    margin-bottom: 50px;
}

.tombol5 {
    background-color: red;
    color: blue;
    margin: 0;
}

.tombol6 {
    margin: 0;
    margin-top: 150px;
    margin-left: 180px;
}

.geser{
  margin-left: 2%;
}

@media (max-width: 575.98px) { 
  .center{
    margin-left: 0%;
  }

  .gmbr img{
    width: 100% !important;
  }
  .judul{
    margin-top: 25% !important;
    margin-left: 0% !important;
  }
}
</style>
@section('content')
    

    


    <div class="posting">
        <div class="card-body">
            <div>
              <br>
              <h1 class="judul">{{ $post->judul }}</h1>
              <br>
              <div class="gmbr">
                  <img src="https://ceritakita.herokuapp.com/{{ Storage::url($post->file_gambar) }}" class="center rounded gambar_detail" style="width:40%">
              </div>
              <br>
              <div class="col-sm-8 container">
                <h4> Kategori : {{$post->kategori->nama}}</h4>
                <h4> Penulis : {{ $post->penulis->user->nama }}</h4>
                <p style="text-align: justify;">{{ $post->isipost }}</p>	
              </div>
            </div>
        </div>
    </div>

    <div class="geser">
      <div class = "col-sm-6">
        <div >
            <div class="">
              <h3 class="">Kolom Komentar</h3>
              @foreach ($post->komentar as $komen)
                <div class="">
                  <h5 style="font-weight: bold">{{$komen->penulis->user->nama}}</h5>
                  <p>{{$komen->isi}}</p>
                  @auth
                    @if(auth()->user()->penulis)
                      @if( auth()->user()->penulis->idpenulis == $komen->post->idpenulis)
                        <a href="/detailpost/hapus/{{$komen->idkomentar}}" class="btn btn-secondary">Hapus Komentar</a>
                      @endif
                    @endif
                  @endauth
                </div>
              @endforeach
            </div>
        </div>
      </div>
      <br><br>
      <div class = "col-sm-5">
        <div style="margin-right:20px">
            <div class="">
              <h3 class="">Komentar</h3>
              @auth
                @if (auth()->user()->penulis)
                  <form method="POST" autocomplete="on" action="" style="margin-top: 10px">
                  @csrf
                    <div class="form-group">
                        <textarea name ="isi" class="form-control" id="comment" rows="3" minlength="10" required=required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">KIRIM</button>	
                  </form>
                @else
                  <h6 class="">*Admin tidak bisa memberikan komentar</h6>
                @endif
              @endauth

              @guest
              
                <h6 class="">*Harus Login sebagai penulis untuk Komentar</h6>
              @endguest
            </div>
        </div>
      </div>
    </div>
    <br><br>
    <a class="btn btn-lg btn-info tombol4" href="{{ url('/') }}">Kembali ke Halaman Utama</a>

@endsection