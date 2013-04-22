@layout('slideshow::home.template')

@section('content')
<div class="header container"><h1>LarPlay</h1></div>

<div class="container content ui-corner-all ui-widget-content">
    {{ Form::open('/slideshow/home/login') }}
        <!-- check for login errors flash var -->
        @if (Session::has('login_errors'))
        <span class="ui-state-error">Username or password incorrect.</span>
        @endif
        <!-- username field -->
        <p>{{ Form::label('username', 'Username') }}</p>
        <p>{{ Form::text('username') }}</p>
        <!-- password field -->
        <p>{{ Form::label('password', 'Password') }}</p>
        <p>{{ Form::password('password') }}</p>
        <!-- submit button -->
        <p>{{ Form::submit('Login', array('id' => 'submit')) }}</p>
    {{ Form::close() }}
</div>
@endsection
