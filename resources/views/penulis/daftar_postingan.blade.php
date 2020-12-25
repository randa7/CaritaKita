@extends('partial.dashboard_penulis')

@section('menu')
<a href="{{ url('/penulis/dashboard') }}"><i class="fas fa-desktop"></i>Dashboard</a>
<a href="{{ url('/penulis/editprofile') }}"><i class="fas fa-pencil-alt"></i>Edit Profil</a>
<a href="{{ url('/penulis/post') }}"  class="active"><i class="fas fa-desktop"></i>Daftar Postingan</a>
 <a href="{{ url('/penulis/tambahpost') }}"><i class="fas fa-book"></i>Tambah Postingan</a>
@endsection

@section('content')

  <div class="container" style="margin-left: 8%;">
    <div class="row">
        @foreach ($post as $p)
        <div class="col-md-4">
            <div class="single-blog-item" style=" background-color: white;">
                <div class="blog-thumnail">
                    <a href=""><img src="{{ Storage::url($p->file_gambar) }}" alt="blog-img" style="height: 50%"></a>
                </div>

                <div class="blog-content">
                    <h4><a href="#">{{ $p->judul }}</a></h4>
                    <p class="blog-text">{{ substr($p->isipost, 0, 80) }} ....</p>
                    <a href="/cetak/{{ $p->idpost }}"><button name="generate" class="btn btn-primary" ><i class="fas fa-print"></i></button></a>
                    <a href="/penulis/edit/{{ $p->idpost }}"><button name="edit" class="btn btn-primary">Edit</button></a>
                    <a href="/penulis/hapus/{{ $p->idpost }}"><button name="hapus" class="btn btn-danger">Hapus</button></a>
                </div>
            </div>
            <span class="blog-date">{{ $p->tgl_insert }}</span>
        </div>

    @endforeach

@endsection