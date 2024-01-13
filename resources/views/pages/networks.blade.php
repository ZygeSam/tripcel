@extends('layouts.purchase')
@section('pageTitle', 'Network and Coverage')
@section('previousPageTitle', 'Home')
@section('presentPageTitle', 'Network and Coverage')
@section('content')
   <div class="auto-container">
      <div class="row">
         <div class="col-lg-10 m-auto">
            <div class="title_all_box style_one text-center dark_color">
               <div class="title_sections">
                  <div class="before_title">Select a Country
                  <form action="{{route('countryNetwork')}}" class="" method="post">
                     @csrf
                     <select name="country" id="" class="p-3">
                        @if(count($countries) > 0)
                           @foreach($countries as $country)
                              <option class="p-4"value="{{route('countryCoverage', ['country'=>$country['country_name']])}}">{{$country['country_name']}}</option>
                           @endforeach
                        @else
                           <p>No country available</p>
                        @endif
                     </select>
                     <button type="submit">Give it a try</button>
                  </form>
                  </div>
               </div>
               <!--===============spacing==============-->
               <div class="pd_bottom_40"></div>
               <!--===============spacing==============-->
            </div>
         </div>
      </div>
      @isset($networks)
         @if(count($networks) > 0)
            @foreach ($networks as $network)
               <div class="row">
                  <div class="px-4 py-5 my-5 text-center border border-5">
                     <i class="mb-4 fi fi-{{$network['country_iso2']}} mx-3 mx-3 fs-1"></i> 
                     <h1 class="display-5 fw-bold">{{$network['country_name']}}</h1>
                     <div class="col-lg-6 mx-auto my-4">
                        <p class="fs-5"><b>5G support: </b>@if($network['support_5g']==0)No @else Yes @endif</p>
                        <p class="fs-5"><b>Hotspot support: </b>@if($network['support_hotspot']==0)No @else Yes @endif</p>
                        <p class="fs-5"><b>Permanent Roaming: </b>@if($network['permanent_roaming']==0)No @else Yes @endif</p>
                        <p class="fs-5"><b>Network Name: </b>{{$network['network_name']}}</p>
                     </div>
                  </div>
               </div>
            @endforeach
         @endif
      @endisset
      
   </div>
@endsection