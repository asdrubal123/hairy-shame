
{{ Form::open(array('url'=>'nerds/import','files'=>true)) }}
      {{ Form::label('file', 'Upload') }}
      {{ Form::file('file') }}

{{ Form::submit('Save') }}

  {{ Form::reset('Reset') }}
  
  {{ Form::close() }}