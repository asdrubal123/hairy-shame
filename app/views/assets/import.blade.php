@extends('layouts.sidebar')

@section('content')

@include('includes.assetsmenu')



<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<p>Please download template file before uploading:

  -> <a href="{{ URL::route('admin.assets.exportassets') }}"><i class="fa fa-download"></i>Template</a>

{{ Form::open(array('url'=>'admin/assets/import','files'=>true)) }}
      {{ Form::label('file', 'Upload') }}
      {{ Form::file('file') }}

{{ Form::submit('Save') }}

  {{ Form::reset('Reset') }}
  
  {{ Form::close() }}


</div>

@stop