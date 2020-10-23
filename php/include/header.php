<html>

<head>
    <title>Dashboard</title>
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
    <script>
        $(document).on('click', ':not(form)[data-confirm]', function(e) {
            if (!confirm($(this).data('confirm'))) {
                e.stopImmediatePropagation();
                e.preventDefault();
            }
        });
    </script>

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
                        <?php
                        if ($_SESSION['user'] == true) {
                            echo '
                                    <a href="logout.php" class="text-decoration-none">
                                        <h4 class="text-white">Logout</h4>
                                    </a>
                                    <a href="formular_change_password.php" class="text-decoration-none">
                                        <h4 class="text-white">Change Password</h4>
                                    </a>
                                    <a href="delete_user.php" data-confirm="Are you sure you want to delete your account?" class="text-decoration-none">
                                        <h4 class="error">Delete Account</h4>
                                    </a>
                                ';
                        } else {
                            echo '<a href="formular_login.php" class="text-decoration-none"><h4 class="text-white">Login</h4></a>';
                        }
                        ?>
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
    </header>