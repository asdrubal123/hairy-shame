<div class="col-md-2">
     <nav id="sidebar-nav">

        
@if(Auth::check())
                <ul>
                    <li><a id="" class="" href="{{ URL::to('admin/applications') }}">Applications</a>
                            <ul class="subnav">
                                @foreach($counav as $cou)
                                 <li>{{ HTML::link('admin/applications/country/' .$cou->id, $cou->name) }}</li>
                                @endforeach
                            </ul>
                    <li><a id="" class="" href="{{ URL::to('admin/assets') }}">Assets</a>
                            <ul class="subnav">
                                @foreach($counav as $cou)
                                 <li>{{ HTML::link('admin/assets/country/' .$cou->id, $cou->name) }}</li>
                                @endforeach
                            </ul>
                    <li><a id="" class="" href="{{ URL::to('admin/teams') }}">Teams</a>
                    <li><a id="" class="" href="{{ URL::to('admin/links') }}">Links</a>
                    <li><a id="" class="" href="{{ URL::to('mylinks/' .Auth::user()->firstname) }}">My Links</a>
                    @if(Auth::user()->admin == 1)
                    <li><a id="" class="" href="{{ URL::to('admin/countries') }}">Countries</a>
                    <li><a id="" class="" href="{{ URL::to('admin/priorities') }}">Priorities</a>
                    <li><a id="" class="" href="{{ URL::to('admin/users') }}">Users</a>
                    @endif
                </ul>

@else
                <ul>
                    <li><a id="" class="" href="{{ URL::to('applications') }}">Applications</a>
                            <ul class="subnav">
                                @foreach($counav as $cou)
                                 <li>{{ HTML::link('applications/country/' .$cou->id, $cou->name) }}</li>
                                @endforeach
                             </ul>

                    <li><a id="" class="" href="{{ URL::to('assets') }}">Assets</a>
                                                    <ul class="subnav">
                                @foreach($counav as $cou)
                                 <li>{{ HTML::link('assets/country/' .$cou->id, $cou->name) }}</li>
                                @endforeach
                            </ul>
                    <li><a id="" class="" href="{{ URL::to('teams') }}">Teams</a>

                  
                </ul>

@endif
</nav>
</div>