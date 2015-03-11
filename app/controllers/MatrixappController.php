<?php

class MatrixappController extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
	}
	public function index(){

		

		$applications = Application::where('status', 1)->orderBy('created_at', 'DESC')->take(5)->get();
		$assets = Asset::where('status', 1)->orderBy('created_at', 'DESC')->take(5)->get();
		$teams = Team::where('status', 1)->orderBy('created_at', 'DESC')->take(5)->get();
		$links = Link::where('status', 1)->orderBy('name', 'ASC')->get();

		if(Auth::check()) {
		$id = Auth::user()->id;

	    $alllinks = DB::table('links')->select('links.url', 'links.name', 'links.status')->where('status', 1)->whereNull('deleted_at');
		
		$userlinks = DB::table('links')
		    ->select('links.url', 'links.name', 'links.status')
		    ->join('user_link', 'links.id', '=', 'user_link.link_id')
		    ->where('status', 0)
		    ->where('user_link.user_id', $id);

	
		$combined = $alllinks->union($userlinks)->orderBy('name')->get();
	

			return View::make('pages.home')
			->with('applications', $applications)
			->with('assets', $assets)
			->with('teams', $teams)
			->with('links', $links)
			->with('combined', $combined);
		}
		return View::make('pages.home')
			->with('applications', $applications)
			->with('assets', $assets)
			->with('teams', $teams)
			->with('links', $links);

	}
	public function getTeams() {

		$teams = Team::where('status', 1)->orderBy('created_at', 'DESC')->paginate(5);

		return View::make('teams.index')
			->with('teams', $teams);
	}
	public function getAssets() {

		$assets = Asset::where('status', 1)->orderBy('created_at', 'DESC')->paginate(5);

		return View::make('assets.index')
			->with('assets', $assets);

	}
	public function getApplications() {

		$applications = Application::where('status', 1)->orderBy('created_at', 'DESC')->paginate(5);

		// load the view and pass the nerds
		return View::make('applications.index')
			->with('applications', $applications);
	}

	public function showTeam($id) {
		return View::make('teams.show')->with('team', Team::find($id));
	}

    public function showAsset($id) {
		return View::make('assets.show')->with('asset', Asset::find($id));
	}

	public function showApplication($id) {
		return View::make('applications.show')->with('application', Application::find($id));
	}



	public function getCountryAsset($cou_id) {
		return View::make('assets.index')
			->with('assets', Asset::where('status', 1)->where('country_id', '=', $cou_id)->paginate(5))
			->with('country', Country::find($cou_id));
	}
	public function getCountryApplication($cou_id) {
		return View::make('applications.index')
			->with('applications', Application::where('status', 1)->where('country_id', '=', $cou_id)->paginate(5))
			->with('country', Country::find($cou_id));
	}


	public function getSearch() {
		$keyword = Input::get('keyword');

		return View::make('matrixapp.search')
			->with('teams', Team::where('status', 1)->where('name', 'LIKE', '%'.$keyword.'%')->orwhere('description', 'LIKE', '%'.$keyword.'%')->whereNull('deleted_at')->get())
			->with('assets', Asset::where('status', 1)->where('name', 'LIKE', '%'.$keyword.'%')->orwhere('description', 'LIKE', '%'.$keyword.'%')->whereNull('deleted_at')->get())
			->with('applications', Application::where('status', 1)->where('name', 'LIKE', '%'.$keyword.'%')->orwhere('description', 'LIKE', '%'.$keyword.'%')->whereNull('deleted_at')->get())
			->with('keyword', $keyword);
	}
	public function getFilterAsset(){

		
		$country_id = Input::get('cou');

		$priority_id = Input::get('pri');

		$query = Asset::with('country', 'priority');

		if($country_id)
		    $query->where('country_id', $country_id)->get();

		if($priority_id)
		    $query->where('priority_id', $priority_id)->get();

		$assets = $query->paginate(5);

		return View::make('assets.index', compact('assets'));	}
}