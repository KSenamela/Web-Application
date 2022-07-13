<?php
      session_start();
        $conn = mysqli_connect("localhost", "students_admin", "Lin@95#25252525", "students_studentinndb");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  }
      //do dont change this
      // if(isset($_POST['numMonths'])){
      //   $_SESSION['months'] = $_POST['numMonths'];
      //   exit($_SESSION['months']);
      // }
      
      if(isset($_FILES['uploadRequest']['name'])){
          $fullname = mysqli_real_escape_string($conn,$_POST['full_name']);
          $id_number = mysqli_real_escape_string($conn,$_POST['idnumber']);
         //file details
         $fileName = $_FILES['uploadRequest']['name'];
         $fileSize = $_FILES['uploadRequest']['size'];	
         $tmpName = $_FILES['uploadRequest']['tmp_name'];
 
         //Validate image
         $allowedFormat = ['jpg', 'png', 'jpeg', 'pdf'];
         $fileFormat = explode('.', $fileName);
         $fileFormat = strtolower(end($fileFormat));
         if(!in_array($fileFormat, $allowedFormat)){
             //echo and error message here, wrong format
             exit("Wrong format. Please only upload the following formats:jpg,png,jpeg and pdf");
 
         }
         else if($fileSize > 2000000){
             //echo error message too large
             //redirect to profile page
             exit("The size is too large. The allowed maximum size is 2MB");
         }else{
          $newFileName = $fileName . '-' . date('Y-m-d') . '-' . date('H.i.s') . '.' .$fileFormat; 
          $approve = 'Not yet';
          
          foreach($_POST['months'] as $key=>$value){
            $month = $_POST['months'][$key];

            $sql = "INSERT INTO payments (id_number, full_name, month, approved) VALUES ('$id_number', '$fullname', '$month', '$approve')";

            mysqli_query($conn, $sql);
          }

          if(move_uploaded_file($tmpName, 'payment/' . $newFileName)){
            exit('success');
          }else{
            exit("Oops! Something went wrong. Please try again later");
          };

         }

      }

      if(isset($_POST['cardHolder'])){
        $accountHolder = $_POST['cardHolder'];
        $idnumber = $_POST['idnumber'];
        $accountNumber = $_POST['accountNumber'];
        $BankName = $_POST['BankName'];
        $BranchCode = $_POST['BranchCode'];
        $approve = "Not yet";
        $sql = "INSERT INTO payment_request (id_number, account_holder, account_number, bank_name, branch_code, approved) VALUES ('$idnumber', '$accountHolder', '$accountNumber', '$BankName','$BranchCode', '$approve')";

        if(mysqli_query($conn, $sql)){
          exit('success');

        };
      }

  