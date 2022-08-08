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
        <h4>Registration Form</h4>
        <hr>
        <form action="{{ route('register-user') }}" method="POST">
          @if(Session::has('Success'))
          <div class="alert alert-success">{{ Session::get('Success') }}</div>
          @endif
          @if(Session::has('fail'))
          <div class="alert alert-danger">{{ Session::get('fail') }}</div>
          @endif
          @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter your Name">
            <span class="text-danger">
              @error('name'){{ $message }}@enderror
            </span>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter your Email">
            <span class="text-danger">
              @error('email'){{ $message }}@enderror
            </span>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="Password" name="password" value="{{ old('password') }}" placeholder="Enter your Password">
            <span class="text-danger">
              @error('password'){{ $message }}@enderror
            </span>
          </div>
          <hr>
          <div class="form-group">
            <button class="btn btn-block btn-primary">Registraton</button>
            <a href="login">login Now</a>
          </div>

        </form>
      </div>
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>