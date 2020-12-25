@extends('partial.admin')

@section('menu')
	<a href="{{ url('/admin/dashboard') }}"><i class="fas fa-desktop"></i>Dashboard</a>
	<a href="{{ url('/admin/data_kategori') }}"><i class="fas fa-book"></i>Data Kategori</a>
	<a href="{{ url('/admin/data_penulis') }}" class="active"><i class="fas fa-pencil-alt"></i>Data Penulis</a>
	<a href="{{ url('/admin/editprofil') }}"><i class="fas fa-user-edit"></i>Edit Profil</a>
@endsection

@section('content')
	<a href="/admin/data_penulis/export"><button name="export" class="btn btn-success mt-3">Export</button></a>
	<h4 style="margin-top: 40px;margin-bottom: -10px;margin-left: 400px;">DAFTAR PENULIS </h4>
	<table class="table table-hover data">
		@foreach ($penulis as $p)
		<tr class="tr-warna">
			<td style="width: 550px">{{ $p->user->nama }}</td>
			<td><a href="{{ url('/admin/edit_penulis/' . $p->idpenulis) }}"><i class="fas fa-key kunci"></i></a></td>
		</tr>
		@endforeach
	</table>
@endsection