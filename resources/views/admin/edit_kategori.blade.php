@extends('partial.admin')

@section('menu')
	<a href="{{ url('/admin/dashboard') }}"><i class="fas fa-desktop"></i>Dashboard</a>
	<a href="{{ url('/admin/data_kategori') }}" class="active"><i class="fas fa-book"></i>Data Kategori</a>
	<a href="{{ url('/admin/data_penulis') }}"><i class="fas fa-pencil-alt"></i>Data Penulis</a>
	<a href="{{ url('/admin/editprofil') }}" ><i class="fas fa-user-edit"></i>Edit Profil</a>
@endsection

@section('content')
	<div class="card card-kategori">
		<form method="post" action="">
			@csrf
			<div class="card-header" style="font-weight: bold;">{{ $kategori->nama }}</div>
			<div class="card-body">
				<input type="text" class="form-control" name="nama" value="{{ $kategori->nama }}" style="width: 60%">
				<button class="btn btn-primary btn-kategori" type="submit">Edit</button>
			</div>
		</form>
	</div>
@endsection 