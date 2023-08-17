<?php
include './admin_inc/config.inc.php';
session_start();
session_unset();
session_destroy();
header("Location: {$host}/AdminLTE-3.2.0/login.php");
?>