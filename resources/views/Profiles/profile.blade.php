 @extends('layouts.app')
 @section('content')
              
              <div class="container">

                <div class="col-lg-12">

                     <div class="panel-default"> 
                      
                      <div class="panel-heading">
                      <p class="text-center">
                           {{ $user -> name}}'s Profile.
                        </p>
                       </div>

                        <div class="panel-body">
                        <center>
                         <img src="{{ Storage::url($user->avatar)}}" width="250px" height="250px" style="border-radius:50%;" alt="">
                        </center> <br>

                          <p class="text-center">
                              @if( Auth::id() == $user -> id)
                             <a href="{{route('profile.edit')}}" class="btn btn-lg btn-info">Edit your Profile</a>
                             @else
                                 <a href="{{ route('show', ['slug'=> $user->slug])}}" class="btn btn-lg btn-primary">View users portfolio</a>
                             @endif 
                             
                          </p>

                        </div>
                     
                     </div>

                     <div class="panel-default"> 
                      
                      <div class="panel-heading">
                      <p class="text-center">
                           About me.

                        </p>
                       </div>

                        <div class="panel-body">
                          <p class="text-center">
                             {{ $user->profile->about }}
                          </p>
                           <p class="text-center"> {{ $user->profile->country }}</p>
                        </div>
                     
                     </div>
                </div>
                 
              </div>

 @stop