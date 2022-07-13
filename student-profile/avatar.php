<?php 
    // error_reporting(0);
    session_start();
      $conn = mysqli_connect("us-cdbr-east-06.cleardb.net", "b854e33ee1a535", "43878545", "heroku_2765aee846ef442");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  }
    $email = $_SESSION['email'];
    $query = "SELECT * FROM registration WHERE email='$email'";
    if($_SESSION['role'] =="dual-student"){
        $role = "student";
    }else if($_SESSION['role'] =="dual-recruiter"){
        $role = "recruiter";
    }
    //Query the database so we can have access to the id number of the user that is currently logged in
    $run_query = mysqli_query($conn, $query);
    if($run_query ->num_rows > 0){
      $data = mysqli_fetch_assoc($run_query);
  
    }
    if($_SESSION['role'] =="dual-student"){
        $role = "student";
    }else if($_SESSION['role'] =="dual-recruiter"){
        $role = "recruiter";
    }else{
        $role = $_SESSION['role'];

    }

    if(isset($_FILES['image']['name'])){

        $name = $_SESSION['fullname'];

        //image details
        $imageName = $_FILES['image']['name'];
        $imageSize = $_FILES['image']['size'];	
        $tmpName = $_FILES['image']['tmp_name'];

        //Validate image
        $allowedFormat = ['jpg', 'png', 'jpeg'];
        $imageFormat = explode('.', $imageName);
        $imageFormat = strtolower(end($imageFormat));
        if(!in_array($imageFormat, $allowedFormat)){
            //echo and error message here, wrong format
            exit("Wrong format. Please only upload the following formats:jpg,png and jpeg");

        }
        else if($imageSize > 2000000){
            //echo error message too large
            //redirect to profile page
            exit("The size is too large. The allowed maximum size is 2MB");
        }
        else{

            $newImageName = $name . '-' . date('Y-m-d') . '-' . date('H.i.s') . '.' .$imageFormat; 

            $sql = "UPDATE avatar SET image = '$newImageName' WHERE email = '$email' AND role = '$role'";
            mysqli_query($conn, $sql);
            move_uploaded_file($tmpName, 'avatar/' . $newImageName);
            exit('success');
        }
    }

   

?>