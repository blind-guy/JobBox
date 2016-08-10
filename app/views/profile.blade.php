@extends('layouts.master')

@section('style')
	<link rel="stylesheet" type="text/css" href="/css/login.css">
@stop

@section('content')
<!--	<br></br>Name: <input type="text" class="form-control" id="profile_name" name="profile[name]" type="text" value={{$user->name}} />
	Email: <input type="text" class="form-control" type="text" value={{$user->email}} />
	Location: <input type="text" class="form-control" type="text" value={{$user->location}} />
	Date of Birth: <input type="date" class="form-control" type="text" value={{$user->email}} />
	<br><input type="submit" class="form-control" value="Submit"></br>-->
			<br></br>
			{{Form::open(['action'=> 'ProfileController@EditProfile', 'method' => 'GET', 'class' => 'form-horizontal'])}}	
			<div class="form-group">
				<label class="col-sm-2 control-label"></label>
				<div class="col-sm-10">
							{{ Form::text('name', $user->name, [ 'placeholder' => 'Name', 'class' => 'form-control', 'required']) }} 
				</div>
			</div>			
			<div class="form-group">
				<label class="col-sm-2 control-label"></label>
				<div class="col-sm-10">
					{{ Form::email('email', $user->email, [ 'placeholder' => 'Email', 'class' => 'form-control', 'required']) }}
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label"></label>
				<div class="col-sm-offset-2 col-sm-10">
					{{Form::text('country', $user->country,  ['placeholder' => 'Country', 'class' => 'form-control'])}}
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label"></label>
				<div class="col-sm-offset-2 col-sm-10">
					{{Form::textarea('bio', $user->bio, ['size' => '50x5', 'placeholder' => 'Bio', 'class' => 'form-control'])}}
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label"></label>
				<div class="col-sm-offset-2 col-sm-10">
					{{Form::text('company', $user->company,  ['placeholder' => 'Company', 'class' => 'form-control'])}}
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label"></label>
				<div class="col-sm-offset-2 col-sm-10">
					{{Form::text('position', $user->position,  ['placeholder' => 'position', 'class' => 'form-control'])}}
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label"></label>
				<div class="col-sm-offset-2 col-sm-10">
					{{Form::textarea('job_description', $user->job_description,  ['size' => '50x5', 'placeholder' => 'Job Description', 'class' => 'form-control'])}}
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label"></label>
				<div class="col-sm-offset-2 col-sm-5">
				{{ Form:: submit('Submit Changes', [ 'class' => 'btn btn-primary btn-block']) }}
				</div>
			</div>
	
	
			{{Form::close()}}
@stop