<?php 
    session_set_cookie_params(600,null,null,false,true);
    session_start();
    $con = mysqli_connect('localhost', 'root', '', 'movielibrary');
    if (!mysqli_select_db($con, 'movielibrary')) {
        die("Keine Verbindung zur Datenbank");
    }

    include("include/header.php");
    
            $moviePk = $_REQUEST['pk'];
            $sql = "SELECT * FROM movie WHERE movie_pk = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("i", $moviePk);
            $stmt->execute();
            $result = $stmt->get_result();
            $movieRow = $result->fetch_assoc();

            $sql = "SELECT g.name AS genre, m.* FROM genre g, movie m, movieGenre mg WHERE mg.movie_fk = m.movie_pk AND mg.genre_fk = g.genre_pk AND m.movie_pk = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("i", $moviePk);
            $stmt->execute();
            $result = $stmt->get_result();
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
                                            while($g = $result->fetch_assoc()){
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