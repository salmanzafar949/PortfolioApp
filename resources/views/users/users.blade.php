@extends('layouts.app')
@section('content')
<div class="container">
  <div class="col-md-6 col-md-offset-3">
     <ul class="list-group">
        @forelse($users as $user)
        <li class="list-group-item" style="margin-top: 20px;">
            <span>
                {{ $user->name }}
            </span>
            <span class="pull-right clearfix">
              <a href="{{ route('profile', ['slug'=> $user->slug])}}" class="btn btn-xs btn-primary"> View Profile</a>
            </span>
        </li>
     </ul>
@empty
Non Users
@endforelse
</div>
@stop