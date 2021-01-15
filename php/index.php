<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        $_SESSION['user'] = false;
    }
    if (!isset($_SESSION['admin'])) {
        $_SESSION['admin'] = false;
    }

    $con = mysqli_connect('localhost', 'root', '', 'movielibrary');
    if (!mysqli_select_db($con, 'movielibrary')) {
        die("Keine Verbindung zur Datenbank");
    }
        include("include/header.php");
        echo'
            <main role="main">
                <section class="jumbotron text-center">
                    <div class="container">
                        <h1 class="jumbotron-heading">All the movies we got on MoWe</h1>
                        <p class="lead text-muted">Your ratings will impact the world’s frontrunners in all of cinema history.</p>
                        <p>
                            <a href="index.php?rating=1" class="btn btn-secondary my-2">sort by rating</a>
                            <a href="index.php?year=1" class="btn btn-secondary my-2">sort by year</a>
                            <a href="index.php?age=1" class="btn btn-secondary my-2">sort by min age</a>';
                            if($_SESSION['admin'] == true){
                                echo '<a href="add_movie.php" class="btn btn-primary my-2" style="margin-left:5px;">add movie</a>';
                            }
                            echo '
                        </p>
                    </div>
                </section>
                <div class="album py-5 bg-light">
                    <div class="container">';
                        if (isset($_REQUEST['rating'])) {
                            $sql = "SELECT movie.movie_pk, movie.description_short, movie.imageURL, sum(hasranked.userLike) - sum(hasranked.userDislike) AS rating FROM movie LEFT JOIN hasranked ON movie.movie_pk = hasranked.movie_fk GROUP BY movie.movie_pk ORDER BY rating DESC";
                            $result_movie = mysqli_query($con, $sql);
                            echo '<div class="row">';
                            while ($row = mysqli_fetch_assoc($result_movie)) {
                                include("include/generate_movies.php");
                            }
                            echo '</div>';
                        } else if (isset($_REQUEST['year'])) {
                            $sql = "SELECT * FROM movie ORDER BY yearpublished";
                            $result_movie = mysqli_query($con, $sql);
                            echo '<div class="row">';
                            while ($row = mysqli_fetch_assoc($result_movie)) {
                                include("include/generate_movies.php");
                            }
                            echo '</div>';
                        } else if (isset($_REQUEST['age'])) {
                            $sql = "SELECT * FROM movie ORDER BY fsk";
                            $result_movie = mysqli_query($con, $sql);
                            echo '<div class="row">';
                            while ($row = mysqli_fetch_assoc($result_movie)) {
                                include("include/generate_movies.php");
                            }
                            echo '</div>';
                        } else {
                            $sql = "SELECT * FROM movie";
                            $result_movie = mysqli_query($con, $sql);
                            echo '<div class="row">';
                            while ($row = mysqli_fetch_assoc($result_movie)) {
                                include("include/generate_movies.php");
                            }
                            echo '</div>';
                        }
                        echo ' 
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