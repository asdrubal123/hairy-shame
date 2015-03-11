<?php

class ProgramController extends BaseController {
     
	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$programs = Program::all();

		// load the view and pass the nerds
		return View::make('programs.index')
			->with('programs', $programs);
	}
	public function getActive()
	{

		$programs = Program::where('active', 1)->get();

		// load the view and pass the nerds
		return View::make('programs.index')
			->with('programs', $programs);
	}
	public function getCountry($cou_id) {
		return View::make('programs.index')
			->with('programs', Program::where('country_id', '=', $cou_id)->where('active', 1)->paginate(5))
			->with('country', Country::find($cou_id));
	}
    public function table()
	{		// get all the nerds
		$programs = Program::all();

		// load the view and pass the nerds
        
		return View::make('programs.table')
			->with('programs', $programs);
	
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$countries = array();

		foreach(Country::all() as $country) {
			$countries[$country->id] = $country->name;
		}
		$priorities = array();

		foreach(Priority::all() as $priority) {
			$priorities[$priority->id] = $priority->priority;
		}

		$teams = array();

		foreach(Team::all() as $team) {
			$teams[$team->id] = $team->team;
		}

		return View::make('programs.create')
			->with('countries', $countries)
			->with('priorities', $priorities)
			->with('teams', $teams);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{


		$validator = Validator::make(Input::all(), Program::$rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('admin/programs/create')
				->withErrors($validator)
				->withInput();
		} else {
			// store
			$program = new Program;
			$program->name = Input::get('name');
			$program->description = Input::get('description');
			$program->country_id = Input::get('country_id');
			$program->priority_id = Input::get('priority_id');
			$program->team_id = Input::get('team_id');
			$program->level1_comment = Input::get('level1_comment');
			$program->level2_team_id = Input::get('level2_team_id');
			$program->level2_comment = Input::get('level2_comment');
			$program->level3_team_id = Input::get('level3_team_id');
			$program->level3_comment = Input::get('level3_comment');
			$program->active = Input::get('active');
			$program->save();

			Mail::later(60, 'programs.email', array('name'=>Input::get('name'), 'description'=>Input::get('description'), 'priority_id'=>Input::get('priority_id')), function($message){
            $message->to('k.kaczmarski@outlook.com')->subject('New program added to Matrix');
            });

		
			// redirect
			Session::flash('message', 'Successfully created Application!');
			return Redirect::to('admin/programs');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
						// get the team
		$program = Program::find($id);

		// show the view and pass the team to it
		return View::make('programs.show')
			->with('program', $program);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
				// get the team
		$program = Program::find($id);

		$countries = array();

		foreach(Country::all() as $country) {
			$countries[$country->id] = $country->name;
		}
		$priorities = array();

		foreach(Priority::all() as $priority) {
			$priorities[$priority->id] = $priority->priority;
		}

		$teams = array();

		foreach(Team::all() as $team) {
			$teams[$team->id] = $team->team;
		}

		// show the edit form and pass the team
		return View::make('programs.edit')
			->with('program', $program)
			->with('countries', $countries)
			->with('priorities', $priorities)
			->with('teams', $teams);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
						// validate
		// read more on validation at http://laravel.com/docs/validation

		$validator = Validator::make(Input::all(), Program::$rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('admin/programs/' . $id . '/edit')
				->withErrors($validator)
				->withInput();
		} else {
			// store
			$program = Program::find($id);
			$program->name = Input::get('name');
			$program->description = Input::get('description');
			$program->country_id = Input::get('country_id');
			$program->priority_id = Input::get('priority_id');
			$program->team_id = Input::get('team_id');
			$program->level1_comment = Input::get('level1_comment');
			$program->level2_team_id = Input::get('level2_team_id');
			$program->level2_comment = Input::get('level2_comment');
			$program->level3_team_id = Input::get('level3_team_id');
			$program->level3_comment = Input::get('level3_comment');
			$program->active = Input::get('active');
			$program->save();


			// redirect
			Session::flash('message', 'Successfully updated application!');
			return Redirect::to('admin/programs');
		}
	}

	public function getCopy($id)
	{
				// get the team
		$program = Program::find($id);

		$countries = array();

		foreach(Country::all() as $country) {
			$countries[$country->id] = $country->name;
		}
		$priorities = array();

		foreach(Priority::all() as $priority) {
			$priorities[$priority->id] = $priority->priority;
		}

		$teams = array();

		foreach(Team::all() as $team) {
			$teams[$team->id] = $team->team;
		}

		// show the edit form and pass the team
		return View::make('programs.copy')
			->with('program', $program)
			->with('countries', $countries)
			->with('priorities', $priorities)
			->with('teams', $teams);
	}

		public function postCopy($id)
	{
						// validate
		// read more on validation at http://laravel.com/docs/validation

		$validator = Validator::make(Input::all(), Program::$rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('admin/programs/' . $id . '/copy')
				->withErrors($validator)
				->withInput();
		} else {
			// store
			$program = new Program;
			$program->name = Input::get('name');
			$program->description = Input::get('description');
			$program->country_id = Input::get('country_id');
			$program->priority_id = Input::get('priority_id');
			$program->level1_team_id = Input::get('team_id');
			$program->level1_comment = Input::get('level1_comment');
			$program->level2_team_id = Input::get('level2_team_id');
			$program->level2_comment = Input::get('level2_comment');
			$program->level3_team_id = Input::get('level3_team_id');
			$program->level3_comment = Input::get('level3_comment');
			$program->active = Input::get('active');
			$program->save();


			// redirect
			Session::flash('message', 'Successfully clone application!');
			return Redirect::to('admin/programs');
		}
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
				// delete
		$program = Program::find($id);
		$program->delete();

		// redirect
		Session::flash('message', 'Successfully deleted application!');
		return Redirect::to('admin/programs');
	}

	public function toggleActive($id) {
		$program = Program::find($id);

		if ($program) {
			$program->active = Input::get('active');
			$program->save();
			return Redirect::to('admin/programs')
				->with('message', 'Program updated');
		}
		return Redirect::to('admin/programs/create')
			->with('message', 'Invalid Program');
	}
public function getDatatable(){

        return Datatable::collection(Program::all())
        ->showColumns('id', 'name', 'description')
        ->searchColumns('name', 'description')
        ->orderColumns('id','name', 'description')
        ->addColumn('action', function ( $model ) {
			return '<a href="' . URL::to( 'nerds/show/' . $model->id ) . '"> <i class=" btn btn-success fa fa-folder-open-o"></i></a>
                    <a href="' . URL::to( 'nerds/edit/' . $model->id ) . '"> <i class="btn btn-info fa fa-pencil-square-o"></i></a>
                    <a class="js-confirm" href="' . URL::to( 'nerds/' . $model->id . '/destroy' ) . '"> <i class="btn btn-danger fa fa-trash-o"></i></a>';
                            })
        ->make();
}
}