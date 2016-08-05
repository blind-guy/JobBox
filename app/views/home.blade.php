@extends('layouts.master')

@section('content')
<div class="container>
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        <p>
            {{$user->name}} is currently signed in
        </p>
    </div>
</div>
@stop
