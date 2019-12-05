<?php
require('assets/blogg/config.php');
?>
<!DOCTYPE html>
<html lang="sv">

<head>
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tobias Wadseth</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css" media="all">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/all.min.css" type="text/css" media="all">
    <!-- IonIcons -->
    <link rel="stylesheet" href="assets/css/ionicons.min.css" type="text/css" media="all">
    <!-- Egen -->
    <link rel="stylesheet" href="assets/css/style.min.css" type="text/css" media="all">

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
            <li><a href="./">Portfolio</a>
                <ul class="submenu">
                    <li><a href="portfolio/exempel1.html">Exempel 1</a></li>
                    <li><a href="portfolio/exempel2.html">Exempel 2</a></li>
                    <li><a href="portfolio/exempel3.html">Exempel 3</a></li>
                </ul>
            </li>
            <li><a href="om.html">Om</a></li>
            <li><a href="blogg.php">Blogg</a></li>
            <li><a href="kontakt.html">Kontakt</a></li>
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

                <!-- Meny ikon -->
                <div class="menu-icon justify-content-end">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

            </div>
        </nav>
    </header>

    <!-- Blogg -->
    <section class="blog-content">

        <div class="container container-padding">

			<?php
                try {
                    $pages = new Paginator('5', 'p');
                    $stmt = $db->query('SELECT postID FROM posts');
                    // Skicka antal posts till Paginator
                    $pages->set_total($stmt->rowCount());
                    $stmt = $db->query('SELECT postID, postTitle, postSlug, postDesc, postDate, postUser FROM posts ORDER BY postID DESC '.$pages->get_limit());
                    while ($row = $stmt->fetch()) {
                        echo '<article class="blog-item">';

                        echo '<header>';

                        echo '<h2 class="titel"><a href="'.$row['postSlug'].'">'.$row['postTitle'].'</a></h2>';

                        echo '<ul class="meta list-inline">';

                        echo '<li class="list-inline-item">'.date('j F Y', strtotime($row['postDate'])).'</li>';
                        echo '<li class="list-inline-item">'.$row['postUser'].'</li>';

                        echo '</ul>';

                        echo '</header>';

                        echo '<footer>';

                        echo '<p class="excerpt">'.$row['postDesc'].'</p>';

                        echo '<a href="'.$row['postSlug'].'" class="btn btn-default">Läs Mer</a>';

                        echo '</footer>';

                        echo '</article>';
                    }
                    echo $pages->page_links();
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            ?>

        </div>

    </section>

    <!-- Email -->
    <section class="cta text-center">
        <div class="container">
            <span>Kontakta Mig</span>
            <h2><a href="kontakt.html">tobias@wadseth.com</a></h2>
        </div>
    </section>

    <!-- Sid footer -->
    <footer class="text-center">
        <div class="container">
            <!-- Copyright -->
            <span class="copyright">&copy; <span id="year"></span> Tobias Wadseth</span>
        </div>
    </footer>

    </div>

    <!-- Go to top -->
    <a href="javascript:" id="return-to-top"><i class="ion-md-arrow-up"></i></a>

    <!-- Scripts -->
    <script src="assets/js/jquery-1.12.3.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/masonry.pkgd.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/jquery.stellar.js"></script>
    <script src="assets/js/infinite-scroll.min.js"></script>
    <script src="assets/js/custom.js"></script>

</body>
</html>