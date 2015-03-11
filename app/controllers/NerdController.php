<?php

class NerdController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{		// get all the nerds
		$nerds = Nerd::all();

		// load the view and pass the nerds
        
		return View::make('nerds.index')
			->with('nerds', $nerds);
	
	}

		public function getActive()
	{		// get all the nerds
		$nerds = Nerd::where('nerd_level', 1)->get();

		// load the view and pass the nerds
        
		return View::make('nerds.index')
			->with('nerds', $nerds);
	
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

public function getDatatable(){

        return Datatable::collection(Nerd::all())
        ->showColumns('id', 'name', 'email', 'nerd_level', 'action')
        ->searchColumns('name', 'email', 'nerd_level')
        ->orderColumns('id','name', 'email', 'nerd_level')
        ->addColumn('action', function ( $model ) {
			return '<a href="' . URL::to( 'nerds/show/' . $model->id ) . '"> <i class=" btn btn-success fa fa-folder-open-o"></i></a>
                    <a href="' . URL::to( 'nerds/edit/' . $model->id ) . '"> <i class="btn btn-info fa fa-pencil-square-o"></i></a>
                    <a class="js-confirm" href="' . URL::to( 'nerds/' . $model->id . '/destroy' ) . '"> <i class="btn btn-danger fa fa-trash-o"></i></a>';
                            })
        ->make();
}



	public function getTable()
	{		// get all the nerds
		$nerds = Nerd::all();

		// load the view and pass the nerds
        
		return View::make('nerds.table')
			->with('nerds', $nerds);
	
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		// load the create form (app/views/nerds/create.blade.php)
		return View::make('nerds.create');
	}
	public function postStore() {
		if ( Session::token() !== Input::get( '_token' ) ) {
			return Response::json( array(
				'msg'=>'Unathoriized attempt to create nerd'
				));
		}

		$name = Input::get('name');
		$email = Input::get('email');
		$nerd_level = Input::get('nerd_level');

		$nerd = new Nerd(Input::all());

		$nerd->save();

		$response = array(
			'status'=>'success',
			'msg'=>'created OK'
			);
		return Response::json( $response );

	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	/*
	public function postStore()
	{
				$rules = array(
			'name'       => 'required',
			'email'      => 'required|email',
			'nerd_level' => 'required|numeric'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('nerds/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$nerd = new Nerd(Input::all());

			$nerd->save();


			Mail::send('nerds.email', array('name'=>Input::get('name'), 'email'=>Input::get('email'), 'nerd_level'=>Input::get('nerd_level')), function($message){
            $message->to(Input::get('email'), Input::get('name'))->subject('New Team added to Matrix');
            });
			// redirect
			Session::flash('message', 'Successfully created nerd!');
			return Redirect::to('nerds');
		}
	}
*/
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getShow($id)
	{
				// get the nerd
		$nerd = Nerd::find($id);

		// show the view and pass the nerd to it
		return View::make('nerds.show')
			->with('nerd', $nerd);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit($id)
	{
		// get the nerd
		$nerd = Nerd::find($id);

		// show the edit form and pass the nerd
		return View::make('nerds.edit')
			->with('nerd', $nerd);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postEdit($id)
	{
				// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'name'       => 'required',
			'email'      => 'required|email',
			'nerd_level' => 'required|numeric'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('nerds/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$nerd = Nerd::find($id);
			$nerd->name       = Input::get('name');
			$nerd->email      = Input::get('email');
			$nerd->nerd_level = Input::get('nerd_level');
			$nerd->save();

			// redirect
			Session::flash('message', 'Successfully updated nerd!');
			return Redirect::to('nerds');
		}
	}
	public function getCopy($id)
	{
		// get the nerd
		$nerd = Nerd::find($id);

		// show the edit form and pass the nerd
		return View::make('nerds.copy')
			->with('nerd', $nerd);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postCopy($id)
	{
				// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'name'       => 'required',
			'email'      => 'required|email',
			'nerd_level' => 'required|numeric'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('nerds/' . $id . '/copy')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$nerd = new Nerd;
			$nerd->name       = Input::get('name');
			$nerd->email      = Input::get('email');
			$nerd->nerd_level = Input::get('nerd_level');
			$nerd->save();

			// redirect
			Session::flash('message', 'Successfully updated nerd!');
			return Redirect::to('nerds');
		}
	}
	public function postSend($id) {
			$nerd = Nerd::find($id);

			$id = $nerd->id;
			$name = $nerd->name;
   			$email = $nerd->email;
   			$nlevel = $nerd->nerd_level;
   			$email_to = Config::get('sending.email_to');

			$data = array(
				'id'=>$id,
			    'name'=>$name, 
			    'email'=>$email, 
			    'nerd_level'=>$nlevel,
			    'email_to' =>$email_to
			);
			

			Mail::later(300, 'nerds.email', $data, function($message) use ($id, $name, $email, $nlevel, $email_to) {
            $message->to($email_to)->subject('New nerd added to Matrix - ' . $name . ' - ' . $nlevel);
            });
			Session::flash('message', 'Successfully sent information about ' . $name);
			return Redirect::to('nerds');
	}
	public function postDestroy($id)
	{
		// delete
		$nerd = Nerd::find($id);
		$nerd->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the nerd!');
		return Redirect::to('nerds');
	}




	public function getUpload() {

		return View::make('nerds.import');
	}



public function postUpload() {
 		$file = Input::file('file');

 		if ($file->fails()) {
			return Redirect::to('nerds/import')
				->withErrors('kaput'); }
				else {
		$destinationPath = 'uploads';
		// If the uploads fail due to file system, you can try doing public_path().'/uploads' 
		$filename = str_random(12);
		//$filename = $file->getClientOriginalName();
		//$extension =$file->getClientOriginalExtension(); 
		$csvFile = Input::file('file')->move($destinationPath, $filename);
    
 
        $csv = $this->readCSV($csvFile);
        }

        foreach ($csv as $listings) {
 
            $nerd= new Nerd;
 
            $nerd->name= (isset($listings[0]) ? $listings[0] : '');
            $nerd->email = (isset($listings[1]) ? $listings[1] : '');
            $nerd->nerd_level= (isset($listings[2]) ? $listings[2] : '');
            
            $nerd->save();
            echo $listings[0] . 'recorded added <br />';
        }
        echo 'done';
    }
 
    public function readCSV($csvFile) {
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $line_of_text[] = fgetcsv($file_handle, 1024);
        }
        fclose($file_handle);
        return $line_of_text;
    }
     
     }