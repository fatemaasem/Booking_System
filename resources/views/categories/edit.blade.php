<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <title>Styled Form</title>
  <style>
    .container {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

h2 {
  text-align: center;
}

.form-group {
  margin-bottom: 20px;
}


label {
  display: block;
  font-weight: bold;
}

input[type="text"],
input[type="email"],
textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

button[type="submit"] {
  background-color: #007bff;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #0056b3;
}

  </style>
</head>
<body>

  <div class="container">
    <h2>Edit Category</h2>
    <form action="{{url("category/update/$category->id")}}" method="POST"  >
        @csrf
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $category->name }}"  >
      </div>
      @error('name')
        <div class="alert alert-danger" role="alert">
        {{ $message }}
        </div>
        @enderror

      <button type="submit">Edit</button>
    </form>
  </div>
</body>
</html>
