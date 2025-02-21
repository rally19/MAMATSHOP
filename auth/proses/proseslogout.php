<?php
session_start();

if (!isset($_SERVER['HTTP_REFERER'])) {
    header("Location: ../../");
    exit();
}

session_unset();
session_destroy();
 
header("Location: ../goodbye.php");
exit();
?>