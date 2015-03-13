<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'MatrixappController@index');
Route::get('search', 'MatrixappController@getSearch');
Route::get('filter', 'MatrixappController@getFilterAsset');
Route::get('teams', 'MatrixappController@getTeams');
Route::get('assets', 'MatrixappController@getAssets');
Route::get('applications', 'MatrixappController@getApplications');
Route::get('teams/{id}', 'MatrixappController@showTeam');
Route::get('assets/{id}', 'MatrixappController@showAsset');
Route::get('applications/{id}', 'MatrixappController@showApplication');
Route::get('assets/country/{id}', 'MatrixappController@getCountryAsset');
Route::get('applications/country/{id}', 'MatrixappController@getCountryApplication');


Route::get('mylinks/{username}', 'MylinksController@getLinks' );

Route::get('exportteams', array('as'=>'admin.teams.exportteams', 'uses'=>'TeamController@exportteams'));
Route::get('admin/teams/datatable','TeamController@getTable');
Route::get('admin/teams/api/datatable', array('as'=>'admin.teams.api.datatable', 'uses'=>'TeamController@getDatatable'));
Route::get('admin/teams/trash', 'TeamController@getSoftDeleted');
Route::post('admin/teams/restore/{id}', 'TeamController@restore');
Route::get('admin/teams/import', 'TeamController@getUpload');
Route::post('admin/teams/import', 'TeamController@postUpload');

Route::get('exportapplications', array('as'=>'admin.applications.exportapplications', 'uses'=>'ApplicationController@exportapplications'));
Route::get('admin/applications/datatable','ApplicationController@getTable');
Route::get('admin/applications/api/datatable', array('as'=>'admin.applications.api.datatable', 'uses'=>'ApplicationController@getDatatable'));
Route::get('admin/applications/trash', 'ApplicationController@getSoftDeleted');
Route::post('admin/applications/restore/{id}', 'ApplicationController@restore');

Route::get('sdassets/computers/dropdown', ['as' =>'computers.dropdown', 'uses' => 'ComputerController@dropdown']);
Route::get('sdassets/computers/all', ['as' => 'computers.all', 'uses' => 'ComputerController@all']);
Route::post('sdassets/computers/store', ['as' => 'computers.store', 'uses' => 'ComputerController@store']);
Route::delete('sdassets/computers/{id}', ['as' => 'computers.destroy', 'uses' => 'ComputerController@destroy']);
Route::get('sdassets/computers', ['as' => 'computers.index', 'uses' => 'ComputerController@getIndex']);
Route::get('sdassets/computers/{id}/edit', ['as' => 'computers.edit', 'uses' => 'ComputerController@edit']);
Route::put('sdassets/computers/{id}', ['as' => 'computers.update', 'uses' => 'ComputerController@update']);
Route::get('myassets/{username}', 'ComputerController@getAssets' );


Route::get('admin/links/all', ['as' => 'admin.links.all', 'uses' => 'LinkController@all']);
Route::post('admin/links/store', ['as' => 'admin.links.store', 'uses' => 'LinkController@store']);
Route::delete('admin/links/{id}', ['as' => 'admin.links.destroy', 'uses' => 'LinkController@destroy']);
Route::get('admin/links', ['as' => 'links.index', 'uses' => 'LinkController@getIndex']);
Route::get('admin/links/{id}/edit', ['as' => 'links.edit', 'uses' => 'LinkController@edit']);
Route::put('admin/links/{id}', ['as' => 'links.update', 'uses' => 'LinkController@update']);

Route::controller('admin/countries', 'CountryController');
Route::controller('admin/priorities', 'PriorityController');

Route::get('admin/users/all', ['as' => 'admin.users.all', 'uses' => 'UserController@all']);

Route::get('admin/users', ['as' => 'users.index', 'uses' => 'UserController@getIndex']);

Route::controller('admin/users', 'UserController');
Route::controller('admin/teams', 'TeamController');
Route::controller('admin/applications', 'ApplicationController');
//Route::controller('admin/links', 'LinkController');
Route::controller('mylinks', 'MylinksController');





Route::get('users/signin', 'UserController@getSignin');

Route::get('admin/programs/table', array('as'=>'api.table', 'uses'=>'ProgramController@getDatatable'));

Route::get('admin/programs/active', 'ProgramController@getActive');
Route::get('admin/country/{id}', 'ProgramController@getCountry');
Route::resource('admin/programs', 'ProgramController');
Route::get('admin/programs/copy/{id}', 'ProgramController@getCopy');
Route::post('admin/programs/copy/{id}', 'ProgramController@postCopy');


Route::get('admin/assets/datatable','AssetsController@getTable');
Route::get('admin/assets/api/datatable', array('as'=>'admin.assets.api.datatable', 'uses'=>'AssetsController@getDatatable'));



Route::get('admin/assets/trash', 'AssetsController@getSoftDeleted');
Route::post('admin/assets/restore/{id}', 'AssetsController@restore');
Route::get('admin/assets/import', 'AssetsController@getUpload');
Route::post('admin/assets/import', 'AssetsController@postUpload');
Route::resource('admin/assets', 'AssetsController');
Route::get('admin/assets/country/{id}', 'AssetsController@getCountry');
Route::get('admin/assets/copy/{id}', 'AssetsController@getCopy');
Route::post('admin/assets/copy/{id}', 'AssetsController@postCopy');
Route::post('admin/assets/send/{id}', 'AssetsController@postSend');
Route::get('exportassets', array('as'=>'admin.assets.exportassets', 'uses'=>'ExportController@exportassets'));
Route::get('generateExcelTemplate', array('as'=>'admin.assets.generateExcelTemplate', 'uses'=>'AssetsController@generateExcelTemplate'));




Route::controller('password', 'RemindersController');
Route::get('nerds/import', 'NerdController@getUpload');
Route::post('nerds/import', 'NerdController@postUpload');
Route::controller('nerds', 'NerdController');
Route::get('api/nerds', array('as'=>'api.nerds', 'uses'=>'NerdController@getDatatable'));
Route::get('/export-to-csv', function() {
    $nerds = Nerd::all();

    // the csv file with the first row
    $output = implode(",", array('id', 'name', 'email', 'nerd_level', 'created_at', 'updated_at'));
    $output .= "\n";
    
    foreach ($nerds as $row) {

        $output .=  implode(",", array($row['id'], $row['name'], $row['email'], $row['nerd_level'], $row['created_at'], $row['updated_at'])); // append each row
   		$output .= "\n";
    }

    // headers used to make the file "downloadable", we set them manually
    // since we can't use Laravel's Response::download() function
    $headers = array(
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="nerds.csv"',
        );

    // our response, this will be equivalent to your download() but
    // without using a local file
    return Response::make(rtrim($output, "\n"), 200, $headers);
});

Route::get('api/search', 'ApiSearchController@index');

Route::get('test', function(){


    $links = DB::table('links')->select('links.url', 'links.name')->where('status', 1);

    

    print_r('<br><br><br>');
    $id = 4;

    $userlinks = DB::table('links')
    ->select('links.url', 'links.name')
    ->join('user_link', 'links.id', '=', 'user_link.link_id')
    ->where('status', 0)
    ->where('user_link.user_id', $id);

   

    print_r('<br><br><br>');

    
    $combined = $links->orderBy('name', 'ASC')->union($userlinks)->orderBy('name', 'asc')->get();

    foreach ($combined as $key => $value) {
        print_r('<li>' . $value->name . '</li>');
    }
});

