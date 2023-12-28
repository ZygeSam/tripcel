@extends('layouts.dashboard')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>
        @if(session()->has('message'))
                            <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="modalCenterTitle">Create New Esim Profile</h5>
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
                                    $('#successModal').modal('show');
                                });
                            </script>
                            {{session()->forget('message')}}
        @endif
        @if($errors->any())
            <div class="modal fade" id="errorModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Create New Esim Profile</h5>
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
        <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item">
                <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./password.html"
                ><i class="bx bx-bell me-1"></i> Change Password</a
                >
            </li>
            </ul>
            <div class="card mb-4">
            <h5 class="card-header">Change Password</h5>
            <!-- Account -->
            <hr class="my-0" />
                <div class="card-body">
                    <form method="post" action="{{route('client.passwordChange')}}">
                        @csrf
                        <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">NEW PASSWORD</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="basic-default-name" placeholder="John Doe" name="password">
                        </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">CONFIRM PASSWORD</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="basic-default-company" placeholder="ACME Inc." name="confirmPassword">
                            </div>
                            <div class="col-sm-10 mt-4">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            <!-- /Account -->
            </div>
        </div>
        </div>
    </div>
@endsection