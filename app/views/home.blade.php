@extends('layouts.master')

@section('style')
    <style>
    .media{
        box-shadow:0px 0px 4px -2px #000;
        margin: 20px 0;
        padding:30px;
        background-color: #f8f8f8;
    }
    #profile{
        margin: 20px 0px 0px 0px;
    }
    </style>
@stop

@section('content')
    <div id="profile" class="media">
        <a class="pull-left" href="#">
            <img class="media-object dp img-circle" src="{{$user->profile_pic}}" style="width: 100px;height:100px;">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$user->name}}<small> {{$user->city}}, {{$user->country}}</small></h4>
            <h5>{{$user->position}} at {{$user->company}}</h5>
            <hr style="margin:8px auto">

            <p>
                {{$user->bio}}                
            </p>
        </div>
    </div>
    <div class="media">
        <h4>Custom Job Search</h4>
        {{Form::open(['action' => 'HomeController@jobSearch', 'method' => 'POST', 'class' => 'form-horizontal'])}}
            <div class="form-group">
                <label class="col-sm-2 control-label">Location</label>
                <div class="col-sm-10">
                    {{Form::text('location', null, ['placeholder' => 'city, state, or zip', 'class' => 'form-control', 'required']) }}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Keywords</label>
                <div class="col-sm-10">
                    {{Form::text('keywords', null, ['placeholder' => 'search terms', 'class' => 'form-control', 'required']) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    {{ Form:: submit('Search', ['class' => 'btn btn-primary']) }}
                </div>
            </div>
        {{Form::close()}}
    </div>
    <div class="media">
        <h4>Job Search Results</h4>
        @if($search_results === null)
            <p>No Results to Display</p>
        @else
            <p>Location: {{$search_results->location}} | Keywords: {{$search_results->query}}</p>
            <div class="list-group">
            @foreach($search_results->results->result as $jobresult)
                <small><a href="{{$jobresult->url}}" class="list-group-item"><strong>{{$jobresult->company}}:</strong><br>{{$jobresult->jobtitle}} in {{$jobresult->city}}, {{$jobresult->state}}</a></small>
            @endforeach
        @endif
    </div>
@stop
