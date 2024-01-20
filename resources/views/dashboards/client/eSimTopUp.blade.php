@extends('layouts.dashboard')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('esim.index', ['userId' => 1])}}">Esim/</a></span> Top up Esim</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <h5 class="card-header">{{$selectedEsim['eSimCountryName']}}<i class="mx-2 fi fi-{{$selectedEsim['eSimCountryIso2']}}"></i>: {{$selectedEsim['esimIccid']}} </h5>
                    <div class="table-responsive text-nowrap"  style="max-height: 400px; overflow-y: auto;">
                        <table class="table table-hover">
                        <thead>
                            <tr>
                            <th>Data bought</th>
                            <th>Data remaining</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Status</th>
                            <th>Date Activated</th>
                            <th>Countries Enabled</th>
                            
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0 h-100">
                            @if(count($esimPlans)>0)
                                @foreach($esimPlans as $plan)
                                    <tr>
                                        <td>
                                            <span class="fw-medium">{{$plan['data_quota_bytes']}}</span>
                                        </td>
                                        <td>{{$plan['data_bytes_remaining']}}</td>
                                        <td>
                                            {{$plan['start_time']}}
                                        </td>
                                        <td>{{$plan['end_time']}}</td>
                                        <td>
                                            <span class="badge @if($plan['network_status'] == 'Active') bg-label-primary @else bg-label-danger @endif me-1">{{$plan['network_status']}}</span></td>
                                        <td>{{$plan['date_activated']}}</td>
                                        <td> {{implode(",",$plan['countries_enabled'])}}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td><h3> No Data Plan Active here</h3></td>
                                </tr>
                            @endif
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl">
            
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Choose Region</h5>
                    </div>
                    <div class="card-body">
                        <form method="get" action="{{route('esim.addToCart')}}">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Data plans</label>
                            <div class="col-sm-10">
                            <select id="largeSelect" class="form-select form-select-md" name="esimProduct">
                                @if(count($products) > 0)
                                    @foreach ($products as $product)
                                        <option value="{{$product['uid']}}">{{$product['name']}} - ${{$product['price_usd']}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <input type="hidden" name="esimIccid" value="{{$selectedEsim['esimIccid']}}">
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </div>
                        </div>
                        </form>
                    </div>
                    </div>
            </div>
        </div>
    </div>
@endsection