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
        <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item">
                <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('client.password')}}"
                ><i class="bx bx-bell me-1"></i> Change Password</a
                >
            </li>
            </ul>
            <div class="card mb-4">
            <h5 class="card-header">Profile Details</h5>
            <!-- Account -->
            <hr class="my-0" />
            <div class="card-body">
                <form id="formAccountSettings" method="POST" action="{{route('client.profileUpdate')}}">
                    @csrf
                <div class="row">
                    <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">First Name</label>
                    <input
                        class="form-control"
                        type="text"
                        id="firstName"
                        name="firstName"
                        value="{{$user->firstName}}"
                        autofocus />
                    </div>
                    <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input class="form-control" type="text" name="lastName" id="lastName" value="{{$user->lastName}}" />
                    </div>
                    <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input
                        class="form-control"
                        type="text"
                        id="email"
                        name="email"
                        value="{{$user->email}}"
                        placeholder="john.doe@example.com" />
                    </div>
                    <div class="mb-3 col-md-6">
                    <label class="form-label" for="phoneNumber">Phone Number</label>
                    <div class="input-group input-group-merge">
                        <!-- <span class="input-group-text"></span> -->
                        <input
                        type="text"
                        id="phoneNumber"
                        name="phone"
                        class="form-control"
                        value="{{$user->phone}}" />
                    </div>
                    </div>
                    <div class="mb-3 col-md-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{$user->address}}" />
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Update</button>
                </div>
                </form>
            </div>
            <!-- /Account -->
            </div>
        </div>
        </div>
    </div>
@endsection