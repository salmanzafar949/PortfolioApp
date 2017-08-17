@extends('layouts.app')
<style>

div.imagetiles div.col-lg-3.col-md-3.col-sm-3.col-xs-6{
  padding: 0px;
}
</style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@section('content')
<div class="container">
        <h1 class="my-4 text-center text-lg-left"> Portfolio</h1> <br>
        <div class="row text-center text-lg-left">
           @forelse($pt as $pr)
            <div class="col-lg-3 col-md-4 col-xs-6">
             @if($pr->user_id == Auth::id())
                <a href="/portfolio/edit/{{ $pr->id }}" class="btn btn-success">
                  <div class="glyphicon glyphicon-pencil pull-right">Edit</div>
                 </a>
                 <small>
                 <a href="/portfolio/delete/{{ $pr->id }}" class="btn btn-danger pull-right">
                   Delete
                 </a>
                 </small>
             @endif
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="{{Storage::url($pr->P_image)}}" alt="">
                </a>
            </div>
           @empty
            <div class="text-center"> <h1>Nothing found</h1></div>
            @if(Auth::check())
                  <a href="{{route('portfolio')}}" class="btn btn-success">Create portfolio</a> 
            @endif
           @endforelse
          </div>
  </div>
@stop