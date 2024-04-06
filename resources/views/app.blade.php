<!DOCTYPE html>
<html lang="{{ __('message.en') }}" dir="{{ __('message.dir') }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking System</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Additional CSS for styling */
    body {
        /* url('https://via.placeholder.com/1500x600') */
      background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQm-9e9rwy3KuchTpns92evA3wRkabLBS5-ug&usqp=CAU');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh;
    }
    .navbar {
      background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
    }
    .search-container {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
    .search-box {
      width: 400px;
      padding: 10px;
      border: none;
      border-radius: 25px;
      background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Shadow effect */
    }
  </style>
</head>
<body >

<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="{{url('category/all')}}">{{ __('message.Categories') }}</a>
    {{-- Admin only  make add --}}
    <?php if(Auth::check()&&(Auth::user()->caseUser)==1):?>
    <a class="navbar-brand"  href="{{ url('books/add') }}">{{ __('message.Add Book') }}</a> <?php endif;?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        @if (!session()->has('lang')||session()->get('lang')=='en')
       
        <li class="nav-item">
            <a class="nav-link" href="change/ar">Arabic</a>

          </li>
          @endif
         @if (session()->has('lang')&&session()->get('lang')=='ar')
             
        
          <li class="nav-item">
            <a class="nav-link" href="change/en">اللغه الانجليزيه</a>

          </li>
          @endif
        <?php if(!Auth::check()) :?>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('login') }}">{{ trans('message.Login') }}</a>

          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('register') }}">{{__('message.Register')}}</a>

          </li>
          <?php endif;?>
          <li>
          <?php if(Auth::check()):?>
          <form action="{{ url('logout') }}" method ="POST">
                @csrf
                <button type="submit" style="color: black" class="nav-link" href="{{ url('logout') }}">{{__('message.Logout')}}</button>

          </form>
        </li>
        <?php endif;?>

        <!-- Add more navbar links here if needed -->
      </ul>

    </div>
  </div>
</nav>


{{-- class="search-container text-center" class="form-control search-box mb-2"--}}
{{-- //{{ (Auth::user()->name)}} --}}
<form action="{{ url('category/search') }}" method="POST">
@csrf
    <div class="search-container text-center" >
        @if (Session::has('success'))
        <?php $successMessage=Session::get('success')?>
        <div class="alert alert-success" role="alert">{{ __("message.$successMessage") }}</div>

        @endif




        
        {{-- @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
               {{ $error }}
                </div>
            @endforeach
        @endif
         --}}
        <select  name="category" class="form-control search-box mb-2">

            <option value="0">{{ __('message.Select Category') }}</option>
            @foreach ($categories as $category)

            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
     
        @error('category')
        <?php $error=rtrim($message, ".");
          ?>
        <div class="alert alert-danger" role="alert">
            
           {{  __("message.$error")}}
            

            </div>
        @enderror
        <button type="submit">{{ __('message.Search') }}</button>
    </div>

</form>
<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

