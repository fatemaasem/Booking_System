<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Category Page</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <style>
    /* Custom styles */
    .book-container {
      margin-top: 20px;
    }
    .book-card {
      margin-bottom: 20px;
    }
    /* Custom CSS for category name */
.category {
    background-color: #f8f9fa; /* Background color for the category container */
    padding: 10px; /* Padding around the category */
    border-radius: 5px; /* Rounded corners for the category container */
}

.category-name {
    font-weight: bold; /* Make the category name bold */
    color: #007bff; /* Text color for the category name */
    font-size: 18px; /* Font size for the category name */
}

  </style>
</head>
<body>
  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ url('/') }}">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        @if (Auth::check()&&Auth::user()->caseUser==1)
        <li class="nav-item active">
            <a class="nav-link" href="{{ url('books/add') }}">Add Book <span class="sr-only">(current)</span></a>
          </li>
        @endif

        {{-- <li class="nav-item">
          <a class="nav-link" href="#">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li> --}}
      </ul>
    </div>
  </nav>

  <!-- Category Title -->
  <div class="container mt-4">

    <div class="category">
        <p><span class="category-name">Category Name:</span>{{ $categoryName }}</p>

    </div>
    @if (Session()->has('success'))
    <div class="alert alert-info" role="alert">
       {{session()->get('success')}}
      </div>
    @endif
    <!-- Book Cards -->



    <div class="row book-container">

    <?php $foundBook=0?>
    @foreach ($books as $book)
    <?php $foundBook=1?>
      <div class="col-md-4">
        <div class="card book-card">
          <img src="{{ asset("storage/$book->image") }}" class="card-img-top" alt="Book 1"  height="300px">
          <div class="card-body">
            <h5 class="card-title">{{ $book->name }}</h5>
            <p class="card-text">{{ $book->description }}</p>
            @if (Auth::user()->caseUser==1)
            <button class="btn btn-primary edit-btn"><a style="color:black" href="{{ url("books/edit/$book->id") }}">Edit</a></button>
            <button class="btn btn-danger delete-btn"><a style="color:black" href="{{ url("books/delete/$book->id") }}">Delete</a></button>
            @endif

          </div>
        </div>
      </div>
      @endforeach

    @if ($foundBook==0)
    <div class="alert alert-info" role="alert">
        No books have been added yet
      </div>
    @endif


    </div>
  </div>


  <!-- Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
