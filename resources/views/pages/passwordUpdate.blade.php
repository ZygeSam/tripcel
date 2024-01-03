@extends('layouts.auth')
@section('content')
<div id="content" class="site-content ">
    @if(session()->has('message'))
        <div class="modal fade" id="messageModal" tabindex="-1" aria-hidden="true"  data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Message</h5>
                </div>
                    <div class="modal-body">
                            <div class="row">
                               {{session()->get('message')}}
                            </div>
                    </div>
                    <div class="modal-footer">
                        
                    </div>
            
            </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $('#messageModal').modal('show');
            });
        </script>
    @endif
    @if($errors->any())
        <div class="modal fade" id="errorModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Form Error</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                            <div class="row">
                                @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{$error}}  
                                </div>
                            @endforeach
                            </div>
                    </div>
                    <div class="modal-footer">
                        
                    </div>
            
            </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $('#errorModal').modal('show');
            });
        </script>
    @endif
    <div class="no-container">
       <div class="no-row">
          <div class="full_width_box">
         
                <div class="whole_login_content">
                   <div class="register_login">
                      <div class="simpleParallax"><img decoding="async" src={{asset("assets/images/esmdisplay.jpg")}} class="cover-parallax" alt="image" style="transform: translate3d(0px, 37px, 0px) scale(1.3); will-change: transform; transition: transform 0.6s cubic-bezier(0, 0, 0, 1) 0s;"></div>
                      <div class="login_left_side">
                         <div class="login_content_box">
                            <a href="{{route('home')}}" class="login_logo"><img decoding="async" src={{asset("assets/images/FII.png")}} height="100" class="login_logo" alt="image"></a>
                            <div class="login_forms_box">
                               <h2>Reset Your Password</h2>
                               <ul class=" mb-3" id="" >
                                  <li class="" role="presentation">
                                  </li>
                               </ul>
                                  <div >
                                     <form method="post" action="{{route('resetPassword')}}" class="login-register-form register">
                                        @csrf
                                        <input type="hidden" name="email" value="{{$email}}">
                                        <p class="form-row form-row-last validate-required" id="billing_last_name_field">
                                            <label>Password&nbsp;<abbr class="required" title="required">*</abbr></label>
                                            
                                                <input type="password" class="input-text" name="password" id="" placeholder="" value="">
                                        </p>
                                        <p class="form-row form-row-last validate-required" id="billing_last_name_field">
                                            <label>Confirm Password&nbsp;<abbr class="required" title="required">*</abbr></label>
                                            
                                                <input type="password" class="input-text" name="confirmPassword" id="" placeholder="" value="">
                                        </p>
                                        <p>
                                            <button type="submit" class="btn btn-outline-tripcel">RESET</button>
                                        </p>
                                        <p class="mt-3"><a href="{{route('forgotPassword')}}">Forgot Password ?</a></p>
                                        
                                     </form>
                                  </div>
                               
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
        
          </div>
       </div>
    </div>
 </div>
@endsection