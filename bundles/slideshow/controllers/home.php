<?php

use Laravel\Redirect,
    Laravel\Auth;
use Laravel\Cache;

class Slideshow_Home_Controller extends Slideshow_Base_Controller
{

    public function action_index()
    {
        $photos = DB::table('photos')->left_join('albums', 'photos.album_id', '=', 'albums.id')
            ->order_by('albums.order', 'asc')
            ->order_by('photos.order', 'asc')
            ->get(array('albums.id', 'albums.name', 'photos.source'));

        return View::make('slideshow::home.index', array('photos' => $photos));
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
        $albums = Cache::remember('albums', function () {
            return Album::order_by('order', 'asc')->get();
        }, 5);

        return View::make('slideshow::home.setup', array('albums' => $albums));
    }

    public function action_setup_post()
    {
        $albums = Input::get('album');
        $cachedAlbums = Cache::get('albums');

        foreach ($cachedAlbums as $album) {
            $album->order = $albums[$album->id];
            $album->save();
        }

        Cache::forget('albums');
        $albums = Cache::remember('albums', function () {
            return Album::order_by('order', 'asc')->get();
        }, 5);

        return Redirect::to_action("slideshow::home.index");
    }

}