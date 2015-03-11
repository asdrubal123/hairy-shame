<?php

class MylinksController extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
	}
	public function getLinks($username){

    $user = User::where('firstname', Auth::user()->firstname)->firstOrFail();

    return View::make('mylinks.index')->with('user', $user);
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), Link::$rules);

		if ($validator->passes()) {
			$link = new Link;
			$link->name = Input::get('name');
			$link->status = Input::get('status');
			$link->url = Input::get('url');
			$link->save();                     

			$link->users()->sync(array(Auth::user()->id));                                           

			return Redirect::to('mylinks/index')
				->with('message', 'Link Added');
		}

		return Redirect::to('mylinks/index')
			->with('message', 'Opps something went wrong')
			->withErrors($validator)
			->withInput();
	}

	public function postEdit() {
		$link = Link::find(Input::get('id'));

		if ($link) {
			$link->name = Input::get('name');
			$link->status = Input::get('status');
			$link->url = Input::get('url');
			$link->update(Input::all());
			$link->save();

			return Redirect::to('mylinks/index')
				->with('message', 'Link updated');
		}

		return Redirect::to('mylinks/index')
			->with('message', 'Opps something went wrong');

	}




	public function postDestroy() {
		$link = Link::find(Input::get('id'));



		if ($link) {
			$link->delete();

			$link->users()->detach();

			return Redirect::to('mylinks/index')
				->with('message', 'Link deleted');
		}

		return Redirect::to('mylinks/index')
			->with('message', 'Opps something went wrong');
    }
}