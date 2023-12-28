@extends('layouts.dashboard')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('client.index')}}">Dashboard/</a></span> Esim</h4>

        <!-- Basic Layout -->
        <div class="row">
        <div class="col-xl">
            <div class="card mb-4 h-75">
            <div class="card-header d-flex justify-content-between align-items-center">
                        <!-- Modal -->
                        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
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
                              <form method="post" action="{{route('esim.store')}}">
                                    <div class="modal-body">
                                            <div class="row">
                                                    @csrf
                                                    <div class="col mb-3">
                                                        <label class="col-sm-2 col-form-label" for="basic-default-company">Regions</label>
                                                        <input type="hidden" name="userId" value="1">
                                                        <select id="largeSelect" class="form-select form-select-md" name="esimProduct">
                                                            @if(count($countries) > 0)
                                                                @foreach ($countries as $country)
                                                                    <option value="{{($country['country_iso2']!=='0') ? $country['country_iso2'] : $country['country_iso3'] }}">{{$country['country_name']}}</option>
                                                                @endforeach
                                                            @else
                                                                <p>No Country Available</p>
                                                            @endif
                                                        </select>
                                                    </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </div>
                              </form>
                            </div>
                          </div>
                        </div>
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
                <h5 class="mb-0">ESim List</h5>  <a type="button" data-bs-toggle="modal" data-bs-target="#modalCenter" class="text-tripcel">Add New Esim</a>
            </div>
            <div class="card-body overflow-auto">
                <ul class="p-0 m-0">
                    @if(count($userEsims)>0)
                        @foreach($userEsims as $esim)
                            <li class="d-flex mb-4 pb-1">
                                <a href="{{route('esim.index', ['userId'=>1, 'country'=>$esim['eSimCountryName']])}}" class="text-tripcel">
                                    <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-primary"
                                        ><i class="fi fi-{{($esim['eSimCountryIso2']!=='0') ? $esim['eSimCountryIso2'] : $esim['eSimCountryIso3']}}"></i
                                    ></span>
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">{{$esim['eSimCountryName']}}: {{$esim['esimIccid']}}</h6>
                                        <small class="text-tripcel">{{$esim['created_at']}}</small>
                                    </div>
                                </a>
                                <div class="user-progress">
                                    <a href="{{route('esim.topup', ['userId'=>1, 'country'=>$esim['eSimCountryName']])}}"><small class="fw-medium btn btn-outline-tripcel">Top up</small></a>
                                </div>
                                </div>
                            </li>
                        @endforeach
                    @else
                            <p>No Esim Available</p>
                    @endif
                </ul>
            </div>
            </div>
        </div>
        <div class="col-xl">
            <div class="card mb-4">
            <div class="card-header d-flex bg-tripcel justify-content-between align-items-center">
                <i class="fi fi-{{$selectedEsim["eSimCountryIso2"] ?? ''}} fs-5 "></i><h5 class="mb-0 text-white">{{$selectedEsim["eSimCountryName"] ?? ""}}</h5> 
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                        <td class="align-middle"><small class="text-light fw-medium">ICCID</small></td>
                        <td class="py-3">
                            <p class="mb-0">
                            {{$selectedEsim["esimIccid"] ?? ""}}
                            </p>
                        </td>
                        </tr>
                        <tr>
                        <td class="align-middle"><small class="text-light fw-medium">State</small></td>
                        <td class="py-4">
                            <p class="lead mb-0">
                            {{$selectedEsim["eSimState"] ?? ""}}
                            </p>
                        </td>
                        </tr>
                        <tr>
                        <td class="align-middle"><small class="text-light fw-medium">ASSIGNED DATE</small></td>
                        <td class="py-3">
                            <p class="text-muted mb-0">
                                {{$selectedEsim["eSimDateAssigned"] ?? ""}}
                            </p>
                        </td>
                        </tr>
                        <tr>
                        <td class="align-middle"><small class="text-light fw-medium">NETWORK STATUS</small></td>
                        <td class="py-3">
                            <p class="text-muted mb-0">
                                {{$selectedEsim["eSimNetworkStatus"] ?? ""}}
                            </p>
                        </td>
                        </tr>
                    </tbody>
                    </table>
            </div>
            </div>
        </div>
        </div>
        <div class="card">
        <h5 class="card-header">{{$selectedEsim["eSimCountryName"] ?? ""}} <i class="fi fi-{{$selectedEsim["eSimCountryIso2"] ?? ""}}"></i></h5>
        <div class="table-responsive text-nowrap">
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
            <tbody class="table-border-bottom-0">
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
@endsection