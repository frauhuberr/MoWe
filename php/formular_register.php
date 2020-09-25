<?php 
  
  session_start();

  include("include/header.php");
  
      if (isset($_REQUEST["fehler"])) {
        echo "Es wurden nicht alle Felder ausgefüllt.";
      }

      if (isset($_REQUEST["registration"])) {
        echo "Bereits Registriert.";
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
                <label class="sr-only" for="vorname">Vorname</label>
                <input type="text" id="vorname" class="form-control" name="vorname" placeholder="Vorname" />
              </div>
              <div class="form-group col-md">
                <label class="sr-only" for="nachname">Nachname</label>
                <input type="text" id="nachname" class="form-control" name="nachname" placeholder="Nachname" />
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md">
                <label class="sr-only" for="email">E-Mail</label>
                <input type="text" id="email" class="form-control" name="email" placeholder="Email" />
              </div>
              <div class="form-group col-md">
                <label class="sr-only" for="pwd">Kennwort</label>
                <input type="password" id="pwd" class="form-control" name="pwd" placeholder="Passwort" />
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