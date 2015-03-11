<?php

class ApplicationController extends \BaseController {

	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('admin', array('except'=>array('userindex', 'usershow')));
	}

	public function getIndex() {
		$applications = Application::all();

		return View::make('applications.index')
			->with('applications', Application::orderBy('created_at', 'DESC')->paginate(5));
	}

	public function getCreate() {

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
			$teams[$team->id] = $team->name;
		}

		return View::make('applications.create')
			->with('countries', $countries)
			->with('priorities', $priorities)
			->with('teams', $teams);
	}

	public function postStore() {
		$validator = Validator::make(Input::all(), Application::$rules);

	
		if ($validator->fails()) {
			return Redirect::to('admin/applications/create')
			    ->with('message', 'Opps something went wrong')
				->withErrors($validator)
				->withInput();
		} else {
		
			$application = new Application(Input::all());
			
			$application->save();


			Session::flash('message', 'Successfully created !');
			return Redirect::to('admin/applications');
		}

	}

	public function getShow($id) {
		$application = Application::find($id);

		return View::make('applications.show')
			->with('application', $application);

	}

	public function getEdit($id) {
		$application = Application::find($id);

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
			$teams[$team->id] = $team->name;
		}

		return View::make('applications.edit')
		    ->with('application', $application)
			->with('countries', $countries)
			->with('priorities', $priorities)
			->with('teams', $teams);
	}

	public function postEdit($id) {
		$validator = Validator::make(Input::all(), Application::$rules);


		if ($validator->fails()) {
			return Redirect::to('admin/applications/edit/' . $id)
				->withErrors($validator)
				->withInput();
		} else {
	

			$post_data = Input::all();
			$application = Application::find($id)->update($post_data);

		

			// redirect
			Session::flash('message', 'Successfully updated !');
			return Redirect::to('admin/applications');
		}


	}
	public function getCopy($id) {
		$application = Application::find($id);

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
			$teams[$team->id] = $team->name;
		}

		return View::make('applications.copy')
			->with('application', $application)
			->with('countries', $countries)
			->with('priorities', $priorities)
			->with('teams', $teams);

	}

	public function postCopy($id) {
		$validator = Validator::make(Input::all(), Application::$rules);

	
		if ($validator->fails()) {
			return Redirect::to('admin/applications/copy/' . $id)
				->withErrors($validator)
				->withInput();
		} else {
		
			$application = new Application(Input::all());
			
			$application->save();

		

			Session::flash('message', 'Successfully copied!');
			return Redirect::to('admin/applications');
		}
	}
	public function postSend($id) {
			$application = Application::find($id);

			$id = $application->id;
			$name = $application->name;
			$description = $application->description;
			$imac_services = $application->imac_services;
			$support_services = $application->support_services;
			$administration = $application->administration;
   			$priority = $application->priority->priority;
   			$country = $application->country->name;

   			$email_to = Config::get('sending.email_to');

			$data = array(
				'id'=>$id,
			    'name'=>$name, 
			    'description'=>$description,
			    'imac_services'=>$imac_services,
			    'support_services'=>$support_services,
			    'administration'=>$administration,
			    'priority'=>$priority, 
			    'country'=>$country,
			    'email_to' =>$email_to
			);
			

			Mail::later(300, 'applications.email', $data, function($message) use ($id, $name, $priority, $country, $email_to) {
            $message->to($email_to)->subject('New Application added to Matrix - ' . $name . ' , priority: ' . $priority . ', country: ' . $country);
            });
			Session::flash('message', 'Successfully sent information about ' . $name);
			return Redirect::to('admin/applications');


	}

	public function postDestroy($id) {

		$application = Application::find($id);
		$application->delete();

		Session::flash('message', 'Successfully deleted!');
		return Redirect::to('admin/applications');
	}
	public function getTable() {
				return View::make('applications.datatable');
		

	}
	public function getDatatable() {
		
		return Datatable::collection(Application::all())
        ->showColumns('id', 	
			'name',
			'status',
			'description',
			'site',
			'country',
			'priority',
			'responsible',
			'responsible_date',
			'nbuser',
			'key_user',
			'constructor',
			'documentation',
			'imac_services',
			'imac_ku',
			'imac_rr',
			'imac_er',
			'support_services',
			'support_ku',
			'support_rr',
			'team',	
			'level1_more',
			'team2',
			'level2_more',
			'team3',
			'level3_more',
			'administration',
			'administration_ku',
			'administration_rr',
			'administration_er',
			'operation_order',
			'oo_ku',
			'oo_rr',
			'oo_er',
			'license_provisioning',
			'license_ku',
			'license_rr',
			'license_er',
			'project',
			'project_ku',
			'global_comment', 'action')

        ->searchColumns('name')
        ->orderColumns('id','name')
        ->addColumn('status', function ($model) {
           		return Form::checkbox('status', 'status', $model->status, array('disabled'));
            })
        ->addColumn('country', function ($model) {
            	return $model->country->name;
            })
        ->addColumn('priority', function ($model) {
            	return $model->priority->priority;
            })
        ->addColumn('team', function ($model) {
            	return $model->team->name;
            })
        ->addColumn('team2', function ($model) {
            	return $model->team2->name;
            })
        ->addColumn('team3', function ($model) {
            	return $model->team3->name;
            })
        ->addColumn('action', function ( $model ) {
			return '<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
					<li><a href="' . URL::to( 'admin/applications/show/' . $model->id ) . '"> <i class=" btn btn-success fa fa-search-plus"></i></a></li>
                    <li><a href="' . URL::to( 'admin/applications/edit/' . $model->id ) . '"> <i class="btn btn-info fa fa-pencil-square-o"></i></a></li>
                    <li><a class="js-confirm" href="' . URL::to( 'admin/applications/' . $model->id . '/destroy' ) . '"> <i class="btn btn-danger fa fa-trash-o"></i></a></li>
                    </ul></li>';
                            })
        ->make();

	}
	public function getSoftDeleted() {

		$applications = Application::onlyTrashed()->orderBy('deleted_at', 'DESC')->paginate(5);

		return View::make('applications.trash')
			->with('applications', $applications);

	}
	public function restore($id)
	{
		$application = Application::withTrashed()->find($id);
		$application->restore();
	

		Session::flash('message', 'Successfully restored!');
		return Redirect::to('admin/applications');
	}
	public function exportapplications() {
		

		Excel::create('applications', function($excel) {
			$excel->sheet('applications', function($sheet) {
				$applications = Application::orderBy('created_at', 'desc')->get();

				$sheet->loadView('applications.xlsx', ['applications'=> $applications->toArray()]);
			});

         })->download('xlsx');

	}
}