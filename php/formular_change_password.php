<?php 
    session_start();
    
    include("include/header.php");
    
                if (isset($_REQUEST["registration"])) {
                    echo "Passwörter stimmen nicht überein.";
                }
                echo'
            <main>
                <div class="container p-5 text-center">
                <img class="mb-4" src="..\test_images\naechster.png" alt="" width="72" height="72">
                    <h1>Wellcome user</h1>
                </div>
                <div class="text-center container-m p-5 d-flex justify-content-center">
                    <form class="col-4" action="change_password.php" method="post">
                        <div>
                            <div class="form-group">
                                <label for="pwd" class="sr-only">Enter new password</label>
                                <input type="password" id="pwd" class="form-control" placeholder="Enter new password" name="pwd" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="pwd_new" class="sr-only">Repeat password</label>
                                <input type="password" id="pwd_new" class="form-control" placeholder="Repete password" name="pwd_new" required>
                            </div>
                            <br>
                            <input class="btn btn-primary btn-block" type="submit" value="CHANGE" id="change_pwd" name="change_pwd">
                        </div>
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