<?php 
session_set_cookie_params(600,null,null,false,true);
session_start();

include("include/header.php");

                if (isset($_REQUEST["fehler"])) {
                    echo '<div class="text-center error">Oops... You are missing some information! Please fill out every field.</div>';
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
                            <label class="sr-only" for="director">Director</label>
                            <input type="text" id="director" class="form-control" name="producer" placeholder="Director" />
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
                                <a class="text-decoration-none btn btn-secondary cancel-btn" href="index.php">Cancel</a>
                            </div>
                        </div>
                        <input type="hidden" name="csrf_token" value="'.$_SESSION['csrf_token'].'"/>
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