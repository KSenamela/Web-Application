<?php
  error_reporting(0);

  // $conn = mysqli_connect("localhost", "root", "", "studentinndb");
  $conn = mysqli_connect("localhost", "students_admin", "Lin@95#25252525", "students_studentinndb");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  }