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
			THE ID IS {{$user->id}}
			{{Form::open(['action'=> 'ProfileController@EditProfile', 'method' => 'GET', 'class' => 'form-horizontal'])}}	
			<div class="form-group">
				<label class="col-sm-2 control-label">Name</label>
				<div class="col-sm-10">
							{{ Form::text('name', $user->name, [ 'placeholder' => 'Name', 'class' => 'form-control', 'required']) }} 
				</div>
			</div>			
			<div class="form-group">
				<label class="col-sm-2 control-label">Email</label>
				<div class="col-sm-10">
					{{ Form::email('email', $user->email, [ 'placeholder' => 'Email', 'class' => 'form-control', 'required']) }}
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Country</label>
				<div class="col-sm-offset-2 col-sm-10">
					{{Form::text('country', $user->country,  ['placeholder' => 'Country', 'class' => 'form-control'])}}
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Bio</label>
				<div class="col-sm-offset-2 col-sm-10">
					{{Form::textarea('bio', $user->bio, ['size' => '50x5', 'placeholder' => 'Bio', 'class' => 'form-control'])}}
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Company</label>
				<div class="col-sm-offset-2 col-sm-10">
					{{Form::text('company', $user->company,  ['placeholder' => 'Company', 'class' => 'form-control'])}}
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Position</label>
				<div class="col-sm-offset-2 col-sm-10">
					{{Form::text('position', $user->position,  ['placeholder' => 'position', 'class' => 'form-control'])}}
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Job Description</label>
				<div class="col-sm-offset-2 col-sm-10">
					{{Form::textarea('job_description', $user->job_description,  ['size' => '50x5', 'placeholder' => 'Job Description', 'class' => 'form-control'])}}
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Profile Image</label>
				<div class="col-sm-offset-2 col-sm-10">
					<img class="media-object dp img-circle" src="{{$user->profile_pic}}" style="width: 100px;height:100px;">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label"></label>
				<div class="col-sm-offset-2 col-sm-10">
					{{Form::file('image')}}
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