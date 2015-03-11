<?php

class LinkController extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('admin');
	}

	public function all() {

		$pages = 10;

	
		$links = Link::where('status', 1)->paginate($pages);

		$html = View::make('links.list', compact('links'))->render();
		
		return Response::json(['html' => $html, 'empty' => count($links) == 0]);
	}

	public function getIndex() {
		return View::make('links.index');
			//->with('links', Link::all());
	}

	public function store() {

		

		$validator = Validator::make(Input::all(), Link::$rules);

		$data = [ 'status' => null, 'message' => null, 'errors' => null ];

		if ($validator->passes()) {
			$link = new Link;
			$link->name = Input::get('name');
			$link->status = Input::get('status');
			$link->url = Input::get('url');
			$link->save();                                                                

			$data['status'] = true;
			$data['message'] = 'Link added!';
		} else {

			$errors = $validator->messages();
			$data['errors'] = implode('', $errors->all('<ul><li>:message</li></ul>'));
			$data['status'] = false;
		}
		return Response::json($data);	
	}

	public function edit($id) {

		$link = Link::find($id);

		$html = View::make('links.edit')->with('link', $link)->render();
		
		return Response::json(['html' => $html]);
	}
	public function update($id) {

		$link = Link::find($id);

		$validator = Validator::make(Input::all(), Link::$rules);

		$data = [ 'status' => null, 'errors' => null ];

		if ($validator->passes()) {
			$link->name = Input::get('name');
			$link->status = Input::get('status');
			$link->url = Input::get('url');
			$link->update(Input::all());
			$link->save();

			$data['status'] = true;
			$data['message'] = 'Link updated!';
		} else {

			$errors = $validator->messages();
			$data['errors'] = implode('', $errors->all('<ul><li>:message</li></ul>'));
			$data['status'] = false;
		}

		return Response::json($data);
	}




	public function destroy($id) {

		Link::find($id)->delete();


    }
}