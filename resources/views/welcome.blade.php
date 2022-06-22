<!DOCTYPE html>
<html>
<title>Employer</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

<style>
html,body,h1,h2,h3,h4 {font-family:"Lato", sans-serif}
.mySlides {display:none}
.w3-tag, .fa {cursor:pointer}
.w3-tag {height:15px;width:15px;padding:0;margin-top:6px}
.column {
  float: left;
  width: 50%;
}
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
<body>

<!-- Links (sit on top) -->
<div class="w3-top">
  <div class="w3-row w3-large w3-light-grey">
  
    <div class="w3-col s3">
      <a href="#contact" class="w3-button w3-block">Register</a>
    </div>
    <div class="w3-col s3">
        <a href="/login" class="w3-button w3-block">Login</a>
      </div>
  </div>
</div>

<!-- Content -->
<div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">

  <!-- Contact -->
  <div class="w3-center w3-padding-64" id="contact">
    <span class="w3-xlarge w3-bottombar w3-border-dark-grey w3-padding-16">Register</span>
  </div>

  <form class="w3-container" id="registerForm" >
    @csrf
            <h3>Employer SignUp</h3>
            <div class="w3-section">
                <label>Fisrt Name</label>
                <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="first_name" required>
              </div>
              <div class="w3-section">
                <label>Last Name</label>
                <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="last_name" required>
              </div>
              <div class="w3-section">
                <label>Email</label>
                <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="email" required>
              </div>
              <div class="w3-section">
                <label>Mobile</label>
               
                <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="mobile" required>
              </div>
              <div class="w3-section">
                <label>Password</label>
                <input class="w3-input w3-border w3-hover-border-black" type="password" style="width:100%;" name="password" required>
              </div>
              <div class="w3-section">
                <label>Confirm Password</label>
                <input class="w3-input w3-border w3-hover-border-black" type="password" style="width:100%;" name="password_confirmation" id="password_confirmation" required>
              </div>
            
              <div class="w3-section">
                <label>Emirates</label>
                <select class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="emirates" id="emirates">
                    <option value="Dubai">Dubai</option>
                    <option value="Sharjah">Sharjah</option>
                    <option value="Ajman">Ajman</option>
                  </select> 
            </div>
                 
    <button type="submit" class="w3-button w3-block w3-black">Register</button>
  </form>
</div>
<!-- Footer -->
<footer class="w3-container w3-padding-32 w3-light-grey w3-center">
  <h4>Footer</h4>
  <a href="#" class="w3-button w3-black w3-margin"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <div class="w3-xlarge w3-section">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>
<script src="{{asset('js/common.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</body>
</html>
