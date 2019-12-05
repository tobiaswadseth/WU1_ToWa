<?php //include config
require_once('../assets/blogg/config.php');
//if not logged in redirect to login page
if (!$user->is_logged_in()) {
    header('Location: login.php');
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

    <script src="https://cdn.tiny.cloud/1/6lkbwmdiso2pgzr49yqjvardfcjlktdykes1tdag82v2s4qg/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: "textarea",
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        });
    </script>

</head>
<body>

    <!-- Custom Cursor -->
    <!-- <div id="cursor"></div> -->

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

        <?php
        //if form has been submitted process it
        if (isset($_POST['submit'])) {
            //collect form data
            extract($_POST);
            //very basic validation
            if ($postTitle =='') {
                $error[] = 'Please enter the title.';
            }
            if ($postDesc =='') {
                $error[] = 'Please enter the description.';
            }
            if ($postCont =='') {
                $error[] = 'Please enter the content.';
            }
            if (!isset($error)) {
                try {
                    $postSlug = slug($postTitle);
                    //insert into database
                    $stmt = $db->prepare('INSERT INTO posts (postTitle,postSlug,postDesc,postCont,postDate, postUser) VALUES (:postTitle, :postSlug, :postDesc, :postCont, :postDate, :postUser)') ;
                    $stmt->execute(array(
                        ':postTitle' => $postTitle,
                        ':postSlug' => $postSlug,
                        ':postDesc' => $postDesc,
                        ':postCont' => $postCont,
                        ':postDate' => date('Y-m-d H:i:s'),
                        ':postUser' => $_SESSION['username']
                    ));
                    $postID = $db->lastInsertId();
                    //redirect to index page
                    header('Location: index.php?action=added');
                    exit;
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }
        }
        //check for any errors
        if (isset($error)) {
            foreach ($error as $error) {
                echo '<p class="error">'.$error.'</p>';
            }
        }
        ?>

        <form action='' method='post'>

            <p><label>Title</label><br />
            <input type='text' name='postTitle' value='<?php if (isset($error)) {
            echo $_POST['postTitle'];
        }?>'></p>

            <p><label>Description</label><br />
            <textarea name='postDesc' cols='60' rows='10'><?php if (isset($error)) {
            echo $_POST['postDesc'];
        }?></textarea></p>

            <p><label>Content</label><br />
            <textarea name='postCont' cols='60' rows='10'><?php if (isset($error)) {
            echo $_POST['postCont'];
        }?></textarea></p>

            <p><input type='submit' name='submit' value='Submit'></p>

        </form>
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
    <script src="../assets/js/custom.js"></script>
</body>
</html>