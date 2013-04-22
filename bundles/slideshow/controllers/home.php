<?php

use Laravel\Redirect,
    Laravel\Auth;

class Slideshow_Home_Controller extends Slideshow_Base_Controller
{

	public function action_index()
	{
	    if (Auth::guest()) {
		    return Redirect::to('slideshow/home/login');
	    }

	    return View::make('slideshow::home.index');

	}

	public function action_login()
	{
	    $username = Input::get('username');
	    $password = Input::get('password');

	    if ($username || $password) {
            $userdata = array(
                'username' => $username,
                'password' => $password
            );

            if ( Auth::attempt($userdata) ) {
                return Redirect::to('slideshow/home/index');
            } else {
                return Redirect::to('slideshow/home/login')->with('login_errors', true);
            }
	    }

		return View::make('slideshow::home.login');
	}

	public function action_logout()
	{
	    Auth::logout();
	    return Redirect::to('slideshow/home/login');
	}

    public function action_setup()
	{
	    	if (Auth::guest()) {
		    return Redirect::to('slideshow/home/login');
	    }

        return View::make('slideshow::home.setup');
	}

}