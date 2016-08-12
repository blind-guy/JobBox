@extends('layouts.master')

@section('title')
	<title>Job Box| Dropbox Page</title>
@stop

@section('style')
	<link rel="stylesheet" type="text/css" href="/CSS/login.css">
@stop


@section('content')
	@if(Session::has('error_message'))
		<div class="alert alert-warning" role="alert">
            {{Session::get('error_message')}}
		</div>
	@endif


		<h1 class="col-sm-offset-2">Dropbox</h1>
		<hr>

	{{Form::open(['action' => 'DropboxAuthenticationController@authenticateUser', 'method' => 'POST', 'class' => 'form-horizontal'])}}


		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label"></label>
			<div class="col-sm-10">
				 <!-- {{ Form::email('email', null, [ 'placeholder' => 'Email', 'class' => 'form-control', 'required']) }} -->
			</div>
		</div>
		<div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label"></label>
			<div class="col-sm-10">
				<!-- {{ Form::password("password" , [ 'placeholder' => 'Password', 'class' => 'form-control','required' ])}} -->
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<h5>{{"Please activate Dropbox to view your files"}}</h5>
				<br>
				{{Form:: submit('Activate Dropbox')}}
				<br>
				<br>
				<!-- <a href="signup">Sign Up</a> -->
	 		</div>
	 	</div>
    {{Form::close()}}
@stop




















