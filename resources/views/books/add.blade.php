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
    <h2>Add Book</h2>
    <form action="{{url('books/insert')}}" method="POST"  enctype="multipart/form-data">

        @csrf
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}"  >
      </div>
      @error('name')
        <div class="alert alert-danger" role="alert">
        {{ $message }}
        </div>
        @enderror
      <div class="form-group">
        <label for="description">Description:</label>
        <input type="text" id="description" name="description" value="{{ old('description') }}" >
      </div>
      @error('description')
        <div class="alert alert-danger" role="alert">
        {{ $message }}
        </div>
        @enderror

    <label for="cars">Choose a Category:</label>

    <select  name="category">
        <option value="{{0 }}">Seletc Categories</option>
      @foreach ($categories as $category)
        <?php $id=$category['id'];
            $name=$category->name;?>
       <option value="{{$id }}">{{ $name }}</option>
     @endforeach
    </select>
    @error('category')
    <div class="alert alert-danger" role="alert">
        {{ $message }}
        </div>
    @enderror
      <div >
        <label for="image">Image:</label>
        <input type="file" id="image"  name="image" >
      </div>
      @error('image')
      <div class="alert alert-danger" role="alert">
      {{ $message }}
      </div>
      @enderror
      <button type="submit">Add</button>
    </form>
  </div>
</body>
</html>
