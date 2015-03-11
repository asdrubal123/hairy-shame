<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->

  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="/">Matrix</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li>{{ HTML::link('applications', 'Applications') }}</li>
      <li>{{ HTML::link('assets', 'Assets') }}</li>
      <li>{{ HTML::link('teams', 'Team Directory') }}</li>


    </ul>
   
        {{ Form::open(array('url'=>'search', 'method'=>'get', 'class'=>'navbar-form navbar-left')) }}
        {{ Form::text('keyword', null, array('placeholder'=>'Search by name', 'class'=>'form-control')) }}
        {{ Form::submit('Search', array('class'=>'btn btn-default')) }}
        {{ Form::close() }}

    <ul class="nav navbar-nav navbar-right">

                   @if(Auth::check())

                                    <li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Welcome {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</a></li>
                                    <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                      <ul class="dropdown-menu" role="menu">
                                                <li>{{ HTML::link('admin/applications', 'Manage Applications') }}</li>
                                                <li>{{ HTML::link('admin/assets', 'Manage Assets') }}</li>
                                                <li>{{ HTML::link('admin/teams', 'Manage Teams') }}</li>
                                                <li>{{ HTML::link('admin/links', 'Manage Links') }}</li>
                                            @if(Auth::user()->admin == 1)
                                                <li>{{ HTML::link('admin/countries', 'Manage Countries') }}</li>
                                                <li>{{ HTML::link('admin/priorities', 'Manage Priorities') }}</li>
                                                <li>{{ HTML::link('admin/users', 'Manage Users') }}</li>

                                            @endif
                                            <li class="divider"></li>
                                            <li><a href="{{ URL::to('admin/users/signout') }}"><i class="fa fa-sign-out fa-lg"></i> Sign Out</a></li>
                                        </ul>
                                    </li>

                        @else


                                      <li><a href="{{ URL::to('users/signin') }}"><i class="fa fa-sign-in fa-lg"></i> Sign In</a></li>
        


                        @endif

    </ul>
  </div><!-- /.navbar-collapse -->

</nav>

