@extends('partial.auth')

@section('title', 'Daftar')

@section('content')
	<div class="card">
	  <div class="card-header">Registrasi</div>
	  <div class="card-body">
	    <form method="post" name="datar" action="{{ url('daftar') }}">
            @csrf
	    	<table>
	    		<tr>
	    			<td><i class="fas fa-user"></i></td>
	    			<td> <input type="text" class="form-control" name="nama" autofocus placeholder="Nama">
	    			</td>
	    		</tr>
	    		<tr>
	    			<td><i class="fas fa-envelope"></i></td>
	    			<td>
	    				<input type="text" class="form-control" name="email" placeholder="Email">
	    			</td>
	    		</tr>
	    		<tr>
	    			<td><i class="fas fa-key"></i></td>
	    			<td>
	    				<input type="password" class="form-control" name="password" placeholder="Password">
	    			</td>
	    		</tr>
	    		<tr>
	    			<td><i class="fas fa-map-marker-alt"></i></td>
	    			<td>
	    				<textarea class="form-control" name="alamat" rows="3" placeholder="Alamat"></textarea>
	    			</td>
	    		</tr>
	    		<tr>
	    			<td><i class="fas fa-city"></i></td>
	    			<td>
	    				<input type="text" class="form-control" name="kota" placeholder="Kota">
	    			</td>
	    		</tr>
	    		<tr>
	    			<td><i class="fas fa-phone-alt"></i></td>
	    			<td>
	    				<input type="text" class="form-control" name="no_telp" placeholder="Nomor Telepon">
	    			</td>
	    		</tr>
	    	</table>
			<button type="submit" class="btn btn-primary" name="submit" value="submit">Daftar</button>
		</form>
	  </div>
	</div>
@endsection
