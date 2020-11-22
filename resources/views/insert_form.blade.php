{{--@extends('common/footer')--}}
{{--@extends('common/sidemenu')--}}
@extends('common/header')
@section('content')
<div class="container">
  <h2>OTP Integration</h2>
  <!-- <form action="/action_page.php"> -->
  <div id="formdiv" class="show">
    <input type="hidden" id="csrf" value="{{Session::token()}}">
  <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
    </div>
    <div class="form-group ">
      <label for="Mobile">Mobiel:</label>
      <div class="input-box">
      <input type="text" class="fixedTxtInput" id="mobile" placeholder="Enter 10 digits Mobile Number" name="mobile">
      <span class="unit">+91</span>
      </div>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <!-- <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
     -->
    <button id="submitForm" class="btn btn-primary">Submit</button>
</div> <!-- form div close  -->
    <div id="otpdiv" class ="hide">
    <div class="form-group">
      <label for="emotpail">OTP:</label>
      <input type="otp" class="form-control" id="otp" placeholder="Enter OTP" name="otp">
    </div>
    <button id="otpSubmit" class="btn btn-primary">Submit</button>
</div>
  <!-- </form> -->
</div>
<script src="js/generateOTP.js"></script>

@endsection
