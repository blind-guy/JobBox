@extends('layouts.master')

@section('title')
  <title>JobBox | My Jobs</title>
@stop

@section('style')
  <link rel="stylesheet" type="text/css" href="/css/jobs.css">
@stop

@section('content')
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="/feed">My Jobs</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$user->name}} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/logout">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>		
  @if (Session::has('error_message'))
    <div class="alert alert-danger">{{ Session::get('error_message') }}</div>
  @endif
  @if (Session::has('success_message'))
    <div class="alert alert-success">{{ Session::get('success_message') }}</div>
  @endif
<div class="container">
  <div class="row-fluid">
      <div class="col-md-4">
          <div class="profile">
              <img src="{{$user->profile_pic}}">
              <h1>{{$user->name}}</h1>
              <p>{{$user->gender}}</p>
              <p>{{$user->location}}</p>
          </div>
          <hr>
          <div class="post-form">
            <h4>Add Friends</h4>
            {{Form::open(['action' => 'FriendsController@addFriend', 'method'=> 'POST', 'class' => "form"])}}
              <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="What's your friends email?">
              </div>
              <div class="form-group">
                {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
              </div>
            {{Form::close()}}
          </div>
      </div>

      <div class="col-md-8">

          <div class="post-form friends">
          <div class="well">{{$user->name}}'s friends   ({{$user->num_of_friends}})</div>
            <hr>
              @foreach($friends as $friend)
                <div class="friend clearfix">
                  <h4>{{$friend->fname}}</h4>
                  <h5>  Friends since {{  \Carbon\Carbon::createFromTimeStamp(strtotime($friend->created_at))->toFormattedDateString() }}</h5>

                  <!-- Create a div to hide with a button to shoe details -->
                  <div id="more" class="hidden panel-body">
                    <h5> {{$friend->fname}} {{$friend->lname}}</h5>
                    <h5>  {{$friend->email}} </h5>
                    <h5>  {{$friend->city}}</h5>
                    <h5>  {{$friend->country}}</h5>
                  </div>  
                  <!-- Hidden div -->  
                    <button type="button" class="btn btn-primary" id="showMe" data-toggle="collapse"> Details </button>    
                  <hr>          
                </div>
              @endforeach
          </div>
      </div>
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

