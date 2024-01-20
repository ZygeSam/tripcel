@extends('layouts.dashboard')
@section('content')
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

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('client.index')}}">Dashboard/</a></span> Esim</h4>

        <!-- Basic Layout -->
        <div class="row mb-4">
            <div class="col-xl col-lg-6 col-md-6">
                <div class="card mb-2 h-100">
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
                    <div class="card-body overflow-auto ">
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
                                                <small class="text-dark"><b>Status:</b>{{$esim['eSimNetworkStatus']}}</small>
                                                <small class="text-tripcel">{{$esim['created_at']}}</small>
                                            </div>
                                        </a>
                                        <div class="user-progress">
                                            <a href="#" data-data-value="{{ $esim['eSimCountryName'] }}" data-esim-iccid-value="{{ $esim['esimIccid'] }}" data-country-value="{{ $esim['eSimCountryName'] }}">
                                                <small class="topup fw-medium btn btn-outline-tripcel">Top up</small>
                                            </a>
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
            <div class="col-xl col-lg-6 col-md-6">
                <div class="card h-100">
                    <h5 class="card-header">{{$selectedEsim["eSimCountryName"] ?? ""}} <i class="fi fi-{{$selectedEsim["eSimCountryIso2"] ?? ""}}"></i></h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                        <thead>
                            <tr>
                            <th>Data</th>
                            <th>Expury Time</th>
                            
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @if(count($esimPlans)>0)
                                @foreach($esimPlans as $plan)
                                    <tr>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: {{(($plan['data_bytes_remaining'])/$plan['data_quota_bytes'])*100}}%"></div>
                                              </div>
                                            <span class="fw-medium">
                                                @php
                                                    $decimals = 2;
                                                    $bytes = max($plan['data_bytes_remaining'], 0);
                                                    $bytes1 = max($plan['data_quota_bytes'], 0);
                                                    $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
                                                    $factor = floor((strlen($plan['data_bytes_remaining']) - 1) / 3);
                                                    $factor1 = floor((strlen($plan['data_quota_bytes']) - 1) / 3);
                                                    $unit = isset($units[$factor]) ? $units[$factor] : 'B';
                                                    $unit1 = isset($units[$factor1]) ? $units[$factor1] : 'B';
                                                @endphp
                                                {{sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . ' ' . $unit}}</span> - {{sprintf("%.{$decimals}f", $bytes / pow(1024, $factor1)) . ' ' . $unit1}}
                                        </td>
                                        <td>{{$plan['end_time']}}</td>
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
    </div>
    <!-- JavaScript -->
<script>
    function addToCart(productId, esimIccid, country, buttonElement) {
    // Make an AJAX call to the server with the product ID
        $.ajax({
            url: '{{route("esim.addToCartModal")}}',
            type: 'GET', // or 'GET', depending on your server-side implementation
            data: { 
                esimProduct: productId,
                esimIccid : esimIccid,
                country : country
            },
            success: function(response) {
                if (response == 1) {
                    // Update the button text to "Added"
                    $(buttonElement).text('Added');
                    // You can also disable the button or perform other actions as needed
                    $(buttonElement).prop('disabled', true);
                } else {
                    // Handle the case where the server-side operation failed
                    console.error('Failed to add to cart.');
                }
            },
            error: function() {
                console.error('Error during AJAX call.');
            }
        });
}
    $(document).ready(function() {
        $('a[data-data-value]').on('click', function(e) {
            e.preventDefault();

            var esimCountryName = $(this).data('data-value');
            var esimIccid = $(this).data('esim-iccid-value');
            var country = $(this).data('country-value');

            $.ajax({
                url: '{{ route("esim.topup", ["userId" => auth()->user()->id]) }}&country=' + esimCountryName,
                type: 'GET',
                success: function(data) {
                    console.log(data)
                    console.log(esimIccid)
                    console.log(country)
                    $('#successModal .modal-body').html(""); // Clear existing content

                    // Loop through each result and append it to the modal body
                    $.each(data, function(index, result) {
                        var cardHtml = '<div class="card">' +
                        '<div class="card-body d-flex justify-content-between">' +
                        '<div class="text-left>' +
                        '<h4 class="card-title">' + result.name + '</h4>' +
                        '<h5 class="card-text">Price: $' + result.price_usd + '</h5>' +
                        '</div>' +
                        '<div>' +
                        '<button type="button" class="btn btn-tripcel addToCartBtn" data-product-id="' + result.uid + '">Add to Cart</button>' +
                        '</div>' +
                        '</div>' +
                        '</div>';

                        $('#successModal .modal-body').append(cardHtml);
                    });
                    checkoutLink = '<div class="row justify-content-end"> <a class="btn btn-primary" href="{{route("esim.checkout")}}">Checkout</a></div>'
                    $('#successModal .modal-body').append(checkoutLink);
                    $('#modalCenterTitle').text('Recharge Esim');
                    $('#successModal').modal('show');

                    // Event handler for the dynamically added "Add to Cart" buttons
                    $('.addToCartBtn').on('click', function() {
                        var productId = $(this).data('product-id');
                        addToCart(productId, esimIccid, country, this);
                    });
                },
                error: function() {
                    alert('Error loading modal contents');
                }
            });
        });
    });
</script>


@endsection