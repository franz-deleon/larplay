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
				$('#form_error').removeClass('hidden').html('one of the order fields is blank');
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
    {{ Form::open('/slideshow/home/setup', 'POST', array('id' => 'slideshow_order')) }}
        <!-- check for login errors flash var -->
        <span id="form_error" class="ui-state-error ui-corner-all @if (!Session::has('login_errors')) hidden @endif">error</span>
        <!-- username field -->
        @foreach ($albums as $album)
        <p>{{ Form::label($album->name, $album->name . ' Album') }}</p>
        <p>{{ Form::select("album[$album->id]", array_merge(array(''), range(1, count($albums))), null, array('class' => 'album_order')) }}</p>
        @endforeach
        <!-- submit button -->
        <p>{{ Form::input('button', 'Submit', 'submit', array('id' => 'submit')) }}</p>
    {{ Form::close() }}
</div>
@endsection
