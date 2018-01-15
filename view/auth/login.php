<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    {{ css("dist/bootstrap/css/bootstrap.min.css")|raw }}
    
    <!-- Custom styles for this template -->
    {{ css("dist/css/signin.css")|raw }}
  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Sign In</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control first-input" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control last-input" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="remember_me" value="remember_me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
        <a {{ href('/register')|raw }} class="btn btn-lg btn-info btn-block">Don't have an account ?</a>
      </form>

    </div> <!-- /container -->
  </body>
  {{ script("dist/jquery/jquery.min.js")| raw }}
  {{ script("dist/sweetalerts/sweetalert2.all.js")| raw }}
  {% if session.success is not null %} 
    <script> 
      swal({ 
      title: 'Succes !', 
      text: '{{ session.success }}', 
      type: 'success', 
      confirmButtonText: 'OK' 
    }) 
    </script> 
    {% endif %}

    {% if session.error is not null %} 
    <script> 
      swal({ 
      title: 'Error !', 
      text: '{{ session.error }}', 
      type: 'error', 
      confirmButtonText: 'OK' 
    }) 
    </script> 
    {% endif %} 
</html>
