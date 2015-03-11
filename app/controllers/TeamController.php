<?php

class TeamController extends \BaseController {
     
	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('admin', array('except'=>array('userindex', 'usershow')));
	}

	public function getIndex() {
		$teams = Team::all();

		return View::make('teams.index')
			->with('teams', Team::orderBy('created_at', 'DESC')->paginate(5));
	}

	public function getCreate() {

		return View::make('teams.create');
	}

	public function postStore() {
		$validator = Validator::make(Input::all(), Team::$rules);

	
		if ($validator->fails()) {
			return Redirect::to('admin/teams/create')
			    ->with('message', 'Opps something went wrong')
				->withErrors($validator)
				->withInput();
		} else {
		
			$team = new Team(Input::all());
			
			$team->save();


			Session::flash('message', 'Successfully created !');
			return Redirect::to('admin/teams');
		}

	}

	public function getShow($id) {
		$team = Team::find($id);

		return View::make('teams.show')
			->with('team', $team);

	}

	public function getEdit($id) {
		$team = Team::find($id);

		return View::make('teams.edit')
			->with('team', $team);
	}

	public function postEdit($id) {
		$validator = Validator::make(Input::all(), Team::$rules);


		if ($validator->fails()) {
			return Redirect::to('admin/teams/edit/' . $id)
				->withErrors($validator)
				->withInput();
		} else {
	

			$post_data = Input::all();
			$team = Team::find($id)->update($post_data);

		

			// redirect
			Session::flash('message', 'Successfully updated !');
			return Redirect::to('admin/teams');
		}


	}

	public function getCopy($id) {
		$team = Team::find($id);

		return View::make('teams.copy')
			->with('team', $team);

	}

	public function postCopy($id) {
		$validator = Validator::make(Input::all(), Team::$rules);

	
		if ($validator->fails()) {
			return Redirect::to('admin/teams/copy/' . $id)
				->withErrors($validator)
				->withInput();
		} else {
		
			$team = new Team(Input::all());
			
			$team->save();

		

			Session::flash('message', 'Successfully copied!');
			return Redirect::to('admin/teams');
		}
	}

	public function postSend($id) {
			$team = Team::find($id);

			$id = $team->id;
			$name = $team->name;
			$description = $team->description;
			$timetable = $team->timetable;
			$phone = $team->phone;
			$email = $team->email;
			$e1_tl = $team->e1_tl;
			$e1_mobile = $team->e1_mobile;
			$e1_email1 = $team->e1_email1;

   			$email_to = Config::get('sending.email_to');

			$data = array(
				'id'=>$id,
			    'name'=>$name, 
			    'description'=>$description,
			    'timetable'=>$timetable,
			    'phone'=>$phone,
			    'email'=>$email,
			    'e1_tl'=>$e1_tl,
			    'e1_mobile'=>$e1_mobile,
			    'e1_email1'=>$e1_email1,
			    'email_to' =>$email_to
			);
			

			Mail::later(300, 'teams.email', $data, function($message) use ($id, $name, $email_to) {
            $message->to($email_to)->subject('New Team added to Matrix - ' . $name);
            });
			Session::flash('message', 'Successfully sent information about ' . $name);
			return Redirect::to('admin/teams');


	}

	public function postDestroy($id) {

		$team = Team::find($id);
		$team->delete();

		Session::flash('message', 'Successfully deleted!');
		return Redirect::to('admin/teams');
	}


	public function getTable() {
				return View::make('teams.datatable');
		

	}
	public function getDatatable() {
		
		return Datatable::collection(Team::all())
        ->showColumns('id', 				'name',	
				'status', 
				'description', 
				'servicelevel', 
				'customer', 
				'timetable', 
				'phone', 
				'email', 
				'free1',  
				'e1_tl',
				'e1_phone',
				'e1_mobile',
				'e1_email1',
				'e1_email2',
				'e1_comments',
				'e2_tl',
				'e2_phone',
				'e2_mobile',
				'e2_email1',
				'e2_email2',
				'e2_comments',
				'e3_tl',
				'e3_phone',
				'e3_mobile',
				'e3_email1',
				'e3_email2',
				'e3_comments',
				'global_comment', 'action')
        ->searchColumns('name')
        ->orderColumns('id','name')
        ->addColumn('action', function ( $model ) {
			return '<a href="' . URL::to( 'admin/teams/show/' . $model->id ) . '"> <i class=" btn btn-success fa fa-search-plus"></i></a>
                    <a href="' . URL::to( 'admin/teams/edit/' . $model->id ) . '"> <i class="btn btn-info fa fa-pencil-square-o"></i></a>
                    <a class="js-confirm" href="' . URL::to( 'admin/teams/' . $model->id . '/destroy' ) . '"> <i class="btn btn-danger fa fa-trash-o"></i></a>';
                            })
        ->make();

	}

	public function getSoftDeleted() {

		$teams = Team::onlyTrashed()->orderBy('deleted_at', 'DESC')->paginate(5);

		return View::make('teams.trash')
			->with('teams', $teams);

	}
	public function restore($id)
	{
		$team = Team::withTrashed()->find($id);
		$team->restore();
	

		Session::flash('message', 'Successfully restored!');
		return Redirect::to('admin/teams');
	}


	public function exportteams() {
		

		Excel::create('teams', function($excel) {
			$excel->sheet('teams', function($sheet) {
				$teams = Team::orderBy('created_at', 'desc')->get();

				$sheet->loadView('teams.xlsx', ['teams'=> $teams->toArray()]);
			});

         })->download('xlsx');

	}
	public function getUpload() {

		return View::make('teams.import');
	}



	public function postUpload() {
 		$file = Input::file('file');
		$destinationPath = 'uploads';
		// If the uploads fail due to file system, you can try doing public_path().'/uploads' 
		$filename = str_random(12);
		//$filename = $file->getClientOriginalName();
		//$extension =$file->getClientOriginalExtension(); 
		$csvFile = Input::file('file')->move($destinationPath, $filename);
    
 
        $csv = $this->readCSV($csvFile);
 
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