<?php

class Slideshow_Franz_Controller extends Base_Controller {

	public function action_index()
	{
	    echo "franz index";
		return View::make('slideshow::franz.index');
	}


}