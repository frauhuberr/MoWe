<?php 
    session_start();
    $con = mysqli_connect('localhost', 'root', '', 'movielibrary');
    if (!mysqli_select_db($con, 'movielibrary')) {
        die("Keine Verbindung zur Datenbank");
    }

    echo '
    <html>
        <head>
            <title>Movie-Detail</title>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
            <link rel="stylesheet" href="/M133/LB/projekt_modul133/css/gallery.css" />

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
                                echo '
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
            $moviePk = $_REQUEST['pk'];
            $sql = "SELECT * FROM movie WHERE movie_pk = $moviePk";
            $movie = mysqli_query($con,$sql);
            $movieRow = mysqli_fetch_array($movie);
            $join = "SELECT g.name AS genre, m.* FROM genre g, movie m, movieGenre mg WHERE mg.movie_fk = m.movie_pk AND mg.genre_fk = g.genre_pk AND m.movie_pk = '$moviePk'";
            $getGenres = mysqli_query($con,$join);
            echo '
            <main role="main">
                <div class="container p-5">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="container">
                                <img class="img-fluid" src="'.$movieRow['imageURL'].'" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="container pt-3">
                                <h1 class="text-center">'. $movieRow['name'].'</h1><br>
                                <p>'.$movieRow['description'].'</p><br><br>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Year published</th>
                                            <td>'.$movieRow['yearpublished'].'</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Min Age</th>
                                            <td>'.$movieRow['fsk'].'</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Producer</th>
                                            <td>'.$movieRow['producer'].'</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Main Actor</th>
                                            <td>'.$movieRow['mainActor'].'</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Genre</th>';
                                            while($g = mysqli_fetch_assoc($getGenres)){
                                                echo '<td>'.$g['genre'].'</td>'; 
                                            }
                                            echo'  
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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