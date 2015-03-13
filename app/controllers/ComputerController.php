<?php

class ComputerController extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('admin');
	}

	public function all() {



		$pages = 10;

	
		$computers = Computer::paginate($pages);

		$html = View::make('computers.list', compact('computers'))->render();
		
		return Response::json(['html' => $html, 'empty' => count($computers) == 0]);
	}

	public function getIndex() {

		$users = array();

		foreach(User::all() as $user) {
			$users[$user->id] = $user->email;
		}
		$makers = array();

		foreach(Maker::all() as $maker) {
			$makers[$maker->id] = $maker->name;
		}

		return View::make('computers.index')
			->with('users', $users)
			->with('makers', $makers);

	}

	public function getAssets($username){

    $user = User::where('email', Auth::user()->email)->firstOrFail();



    return View::make('computers.my')->with('user', $user);
	}

	public function dropdown() {

		$input = Input::get('option');

    	$maker = Maker::find($input);

   		$models = $maker->models();

    return Response::json($models->get(['id','name']));
	}

	public function store() {

		

		$validator = Validator::make(Input::all(), Computer::$rules);

		$data = [ 'status' => null, 'message' => null, 'errors' => null ];

		if ($validator->passes()) {
			$computer = new Computer;
			$computer->sn = Input::get('sn');
			$computer->cgito = Input::get('cgito');
			$computer->other = Input::get('other');
			$computer->maker_id = Input::get('make');
			$computer->model_id = Input::get('model');
			$computer->ownership = Input::get('ownership');
			$computer->user_id = Input::get('user_id');
			$computer->comments = Input::get('comments');
			$computer->save();                                                                

			$data['status'] = true;
			$data['message'] = 'Added!';
		} else {

			$errors = $validator->messages();
			$data['errors'] = implode('', $errors->all('<ul><li>:message</li></ul>'));
			$data['status'] = false;
		}
		return Response::json($data);	
	}

	public function edit($id) {

		$computer = Computer::find($id);

		$users = array();

		foreach(User::all() as $user) {
			$users[$user->id] = $user->email;
		}
		$makers = array();

		foreach(Maker::all() as $maker) {
			$makers[$maker->id] = $maker->name;
		}

		$html = View::make('computers.edit')->with('computer', $computer)->with('users', $users)->with('makers', $makers)->render();
		
		return Response::json(['html' => $html]);
	}
	public function update($id) {

		$computer = Computer::find($id);

		$validator = Validator::make(Input::all(), Computer::$rules);

		$data = [ 'status' => null, 'errors' => null ];

		if ($validator->passes()) {
			$computer->sn = Input::get('sn');
			$computer->cgito = Input::get('cgito');
			$computer->other = Input::get('other');
			$computer->maker_id = Input::get('make');
			$computer->model_id = Input::get('model');
			$computer->ownership = Input::get('ownership');
			$computer->user_id = Input::get('user_id');
			$computer->comments = Input::get('comments');
			$computer->save();

			$data['status'] = true;
			$data['message'] = 'Updated!';
		} else {

			$errors = $validator->messages();
			$data['errors'] = implode('', $errors->all('<ul><li>:message</li></ul>'));
			$data['status'] = false;
		}

		return Response::json($data);
	}




	public function destroy($id) {

		Computer::find($id)->delete();


    }
}