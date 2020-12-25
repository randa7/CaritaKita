@extends('partial.admin')

@section('menu')
	<a href="{{ url('/admin/dashboard') }}"><i class="fas fa-desktop"></i>Dashboard</a>
	<a href="{{ url('/admin/data_kategori') }}"><i class="fas fa-book"></i>Data Kategori</a>
	<a href="{{ url('/admin/data_penulis') }}"><i class="fas fa-pencil-alt"></i>Data Penulis</a>
	<a href="{{ url('/admin/editprofil') }}" class="active"><i class="fas fa-user-edit"></i>Edit Profil</a>
@endsection

@section('content')
    <div class="center card-profil" style="margin-left: 200px;margin-top:40px">
        <div class="card-body">  
        	<form method="post" action="{{ url('/admin/editprofil') }}">
        		@csrf
            	<table class="edit">
            		<tr>
            			<td><i class="fas fa-user"></i></td>
            			<td>
            				<input type="text" class="form-control" name="nama" autofocus placeholder="Nama" value="{{ $user->nama }}">
            			</td>
            		</tr>
            		<tr>
            			<td><i class="fas fa-envelope"></i></td>
            			<td>
            				<input type="text" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}">
            			</td>
            		</tr>
            		<tr>
            			<td><i class="fas fa-key"></i></td>
            			<td>
            				<input type="text" class="form-control" name="password" placeholder="Password">
            			</td>
            		</tr>
            		<tr>
            			<td colspan="2">
            				<center>
            					<button type="submit" class="btn btn-primary btn-edit" name="submit" value="submit">Edit</button>
            				</center>
            			</td>
            		</tr>
            	</table>
        	</form>
        </div>	
    </div>
@endsection