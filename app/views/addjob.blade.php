@extends('layouts.master')

@section('title')
	<title>JobBox | Add a New Job</title>
@stop

@section('style')
	<link rel="stylesheet" type="text/css" href="/css/addjob.css">
@stop

@section('content')
    <div id="topmedia" class="media">
    	<div class="jobform">
	    	@if(Session::has('error_message'))
    	    	<div class="alert alert-danger" role="alert">	
	                {{Session::get('error_message')}}
    		    </div>
    		@endif
	    
    	    @if(Session::has('success_message'))
			    <div class="alert alert-success" role="alert">	
                    {{Session::get('success_message')}}
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

    		<h1 class="col-sm-offset-2">Add a New Job</h1>
	    	<hr>

		    {{Form::open(['action'=> 'JobsController@addJob', 'method' => 'POST', 'class' => 'form-horizontal'])}}
			    <div class="form-group">
				    <label class="col-sm-2 control-label">Position</label>
				    <div class="col-sm-10">
					    {{ Form::text('position', null, [ 'placeholder' => 'Position', 
					    'class' => 'form-control', 'required']) }}
				    </div>
			    </div>
			    <div class="form-group">
				    <label class="col-sm-2 control-label">Company</label>
				    <div class="col-sm-10">
					    {{ Form::text('company', null, ['placeholder' => 'Company', 'class' => 'form-control', 'required']) }}
{{--					    {{ Form::select('company', $company_options, Input::old('company'), ['placeholder' => 'Company', 'class' => 'form-control', 'required']) }} --}}
				    </div>	
			    </div>	
			    <div class="form-group">
				    <label class="col-sm-2 control-label">Summary</label>
				    <div class="col-sm-10">
					    {{ Form::textarea('summary', null, [ 'placeholder' => 'Add a summary here...', 'class' => 'form-control'])}}
				    </div>	
    			</div>	
	    		<div class="form-group">
		    		<label class="col-sm-2 control-label">Date Posted (YYYY-MM-DD)</label>
			    	<div class="col-sm-10">
				    	{{Form::input('date_posted', 'date', null, ['id' => 'calendar', 'class' => 'form-control', 'placeholder' => 'Date', 'required'])}}
				    </div>	
			    </div>
			    <div class="form-group">
				    <label class="col-sm-2 control-label">Contact</label>
				    <div class="col-sm-10">
{{--					    {{ Form::select('contact', $contact_options, Input::old('contact'), ['placeholder' => 'Contact', 'class' => 'form-control', 'required']) }} --}}				    
                        {{ Form::text('contact', null, [ 'placeholder' => 'Contact', 
					    'class' => 'form-control', 'required']) }}
		    		</div>
			    </div>
			    <div class="form-group">
				    <label class="col-sm-2 control-label">Job URL</label>
    				<div class="col-sm-10">
	    				{{ Form::text('job_url', null, [ 'placeholder' => 'Job URL', 
		    			'class' => 'form-control', 'required']) }}
			    	</div>
			    </div>
			    <div class="btn-group inline">
			        {{ Form::submit('Add Job', [ 'class' => 'btn btn-primary']) }}			
				    {{ Form::reset('Clear form', ['class' => 'btn btn-default']) }}
    			</div>
	
	    	{{Form::close()}}
	    </div>
    </div>
@stop

@section('footer')
<script type="text/javascript">
	$(function() {
		$( "#calendar" ).datepicker({
		});
	});
</script>
@stop
