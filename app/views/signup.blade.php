@extends('layouts.master')

@section('title')
<title>Sign Up for Job Box Today!</title>
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
			<h1>Sign Up</h1>
			<form>

				{{Form::open(['action'=> 'RegistrationController@signUp', 'method' => 'POST'])}}

					{{ Form::email('email', null, [ 'placeholder' => 'Email', 'required', 'class' => 'form-control']) }}
					<br>
					{{ Form::password('password' , [ 'placeholder' => 'Password', 'required'])}}
					<br>
					{{ Form::password('repassword' , [ 'placeholder' => 'Re Type Password', 'required'])}}	
					<br>
					{{Form::text('name', null, ['placeholder' => 'Name', 'required'])}}
					<br>
					<h4>Gender</h4>
					{{Form::radio('gender', 'male')}} Male
					<br>
					{{Form::radio('gender', 'female')}} Female
					<br>
					{{Form:: submit('Sign Up')}}

				{{Form::close()}}

				</form>
		</div>

		<div class="col-md-3">
		</div>


	
	</div>

</div>
@stop