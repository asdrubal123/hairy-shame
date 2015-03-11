<?php

class CountryController extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('admin');
	}


	public function getIndex() {
		return View::make('countries.index')
			->with('countries', Country::all());
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), Country::$rules);

		if ($validator->passes()) {
			$country = new Country;
			$country->name = Input::get('name');
			$country->save();

			return Redirect::to('admin/countries/index')
				->with('message', 'Country Added');
		}

		return Redirect::to('admin/countries/index')
			->with('message', 'Opps something went wrong')
			->withErrors($validator)
			->withInput();
	}

	public function postEdit() {
		$country = Country::find(Input::get('id'));

		if ($country) {
			$country->name = Input::get('name');
			$country->update(Input::all());
			$country->save();

			return Redirect::to('admin/countries/index')
				->with('message', 'Country updated');
		}

		return Redirect::to('admin/countries/index')
			->with('message', 'Opps something went wrong');

	}




	public function postDestroy() {
		$country = Country::find(Input::get('id'));

		if ($country) {
			$country->delete();
			return Redirect::to('admin/countries/index')
				->with('message', 'Country deleted');
		}

		return Redirect::to('admin/countries/index')
			->with('message', 'Opps something went wrong');
    }
}