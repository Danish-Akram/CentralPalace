
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
      <img src="img/centralPalace.jpeg" alt="" style="margin-top:50px; margin-left:60px; height:150px; width:60%">
      <img src="img/logo.png" alt="" style="margin-top:250px; margin-left:60px; height:250px; width:60%">
        <!--<img src="images/frontImg.jpg" alt="">-->

      </div>
      <div class="back">
        <!--<img class="backImg" src="images/backImg.jpg" alt="">-->
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <h3 style="margin-bottom: 40px; margin-left:10px; padding:10px 40px;  border-style:outset; border-color:#f7b731;
            color:#fa8231">Marque Management</h3>
            <div class="title">Login</div>
          <form action="{{route('login_auth')}}" method="POST" autocomplete="off" >
            {{csrf_field()}}
            <div class="results">
              @if(Session::get('fail'))
              <div style= "background-color: #e74c3c">
                {{Session::get('fail')}}
              </div>
              @endif
            </div>
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" class="form-control my-1" name="email" placeholder="Enter your email" required>
              </div>
              <div style= "background-color: #e74c3c">@error('email'){{$message}}@enderror</div>

              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password"  name="password" placeholder="Enter your password" required>
              </div>
              <div style= "background-color: #e74c3c">@error('password'){{$message}}@enderror</div>

              {{-- <div class="text"><a href="#">Forgot password?</a></div> --}}
              <div class="button input-box">
                <input type="submit" value="Sumbit">
              </div>
              {{-- <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label></div> --}}
            </div>
        </form>
      </div>
              <div class="partition"></div>

        <div class="signup-form">
          <div class="title">Signup</div>
        <form action="#">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Enter your name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" required>
              </div>
              <div class="button input-box">
                <input type="submit" value="Sumbit">
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
      </form>
    </div>
    </div>
    </div>
  </div>
</body>
</html>
