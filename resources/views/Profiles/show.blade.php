@extends('layouts.app')
@section('content')
<div class="container">
<div class="text-center"><h1> Portfolio </h1></div>
    <div class="row">
    @forelse($pt as $pr)
       <img src="{{Storage::url($pr->P_image)}}" alt="" class="img-responsive">
    @empty
     <div class="text-center">Nothing found</div>
     @endforelse
    </div>
</div>
@stop