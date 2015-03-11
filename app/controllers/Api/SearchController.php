<?php
 
/**
 * Api/SearchController is used for the "smart" search throughout the site.
 * it returns and array of items (with type and icon specified) so that the selectize.js plugin
 * can render the search results properly
 **/
 
class ApiSearchController extends BaseController {
    public function appendValue($data, $type, $element)
    {
        // operate on the item passed by reference, adding the element and type
        foreach ($data as $key => & $item) {
            $item[$element] = $type;
        }
        return $data;      
    }
 
    public function appendURL($data, $prefix)
    {
        // operate on the item passed by reference, adding the url based on slug
        foreach ($data as $key => & $item) {
            $item['url'] = url($prefix.'/'.$item['id']);
        }
        return $data;      
    }
public function index()
{
    // Retrieve the user's input and escape it
    $query = e(Input::get('q',''));
 
    // If the input is empty, return an error response
    if(!$query && $query == '') return Response::json(array(), 400);
 
    $applications = Application::where('status', 1)
    ->where('name','like','%'.$query.'%')
    ->orderBy('name','asc')
    ->take(5)
    ->get(array('id','name'))->toArray();
 
    $assets = Asset::where('status', 1)
    ->where('name','like','%'.$query.'%')
    ->orderBy('name','asc')
    ->take(5)
    ->get(array('id', 'name'))
    ->toArray();

    $teams = Team::where('status', 1)
    ->where('name','like','%'.$query.'%')
    ->orderBy('name','asc')
    ->take(5)
    ->get(array('id', 'name'))
    ->toArray();
 
    // Normalize data
        
 
        $applications   = $this->appendURL($applications, 'applications');
        $assets  = $this->appendURL($assets, 'assets');
        $teams  = $this->appendURL($teams, 'teams');
    // Add type of data to each item of each set of results
        $applications = $this->appendValue($applications, 'application', 'class');
        $assets = $this->appendValue($assets, 'asset', 'class');
        $teams  = $this->appendValue($teams, 'team', 'class');
      //  Merge all data into one array
    $data = array_merge($applications, $assets, $teams);
 
    return Response::json(array(
        'data'=>$data
    ));
}
 
}