<?php

  error_reporting(0);
  session_start();
    $conn = mysqli_connect("localhost", "students_admin", "Lin@95#25252525", "students_studentinndb");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  }

  if(isset($_GET['edit'])){
   
    $edit = $_GET['edit'];
    $sql = "SELECT * FROM student_application WHERE id_number = '$edit'";
    $result = mysqli_query($conn,$sql);

    if($result->num_rows > 0) {
      $row = mysqli_fetch_assoc($result);

      $data = array(
        'first_name' => $row['first_name'],
        'last_name' => $row['last_name'],
        'id_number' => $row['id_number'],
        'email' => $row['email'],
        'phone' => $row['phone'],
        'gender' => $row['gender'],
        'race' => $row['race'],
        'institution' => $row['institution'],
        'course' => $row['course'],
        'year_of_study' => $row['year_of_study'],
        'study_completion_date' => $row['study_completion_date'],
        'funding_type' => $row['funding_type'],
        'student_number' => $row['student_number'],
        'referral_code' => $row['referral_code'],
        'street' => $row['street'],
        'city' => $row['city'],
        'province' => $row['province'],
        'postal_code' => $row['postal_code'],
        'country' => $row['country'],
        'kin_name' => $row['kin_name'],
        'kin_number' => $row['kin_number']

      );
      //get values from the residence application table for the given id number
      $query = "SELECT * FROM residence_application WHERE id_number = '$edit'";
      $run_query = mysqli_query($conn, $query);

      //create 2 array, one for res address and one for room numbers
      $index = 0;
      $resChoices = ['first_res_choice', 'second_res_choice', 'third_res_choice'];
      $roomChoices = ['first_room_choice', 'second_room_choice', 'third_room_choice'];

      foreach ($run_query as $value){
        $data[$resChoices[$index]] = $value['residence_address'];
        $data[$roomChoices[$index]] = $value['room_number'];
        $index++;
      }


   }

    exit(json_encode($data));
  }

  if(isset($_POST['idnumber'])){
    $id_number =  mysqli_real_escape_string($conn, trim($_POST['idnumber']));
    //getting the original email before the student application table gets updated, so we can use it to access the p
    $original_email = originalEmail("$id_number");

    $first_name = mysqli_real_escape_string($conn, trim($_POST['firstname']));
    $last_name =  mysqli_real_escape_string($conn, trim($_POST['lastname']));
    $email =  mysqli_real_escape_string($conn,trim($_POST['email']));
    $phone=  mysqli_real_escape_string($conn, trim($_POST['phonenumber']));
    $gender =  mysqli_real_escape_string($conn, trim($_POST['gender'])); 
    $race =  mysqli_real_escape_string($conn, trim($_POST['race']));
    $institution = mysqli_real_escape_string($conn, trim($_POST['institution']));
    $course =  mysqli_real_escape_string($conn, trim($_POST['course']));
    $studyYear =  mysqli_real_escape_string($conn, trim($_POST['yearstudy']));
    $completion_year =  mysqli_real_escape_string($conn, trim($_POST['compyear']));
    $funding =  mysqli_real_escape_string($conn, trim($_POST['funding']));
    $student_number =  mysqli_real_escape_string($conn, trim($_POST['studentnumber']));
    $referral_code = mysqli_real_escape_string($conn, trim( $_POST['referralcode']));

    $street =  mysqli_real_escape_string($conn, trim($_POST['street']));
    $city =  mysqli_real_escape_string($conn, trim($_POST['city']));
    $province =  mysqli_real_escape_string($conn, trim($_POST['province']));
    $postal_code  =  mysqli_real_escape_string($conn, trim($_POST['postal']));
    $country =  mysqli_real_escape_string($conn, trim($_POST['country']));
    $kin_name =  mysqli_real_escape_string($conn, trim($_POST['kinname']));
    $kin_phone = mysqli_real_escape_string($conn, trim($_POST['kinphone']));

    $updateStudent = "UPDATE student_application SET first_name = '$first_name' , last_name = '$last_name', email = '$email', phone = '$phone', gender = '$gender', race = '$race', institution = '$institution', course = '$course', year_of_study = '$studyYear', study_completion_date = '$completion_year', funding_type = '$funding', student_number = '$student_number', referral_code = '$referral_code', street = '$street', city = '$city', province = '$province', postal_code = '$postal_code', country = '$country', kin_name = '$kin_name', kin_number = '$kin_phone' WHERE id_number = '$id_number'";

    $queryRecruiter = mysqli_query($conn, "SELECT * FROM recruiter_application WHERE id_number = '$id_number'");
    $recruiterUpdated = true;

    if($queryRecruiter->num_rows > 0){
      
      $updateRecruiter = "UPDATE recruiter_application SET first_name = '$first_name' , last_name = '$last_name', email = '$email', phone = '$phone', gender = '$gender', race = '$race', street = '$street', city = '$city', province = '$province', postal_code = '$postal_code', country = '$country', kin_name = '$kin_name', kin_number = '$kin_phone' WHERE id_number = '$id_number'";

      if(mysqli_query($conn, $updateRecruiter)){
        $recruiterUpdated = true;
      }else{
        $recruiterUpdated = false;
      }
    }

    if(mysqli_query($conn, $updateStudent) && $recruiterUpdated){
      if(avatar($original_email, $email, $first_name , $last_name) && documents($original_email, $email, $first_name , $last_name) && messages($original_email, $email) && registration($original_email, $email, $first_name, $last_name) && payments($id_number, $first_name , $last_name)){
        exit("success");

      }else{
        exit('<div class="alert alert-danger">Oops! Something went wrong! Please try again or contact the developer - Klaas Senamela(klaassenamela@gmail.com)</div>');
      }
    }
  }
  

  //get the id_number in the database before updating
  function originalEmail($id_number){
      $conn = mysqli_connect("localhost", "students_admin", "Lin@95#25252525", "students_studentinndb");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  }

    $getEmail = mysqli_query($conn, "SELECT * FROM student_application WHERE id_number = '$id_number'");
    $row = mysqli_fetch_assoc($getEmail);
    
    return $row['email'];
  }

  //change email in the registration table
  function registration($original_email, $email, $first_name, $last_name){
      $conn = mysqli_connect("localhost", "students_admin", "Lin@95#25252525", "students_studentinndb");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  }

    $query = mysqli_query($conn, "SELECT * FROM registration WHERE email = '$original_email'");
    if($query->num_rows > 0){
      if(!mysqli_query($conn, "UPDATE registration SET email = '$email', first_name = '$first_name', last_name = '$last_name' WHERE email = '$original_email'")){
        exit("Oops! Something went wrong. Please try again later.");
      };
    }
    return true;

  }
  //change email in the avatar table
  function avatar($original_email, $email, $first_name , $last_name){
      $conn = mysqli_connect("localhost", "students_admin", "Lin@95#25252525", "students_studentinndb");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  }
    $full_name = $first_name . ' ' . $last_name;
    $query = mysqli_query($conn, "SELECT * FROM avatar WHERE email = '$original_email'");
    if($query->num_rows > 0){
      if(!mysqli_query($conn, "UPDATE avatar SET email = '$email', full_name = '$full_name' WHERE email = '$original_email'")){
        exit("Oops! Something went wrong. Please try again later.");
      };
    }
    return true;

  }

  //change email in the documents table
  function documents($original_email, $email, $first_name , $last_name){
      $conn = mysqli_connect("localhost", "students_admin", "Lin@95#25252525", "students_studentinndb");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  }
    $full_name = $first_name . ' ' . $last_name;

    $query = mysqli_query($conn, "SELECT * FROM documents WHERE email = '$original_email'");
    if($query->num_rows > 0){
      if(!mysqli_query($conn, "UPDATE documents SET email = '$email', full_name = '$full_name' WHERE email = '$original_email'")){
        return false;
      };
    }
    return true;
  }

  //change email in the messages table
  function messages($original_email, $email){
      $conn = mysqli_connect("localhost", "students_admin", "Lin@95#25252525", "students_studentinndb");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  }

    $query = mysqli_query($conn, "SELECT * FROM messages WHERE email = '$original_email'");
    if($query->num_rows > 0){
      if(!mysqli_query($conn, "UPDATE messages SET email = '$email' WHERE email = '$original_email'")){
        return false;
      };
    }
    return true;
  }
  //change email in the payments table
  function payments($id_number, $first_name , $last_name){
      $conn = mysqli_connect("localhost", "students_admin", "Lin@95#25252525", "students_studentinndb");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  }
    $full_name = $first_name . ' ' . $last_name;
    $query = mysqli_query($conn, "SELECT * FROM payments WHERE id_number = '$id_number'");
    if($query->num_rows > 0){
      if(!mysqli_query($conn, "UPDATE payments SET full_name = '$full_name' WHERE id_number = '$id_number'")){
        return false;
      };
    }
    return true;
  }

  //add a function that updates student and recruiter application table the email address and phone number
  function studentUpdate($original_email, $email, $phone){
      $conn = mysqli_connect("localhost", "students_admin", "Lin@95#25252525", "students_studentinndb");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  }

    $query = mysqli_query($conn, "SELECT * FROM student_application WHERE email = '$original_email'");
    if($query->num_rows > 0){
      if(!mysqli_query($conn, "UPDATE student_application SET email = '$email', phone = '$phone' WHERE email = '$original_email'")){
        return false;
      };
    }
    return true;

  }

  function recruiterUpdate($original_email, $email, $phone){
      $conn = mysqli_connect("localhost", "students_admin", "Lin@95#25252525", "students_studentinndb");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  }

    $query = mysqli_query($conn, "SELECT * FROM recruiter_application WHERE email = '$original_email'");
    if($query->num_rows > 0){
      if(!mysqli_query($conn, "UPDATE recruiter_application SET email = '$email', phone = '$phone' WHERE email = '$original_email'")){
        return false;
      };
    }
    return true;

  }
