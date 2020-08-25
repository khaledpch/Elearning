<?php
session_start();
if(!isset($_SESSION['pseudo'])) {
        header("Location: ../index.php");
        die;
}

session_regenerate_id(true);
session_destroy();

header("Location: ../index.php");
die;

?>