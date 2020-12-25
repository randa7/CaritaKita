@extends('partial.auth')

@section('title', 'Masuk')

@section('content')
	<div class="card">
	  <div class="card-header">Log-in</div>
	  <div class="card-body">
	    <form name="login" method="post" action="{{ url('login') }}">
            @csrf

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            @endif

	    	<table>
	    		<tr>
	    			<td><i class="fas fa-envelope"></i></td>
	    			<td>
	    				<input type="text" class="form-control" name="email" autofocus placeholder="Email">
	    			</td>
	    		</tr>
	    		<tr>
	    			<td><i class="fas fa-key"></i></td>
	    			<td>
	    				<input type="password" class="form-control" name="password" placeholder="Password">
	    			</td>
	    		</tr>
	    	</table>
			<button type="submit" class="btn btn-primary" name="login">Login</button>
		</form>
	  </div>
	</div>
@endsection
