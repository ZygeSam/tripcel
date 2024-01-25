@extends('layouts.purchase')
@section('content')
@if(session()->has('message'))
        <div class="modal fade" id="messageModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Information</h5>
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
                $('#messageModal').modal('show');
            });
        </script>
    @endif
@if($errors->any())
    <div class="alert alert-danger my-4">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<form name="checkout" method="post" class="checkout woocommerce-checkout" action="{{route('checkout')}}" novalidate="novalidate">
    @csrf
    <div class="row gutter_30px">
      @guest
          <div class="col-lg-6">
              <div class="woocommerce-billing-fields">
                  <div class="woocommerce-billing-fields__field-wrapper">
                     <h3>Your Tripcel Mobile Account</h3>
                     <div class="woocommerce-billing-fields__field-wrapper">
                        <p class="form-row form-row-first validate-required" id="billing_first_name_field">
                           <label>First name&nbsp;<abbr class="required" title="required">*</abbr></label>
                        
                              <input type="text" class="input-text" name="firstName" id="billing_first_name" placeholder="" value="">
                     
                        </p>
                        <p class="form-row form-row-last validate-required" id="billing_last_name_field">
                           <label>Last name&nbsp;<abbr class="required" title="required">*</abbr></label>
                        
                              <input type="text" class="input-text" name="lastName" id="billing_last_name" placeholder="" value="">
                  
                        </p>
                        <p class="form-row form-row-last validate-required" id="billing_last_name_field">
                           <label>Address&nbsp;<abbr class="required" title="required">*</abbr></label>
                        
                           <input type="text" class="input-text" name="address" id="billing_last_name" placeholder="" value="">
               
                        </p>
                        <p class="form-row form-row-first validate-required" id="billing_first_name_field">
                           <label>Email&nbsp;<abbr class="required" title="required">*</abbr></label>
                        
                           <input type="email" class="input-text" name="email" id="email" placeholder="" value="" required>
                           <input type="text" name="otp" id="otp" data-session-otp="{{ session()->get('otp', '') }}" placeholder="Enter Otp Sent to your mail">
                           <button name="sendOtp" id="sendOtp" class="theme-btn three mx-2"> <b>Send Otp</b></button> 
                           <button name="verifyOtp" id="verifyOtp" class="theme-btn three mx-2"> <b>Verify Otp</b></button>
                           <small id="otpMessage">Email required</small>
                           </div>
                        </p>
                        <p class="form-row form-row-last validate-required" id="billing_last_name_field">
                           <label>Password&nbsp;<abbr class="required" title="required">*</abbr></label>
                           
                              <input type="password" class="input-text" name="password" id="password" placeholder="" value="">
                              <small id="passwordCriteria"></small>
                        </p>
                        <p class="form-row form-row-last validate-required" id="billing_last_name_field">
                           <label>Confirm Password&nbsp;<abbr class="required" title="required">*</abbr></label>
                           
                              <input type="password" class="input-text" name="confirmPassword" id="confirm_password" placeholder="" value="">
                              <small id="passwordMatch"></small>
                        </p>
                      <p class="form-row form-row-wide validate-required validate-phone" id="billing_phone_field">
                          <label>Phone&nbsp;<abbr class="required" title="required">*</abbr></label>
                          <input type="tel" class="input-text " name="phone" id="billing_phone" placeholder="" value="" autocomplete="tel">
                      </p>
                  </div>
              </div>
          </div>
      @endguest
      <div class="@guest col-lg-6 @endguest @auth('web') col-lg-12 @endauth">
          <!-- Your other content goes here -->
          <div id="order_review" class="woocommerce-checkout-review-order">
              <h3 id="order_review_heading">Your order</h3>
              <div class="your_order_box">
               <table class="shop_table woocommerce-checkout-review-order-table">
                  <thead>
                     <tr>
                        <th class="product-name">Product</th>
                        <th class="product-total">Subtotal</th>
                     </tr>
                  </thead>
                  <tbody>
                       @forelse($cart['products'] as $product)
                           <tr class="woocommerce-cart-form__cart-item cart_item p-5">
                               <td class="product-name" data-title="Product">
                               <p>Package : {{$product[0]['name']}}</p>
                               <p>Starting Date: @php  echo date("Y-m-d", strtotime("now"));  @endphp </p> 
                               <p> Daily Data: {{$product[0]['data_quota_mb']}}GB</p>
                               <p>Throttle: 1Mbps</p>					
                               </td>
                               <td class="product-price" data-title="Price">
                               <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol"></span>${{$product[0]['price_usd']}}</bdi></span>						
                               </td>
                           </tr>
                           @empty
                           <p>No Products</p>
                       @endforelse
                  </tbody>
                  <tfoot>
                     <tr class="order-total">
                        <th>Total</th>
                        <td>
                           <strong><span class="woocommerce-Price-amount amount">
                              <bdi><span class="woocommerce-Price-currencySymbol">$</span>{{$totalPrice}}</bdi></span>
                           </strong>
                        </td>
                     </tr>
                  </tfoot>
