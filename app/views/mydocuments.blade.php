@extends('layouts.master')

@section('title')
  <title>JobBox | My Documents</title>
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

      <h1 class="text-center">{{$user->name}}'s Documents</h1>
      <hr>
    
    </div>
      {{Form::open(['action'=> 'DropboxAuthenticationController@uploadDocument', 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true])}}<br>
    <div class="form-group">
      <label class="col-sm-2 control-label">Upload Document</label>
      <div class="col-sm-10">
        {{Form::file('image')}}
        <br>
    </div>
    <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            {{ Form:: submit('Submit', ['class' => 'btn btn-primary']) }}<br>
          </div>
    </div>

    <!-- end of form -->

    <!--col 3 -->
    <div class="col-md-1">
    <div class="friends">
          @foreach($docs as $doc)
              <div class="doc">
                  <h4>{{$doc->name}}</h4>

                </div>
            @endforeach
          </div>


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

