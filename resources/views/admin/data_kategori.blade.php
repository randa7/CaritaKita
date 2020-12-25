@extends('partial.admin')

@section('menu')
	<a href="{{ url('/admin/dashboard') }}"><i class="fas fa-desktop"></i>Dashboard</a>
	<a href="{{ url('/admin/data_kategori') }}" class="active"><i class="fas fa-book"></i>Data Kategori</a>
	<a href="{{ url('/admin/data_penulis') }}"><i class="fas fa-pencil-alt"></i>Data Penulis</a>
	<a href="{{ url('/admin/editprofil') }}" ><i class="fas fa-user-edit"></i>Edit Profil</a>
@endsection

@section('content')
	<form method="post" action="/admin/data_kategori">
		@csrf
		<table style="margin-top: 20px">
			<tr>
				<td>
					<input type="text" class="form-control" name="nama" placeholder="Nama Kategori">
				</td>
				<td style="padding-left:50px;padding-bottom: 10px">
					<button class="btn btn-primary" type="submit" style="border-radius: 2px;"><i class="fas fa-plus"></i> Tambah</button>
				</td>
			</tr>
		</table>
	</form>
	<h4 style="margin-left: 400px;margin-top:40px">DAFTAR KATEGORI</h4>
	<table class="table table-hover table-kategori">
		@foreach ($kategori as $k)
		<tr class="tr-warna">
			<td style="width: 550px">{{ $k->nama }}</td>
			<td><a href="{{ url('/admin/edit_kategori/' . $k->idkategori) }}"><i class="fas fa-pencil-alt"></i></a></td>
			<td><a href="{{ url('/admin/hapus_kategori/' . $k->idkategori) }}"><i class="fas fa-trash-alt"></i></a></td>
		</tr>
		@endforeach
	</table>
@endsection