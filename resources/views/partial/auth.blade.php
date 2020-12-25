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
	<link rel="stylesheet" type="text/css" href="{{ asset('logindaftar/style.css') }}">
	<title>@yield('title')</title>
</head>
<body>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>
                {{ $error }}
            </div>
        @endforeach
    @endif

    @yield('content')
</body>
</html>
