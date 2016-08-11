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
        <h4>Recent Jobs<h4>
    </div>
@stop
