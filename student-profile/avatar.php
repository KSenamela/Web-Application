<?php 
    // error_reporting(0);
    session_start();
    include "../server/dbconnect_server.php";
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
            exit("Here 1");

        }
        else if($imageSize > 2000000){
            //echo error message too large
            //redirect to profile page
            exit("Here 2");
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