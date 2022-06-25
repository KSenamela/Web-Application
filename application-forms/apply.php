<?php

if (isset($_POST['firstname'])) {
  $first_name = $_POST['firstname'];
  $last_name = $_POST['lastname'];
  $institution = $_POST['institution'];
  $gender = $_POST['gender']; 
  $comp_date = $_POST['compyear'];
  $province = $_POST['province'];

  exit($first_name . ' ' . $last_name . ' ' . $institution . ' ' . $gender . ' ' . $comp_date . ' ' . $gender . ' ' );
}