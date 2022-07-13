<?php
  session_start();
    $conn = mysqli_connect("localhost", "students_admin", "Lin@95#25252525", "students_studentinndb");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  };

  //Student transition to recruiter application
  if(isset($_POST['transition_active'])){
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM registration WHERE email='$email' AND role='recruiter'";
    $result = mysqli_query($conn, $sql);
    if (!($result->num_rows > 0)) {
     
        $first_name = $_SESSION['firstname'];
        $last_name = $_SESSION['lastname'];
        $password = $_SESSION['password'];
        $role = 'recruiter';
        $applied = 'Yes';
        $fullname = $first_name . ' ' . $last_name;
        $sql = "INSERT INTO registration (first_name, last_name, email, password, role, applied) VALUES (?, ?, ?, ?, ?, ?)";
        //initialize the prepared statement object
        $stmt = mysqli_stmt_init($conn);
    
        //checking if the prepared statement succeeded. it will return true if it succeeded and false otherwise and we check for false
        if(!mysqli_stmt_prepare($stmt, $sql)){
          //kill the connection because syntax errors got caught
          exit('<div class="alert alert-danger">Oops! Something went wrong! Please try again or contact the administrator</div>');
        }
    
        //if no syntax errors got caught, we bind the prepared statement object $stmt with the data we need to store in the database
        //Hashing password before storing
      
        mysqli_stmt_bind_param($stmt, "ssssss", $first_name, $last_name, $email, $password, $role, $applied);
    
        if(mysqli_stmt_execute($stmt)){
          $sql2 = "SELECT * FROM student_application WHERE email = '$email'";
          $result = mysqli_query($conn, $sql2);

          if($result->num_rows > 0){
            $row = mysqli_fetch_assoc($result);
            $id_number = $row['id_number'];
            $first_names = $row['first_name'];
            $last_names = $row['last_name'];
            $gender = $row['gender'];
            $race = $row['race'];
            $email_address = $row['email'];
            $phone = $row['phone'];
            $street = $row['street'];
            $city = $row['city'];
            $province = $row['province'];
            $postal_code = $row['postal_code'];
            $country = $row['country'];
            $kin_name = $row['kin_name'];
            $kin_number = $row['kin_number'];
            $application_status = "Processing";
            $referral_code = $first_name[0] . $last_name[0] . $id_number[0] . $id_number[1] . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);

            $sql3 = "INSERT INTO recruiter_application (id_number, first_name, last_name, gender, race, email, phone, referral_code, street, city, province, postal_code, country, kin_name, kin_number, application_status)
            VALUES
            ('$id_number','$first_names', '$last_names', '$gender', '$race','$email_address', '$phone', '$referral_code','$street', '$city', '$province','$postal_code', '$country', '$kin_name', '$kin_number', '$application_status')";

            $result2 = mysqli_query($conn, $sql3);

            if($result2){
              $_SESSION['role'] = 'dual-student';
              $role2=$_SESSION['role'];
              $image = '';
              $query = "INSERT INTO avatar (email, full_name, role, image) VALUES ('$email', '$fullname', '$role', '$image')";
              if(!mysqli_query($conn,$query)){
                exit("Failed to insert avatar");
              };

              $text = mysqli_real_escape_string($conn, "Hi<br/><br/>We have recieved your recruiter application. Please keep checking your application status under <strong style='font-weight:bold'>APPLICATIONS</strong> on your profile.<br/><br/> Thank you for taking interest in us. <br/><br/> Regards<br/><br/>StudentINN");
              mysqli_query($conn, "INSERT INTO messages(email, message, read_) VALUES ('$email','$text', 0)");
              exit('success');
            }else{

              exit('Oops! something went wrong, please try again later');

            }

          }else{

            exit('Oops! something went wrong, please try again later');
          }

        }else{
          
            exit('Oops! something went wrong, please try again later');

        }
    
      
    }else{
      exit('Oops! You are a registered recruiter already!');
    }
   
  }
  else{
    exit('Oops! You are a registered recruiter already!');
  }

  