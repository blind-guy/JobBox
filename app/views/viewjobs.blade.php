@extends('layouts.master')

@section('title')
  <title>JobBox | My Jobs</title>
@stop

@section('style')
  <link rel="stylesheet" type="text/css" href="/css/jobs.css">
@stop

@section('content')
<div class="container-fluid"> 
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

    <div id="topmedia" class="media">
        <h2>{{$user->name}}'s Jobs</h2>
        <div class="list-group row">
            @foreach($jobs as $job)
                <a href="{{$job->job_url}}" class="list-group-item row">
                <strong style="padding-left: 5px;">Company: </strong>{{$job->company_name}}<br>
                <strong style="padding-left: 5px;">Position: </strong>{{$job->position}}<br>
                <strong style="padding-left: 5px;">Date Posted: </strong>{{$job->posted}}<br>
                <p><strong style="padding-left: 5px;">Summary: </strong>{{$job->summary}}</p>
                </a>
            @endforeach 
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

