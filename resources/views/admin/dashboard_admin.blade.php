@extends('partial.admin')

@section('menu')
	<a href="{{ url('/admin/dashboard') }}" class="active"><i class="fas fa-desktop"></i>Dashboard</a>
	<a href="{{ url('/admin/data_kategori') }}"><i class="fas fa-book"></i>Data Kategori</a>
	<a href="{{ url('/admin/data_penulis') }}"><i class="fas fa-pencil-alt"></i>Data Penulis</a>
	<a href="{{ url('/admin/editprofil') }}"><i class="fas fa-user-edit"></i>Edit Profil</a>
@endsection

@section('content')
    <h4 style="margin-top: 50px;margin-left: 335px;">REKAP JUMLAH POSTINGAN</h4>
    <table class="table table-dashboard">
        <thead>
            <tr>
                <th>
                    Kategori
                </th>
                <th style="width: 60%">
                    Banyak postingan
                </th>
            </tr>
        </thead>

        <tbody>
            @foreach ($kategori as $k)
                <tr>
                    <td>
                        {{ $k->nama }}
                    </td>
                    <td>
                        {{ $k->post_count }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
