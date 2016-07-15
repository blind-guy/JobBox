@extends('layouts.master')

@section('title')
	<title>Facebook | Login Page</title>
@stop

@section('style')
	<link rel="stylesheet" type="text/css" href="/CSS/login.css">
@stop


@section('content')
	<div class="container">

		<div class="row">

			<div class="col-md-3">
			</div>


			<div class="col-md-6">
				@if(Session::has('error_message'))
					<div class="alert alert-warning" role="alert">
						(Session::get('error_message'))
					</div>


				@endif
				<h1>Login View</h1>

				{{Form::open(['action' => 'AuthenticationController@loginUser', 'method' => 'POST', 'class' => 'form-horizontal'])}}

				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						{{ Form::email('email', null, [ 'placeholder' => 'Email', 'required']) }}
					</div>
				</div>

				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10">
						{{ Form::password("password" , [ 'placeholder' => 'Password', 'required'])}}
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						{{ Form:: submit('Login') }}
			 			{{Form::close()}}
			 		</div>
			 	</div>
			</div>

			<div class="col-md-3">
			</div>

		</div>

	 </div>


@stop




















