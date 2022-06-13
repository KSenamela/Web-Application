<?php

session_start();
unset($_SESSION['email']);
unset($_SESSION['fullname']);
unset($_SESSION['role']);
unset($_SESSION['userId']);
session_destroy();
header('Location: ../index.php');
exit();