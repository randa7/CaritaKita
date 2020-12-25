@extends('partial.admin')

@section('menu')
	<a href="{{ url('/admin/dashboard') }}"><i class="fas fa-desktop"></i>Dashboard</a>
	<a href="{{ url('/admin/data_kategori') }}"><i class="fas fa-book"></i>Data Kategori</a>
	<a href="{{ url('/admin/data_penulis') }}" class="active"><i class="fas fa-pencil-alt"></i>Data Penulis</a>
	<a href="{{ url('/admin/editprofil') }}"><i class="fas fa-user-edit"></i>Edit Profil</a>
@endsection

@section('content')
	<div class="card password">
		<form method="post" action="">
			@csrf
			<div class="card-header" style="font-weight: bold;">{{ $penulis->user->nama }}</div>
			<div class="card-body">
				<label style="margin-bottom: 10px">Password Baru</label>
				<input type="text" class="form-control form-pass" name="password" placeholder="Password">
				<button class="btn btn-primary editpassword" type="submit">Edit</button>
			</div>
		</form>
	</div>
@endsection