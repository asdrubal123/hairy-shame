@extends('layouts.default')
@section('content')
	    <div id="header" class="text-center">
        <div id="logo">
            <span id="matrix">
                <span class="mm animated bounceInDown">m</span>
                <span class="ma animated bounceInDown">a</span>
                <span class="mt animated bounceInDown">t</span>
                <span class="mr animated bounceInDown">r</span>
                <span class="mi animated bounceInDown">i</span>
                <span class="mx animated bounceInDown">x</span>
            </span>

        <div>
              <h3>browse by country</h3>
        </div>    

        </div>

        <nav id="main-nav">
            <ul class="list-unstyled list-inline">

                <li><a id="country-1" class="animated btn btn-danger bounceInLeft" href="{{ url('france') }}">France</a></li>
                <li><a id="country-2" class="animated btn btn-danger bounceInLeft" href="{{ url('belgium') }}">Belgium</a></li>
                <li><a id="country-3" class="animated btn btn-danger bounceInLeft" href="#">Germany</a></li>
                <li><a id="country-4" class="animated btn btn-danger bounceInLeft" href="#">Netherlands</a></li>
                <li><a id="country-5" class="animated btn btn-danger bounceInRight" href="#">Switzerland</a></li>
                <li><a id="country-6" class="animated btn btn-danger bounceInRight" href="#">Italy</a></li>
                <li><a id="country-7" class="animated btn btn-danger bounceInRight" href="#">UKI</a></li>
                <li><a id="country-8" class="animated btn btn-danger bounceInRight" href="#">SNB</a></li>
            </ul>
        </nav>
         <div>
              <h3>or browse by resource type</h3>
        </div> 

        <nav id="sidebar-nav">
                <ul class="list-unstyled list-inline">
                    <li><a id="resource-apps" class="animated bounceInDown" href="{{ url('applications') }}"><i class="fa fa-database fa-lg"></i> Applications</a>
                    <li><a id="resource-assets" class="animated bounceInDown" href="{{ url('assets') }}"><i class="fa fa-desktop fa-lg"></i> Assets</a>
                    <li><a id="resource-teams" class="animated bounceInDown" href="{{ url('teams') }}"><i class="fa fa-group fa-lg"></i> Teams</a>
                </ul>
        </nav>
        <div>
              <h3>or make your life easier and just</h3>
        </div> 
   
   

<div class="container" id="recentlyadded">
    <div class="row">
    <div class="col-md-4 col-md-offset-4">
        <select id="searchbox" name="q" placeholder="Search applications, assets or teams..." class="form-control" ></select>
     </div>
  </div>
<div class="row">
 <div class="col-md-4">   
 <div class="criticality criticality3">
    <h4>Recently added Applications</h4>
    <ul class="show-info subnav">
    @foreach($applications as $key => $value)
     <li><a href="{{ URL::to('applications/' . $value->id) }}">{{ $value->name }}</a></li>
    @endforeach
    </ul> 
 </div>
 </div>

<div class="col-md-4">
 <div class="criticality criticality3">
    <h4>Recently added Assets</h4>
    <ul class="show-info subnav">
    @foreach($assets as $key => $value)
        <li><a href="{{ URL::to('assets/' . $value->id) }}">{{ $value->name }}</a></li>
    @endforeach
    </ul> 
 </div>
 </div>
<div class="col-md-4">
  <div class="criticality criticality3">
    <h4>Recently added Teams</h4>
      <ul class="show-info subnav">
        @foreach($teams as $key => $value)
           <li><a href="{{ URL::to('teams/' . $value->id) }}">{{ $value->name }}</a></li>
        @endforeach
    </ul> 
 </div>
</div>
 </div>
</div>



<div class="container links-container" >
<div class="row">
 <div class="col-md-12">   
 <div class="criticality criticality2">
    @if(Auth::check())
    <h4>Usefull links</h4>
    @else
    <h4>Usefull links</h4><small>Register to add own links</small>
    @endif
    <ul class="subnav" id="links">
    @if(Auth::check())
    
    @foreach($combined as $key => $value)

     <li><a href="{{ URL::to($value->url) }}" class="link{{ $value->status }}">{{ $value->name }}</a></li>
    @endforeach
    
    @else

    @foreach($links as $key => $value)

     <li><a href="{{ URL::to($value->url) }}">{{ $value->name }}</a></li>
    @endforeach
    </ul> 
    @endif
 </div>
 </div>

 </div>
</div>



    </div>
@stop