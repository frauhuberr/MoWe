<?php 

session_start();

    echo'
    <html>
        <head>
            <title>Add Movie</title>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
            <link rel="stylesheet" href="../css/gallery.css" />

            <!-- jQuery library -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <!-- Popper JS -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

            <!-- Latest compiled JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        </head>
        <body>
            <header>
                <div class="collapse bg-dark " id="navbarHeader">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-8 col-md-7 py-4">
                                <h4 class="text-white">About</h4>
                                <p class="text-muted">Join MoWe and become a part of creating the ultimate list of movies! Your ratings will impact the world’s frontrunners in all of cinema history. In addition to rating movies, you will also be able to sort them and explore new top films. Our service is and will always be completely free of charge. Join us today if you are a motion picture enthusiast!</p>
                            </div>
                            <div class="col-sm-4 offset-md-1 py-4 text-right">';
                                if ($_SESSION['user'] == true) {
                                    echo '<a href="user_detail.php" class="text-decoration-none"><h4 class="text-white">My Account</h4></a>';
                                } else {
                                    echo '<a href="formular_login.php" class="text-decoration-none"><h4 class="text-white">Login</h4></a>';
                                }
                            echo '</div>
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
                if (isset($_REQUEST["fehler"])) {
                    echo '<div class="text-center error">Es wurden nicht alle Felder ausgefüllt.</div>';
                }
                if (isset($_REQUEST["exists"])) {
                    echo '<div class="text-center">Film ist bereits erfasst.</div>';
                }
                if (isset($_REQUEST["fail"])) {
                    echo '<div class="text-center">Hoppla.. da ist ein unbekannter Fehler aufgetreten</div>';
                }
            echo '
            <main>
                <div class="container p-5 text-center">
                    <img class="mb-4" src="..\test_images\naechster.png" alt="" width="72" height="72">
                    <h1>Add new Movie</h1>
                </div>
                <div class="text-center container-sm p-3 d-flex justify-content-center">
                    <form action="movie.php" method="post">
                        <div class="form-group col-md p-0">
                            <label class="sr-only" for="movieName">Movie Name</label>
                            <input type="text" id="movieName" class="form-control" name="movieName" placeholder="Movie name" />
                        </div>
                        <div class="row">
                            <div class="form-group col-md pr-1">
                                <label class="sr-only" for="year">Year published</label>
                                <input type="number" id="year" class="form-control" name="year" placeholder="Year published" />
                            </div>
                            <div class="form-group col-md pl-1">
                                <label class="sr-only" for="age">Age limit</label>
                                <input type="number" id="age" class="form-control" name="age" placeholder="Age limitation" />
                            </div>
                        </div>

                        <div class="form-group col-md p-0">
                            <label class="sr-only" for="producer">Producer</label>
                            <input type="text" id="producer" class="form-control" name="producer" placeholder="Producer" />
                        </div>
                        <div class="form-group col-md p-0">
                            <label class="sr-only" for="actor">Main Actor</label>
                            <input type="text" id="actor" class="form-control" name="actor" placeholder="Main actor" />
                        </div><br>
                        <h5>Genre</h5><br>
                        <div class="form-group row">
                            <div class="col-4">
                                <div class="form-check text-left">
                                    <input class="form-check-input" type="checkbox" id="romantic" value="romantic" name="genre[]">
                                    <label class="form-check-label" for="romantic">Romantic</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check text-left">
                                    <input class="form-check-input" type="checkbox" id="drama" value="drama" name="genre[]">
                                    <label class="form-check-label" for="drama">Drama</label>
                                </div>
                            </div>
                            <div class="col-4 ">
                                <div class="form-check text-left">
                                    <input class="form-check-input" type="checkbox" id="comedy" value="comedy" name="genre[]">
                                    <label class="form-check-label" for="comedy">Comedy</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-4 ">
                                <div class="form-check text-left">
                                    <input class="form-check-input" type="checkbox" id="thriller" value="thriller" name="genre[]">
                                    <label class="form-check-label" for="thriller">Thriller</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check text-left">
                                    <input class="form-check-input" type="checkbox" id="fantasy" value="fantasy" name="genre[]">
                                    <label class="form-check-label" for="fantasy">Fantasy</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check text-left">
                                    <input class="form-check-input" type="checkbox" id="animation" value="animation" name="genre[]">
                                    <label class="form-check-label" for="animation">Animation</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-4 ">
                                <div class="form-check text-left">
                                    <input class="form-check-input" type="checkbox" id="action" value="action" name="genre[]">
                                    <label class="form-check-label" for="action">Action</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check text-left">
                                    <input class="form-check-input" type="checkbox" id="musical" value="musical" name="genre[]">
                                    <label class="form-check-label" for="musical">Musical</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check text-left">
                                    <input class="form-check-input" type="checkbox" id="documentary" value="documentary" name="genre[]">
                                    <label class="form-check-label" for="documentary">Documentary</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group col-md p-0">
                            <label class="sr-only" for="imageUrl">Image URL</label>
                            <input type="text" id="imageUrl" class="form-control" name="imageUrl" placeholder="Image URL" />
                        </div>
                        <div class="form-group col-md p-0">
                            <label class="sr-only" for="description_short">Description Short</label>
                            <textarea class="form-control" rows="3" id="description_short" name="description_short" placeholder="Description short version"></textarea>
                        </div>
                        <div class="form-group col-md p-0">
                            <label class="sr-only" for="description">Description</label>
                            <textarea class="form-control" rows="3" id="description" name="description" placeholder="Description"></textarea>
                        </div>
                        <div class="d-flex flex-row-reverse ">
                            <div class="col-5 m-0 p-0">
                                <a class="text-decoration-none"><input class="btn btn-primary btn-block" type="submit" value="ADD Movie"></a>
                                <br>
                                <a class="text-decoration-none" href="index.php"><input class="btn btn-secondary btn-block" type="reset" value="Abbort"></a>
                            </div>
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