<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../../../favicon.ico">

  <title>{{ title }} - Tweet Academy</title>

  <!-- Bootstrap core CSS -->
  {{ css("dist/bootstrap/css/bootstrap.min.css")|raw }}

</head>

<body>

  <main role="main" class="container">
        <h1 class="text-center">Page not found !</h1>
        <h2 class="text-center">But here is a pangolin :)</h2>
        <p class="text-center"><a {{ href("/")|raw }}>Go back to home page</a></p>
        <img src="{{ link('/dist/img/pangolin.jpg')|raw }}" class="img-fluid" alt="Responsive image">
  </main>
</body>

</html>
