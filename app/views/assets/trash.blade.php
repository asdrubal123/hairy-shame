@extends('layouts.sidebar')

@section('content')

@include('includes.assetsmenu')



<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <td>ID</td>
      <td>Name</td>
      <td>Country</td>
      <td>Priority</td>
      <td>Description</td>
      <td>IMAC</td>
      <td>Support Services</td>
      <td>Administration</td>
      <td>Deteled at</td>
      <td>Created at</td>
      <td>Updated at</td>
      <td></td>
    </tr>
  </thead>
  <tbody>
@foreach($assets as $key => $value)
    <tr>
      <td>{{$value->id}}</id>
      <td>{{ $value->name }}</td>
      <td>{{$value->country->name}}</id>
      <td>{{$value->priority->priority}}</id>
      <td>{{$value->description}}</id>
      <td>{{$value->imac_services}}</id>
      <td>{{$value->support_services}}</id>
      <td>{{$value->administration}}</id>
      <td>{{$value->deleted_at}}</id>
      <td>{{$value->created_at}}</id>
      <td>{{$value->updated_at}}</id>
      <td>
          
        {{ Form::model($value, array('action' => array('AssetsController@restore', $value->id), 'class' => 'form-inline')) }}
        {{ Form::button('<i class="fa fa-plus-square fa-lg"></i> Restore', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
        {{ Form::close() }}

      </td>
    </tr>
@endforeach
  </tbody>
</table>

</div>

@stop