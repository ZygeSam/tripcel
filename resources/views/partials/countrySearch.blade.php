<div class="row bg-white px-5">
  <div class="col-lg-10 m-auto py-5">
     <div class="title_all_box style_one text-center dark_color mx-auto">
      <p class="fs-4">International eSIM</p>
        <div class="title_sections">
          <h2>Stay Connected, No Matter
            Where Your Journey Takes You.</h2>
            <p class="fs-4" style="text-align:center">Experience seamless internet connectivity on all your adventures </p>
            <p class="fs-4 "> with Tripcel eSIM, and say goodbye to costly roaming bills when you return.
            </p>
              <p class="fw-bold fs-4">Where do you need to connect to the internet?</p>
           <div class="before_title">
              <form action="{{route('showCountries')}}" class="my-3 mx-5" method="post">
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
                 <button type="submit" class="theme-btn three mx-auto" style="background-color:#FF8F47; font-size:0.7em">Search Destinations</button>
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