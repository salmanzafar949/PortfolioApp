@extends('layouts.app')
@section('content')
<div class="container">
  <div class="col-md-6 col-md-offset-3">
  {{--  @if($users->total() > 0)
  <h3> {{ $users->total() }} Total Users </h3>
  <b> In this page ({{ $users->count() }} users) </b>
  @endif  --}}
    <a href="{{ url('/register') }}">
    <button class="btn btn-lg btn-success pull-right">Add User</button><br>
    </a>
   @if(Session::has('flash_message'))
                            <div class="alert alert-success">
                                {{ Session::get('flash_message') }}
                            </div>
                        @endif
     <ul class="list-group">
        @forelse($users as $user)
        <li class="list-group-item" style="margin-top: 20px;">
            <span>
                {{ $user->name }}
            </span>
            <span class="pull-right clearfix">
             Joined  {{ $user->created_at->diffForHumans() }}
              <a href="{{ route('admin/edit', ['id'=> $user->id])}}" class="btn btn-xs btn-primary">Edit User</a>
               <a href="{{ route('admin/delete', ['id'=> $user->id])}}" class="btn btn-xs btn-danger">Delete User</a>
            </span>
        </li>
     
@empty
     <div class=" text-center"> <h1> No User Found</h1></div>
@endforelse
{{ $users->links() }}
        </ul>
            
</div>
@stop