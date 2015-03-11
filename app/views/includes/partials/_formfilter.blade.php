 		 {{ Form::label('cou', 'Country') }}

  	     {{ Form::select('cou', array(''=>'Any', '1' => 'France', '2' => 'Germany'), '', array('class' => 'form-control')) }}
  	     {{ Form::label('pri', 'Priority') }}
         {{ Form::select('pri', array(''=>'Any', '1' => 'G1', '2' => 'G2', '3' => 'G3', '4' => 'NA'), '', array('class' => 'form-control')) }}


        {{ Form::submit('Show', array('class'=>'btn btn-default')) }}
        {{ Form::close() }}