<?php
//include config
require_once('../assets/blogg/config.php');
//log user out
$user->logout();
header('Location: index.php'); 
?>