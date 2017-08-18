@extends('layouts.app')
@section('content')
@forelse($users as $user)
<div>
 {{ $user->name }}
 <a href="{{ route('profile', ['slug'=> $user->slug])}}" class="btn btn-lg btn-primary">View users Profile</a>
</div>
@empty
Non Users
@endforelse

@stop