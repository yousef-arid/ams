<?php
session_start();
include("includes/config.php");
session_unset();
session_destroy();
header("location:index.php");

?>

