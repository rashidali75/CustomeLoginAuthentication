<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Custom Login Auth</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
        <h3>Login Form</h3>
        <hr>
        <form action="{{ route('login-user') }}" method="POST">
          @if(Session::has('Success'))
          <div class="alert alert-success">{{ Session::get('Success') }}</div>
          @endif
          @if(Session::has('fail'))
          <div class="alert alert-danger">{{ Session::get('fail') }}</div>
          @endif
          @csrf
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" value="{{ old('email') }}" name="email" placeholder="Enter your Email">
            <span class="text-danger">
              @error('email'){{ $message }}@enderror
            </span>
          </div>
          <br>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="Password" value="{{ old('password') }}" name="password" placeholder="Enter your Password">
            <span class="text-danger">
              @error('password'){{ $message }}@enderror
            </span>
          </div>
          <hr>
          <div class="form-group">
            <button class="btn btn-block btn-primary">Login</button>
            <a href="registration">Register Now</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
  </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>