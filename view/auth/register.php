<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
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

      <form method="post" class="form-signin">
        <h2 class="form-signin-heading">Sign Up</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" class="form-control first-input" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Login</label>
        <input type="text" name="login" class="form-control middle-input" placeholder="Login" required>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password1" class="form-control middle-input" placeholder="Password" required>
        <label for="inputPassword" class="sr-only">Confirm Password</label>
        <input type="password" name="password2" class="form-control middle-input" placeholder="Confirm Password" required>
        <label for="inputPassword" class="sr-only">First Name</label>
        <input type="text" name="firstname" class="form-control middle-input" placeholder="First Name" required>
        <label for="inputPassword" class="sr-only">Last Name</label>
        <input type="text" name="lastname" class="form-control last-input" placeholder="Last Name" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
        <a {{ href('/login')|raw }} class="btn btn-lg btn-info btn-block">Already have an account ?</a>
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
