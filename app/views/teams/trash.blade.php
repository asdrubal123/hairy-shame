@extends('layouts.sidebar')

@section('content')

@include('includes.teamsmenu')



<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <td>ID</td>
      <td>Name</td>
      <td>Description</td>
      <td>Phone</td>
      <td>Email</td>
      <td>Team Leader</td>
      <td>Mobile</td>
      <td>Email</td>
      <td>Deteled at</td>
      <td>Created at</td>
      <td>Updated at</td>
      <td></td>
    </tr>
  </thead>
  <tbody>
@foreach($teams as $key => $value)
    <tr>
      <td>{{$value->id}}</id>
      <td>{{$value->name }}</td>
      <td>{{$value->description}}</id>
      <td>{{$value->phone}}</id>
      <td>{{$value->email}}</id>
      <td>{{$value->e1_tl}}</id>
      <td>{{$value->e1_mobile}}</id>
      <td>{{$value->e1_email1}}</id>  
      <td>{{$value->deleted_at}}</id>
      <td>{{$value->created_at}}</id>
      <td>{{$value->updated_at}}</id>
      <td>
          
        {{ Form::model($value, array('action' => array('TeamController@restore', $value->id), 'class' => 'form-inline')) }}
        {{ Form::button('<i class="fa fa-plus-square fa-lg"></i> Restore', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
        {{ Form::close() }}

      </td>
    </tr>
@endforeach
  </tbody>
</table>

</div>

@stop