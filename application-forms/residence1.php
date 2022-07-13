<?php
session_start();
  $conn = mysqli_connect("localhost", "students_admin", "Lin@95#25252525", "students_studentinndb");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  };

    $sql = "SELECT * FROM residences WHERE Residence_address= '13 5th Street Vrededorp' AND Room_Taken = 0";
    $run_query = mysqli_query($conn, $sql);

    if(mysqli_num_rows($run_query) > 0){
        foreach($run_query as $row){
        ?>
            <option value="<?php echo $row['Room_number']?>">
            <?php echo $row['Room_number']?>
            </option>
         
        <?php
        }

    }else{
        ?>
        <option value="">
            All rooms are full
        </option>
     
    <?php
    }
  



                   