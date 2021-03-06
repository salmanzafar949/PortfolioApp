@extends('layouts.app')
@section('content')
<div class="container">
  <div class="col-md-6 col-md-offset-3">
  @if($users->total() > 0)
  <h3> {{ $users->total() }} Total Users </h3>
  <b> In this page ({{ $users->count() }} users) </b>
  @endif
  
     <ul class="list-group">
        @forelse($users as $user)
        <li class="list-group-item" style="margin-top: 20px;">
            <span>
                {{ $user->name }}
            </span>
            <span class="pull-right clearfix">
             Joined  {{ $user->created_at->diffForHumans() }}
              <a href="{{ route('profile', ['slug'=> $user->slug])}}" class="btn btn-xs btn-primary"> View Profile</a>
            </span>
        </li>
     
@empty
     <div class=" text-center"> <h1> No User Found</h1></div>
@endforelse
{{ $users->links() }}
        </ul>
            
</div>
@stop