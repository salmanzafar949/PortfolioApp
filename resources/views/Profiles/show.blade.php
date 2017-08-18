@extends('layouts.app')

<style>

div.imagetiles div.col-lg-3.col-md-3.col-sm-3.col-xs-6{
  padding: 0px;
}
.img__description {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(29, 106, 154, 0.72);
  color: #fff;
  visibility: hidden;
  opacity: 0;

  /* transition effect. not necessary */
  transition: opacity .2s, visibility .2s;
}

#image-div:hover .img__description {
  overflow-y: scroll;
  visibility: visible;
  opacity: 1;
}

</style>
@section('content')
<div class="container">
        <h1 class="my-4 text-center text-lg-left"> Portfolio</h1> <br>
        <div class="row text-center text-lg-left">
           @forelse($pt as $pr)
            <div class="col-lg-3 col-md-4 col-xs-6" >
             @if($pr->user_id == Auth::id())
                <a href="/portfolio/edit/{{ $pr->id }}" class="btn btn-success btn-xs pull-right">
                  Edit
                 </a> &nbsp; &nbsp; 
                 <a href="/portfolio/delete/{{ $pr->id }}" class="btn btn-danger btn-xs pull-right">
                   Delete
                 </a>
             @endif
              <div id="image-div">
                <a href="{{Storage::url($pr->P_image)}}" target="_blank" class="d-block mb-4 h-100">
                    <figure>
                    <img class="img-fluid img-thumbnail" src="{{Storage::url($pr->P_image)}}" alt="">
                    @if($pr->p_desc !="")
                    <div class="img__description">{{ $pr-> p_desc }}</div>
                    @endif
                    <figcaption> {{ $pr-> p_name }} </figcaption>
                    </figure>
                </a>
                </div>
                  @if($pr->p_url !="")
                    <a href="{{ $pr->p_url }}"  target="_blank">Project url</a>
                  @else
                      <p class="text center  text-danger">No Url found</p>
                   @endif
                   @if($pr->P_organization !="")
                  <div class="float-sm-left"><b>Company:</b> {{ $pr-> P_organization }}</div>
                  {{--  @else
                  <div class="float-sm-left text-danger">No Descrpition</div>  --}}
                  @endif
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