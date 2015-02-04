<?php

class PagesController extends \BaseController {

	public function about(){
		return View::make('pages.about');
	}

	public function services(){
		return View::make('pages.services');
	}

	public function contact(){
		return View::make('pages.contact');
	}
}
