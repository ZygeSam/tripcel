@extends('layouts.purchase')
@section('content')
<section class="about-section">
    <!--===============spacing==============-->
    <div class="pd_top_90"></div>
    <!--===============spacing==============-->
    <div class="auto-container">
       <div class="row">
          <div class="col-lg-10 m-auto">
             <div class="title_all_box style_one text-center dark_color">
                <div class="title_sections">
                   <div class="before_title">Payment Confirmation</div>
                   <div class="title">
                    @if(isset($message))
                        {{ $message }}
                    @endif
                   </div>
                </div>
                <!--===============spacing==============-->
                <div class="pd_bottom_40"></div>
                <!--===============spacing==============-->
             </div>
          </div>
       </div>
    </div>
    <!--===============spacing==============-->
    <div class="pd_bottom_90"></div>
    <!--===============spacing==============-->
 </section>
@endsection