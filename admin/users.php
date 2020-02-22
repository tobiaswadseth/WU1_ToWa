<?php
//include config
require_once('../assets/blogg/config.php');
//if not logged in redirect to login page
if (!$user->is_logged_in()) {
    header('Location: login.php');
}
//show message from add / edit page
if (isset($_GET['deluser'])) {
    //if user id is 1 ignore
    if ($_GET['deluser'] !='1') {
        $stmt = $db->prepare('DELETE FROM users WHERE memberID = :memberID') ;
        $stmt->execute(array(':memberID' => $_GET['deluser']));
        header('Location: users.php?action=deleted');
        exit;
    }
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
    <script language="JavaScript" type="text/javascript">
        function deluser(id, title) {
            if (confirm("Are you sure you want to delete '" + title + "'")) {
                window.location.href = 'users.php?deluser=' + id;
            }
        }
    </script>

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

        <?php
        //show message from add / edit page
        if (isset($_GET['action'])) {
            echo '<h3>User '.$_GET['action'].'.</h3>';
        }
        ?>

        <table>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
            try {
                $stmt = $db->query('SELECT memberID, username FROM users ORDER BY username');
                while ($row = $stmt->fetch()) {
                    echo '<tr>';
                    echo '<td>'.$row['username'].'</td>'; ?>

                    <td>
                        <a href="edit-user.php?id=<?php echo $row['memberID']; ?>">Edit</a> 
                        <?php if ($row['memberID'] != 1) {?>
                            | <a href="javascript:deluser('<?php echo $row['memberID'];?>','<?php echo $row['username'];?>')">Delete</a>
                        <?php } ?>
                    </td>
                    
                    <?php
                    echo '</tr>';
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        ?>
        </table>

        <p><a href='add-user.php'>Add User</a></p>
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