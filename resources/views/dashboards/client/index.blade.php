@extends('layouts.dashboard')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                <div class="card-body">
                    <h5 class="card-title text-primary">Welcome {{auth()->user()->firstName}} {{auth()->user()->lastName}}! 🎉</h5>
                    <p class="mb-4">
                    You have to explore the world today. There's still more to be done with your Tripcel ESim
                    </p>
                    <a href="{{route('esim.index',['userId'=> 1])}}" class="btn btn-sm btn-outline-tripcel">View Esim</a>
                    <a href="{{route('esim.index',['userId'=> 1])}}" class="btn btn-sm btn-outline-tripcel">Top Up Esim</a>
                    {{-- <button type="button" data-bs-toggle="modal" data-bs-target="#modalCenter" class="btn btn-sm btn-outline-tripcel">Send SMS</buttona> --}}
                </div>
                </div>
                
                <div class="col-sm-5 text-center text-sm-left">
                <div class="card-body pb-0 px-0 px-md-4">
                    <img
                    src={{asset("assets/images/esimworld.png")}}
                    height="140"
                    alt="View Badge User"
                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 order-1 ">
            <div class="row">
            <div class="col-lg-6 col-md-12 col-12 mb-4">
                <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <img
                        src={{asset("assets/images/icons/unicons/chart-success.png")}}
                        alt="chart success"
                        class="rounded" />
                    </div>
                    </div>
                    <span class="fw-medium d-block mb-1 d-fl">Total ESIm</span>
                    @if($totalEsims == 0)
                        <a href="#"><h3 class="card-title mb-2">0</h3></a>
                    @else
                        <a href="{{route('esim.index',['userId'=> 1])}}"><h3 class="card-title mb-2">{{$totalEsims}}</h3></a>
                    @endif
                </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 mb-4">
                <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <img
                        src={{asset("assets/images/icons/unicons/wallet-info.png")}}
                        alt="Credit Card"
                        class="rounded" />
                    </div>
                    </div>
                    <span>SMS and Credit Balance</span>
                    <h6 class="card-title text-nowrap mb-1"><a href="{{route('esim.index',['userId'=> 1])}}">Click here</a></h6>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-6 col-sm-12 order-3 order-md-2">
            <div class="row">
            <div class="col-12 mb-4">
                <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <img src={{asset("assets/images/icons/unicons/paypal.png")}} alt="Credit Card" class="rounded" />
                    </div>
                    </div>
                    <span class="d-block mb-1">Data balance</span>
                    <h6 class="card-title text-nowrap mb-1"><a href="{{route('esim.index',['userId'=> auth()->user()->id])}}">Click here</a></h6>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="row">
        <!-- ESim List -->
        <div class="col-md-6 col-lg-6 col-xl-6 order-0 mb-4">
            <div class="card ">
            <div class="card-header d-flex align-items-center justify-content-between pb-0">
                <div class="card-title mb-0">
                <h5 class="m-0 me-2">Esim List</h5>
                </div>
                <div class="dropdown">
                <a
                href="{{route('esim.index',['userId'=> 1])}}"
                    class="btn btn-outline-tripcel text-tripcel"
                    id="transactionID"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false">
                    View More
                </a>
                </div>
            </div>
            <hr>
            <div class="card-body overflow-auto">
                <ul class="p-0 m-0">
                    @if(count($userEsims)>0)
                        @foreach($userEsims as $esim)
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"
                                    ><i class="fi fi-{{$esim['eSimCountryIso2']}}"></i
                                ></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">{{$esim['eSimCountryName']}}: {{$esim['esimIccid']}}</h6>
                                    <small class="text-tripcel">Date Assigned:{{$esim['eSimDateAssigned']}}</small>
                                </div>
                                </div>
                            </li>
                        @endforeach
                    @else
                            <p>No Sim Available</p>
                    @endif
                </ul>
            </div>
            </div>
        </div>
        <!--/ ESim List -->

        <!-- Transactions -->
        <div class="col-md-6 col-lg-6 col-xl-6 order-2 mb-4">
            <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">ESim Transactions</h5>
                <div class="dropdown">
                <a
                href="{{route('esim.index',['userId'=> 1])}}"
                    class="btn btn-outline-tripcel text-tripcel"
                    id="transactionID"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false">
                    View More
                </a>
                </div>
            </div>
            <div class="card-body">
                <ul class="p-0 m-0" style="max-height: 500px; overflow-y: auto;">
                    @if(count($esimTransactions)>0)
                        @foreach($esimTransactions as $transaction)
                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-primary"
                                        ><i class="fi fi-{{$transaction->esim['eSimCountryIso2']}}"></i
                                    ></span>
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">{{$transaction->esim['eSimCountryName']}}: {{$transaction->esim['esimIccid']}}</h6>
                                        <small class="text-tripcel">{{$transaction->eSimPlanName}} </small>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-medium">Expiry: {{$transaction->dataEndTime}}</small>
                                    </div>
                                    </div>
                                </li>
                            
                        @endforeach
                        @else
                            <p>No Transaction Available</p>
                    @endif
                </ul>
            </div>
            </div>
        </div>
        <!--/ Transactions -->
        </div>
    </div>
@endsection