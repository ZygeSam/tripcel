@extends('layouts.dashboard')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>
        @if(session()->has('message'))
                            <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="modalCenterTitle">Support Ticket</h5>
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
                <a class="nav-link" href="{{route('client.profile')}}"><i class="bx bx-user me-1"></i> Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('client.password')}}"
                ><i class="bx bx-bell me-1"></i> Change Password</a
                >
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{route('client.support')}}"
                ><i class='bx bx-user-voice me-1' ></i></i> Support</a
                >
            </li>
            </ul>
            <div class="row">
                <div class="col-md-6 col-12 mb-md-0 mb-4">
                  <div class="card">
                    <h5 class="card-header">Send a Message to Admin</h5>
                    <div class="card-body">
                      <p>Our Support is 24/7. Kindly send us your challenge to rectify for you</p>
                      <!-- Connections -->
                          <form method="post" action="{{route('client.supportTicket')}}">
                            <div class="modal-body">
                                    <div class="row">
                                            @csrf
                                            <div class="col mb-3">
                                              <input type="hidden" name="user_id" id="" value="{{Auth::user()->id}}">
                                              <input type="text" name="subject" class="form-control" placeholder="Subject" value="">
                                                <textarea placeholder="Message" class="form-control my-3" name="message" id="" ></textarea>
                                            </div>
                                    </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Send</button>
                          </form>
                      <!-- /Connections -->
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="card">
                    <h5 class="card-header">Messages</h5>
                    <div class="card-body" style="max-height: 300px; overflow-y:auto">
                      <p>See your conversations with our help desk</p>
                      <!-- Social Accounts -->
                      @if (count($tickets) > 0)
                        @foreach ($tickets as $ticket)
                          <div class="d-flex mb-3">
                            <div class="flex-grow-1 row">
                              <div class="col-8 col-sm-7 mb-sm-0 mb-2">
                                <h6 class="mb-0">
                                    <a href="#" class="subject-link" data-url="{{ route('ticket.message', $ticket->id) }}">
                                        {{ $ticket->subject }}
                                    </a>
                                </h6>
                                <small class="text-muted">{{Str::limit($ticket->message, 20)}}</small> <br />
                                <small class="text-muted">Created {{$ticket->created_at->diffForHumans()}}</small>
                              </div>
                              <div class="col-4 col-sm-5 text-end">
                                @if($ticket->admin == null)
                                  Sent by user
                                @else
                                  Sent by Admin
                                @endif
                              </div>
                            </div>
                          </div>
                        @endforeach
                        
                      @endif

                      <!-- Modal -->
                        <div class="modal" id="messageModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h3 id="subjectContent"></h3>
                                        <hr>
                                        <p id="messageContent"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- JavaScript -->
                        <script>
                            $(document).ready(function() {
                                $('.subject-link').on('click', function(e) {
                                    e.preventDefault();
                                    var url = $(this).data('url');
                                    $.get(url, function(data) {
                                        $('#subjectContent').text(data.subject);
                                        $('#messageContent').text(data.message);
                                        $('#messageModal').modal('show');
                                    });
                                });
                            });
                        </script>
                      
                      <!-- /Social Accounts -->
                    </div>
                  </div>
                </div>
              </div>
        </div>
        </div>
    </div>
    @include('partials.addon')
@endsection