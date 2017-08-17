@extends('layouts.app')
@section('content')
@if(count($errors)>0)
  @foreach($errors->all() as $error)
   <div class="alert alert-danger"> {{ $error }} </div>
  @endforeach
@endif
<form class="form-horizontal" action="/portfolio/create" method="post" enctype="multipart/form-data">
   {{csrf_field()}}
  <fieldset>
    <legend>Create Portfolio</legend>
     <input type="hidden" name="user-id" value="{{ Auth::id()}}">
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Project Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="p_name" id="inputEmail" placeholder="Project Name e.g online admission system">
      </div>
    </div>
     <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Project url</label>
      <div class="col-lg-10">
        <input type="url" class="form-control" name="p_url" id="inputEmail" placeholder="Project url e.g www.example.com">
      </div>
    </div>
    <div class="form-group">
      <label for="desc" class="col-lg-2 control-label">Project Description</label>
      <div class="col-lg-10">
        <textarea class="form-control" name="p_desc" rows="3" id="textArea" placeholder=""></textarea>
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Company Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="P_organization" id="inputEmail" placeholder="Project Description e.g  a system that keeps track of all studen records">
      </div>
    </div>
     <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Company Name</label>
      <div class="col-lg-10">
        <input type="file" class="form-control" name="P_image" id="inputEmail" accept="image/*">
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