<?php
  error_reporting(0);

  // $conn = mysqli_connect("localhost", "root", "", "studentinndb");
  $conn = mysqli_connect("us-cdbr-east-06.cleardb.net", "b854e33ee1a535", "43878545", "heroku_2765aee846ef442");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  }