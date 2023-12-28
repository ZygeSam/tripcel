@extends('layouts.dashboard')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('esim.index', ['userId'=>1])}}">Esim List/</a></span> Add Esim</h4>
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Choose Region</h5>
                    <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                    <form method="post" action="{{route('esim.store')}}">
                        @csrf
                        <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-company">Regions/Country</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="userId" value="1">
                            <select id="largeSelect" class="form-select form-select-md" name="esimProduct">
                                @if(count($countries) > 0)
                                    @foreach ($countries as $country)
                                        <option value="{{($country['country_iso2']!=='0') ? $country['country_iso2'] : $country['country_iso3'] }}">{{$country['country_name']}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        </div>
                        <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection