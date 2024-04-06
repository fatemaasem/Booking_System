<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <style>
    @font-face{font-family:'Calluna';
 src:url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/callunasansregular-webfont.woff') format('woff');
}
body {
	background: url(//subtlepatterns.com/patterns/scribble_light.png);
  font-family: Calluna, Arial, sans-serif;
  min-height: 1000px;
}
#columns {
	column-width: 320px;
	column-gap: 15px;
  width: 90%;
	max-width: 1100px;
	margin: 50px auto;
}

div#columns figure {
	background: #fefefe;
	border: 2px solid #fcfcfc;
	box-shadow: 0 1px 2px rgba(34, 25, 25, 0.4);
	margin: 0 2px 15px;
	padding: 15px;
	padding-bottom: 10px;
	transition: opacity .4s ease-in-out;
  display: inline-block;
  column-break-inside: avoid;
}
.navbar .nav-link {
      color: white !important;
    }
div#columns figure img {
	width: 100%; height: auto;
	border-bottom: 1px solid #ccc;
	padding-bottom: 15px;
	margin-bottom: 5px;
}

div#columns figure figcaption {
  font-size: .9rem;
	color: #444;
  line-height: 1.5;
}

div#columns small {
  font-size: 1rem;
  float: right;
  text-transform: uppercase;
  color: #aaa;
}

div#columns small a {
  color: #666;
  text-decoration: none;
  transition: .4s color;
}

div#columns:hover figure:not(:hover) {
	opacity: 0.4;
}

@media screen and (max-width: 750px) {
  #columns { column-gap: 0px; }
  #columns figure { width: 100%; }
}
    </style>
</head>
<body>


      <div class="pos-f-t">

        <div class="collapse" id="navbarToggleExternalContent">
          <div class="bg-dark p-4">
            <div class="container">
                <h1>All Links</h1>
                <ul class="list-group">
                  <li class="list-group-item"><a href="#">Link 1</a></li>
                  <li class="list-group-item"><a href="#">Link 2</a></li>
                  <li class="list-group-item"><a href="#">Link 3</a></li>
                  <li class="list-group-item"><a href="#">Link 4</a></li>
                  <li class="list-group-item"><a href="#">Link 5</a></li>
                </ul>
              </div>
          </div>
        </div>
        <nav class="navbar navbar-dark bg-dark navbar-expand-lg ">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="{{ url('category/all') }}">Categories</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('books/add') }}">Add Book</a>
              </li>
            </ul>
          </div>

        </nav>
      </div>

<div id="columns">
  <figure>
  <img src="//s3-us-west-2.amazonaws.com/s.cdpn.io/4273/cinderella.jpg">
	<figcaption>Cinderella wearing European fashion of the mid-1860’s</figcaption>
	</figure>

	<figure>
	<img src="//s3-us-west-2.amazonaws.com/s.cdpn.io/4273/rapunzel.jpg">
	<figcaption>Rapunzel, clothed in 1820’s period fashion</figcaption>
	</figure>

  <figure>
	<img src="//s3-us-west-2.amazonaws.com/s.cdpn.io/4273/belle.jpg">
	<figcaption>Belle, based on 1770’s French court fashion</figcaption>
	</figure>

	<figure>
	<img src="//s3-us-west-2.amazonaws.com/s.cdpn.io/4273/mulan_2.jpg">
	<figcaption>Mulan, based on the Ming Dynasty period</figcaption>
	</figure>

   <figure>
	 <img src="//s3-us-west-2.amazonaws.com/s.cdpn.io/4273/sleeping-beauty.jpg">
	<figcaption>Sleeping Beauty, based on European fashions in 1485</figcaption>
	</figure>

   <figure>
	 <img src="//s3-us-west-2.amazonaws.com/s.cdpn.io/4273/pocahontas_2.jpg">
	<figcaption>Pocahontas based on 17th century Powhatan costume</figcaption>
	</figure>

	<figure>
	<img src="//s3-us-west-2.amazonaws.com/s.cdpn.io/4273/snow-white.jpg">
	<figcaption>Snow White, based on 16th century German fashion</figcaption>
	</figure>

   <figure>
	<img src="//s3-us-west-2.amazonaws.com/s.cdpn.io/4273/ariel.jpg">
	<figcaption>Ariel wearing an evening gown of the 1890’s</figcaption>
	</figure>

    <figure>
	<img src="//s3-us-west-2.amazonaws.com/s.cdpn.io/4273/tiana.jpg">
    <figcaption>Tiana wearing the <i>robe de style</i> of the 1920’s</figcaption>
	</figure>
  <small>Art &copy; <a href="//clairehummel.com">Claire Hummel</a></small>
	</div>
</body>
</html>
