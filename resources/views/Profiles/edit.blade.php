@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                   Edit Your Profile
                   <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                   {{csrf_field()}}
                   
                    <div class="form-group">
                    <label for="avatar">Profile Pic</label>
                    <input type="file" name="avatar" class="form-control" accept="image/*">
                    </div>
                    <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" name="country" id="country" value="{{$info->country}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                    <label for="about">About  me</label>
                     <textarea name="about" id="about" cols="30" rows="10" class="form-control" required>
                      {{stripcslashes(trim($info->about))}}
                     </textarea>
                    </div>
                    <div class="form-group">
                     <p class="text-center">
                     <button type="submit" class="btn btn-primary btn-lg">
                     Update Profile
                     </button>
                     </p>
                    </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
