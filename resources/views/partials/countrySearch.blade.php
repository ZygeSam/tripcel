<div class="row bg-white">
  <div class="col-lg-10 m-auto py-5 px-5">
     <div class="title_all_box style_one text-center dark_color mx-auto px-5">
      <p class="fs-4">International eSIM</p>
        <div class="title_sections">
          <h2>Stay Connected, No Matter
            Where Your Journey Takes You.</h2>
            <p class="fs-4">Experience seamless internet connectivity on all your adventures with
              Tripcel eSIM, and say goodbye to costly roaming bills when you return.
              </p>
              <p class="fw-bold fs-4">Where do you need to connect to the internet?</p>
           <div class="before_title">
              <form action="{{route('showCountries')}}" class="my-3" method="post">
                 @csrf
                 <select name="country" id="" class="p-3">
                    @if(count($countries) > 0)
                       @foreach($countries as $country)
                          <option class="p-4"value="{{route('country', ['country'=>$country['country_name']])}}">{{$country['country_name']}}</option>
                       @endforeach
                    @else
                       <p>No country available</p>
                    @endif
                 </select>
                 <button type="submit" class="theme-btn three mx-5 fs-6 px-5" style="background-color:#FF8F47">Search Destinations</button>
              </form>
           </div>
           {{-- <div class="title">Get Your Travel e-Sim in 5 Minutes</div> --}}
        </div>
        <!--===============spacing==============-->
        <div class="pd_bottom_40"></div>
        <!--===============spacing==============-->
     </div>
  </div>
</div>
<div class="bg-dark mt-2 mb-0" style="height: 20px"></div>