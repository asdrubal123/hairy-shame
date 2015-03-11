<?php

class AssetsController extends BaseController {
     
	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('admin', array('except'=>array('getCountryUser', 'userindex', 'usershow')));
	}


	public function index()
	{
		$assets = Asset::all();



		return View::make('assets.index')
			->with('assets', Asset::orderBy('created_at', 'DESC')->paginate(5));

	}


    public function getCountry($cou_id) {
		return View::make('assets.index')
			->with('assets', Asset::where('country_id', '=', $cou_id)->paginate(5))
			->with('country', Country::find($cou_id));
	}


	public function getSoftDeleted() {

		$assets = Asset::onlyTrashed()->orderBy('deleted_at', 'DESC')->paginate(5);

		return View::make('assets.trash')
			->with('assets', $assets);

	}
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
			$teams[$team->id] = $team->name;
		}

		return View::make('assets.create')
			->with('countries', $countries)
			->with('priorities', $priorities)
			->with('teams', $teams);
	}

	public function store()
	{

		$validator = Validator::make(Input::all(), Asset::$rules);


		if ($validator->fails()) {
			return Redirect::to('admin/assets/create')
				->withErrors($validator)
				->withInput();
		} else {
			// store
			$asset = new Asset;
			$asset->name = input::get( 'name' );					
			$asset->status = input::get( 'status' );					
			$asset->description = input::get( 'description' );					
			$asset->site = input::get( 'site' );					
			$asset->country_id = input::get( 'country_id' );					
			$asset->priority_id = input::get( 'priority_id' );					
			$asset->responsible = input::get( 'responsible' );					
			$asset->responsible_date = input::get( 'responsible_date' );					
			$asset->categorization = input::get( 'categorization' );					
			$asset->documentation = input::get( 'documentation' );					
			$asset->procurement = input::get( 'procurement' );					
			$asset->procurement_ku = input::get( 'procurement_ku' );					
			$asset->procurement_rr = input::get( 'procurement_rr' );					
			$asset->procurement_er = input::get( 'procurement_er' );					
			$asset->imac_services = input::get( 'imac_services' );					
			$asset->imac_ku = input::get( 'imac_ku' );					
			$asset->imac_rr = input::get( 'imac_rr' );					
			$asset->imac_er = input::get( 'imac_er' );					
			$asset->support_services = input::get( 'support_services' );					
			$asset->support_ku = input::get( 'support_ku' );					
			$asset->support_rr = input::get( 'support_rr' );
			$asset->team_id = input::get( 'team_id' );								
			$asset->level1_more = input::get( 'level1_more' );					
			$asset->team2_id = input::get( 'team2_id' );					
			$asset->level2_more = input::get( 'level2_more' );					
			$asset->team3_id = input::get( 'team3_id' );					
			$asset->level3_more = input::get( 'level3_more' );					
			$asset->administration = input::get( 'administration' );					
			$asset->administration_ku = input::get( 'administration_ku' );					
			$asset->administration_rr = input::get( 'administration_rr' );					
			$asset->administration_er = input::get( 'administration_er' );					
			$asset->operation_order = input::get( 'operation_order' );					
			$asset->oo_ku = input::get( 'oo_ku' );					
			$asset->oo_rr = input::get( 'oo_rr' );					
			$asset->oo_er = input::get( 'oo_er' );					
			$asset->small_enhancement = input::get( 'small_enhancement' );					
			$asset->sm_ku = input::get( 'sm_ku' );					
			$asset->global_comment = input::get( 'global_comment');	
			$asset->save();




			Session::flash('message', 'Successfully created!');
			return Redirect::to('admin/assets');
		}
	}


	public function show($id)
	{		
		$asset = Asset::find($id);

;

		return View::make('assets.show')
			->with('asset', $asset);
	
	}

	public function edit($id)
	{
		$asset = Asset::find($id);

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

		return View::make('assets.edit')
			->with('asset', $asset)
			->with('countries', $countries)
			->with('priorities', $priorities)
			->with('teams', $teams);


	}

	public function update($id)
	{
		$validator = Validator::make(Input::all(), Asset::$rules);

		if ($validator->fails()) {
			return Redirect::to('admin/assets/' . $id . '/edit')
				->withErrors($validator)
				->withInput();
		} else {
			$asset = Asset::find($id);
			$asset->name = input::get( 'name' );					
			$asset->status = input::get( 'status' );					
			$asset->description = input::get( 'description' );					
			$asset->site = input::get( 'site' );					
			$asset->country_id = input::get( 'country_id' );					
			$asset->priority_id = input::get( 'priority_id' );					
			$asset->responsible = input::get( 'responsible' );					
			$asset->responsible_date = input::get( 'responsible_date' );					
			$asset->categorization = input::get( 'categorization' );					
			$asset->documentation = input::get( 'documentation' );					
			$asset->procurement = input::get( 'procurement' );					
			$asset->procurement_ku = input::get( 'procurement_ku' );					
			$asset->procurement_rr = input::get( 'procurement_rr' );					
			$asset->procurement_er = input::get( 'procurement_er' );					
			$asset->imac_services = input::get( 'imac_services' );					
			$asset->imac_ku = input::get( 'imac_ku' );					
			$asset->imac_rr = input::get( 'imac_rr' );					
			$asset->imac_er = input::get( 'imac_er' );					
			$asset->support_services = input::get( 'support_services' );					
			$asset->support_ku = input::get( 'support_ku' );					
			$asset->support_rr = input::get( 'support_rr' );					
			$asset->team_id = input::get( 'team_id' );					
			$asset->level1_more = input::get( 'level1_more' );					
			$asset->team2_id = input::get( 'team2_id' );					
			$asset->level2_more = input::get( 'level2_more' );					
			$asset->team3_id = input::get( 'team3_id' );					
			$asset->level3_more = input::get( 'level3_more' );					
			$asset->administration = input::get( 'administration' );					
			$asset->administration_ku = input::get( 'administration_ku' );					
			$asset->administration_rr = input::get( 'administration_rr' );					
			$asset->administration_er = input::get( 'administration_er' );					
			$asset->operation_order = input::get( 'operation_order' );					
			$asset->oo_ku = input::get( 'oo_ku' );					
			$asset->oo_rr = input::get( 'oo_rr' );					
			$asset->oo_er = input::get( 'oo_er' );					
			$asset->small_enhancement = input::get( 'small_enhancement' );					
			$asset->sm_ku = input::get( 'sm_ku' );					
			$asset->global_comment = input::get( 'global_comment');	
			$asset->save();

			Session::flash('message', 'Successfully updated!');
			return Redirect::to('admin/assets');
		}
	}

	public function getCopy($id)
	{
		$asset = Asset::find($id);

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

		return View::make('assets.copy')
			->with('asset', $asset)
			->with('countries', $countries)
			->with('priorities', $priorities)
			->with('teams', $teams);


	}

	public function postCopy($id)
	{
		$validator = Validator::make(Input::all(), Asset::$rules);

		if ($validator->fails()) {
			return Redirect::to('admin/assets/' . $id . '/copy')
				->withErrors($validator)
				->withInput();
		} else {
			$asset = new Asset;
			$asset->name = input::get( 'name' );					
			$asset->status = input::get( 'status' );					
			$asset->description = input::get( 'description' );					
			$asset->site = input::get( 'site' );					
			$asset->country_id = input::get( 'country_id' );					
			$asset->priority_id = input::get( 'priority_id' );					
			$asset->responsible = input::get( 'responsible' );					
			$asset->responsible_date = input::get( 'responsible_date' );					
			$asset->categorization = input::get( 'categorization' );					
			$asset->documentation = input::get( 'documentation' );					
			$asset->procurement = input::get( 'procurement' );					
			$asset->procurement_ku = input::get( 'procurement_ku' );					
			$asset->procurement_rr = input::get( 'procurement_rr' );					
			$asset->procurement_er = input::get( 'procurement_er' );					
			$asset->imac_services = input::get( 'imac_services' );					
			$asset->imac_ku = input::get( 'imac_ku' );					
			$asset->imac_rr = input::get( 'imac_rr' );					
			$asset->imac_er = input::get( 'imac_er' );					
			$asset->support_services = input::get( 'support_services' );					
			$asset->support_ku = input::get( 'support_ku' );					
			$asset->support_rr = input::get( 'support_rr' );					
			$asset->team_id = input::get( 'team_id' );					
			$asset->level1_more = input::get( 'level1_more' );					
			$asset->team2_id = input::get( 'team2_id' );					
			$asset->level2_more = input::get( 'level2_more' );					
			$asset->team3_id = input::get( 'team3_id' );					
			$asset->level3_more = input::get( 'level3_more' );					
			$asset->administration = input::get( 'administration' );					
			$asset->administration_ku = input::get( 'administration_ku' );					
			$asset->administration_rr = input::get( 'administration_rr' );					
			$asset->administration_er = input::get( 'administration_er' );					
			$asset->operation_order = input::get( 'operation_order' );					
			$asset->oo_ku = input::get( 'oo_ku' );					
			$asset->oo_rr = input::get( 'oo_rr' );					
			$asset->oo_er = input::get( 'oo_er' );					
			$asset->small_enhancement = input::get( 'small_enhancement' );					
			$asset->sm_ku = input::get( 'sm_ku' );					
			$asset->global_comment = input::get( 'global_comment');	
			$asset->save();

			Session::flash('message', 'Successfully copied!');
			return Redirect::to('admin/assets');
		}
	}
	public function postSend($id) {
			$asset = Asset::find($id);

			$id = $asset->id;
			$name = $asset->name;
			$description = $asset->description;
			$imac_services = $asset->imac_services;
			$support_services = $asset->support_services;
			$administration = $asset->administration;
   			$priority = $asset->priority->priority;
   			$country = $asset->country->name;

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
			

			Mail::later(300, 'assets.email', $data, function($message) use ($id, $name, $priority, $country, $email_to) {
            $message->to($email_to)->subject('New asset added to Matrix - ' . $name . ' , priority: ' . $priority . ', country: ' . $country);
            });
			Session::flash('message', 'Successfully sent information about ' . $name);
			return Redirect::to('admin/assets');
	}

	public function destroy($id)
	{
		$asset = Asset::find($id);
		$asset->delete();

		Session::flash('message', 'Successfully deleted!');
		return Redirect::to('admin/assets');
	}

	public function restore($id)
	{
		$asset = Asset::withTrashed()->find($id);
		$asset->restore();
	

		Session::flash('message', 'Successfully restored!');
		return Redirect::to('admin/assets');
	}
	public function getUpload() {

		return View::make('assets.import');
	}
	public function generateExcelTemplate() {

		Excel::create('Template for Asset table import', function($excel){
			$excel->setTitle('Template for Asset table import')
				  ->setCreator('Matrix')
				  ->setCompany('Capgemini')
				  ->setDescription('Template for Asset table import');
			$excel->sheet('Data', function($sheet) {

				$row = 1;
				$sheet->row($row, array(
					'name',
					'description',
					'status'
					));
			});

		})->export('xlsx');

	}
	public function importExcel() {
		$rules = ['excel' => 'required|mimes:xlsx'];
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails())
			return Redirect::back()->withErrors($validator)->withInput();

		$excel = Input::file('excel');

		$excels = Excel::selectSheetsByIndex(0)
			->load($excel, function($reader) {

			})->get();

			$counter = 0;

			$rowRules = [
			'name' => 'required',
			'status' => 'required',
			'description'=>'',
			'site'=>'',
			'country_id'=>'required|integer',
			'priority_id'=>'required|integer',
			'responsible'=>'',
			'responsible_date'=>'',
			'categorization'=>'',
			'documentation'=>'',
			'procurement'=>'',
			'procurement_ku'=>'',
			'procurement_rr'=>'',
			'procurement_er'=>'',
			'imac_services'=>'',
			'imac_ku'=>'',
			'imac_rr'=>'',
			'imac_er'=>'',
			'support_services'=>'',
			'support_ku'=>'',
			'support_rr'=>'',
			'team_id'=>'required|integer',	
			'level1_more'=>'',
			'team2_id'=>'required|integer',
			'level2_more'=>'',
			'team3_id'=>'required|integer',
			'level3_more'=>'',
			'administration'=>'',
			'administration_ku'=>'',
			'administration_rr'=>'',
			'administration_er'=>'',
			'operation_order'=>'',
			'oo_ku'=>'',
			'oo_rr'=>'',
			'oo_er'=>'',
			'small_enhancement'=>'',
			'sm_ku'=>'',
			'global_comment'=>''
			];

			foreach ($excels as $row) {
				$validator = Validator::make($row
					->toArray(), $rowRules);

			

				$asset = Asset::create([
							'name'=>$row['name'],
							'status'=>$row['status'],					
							'description'=>$row['description'],					
							'site'=>$row['site'],					
							'country_id'=>$row['country_id'],					
							'priority_id'=>$row['priority_id'],					
							'responsible'=>$row['responsible'],					
							'responsible_date'=>$row['responsible_date'],					
							'categorization'=>$row['categorization'],					
							'documentation'=>$row['documentation'],					
							'procurement'=>$row['procurement'],					
							'procurement_ku'=>$row['procurement_ku'],					
							'procurement_rr'=>$row['procurement_rr'],					
							'procurement_er'=>$row['procurement_er'],					
							'imac_services'=>$row['imac_services'],					
							'imac_ku'=>$row['imac_ku'],					
							'imac_rr'=>$row['imac_rr'],					
							'imac_er'=>$row['imac_er'],					
							'support_services'=>$row['support_services'],					
							'support_ku'=>$row['support_ku'],					
							'support_rr'=>$row['support_rr'],					
							'team_id'=>$row['team_id'],					
							'level1_more'=>$row['level1_more'],					
							'team2_id'=>$row['team2_id'],					
							'level2_more'=>$row['level2_more'],					
							'team3_id'=>$row['team3_id'],					
							'level3_more'=>$row['level3_more'],					
							'administration'=>$row['administration'],					
							'administration_ku'=>$row['administration_ku'],					
							'administration_rr'=>$row['administration_rr'],					
							'administration_er'=>$row['administration_er'],					
							'operation_order'=>$row['operation_order'],					
							'oo_ku'=>$row['oo_ku'],					
							'oo_rr'=>$row['oo_rr'],					
							'oo_er'=>$row['oo_er'],					
							'small_enhancement'=>$row['small_enhancement'],					
							'sm_ku'=>$row['sm_ku'],					
							'global_comment'=>$row['global_comment']

					]);

				$counter++;




			}
		return Redirect::route('admin.assets')
			->with('message', 'Uploaded $counter of assets');



	}
	public function postUpload() {
		$file = Input::file('file');
		$destinationPath = 'uploads';
		// If the uploads fail due to file system, you can try doing public_path().'/uploads' 
		$filename = str_random(12);
		//$filename = $file->getClientOriginalName();
		//$extension =$file->getClientOriginalExtension(); 
		$upload_success = Input::file('file')->move($destinationPath, $filename);

		if($upload_success) {

			Excel::load($upload_success, function($reader) {

				$assets=$reader->get(); 

				foreach($assets as $row) {
                
                               
                        $asset = new Asset;
			            $asset->name = (isset($row['name']) ? $row['name'] : '');					
						$asset->status = (isset($row['status']) ? $row['status'] : '');					
						$asset->description = (isset($row['description']) ? $row['description'] : '');					
						$asset->site = (isset($row['site']) ? $row['site'] : '');					
						$asset->country_id = (isset($row['country_id']) ? $row['country_id'] : '');					
						$asset->priority_id = (isset($row['priority_id']) ? $row['priority_id'] : '');					
						$asset->responsible = (isset($row['responsible']) ? $row['responsible'] : '');					
						$asset->responsible_date = (isset($row['responsible_date']) ? $row['responsible_date'] : '');					
						$asset->categorization = (isset($row['categorization']) ? $row['categorization'] : '');					
						$asset->documentation = (isset($row['documentation']) ? $row['documentation'] : '');					
						$asset->procurement = (isset($row['procurement']) ? $row['procurement'] : '');					
						$asset->procurement_ku = (isset($row['procurement_ku']) ? $row['procurement_ku'] : '');					
						$asset->procurement_rr = (isset($row['procurement_rr']) ? $row['procurement_rr'] : '');					
						$asset->procurement_er = (isset($row['procurement_er']) ? $row['procurement_er'] : '');					
						$asset->imac_services = (isset($row['imac_services']) ? $row['imac_services'] : '');					
						$asset->imac_ku = (isset($row['imac_ku']) ? $row['imac_ku'] : '');					
						$asset->imac_rr = (isset($row['imac_rr']) ? $row['imac_rr'] : '');					
						$asset->imac_er = (isset($row['imac_er']) ? $row['imac_er'] : '');					
						$asset->support_services = (isset($row['support_services']) ? $row['support_services'] : '');					
						$asset->support_ku = (isset($row['support_ku']) ? $row['support_ku'] : '');					
						$asset->support_rr = (isset($row['support_rr']) ? $row['support_rr'] : '');					
						$asset->team_id = (isset($row['team_id']) ? $row['team_id'] : '');					
						$asset->level1_more = (isset($row['level1_more']) ? $row['level1_more'] : '');					
						$asset->team2_id = (isset($row['team2_id']) ? $row['team2_id'] : '');					
						$asset->level2_more = (isset($row['level2_more']) ? $row['level2_more'] : '');					
						$asset->team3_id = (isset($row['team3_id']) ? $row['team3_id'] : '');					
						$asset->level3_more = (isset($row['level3_more']) ? $row['level3_more'] : '');					
						$asset->administration = (isset($row['administration']) ? $row['administration'] : '');					
						$asset->administration_ku = (isset($row['administration_ku']) ? $row['administration_ku'] : '');					
						$asset->administration_rr = (isset($row['administration_rr']) ? $row['administration_rr'] : '');					
						$asset->administration_er = (isset($row['administration_er']) ? $row['administration_er'] : '');					
						$asset->operation_order = (isset($row['operation_order']) ? $row['operation_order'] : '');					
						$asset->oo_ku = (isset($row['oo_ku']) ? $row['oo_ku'] : '');					
						$asset->oo_rr = (isset($row['oo_rr']) ? $row['oo_rr'] : '');					
						$asset->oo_er = (isset($row['oo_er']) ? $row['oo_er'] : '');					
						$asset->small_enhancement = (isset($row['small_enhancement']) ? $row['small_enhancement'] : '');					
						$asset->sm_ku = (isset($row['sm_ku']) ? $row['sm_ku'] : '');					
						$asset->global_comment = (isset($row['global_comment']) ? $row['global_comment'] : '');
						$asset->save();
                      
                    
     				 
                } 

			});
		   
		} else {
		   return Response::json('error', 400);
		}

     }

    public function getTable() {
				return View::make('assets.datatable');
		

	}
	public function getDatatable() {
		
		return Datatable::collection(Asset::all())
        ->showColumns('id',
				'name',
				'status',
				'description',
				'site',
				'country_id',
				'priority_id',
				'responsible',
				'responsible_date',
				'categorization',
				'documentation',
				'procurement',
				'procurement_ku',
				'procurement_rr',
				'procurement_er',
				'imac_services',
				'imac_ku',
				'imac_rr',
				'imac_er',
				'support_services',
				'support_ku',
				'support_rr',
				'team_id',	
				'level1_more',
				'team2_id',
				'level2_more',
				'team3_id',
				'level3_more',
				'administration',
				'administration_ku',
				'administration_rr',
				'administration_er',
				'operation_order',
				'oo_ku',
				'oo_rr',
				'oo_er',
				'small_enhancement',
				'sm_ku',
				'global_comment', 
				'action')
        ->searchColumns('name')
        ->orderColumns('id','name')
        ->addColumn('action', function ( $model ) {
			return '<a href="' . URL::to( 'admin/assets/show/' . $model->id ) . '"> <i class=" btn btn-success fa fa-search-plus"></i></a>
                    <a href="' . URL::to( 'admin/assets/edit/' . $model->id ) . '"> <i class="btn btn-info fa fa-pencil-square-o"></i></a>
                    <a class="js-confirm" href="' . URL::to( 'admin/assets/' . $model->id) . '"> <i class="btn btn-danger fa fa-trash-o"></i></a>';
                            })
        ->make();

	}
	
}