</table>
              </div>
          </div>
      </div>
  </div>
  
    <div class="row">
         <p>Choose a way to pay</p>
         @if($showPayStackNigeria == true)
         <p><input type="radio" name="payment_gateway" value="Paystack" id=""> <img src="./assets/images/payment.png" width="150" height="80" alt=""></p> 
         @else
         <p><input type="radio" name="payment_gateway" value="Paystack" id=""> <img src="./assets/images/payment.png" width="150" height="80" alt=""></p> 
         <p><input type="radio" name="payment_gateway" value="TransactionCloud" id=""><img src="./assets/images/transactioncloud.png" width="250" height="300" alt=""></p> 
         @endif
     
     
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12 column mt-4">
      <div class="field-input message-btn">
          <button type="submit" class="theme-btn two">Make Payment</button>
      </div>
    </div>
</form>

<script>
    $(document).ready(function () {
      
        @auth('web')
        // Enable the button
        $('button[type="submit"]').prop('disabled', false);
        @endauth
        @guest
        // Initially hide the OTP field and the verify button
        $('#otp').hide();
        $('#verifyOtp').hide();
        $('#sendOtp').hide();
        $('#otpMessage').hide();
        $('button[type="submit"]').prop('disabled', true);

        var debounceTimer;

        // Event handler for email input with debounce
        $('#email').on('input', function () {
            clearTimeout(debounceTimer);

            debounceTimer = setTimeout(function () {
                var email = $(this).val().trim();

                if (isValidEmail(email)) {
                    // If email is valid, show OTP field and verify button
                    $('#otp').show();
                    $('#sendOtp').show();
                    $('#otpMessage').text("Valid Email");
                    $('#otpMessage').show();
                    $('#preloader').hide();
                    // Make AJAX request to verify email
                    $('#preloader').show();
                    $('#sendOtp').on('click', function (event) {
                        $(this).hide();
                        $('#otpMessage').text("Sending OTP ...");
                        event.preventDefault();
                        $.ajax({
                            url: '{{route("verifyEmail")}}', // Replace with your backend endpoint for email verification
                            method: 'GET',
                            data: { email: email },
                            success: function (response) {
                            $('#preloader').hide();
                            $('#otpMessage').text("Otp Sent! Check your mail");
                                if (response.message == "success") {
                                    $('#sendOtp').text("Resend OTP");
                                    $('#sendOtp').show();
                                    $('#verifyOtp').show();
                                    verifyOtp(response.otp);
                                } else {
                                    $('#otpMessage').text("Check your email address");
                                    // Handle verification failure, e.g., show error message
                                    console.error('Email verification failed');
                                }
                            },
                            error: function (error) {
                                console.error('Error during email verification', error);
                            }
                        });
                    });
                } else {
                    // If email is not valid, hide OTP field and verify button
                    $('#otp').hide();
                    $('#sendOtp').hide();
                    $('#verifyOtp').hide();
                    $('#otpMessage').text("Invalid email address");
                    // Enable form submit button when email is not valid
                    $('button[type="submit"]').prop('disabled', true);
                }
            }.bind(this), 500); // Debounce time (milliseconds)
        });

        // Email validation using regular expression
        function isValidEmail(email) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
        
        function verifyOtp(otp) {
        $('#verifyOtp').on('click', function (event) {
            event.preventDefault();
            var enteredOtp = $('#otp').val().trim();
            // console.log(otp); // Use the otp from the function argument
            if (enteredOtp == otp) {
                $(this).hide();
                $('#otp').hide();
                $('#sendOtp').hide();
                $('#otpMessage').text("Email Verified Successfully");
                $('button[type="submit"]').prop('disabled', false);
            }
        });
    }

    function checkPasswordCriteria(password) {
            // Your password criteria logic here
            // For example, requiring at least one uppercase letter, one lowercase letter, and one digit
            var hasUpperCase = /[A-Z]/.test(password);
            var hasLowerCase = /[a-z]/.test(password);
            var hasDigit = /\d/.test(password);

            return hasUpperCase && hasLowerCase && hasDigit;
    }

    $('#password').on('input', function () {
            var password = $(this).val();
            var passwordCriteria = $('#passwordCriteria');

            if (checkPasswordCriteria(password)) {
                passwordCriteria.text('Good Password');
            } else {
                passwordCriteria.text('Password should contain at least one uppercase letter, one lowercase letter, and one digit');
            }
    });

    // Event listener for confirm password input
    $('#confirm_password').on('input', function () {
            var password = $('#password').val();
            var confirmPassword = $(this).val();
            var passwordMatch = $('#passwordMatch');

            if (password === confirmPassword) {
                passwordMatch.text('Password match');
            } else {
                passwordMatch.text('Passwords do not match');
            }
    });



    @endguest
    });
</script>


@endsection