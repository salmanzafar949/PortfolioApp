@extends('layouts.app')
@section('content')
 @if(Session::has('flash_message'))
                            <div class="alert alert-success">
                                {{ Session::get('flash_message') }}
                            </div>
                        @endif
   @if(count($errors)>0)
     @foreach($errors->all() as $error)
       <div class="alert alert-danger">{{ $error }}</div>
     @endforeach
   @endif
<form class="form-horizontal" action="/contact-us" method="post">
   {{csrf_field()}}
  <fieldset>
    <legend>Contact us</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
      </div>
    </div>
    <div class="form-group">
      <label for="Name" class="col-lg-2 control-label">name</label>
      <div class="col-lg-10">
        <input type="text" name="name" class="form-control" id="inputname" placeholder="Name">
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Message</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" name="message" id="textArea"></textarea>
      </div>
    </div>
   {{--  @captcha()  --}}
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>
@stop