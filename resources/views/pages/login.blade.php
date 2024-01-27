@extends('layouts.auth')
@section('content')
<div id="content" class="site-content ">
    @if(session()->has('message'))
        <div class="modal fade" id="messageModal" tabindex="-1" aria-hidden="true">
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
                      <div class="simpleParallax"><img decoding="async" src="{{asset('assets/images/HowItWorks1.png')}}" class="cover-parallax" alt="image" style="transform: translate3d(0px, 150px, 0px) scale(1.3); will-change: transform; transition: transform 0.6s cubic-bezier(0, 0, 0, 1) 0s;"></div>
                      <div class="login_left_side">
                         <div class="login_content_box">
                            <a href="{{route('home')}}" class="login_logo"><img decoding="async" src="assets/images/FII.png" height="100" class="login_logo" alt="image"></a>
                            <div class="login_forms_box">
                               <h6>Get Started</h6>
                               <h2>Log into Account</h2>
                               <ul class=" mb-3" id="" >
                                  <li class="" role="presentation">
                                  </li>
                               </ul>
                                  <div >
                                     <form method="post" action="{{route('signin')}}" class="login-register-form register">
                                        @csrf
                                        <p class="form-row form-row-first validate-required" id="billing_first_name_field">
                                        <label>Email&nbsp;<abbr class="required" title="required">*</abbr></label>
                                        
                                            <input type="email" class="input-text" name="email" id="billing_first_name" placeholder="" value="">
                                    
                                        </p>
                                        <p class="form-row form-row-last validate-required" id="billing_last_name_field">
                                            <label>Password&nbsp;<abbr class="required" title="required">*</abbr></label>
                                            
                                                <input type="password" class="input-text" name="password" id="billing_last_name" placeholder="" value="">
                                        </p>
                                        <p>
                                            <button type="submit" class="btn btn-outline-tripcel">LOGIN</button>
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