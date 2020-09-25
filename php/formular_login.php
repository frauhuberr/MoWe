<?php 

  session_start(); 
  
  include("include/header.php");

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