<?php 

  session_start(); 
  echo '
  <html>
    <head>
      <title>Login</title>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />

      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

      <!-- Popper JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </head>
    <body>
      <header>
        <div class="collapse bg-dark" id="navbarHeader">
          <div class="container">
            <div class="row">
              <div class="col-sm-8 col-md-7 py-4">
                <h4 class="text-white">About</h4>
                <p class="text-muted">Join MoWe and become a part of creating the ultimate list of movies! Your ratings will impact the world’s frontrunners in all of cinema history. In addition to rating movies, you will also be able to sort them and explore new top films. Our service is and will always be completely free of charge. Join us today if you are a motion picture enthusiast!</p>
              </div>
              <div class="col-sm-4 offset-md-1 py-4 text-right">
                <a href="formular_login.php" class="text-decoration-none">
                  <h4 class="text-white">Login</h4>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="navbar navbar-dark bg-dark box-shadow">
          <div class="container d-flex justify-content-between">
            <a href="index.php" class="navbar-brand d-flex align-items-center">
              <svg class="bi bi-skip-end-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M12 3.5a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z" />
                <path d="M11.596 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
              </svg>
              <strong>MoWe</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          </div>
        </div>
      </header>';
      if (isset($_REQUEST["error"])) {
        echo "User noch nicht registriert.";
      }

      if (isset($_REQUEST["fehler"])) {
        echo "Ungültige Zugangsdaten.";
      }
      echo'
      <main>
        <div class="container pt-5 text-center">
        <img class="mb-4" src="..\test_images\naechster.png" alt="" width="72" height="72">
          <h1>Please sign in</h1>
        </div>
        <div class="text-center container-sm p-5 d-flex justify-content-center">
          <form action="login.php" method="post">
            <div class="form-group">
              <label for="inputEmail" class="sr-only">Email address</label>
              <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
            </div>
            <div class="form-group">
              <label for="inputPassword" class="sr-only">Password</label>
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pwd" required>
            </div>
            <br>
            <input class="btn btn-primary btn-block mb-3" type="submit" value="Login" id="login" name="login">        
            <p>Or register now</p>
            <a class="btn btn-secondary btn-block mt-3" type="button" href="formular_register.php" id="register">Register</a>
          </form>
        </div>
      </main>
      <footer class="text-muted">
        <div class="container">
          <p class="float-right">
            <a class="text-decoration-none" href="#">Back to top</a>
          </p>
          <p>&copy;MoWe </p>
        </div>
      </footer>
    </body>
  </html>';
?>