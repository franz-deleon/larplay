@layout('slideshow::home.template')

@section('extra_js')
<script>

$(function() {

	var maxWidth = 0;
	var leftStart = 0;
	var docWidth = $(window).width();
	$( ".slide" ).each(function (i, el) {
	    leftStart = docWidth * i;
	    $(el).css({'width' : docWidth + 'px', 'left' : leftStart + 'px'});
	});

    $('.navigation').find('li').click(function (e) {
        e.preventDefault();
        dataslide = $(this).attr('data-slide');

        $('html,body').animate({
            scrollLeft: $('.slide[data-slide="' + dataslide + '"]').offset().left
        }, 900, 'easeInOutQuint');
    });

    $.stellar();
})
</script>
@endsection

@section('content')
<div id="setup-btn" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only">{{ HTML::link_to_action('slideshow::home.setup', 'setup') }}</div>

<ul class="navigation">
<?php $albumid = ''; ?>
@foreach ($photos as $photo)
    @if ($albumid != $photo->id)
    <li data-slide="{{ $photo->id }}">{{ $photo->name }}</li>
    @endif
    <?php $albumid = $photo->id; ?>
@endforeach
</ul>

<?php $albumid = ''; ?>
@foreach ($photos as $key => $photo)
    @if ($albumid != $photo->id && $key !== 0)</div></div>@endif
    @if ($albumid != $photo->id)<div id="slide{{ $photo->id }}" class="slide" data-slide="{{ $photo->id }}"><div class="wrapper">@endif
    <?php $albumid = $photo->id; ?>
    <img src="/img/photos/{{ strtolower($photo->name) }}/{{ $photo->source }}" alt="" />
@endforeach
</div>

@endsection