@extends('layouts.master')

@section('title')
  <title>JobBox | My Jobs</title>
@stop

@section('style')
  <link rel="stylesheet" type="text/css" href="/css/jobs.css">
@stop

@section('content')
<div class="container-fluid"> 
    <!--col 1 -->
    
    <div class="col-md-1">
    </div>

    <!--col 2 -->
    <div class="col-md-10 jobform">
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

      <h1 class="text-center">{{$user->name}}'s Jobs</h1>
      <hr>
      @foreach($jobs as $job)
                <div class="row job clearfix">
                  <div class="col-md-7">
                    <h3>{{$job->position}}</h3>
                    <h4>{{$job->company_name}}</h4>

                    <div class="panel-body" id="job_details">
                      <h5>Date Posted: {{$job->posted}}</h5>
                      <h6>{{$job->summary}}</h6>
                    </div>
                  </div>  

                  <div class="col-md-3 container-fluid">
                   <a href="http://{{$job->job_url}}" class="btn btn-default btn-block" id="job_url">View Listing</a>
                  </div>     
              
                </div>
                <hr>
      @endforeach 
    </div>
    <!-- end of form -->

    <!--col 3 -->
    <div class="col-md-1">

    </div>  
  </div>
  <div class="container-fluid">
    <div class="row" style="height:50px">
    </div>
  </div>
@stop

@section('footer')
<script>
  $(document).ready(function(){
      $("button").click(function(){
          $(this).closest("div").find("#more").toggleClass("hidden", 4000, "easeOutCirc" );
      });
  });

</script>
@stop

