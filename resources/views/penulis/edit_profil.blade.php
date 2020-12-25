@extends('partial.dashboard_penulis')

@section('menu')
<a href="{{ url('/penulis/dashboard') }}"><i class="fas fa-desktop"></i>Dashboard</a>
<a href="{{ url('/penulis/editprofile') }}" class="active"><i class="fas fa-pencil-alt"></i>Edit Profil</a>
<a href="{{ url('/penulis/post') }}"><i class="fas fa-desktop"></i>Daftar Postingan</a>
<a href="{{ url('/penulis/tambahpost') }}"><i class="fas fa-book"></i>Tambah Postingan</a>
@endsection

@section('content')
  
    <div class="container rounded mt-5" style="margin: 14%;">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5" style="margin-top: 30%;">
                    <span class="font-weight-bold">{{ $user->nama }}</span>
                    <span class="text-black-50">{{ $user->email }}</span>
            </div>    
        </div>

        <div class="col-md-8">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="text-right">Edit Profile</h5>
                </div>
                @if ($errors->any())
                    @foreach($errors->all() as $error)
                        <div>
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                <form method="post" action="{{ url('/penulis/editprofile') }}">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-md-6"><input type="text" class="form-control" name="nama" placeholder="Full name" value="{{ $user->nama }}"></div>
                        <div class="col-md-6"><input type="text" class="form-control" name="no_telp" placeholder="Phone number" value="{{ $penulis->no_telp }}"></div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6"><input type="text" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}"></div>
                        <div class="col-md-6"><input type="text" class="form-control" name="password" placeholder="Password" value="{{ $penulis->password }}"></div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6"><input type="text" class="form-control" name="alamat" placeholder="Alamat" value="{{ $penulis->alamat }}"></div>
                        <div class="col-md-6"><input type="text" class="form-control" name="kota" placeholder="Kota" value="{{ $penulis->kota }}"></div>
                    </div>
                    
                    <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                </form>
            </div>
        </div>
    </div>

@endsection