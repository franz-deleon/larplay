@layout('slideshow::home.template')

@section('extra_js')
<script>
$(function() {
	$('.album_order').change(function() {
		var cur_val = $(this).val();
	    var cur_name = $(this).attr('name');

		$( ".album_order" ).each(function (i, el) {
		    if (cur_name != $(el).attr('name') && cur_val != 0) {
		    	if ($(el).val() == cur_val) {
			    	$(this).find('option[value="' + cur_val + '"]').attr("selected", false);
		    	}
		    }
		});
	});

	$('#submit').click(function() {
		var pass = true;
		$( ".album_order" ).each(function (i, el) {
			if ($(el).val() == 0) {
				$('#form_error').removeClass('hidden').html('one of the order field is blank');
				pass = false;
			    return false;
			}
		});
		if (pass == true) {
			$('#submit').attr('type', 'submit');
		}
	});

});
</script>
@endsection

@section('content')
<div class="header container"><h1>Setup Slideshow Order</h1></div>

<div class="container content ui-corner-all ui-widget-content">
    {{ Form::open('/slideshow/home/setup', 'POST', array('id' => 'slideshow_order2')) }}
        <!-- check for login errors flash var -->

        <span id="form_error" class="ui-state-error @if (!Session::has('login_errors')) hidden @endif">error</span>

        <!-- username field -->
        <p>{{ Form::label('Kelly', 'Kelly Album') }}</p>
        <p>{{ Form::select('albumid-0', array('', '1' => '1', '2' => '2', '3' => '3'), null, array('class' => 'album_order')) }}</p>

        <p>{{ Form::label('Allison', 'Allison Album') }}</p>
        <p>{{ Form::select('albumid-1', array('', '1' => '1', '2' => '2', '3' => '3'), null, array('class' => 'album_order')) }}</p>

        <p>{{ Form::label('Allison', 'Allison Album') }}</p>
        <p>{{ Form::select('albumid-2', array('', '1' => '1', '2' => '2', '3' => '3'), null, array('class' => 'album_order')) }}</p>
        <!-- submit button -->
        <p>{{ Form::input('button', 'Submit', 'submit', array('id' => 'submit')) }}</p>
    {{ Form::close() }}
</div>
@endsection
