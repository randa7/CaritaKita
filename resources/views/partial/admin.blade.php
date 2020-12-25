<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="bs/jquery.min.js"></script>
    <script src="bs/popper.min.js"></script>
    <script src="bs/js/bootstrap.min.js"></script>
	<link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/style.css') }}">
	<title>Dashboard Admin</title>
</head>
<body>
    <header>
        <div class="judul">DASHBOARD ADMIN</span></div>
        <a href="{{ url('/') }}" class="btn btn-primary btn-home">Home</a>
        <a href="/logout" class="btn btn-danger btn-logout">Logout</a>    
    </header>
    <div class="container dashboard">
        <div class="row" style="height: 100%; margin-bottom: -70px">
            <div class="col-sm menu">
                <div class="container">
                    @yield('menu')
                </div>
            </div>
            <div class="col-sm">  
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div>
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
