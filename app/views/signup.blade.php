@extends('layouts.master')

@section('title')
	<title>Job Box | Sign Up Today</title>
@stop

@section('style')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/signup.css') }}">
@stop

@section('content')
	@if(Session::has('error_message'))
		<div class="alert alert-danger" role="alert">	
		  {{Session::get('error_message')}}
    	</div>
	@endif
	
    @if(Session::has('validation_messages'))
		<div class="alert alert-danger" role="alert">
			<h4>Oops! Something is wrong!</h4>
		  	@foreach(Session::get('validation_messages')->all() as $error)
		  		{{$error}}<br>
		  	@endforeach
		</div>
	@endif
    <div id="topmedia" class="media">
	    <h1>Welcome to Job Box</h1>
	    <p>Already have an account?<a href="/login" class="btn btn-link">Login</a></p>	
    </div>
	{{Form::open(['action'=> 'RegistrationController@signUp', 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true])}}
        <div class="media">
            <h4>Account Information</h4>
		    <div class="form-group">
			    <label class="col-sm-2 control-label">Email</label>
			    <div class="col-sm-10">
			        {{ Form::email('email', null, [ 'placeholder' => 'Email', 'class' => 'form-control', 'required']) }}
			    </div>
		    </div>
		    <div class="form-group">
			    <label class="col-sm-2 control-label">Password</label>
			    <div class="col-sm-10">
				    {{ Form::password("password" , [ 'placeholder' => 'Password', 'class' => 'form-control', 'required'])}}
			    </div>	
	    	</div>	
	    	<div class="form-group">
	    		<label class="col-sm-2 control-label">Re-type password</label>
    			<div class="col-sm-10">
				    {{ Form::password("repassword" , [ 'placeholder' => 'Re-type Password', 'class' => 'form-control', 'required'])}}
			    </div>	
		    </div>	
        </div>
        <div class="media">
            <h4>Personal Information</h4>
		    <div class="form-group">
			    <label class="col-sm-2 control-label">Name</label>
			    <div class="col-sm-10">
				    {{Form::text('name', null, [ 'placeholder' => 'Name', 'required', 'class' => 'form-control'])}}
			    </div>	
		    </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">City</label>
                <div class="col-sm-10">
                    {{Form::text('city', null, [ 'placeholder' => 'City', 'class' => 'form-control'])}}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Country</label>
                <div class="col-sm-10">
                    {{Form::text('country', null, [ 'placeholder' => 'Country', 'class' => 'form-control'])}}
                </div>
            </div>
		    <div class="form-group">
			    <label class="col-sm-2 control-label">Gender</label>
			    <div class="col-sm-10">
				    {{Form::radio('gender', 'male')}} Male
				    <br> 
				    {{Form::radio('gender', 'female')}} Female
			    </div>	
		    </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Porfile Image</label>
                <div class="col-sm-10">
                    {{Form::file('image')}}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Short Biography</label>
                <div class="col-sm-10">
                    {{Form::textarea('bio', null, ['placeholder' => 'Say a few things about you.', 'size' => '50x5', 'class' => 'form-control'])}}
                </div>
            </div>
        </div>
        <div class="media">
            <h4>Current Job Information</h4>
            <div class="form-group">
                <label class="col-sm-2 control-label">Company</label>
                <div class="col-sm-10">
                    {{Form::text('company', null, ['placeholder' => 'Company', 'class' => 'form-control'])}}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Position</label>
                <div class="col-sm-10">
                    {{Form::text('position', null, ['placeholder' => 'Position', 'class' => 'form-control'])}}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Job Description</label>
                <div class="col-sm-10">
                    {{Form::textarea('job_description', null, ['placeholder' => 'Give a short description of your current job.', 'size' => '50x5', 'class' => 'form-control'])}}
                </div>
            </div>
		    <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			        {{ Form:: submit('Sign Up', ['class' => 'btn btn-primary']) }}
                </div>
			</div>
		</div>
    {{Form::close()}}
@stop
