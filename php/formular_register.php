<?php 
  
  session_start();

  include("include/header.php");
  
      if (isset($_REQUEST["fehler"])) {
        echo "Please fill out all fields.";
      }

      if (isset($_REQUEST["registration"])) {
        echo "User already exists.";
      }
      echo'
      <main>
        <div class="container p-5 text-center">
          <img class="mb-4" src="..\test_images\naechster.png" alt="" width="72" height="72">
          <h1>Register now</h1>
        </div>
        <div class="text-center container-sm p-5 d-flex justify-content-center">
          <form action="register.php" method="post">
            <div class="row">
              <div class="form-group col-md">
                <input type="text" class="form-control" name="vorname" placeholder="First name" />
              </div>
              <div class="form-group col-md">
                <input type="text" class="form-control" name="nachname" placeholder="Last name" />
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md">
                <input type="text" class="form-control" name="email" placeholder="Email" />
              </div>
              <div class="form-group col-md">
                <input type="password" class="form-control" name="pwd" placeholder="Password" />
              </div>
            </div>
            <br>
            <input class="btn btn-primary btn-block mb-3" type="submit" value="Registrieren">
            <p>Or login</p>
            <a class="btn btn-secondary btn-block mt-3" href="formular_login.php">Login</a>
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