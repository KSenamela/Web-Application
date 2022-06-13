<?php

  $conn = mysqli_connect("localhost", "root", "", "studentinndb");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  }