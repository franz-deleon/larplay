<!doctype html>
<html lang="us">
<head>
	<meta charset="utf-8">
	<title>LarPlay</title>
	<link href="css/dark-hive/jquery-ui-1.10.2.custom.css" rel="stylesheet">
	<script src="js/jquery-1.9.1.js"></script>
	<script src="js/jquery-ui-1.10.2.custom.js"></script>

</head>
<body>

    {{ Form::open('/slideshow/home/login') }}
        <!-- check for login errors flash var -->
        @if (Session::has('login_errors'))
        <span class="error">Username or password incorrect.</span>
        @endif
        <!-- username field -->
        <p>{{ Form::label('username', 'Username') }}</p>
        <p>{{ Form::text('username') }}</p>
        <!-- password field -->
        <p>{{ Form::label('password', 'Password') }}</p>
        <p>{{ Form::password('password') }}</p>
        <!-- submit button -->
        <p>{{ Form::submit('Login') }}</p>
    {{ Form::close() }}

</body>
</html>
