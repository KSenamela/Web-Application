<?php
error_reporting(0);

session_start();
unset($_SESSION['email']);
unset($_SESSION['fullname']);
unset($_SESSION['role']);
unset($_SESSION['userId']);
unset($_SESSION['applied'] );
session_unset(); 
session_destroy();
header('Location: ../index.php');
exit();