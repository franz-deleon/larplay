<?php

Autoloader::map(array(
	'Slideshow_Base_Controller' => path('bundle').'slideshow/controllers/base.php',
));

Autoloader::directories(array(
	path('bundle').'slideshow/models',
	path('bundle').'slideshow/libraries',
));