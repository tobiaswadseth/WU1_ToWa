<?php
//include config
require_once('../assets/blogg/config.php');
//check if already logged in
if ($user->is_logged_in()) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="sv">

<head>
    <meta name="robots" content="nofollow">
    <meta name="description" content="Slutprojekt i Webbutvecling 1 på Thorén Innovation School">
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tobias Wadseth</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css" media="all">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/css/all.min.css" type="text/css" media="all">
    <!-- IonIcons -->
    <link rel="stylesheet" href="../assets/css/ionicons.min.css" type="text/css" media="all">
    <!-- Egen -->
    <link rel="stylesheet" href="../assets/css/style.min.css" type="text/css" media="all">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <!-- Custom Cursor -->
    <div id="cursor"></div>

    <!-- Preloader -->
    <div id="preloader">
        <div class="loading-area">
            <h3>tobias.</h3>
            <span>laddar...</span>
        </div>
        <div class="left-side"></div>
        <div class="right-side"></div>
    </div>

    <!-- Overlay mörk meny -->
    <div class="overlay-menu d-flex align-items-start flex-column">

        <!-- Stäng ikon -->
        <nav class="navbar navbar-light">
            <div class="container">
                <!-- Stäng ikon -->
                <div class="close-icon">
                    <i class="ion-md-close"></i>
                </div>
            </div>
        </nav>

        <!-- Navigation meny -->
        <ul class="vertical-menu mt-auto">
            <li><a href="../">Portfolio</a>
                <ul class="submenu">
                    <li><a href="../portfolio/exempel1.html">Exempel 1</a></li>
                    <li><a href="../portfolio/exempel2.html">Exempel 2</a></li>
                    <li><a href="../portfolio/exempel3.html">Exempel 3</a></li>
                </ul>
            </li>
            <li><a href="../om.html">Om</a></li>
            <li><a href="../blogg.php">Blogg</a></li>
            <li><a href="../kontakt.html">Kontakt</a></li>
            <?php
            if ($user->is_logged_in()) {
                echo '<li><a href="admin/logout.php">Logga Ut</a></li>';
                echo '<li><a href="admin/index.php">Kontroll Panel</a></li>';
            } else {
                echo '<li><a href="admin/login.php">Logga In</a></li>';
            }
            ?>
        </ul>

        <!-- Copyright -->
        <footer class="text-center mt-auto">
            <div class="container">
                <span class="copyright">&copy; <span id="overlay-year"></span> Tobias Wadseth</span>
            </div>
        </footer>
    </div>

    <!-- Sid wrapper -->
    <div class="site-wrapper">

        <!-- Sid header -->
        <header>
            <nav class="navbar navbar-light">
                <div class="container d-flex">
                    <!-- Menu icon -->
                    <div class="menu-icon justify-content-end">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </nav>
        </header>

        <div class="container container-padding">
            <form id="login-form" class="login-form mt-6" method="post" autocomplete="off" action="../assets/form/login.php">
                <!-- <p><label>Username</label><input type="text" name="username" value=""  /></p>
                <p><label>Password</label><input type="password" name="password" value=""  /></p>
                <p><label></label><input type="submit" name="submit" value="Login"  /></p> -->

                <div class="messages"></div>

                <div class="row">
                    <div class="column col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="InputUsername" id="InputUsername" placeholder="Användarnamn" required="required" data-error="Användarnamn krävs.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="column col-md-6">
                        <div class="form-group">
                            <input type="password" class="form-control" name="InputPassword" id="InputPassword" placeholder="Lösenord" required="required" data-error="Lösenord krävs.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                
                <button type="submit" name="submit" id="submit" value="Submit" class="btn btn-default btn-lg btn-full">Logga In</button>

            </form>
        </div>
    </div>

    <!-- Go to top -->
    <a href="javascript:" id="return-to-top"><i class="ion-md-arrow-up"></i></a>

    <!-- Scripts -->
    <script src="../assets/js/jquery-1.12.3.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/masonry.pkgd.min.js"></script>
    <script src="../assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="../assets/js/jquery.stellar.js"></script>
    <script src="../assets/js/infinite-scroll.min.js"></script>
    <script src="../assets/js/login.js"></script>
    <script src="../assets/js/validator.js"></script>
    <script src="../assets/js/custom.js"></script>

</body>
</html>