<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    body {
      background-color: #f8f9fa;
    }
    .signup-container {
      max-width: 400px;
      margin: 100px auto;
      background: #fff;
      padding: 30px;
      border-radius: 5px;
      box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ url('/') }}">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('login') }}">Login</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
  <div class="signup-container">
    <h2 class="text-center mb-4">Sign Up</h2>
    <form  action ="{{ url('register') }}" method="POST">@csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" >
      </div>
      @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
      </div>
      @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" >
      </div>
      @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <div class="form-group">
        <label for="password">Confirm Password</label>
        <input type="password" class="form-control" id="password" name="password_confirmation" >
      </div>
      <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
    </form>
  </div>
</div>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Custom JavaScript -->


</body>
</html>
