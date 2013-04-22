<!doctype html>
<html lang="us">
<head>
	<meta charset="utf-8">
	<title>LarPlay</title>
	{{ HTML::script('js/jquery-1.9.1.js') }}
	{{ HTML::script('js/jquery-ui-1.10.2.custom.js') }}
    {{ HTML::style('css/dark-hive/jquery-ui-1.10.2.custom.css') }}
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/style.css') }}

    @yield('extra_js')
</head>
<body>

@yield('content')

</body>
</html>
