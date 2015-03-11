<?php

class PriorityController extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
	}

	public function getIndex() {
		return View::make('priorities.index')
			->with('priorities', Priority::all());
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), Priority::$rules);

		if ($validator->passes()) {
			$priority = new Priority;
			$priority->priority = Input::get('priority');
			$priority->save();

			return Redirect::to('admin/priorities/index')
				->with('message', 'Priority Added');
		}

		return Redirect::to('admin/priorities/index')
			->with('message', 'Opps something went wrong')
			->withErrors($validator)
			->withInput();
	}

	public function postEdit() {
		$priority = Priority::find(Input::get('id'));

		if ($priority) {
			$priority->priority = Input::get('priority');
			$priority->update(Input::all());
			$priority->save();

			return Redirect::to('admin/priorities/index')
				->with('message', 'Priority updated');
		}

		return Redirect::to('admin/priorities/index')
			->with('message', 'Opps something went wrong');

	}




	public function postDestroy() {
		$priority = Priority::find(Input::get('id'));

		if ($priority) {
			$priority->delete();
			return Redirect::to('admin/priorities/index')
				->with('message', 'Priority deleted');
		}

		return Redirect::to('admin/priorities/index')
			->with('message', 'Opps something went wrong');
    }
}