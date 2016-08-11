@extends('layouts.master')

@section('title')
	<title>Welcome to Job Box! | Login Page</title>
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
    <div id="topmedia" class="media">
    	<h1>Job Box Login</h1>
	    {{Form::open(['action' => 'AuthenticationController@loginUser', 'method' => 'POST', 'class' => 'form-horizontal'])}}
		    <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
			    <div class="col-sm-10">
				    {{ Form::email('email', null, [ 'placeholder' => 'Email', 'class' => 'form-control', 'required']) }}
    			</div>
	    	</div>
		    <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
    			<div class="col-sm-10">
	    			{{ Form::password("password" , [ 'placeholder' => 'Password', 'class' => 'form-control','required' ])}}
		    	</div>
		    </div>
		    <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
				    {{Form:: submit('Login')}}
				    <br>
				    <br>
				    <a href="signup">Sign Up</a>
    	 		</div>
    	 	</div>
        {{Form::close()}}
    </div>
@stop




















