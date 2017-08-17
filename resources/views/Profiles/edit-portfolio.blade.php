@extends('layouts.app')
@section('content')
@if(count($errors)>0)
  @foreach($errors->all() as $error)
   <div class="alert alert-danger"> {{ $error }} </div>
  @endforeach
@endif
<form class="form-horizontal" action="/portfolio/update/{{$project->id}}" method="get" enctype="multipart/form-data">
   {{csrf_field()}}
  <fieldset>
    <legend>Create Portfolio</legend>
     {{--  <input type="hidden" name="user-id" value="{{ Auth::id()}}">  --}}
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Project Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="p_name" id="inputEmail" value="{{ $project->p_name}}">
      </div>
    </div>
     <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Project url</label>
      <div class="col-lg-10">
        <input type="url" class="form-control" name="p_url" id="inputEmail" value="{{ $project->p_url}}">
      </div>
    </div>
    <div class="form-group">
      <label for="desc" class="col-lg-2 control-label">Project Description</label>
      <div class="col-lg-10">
        <textarea class="form-control" name="p_desc" rows="3" id="textArea" placeholder="">{{ $project->p_desc}}</textarea>
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Company Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="P_organization" id="inputEmail" value="{{ $project->P_organization}}">
      </div>
    </div>
     <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Project Image</label>
      <div class="col-lg-10">
        <input type="file" class="form-control" name="" id="inputEmail" accept="image/*">
      </div>
    </div>
<div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>
@stop