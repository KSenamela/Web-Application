<?php
session_start();
  $conn = mysqli_connect("us-cdbr-east-06.cleardb.net", "b854e33ee1a535", "43878545", "heroku_2765aee846ef442");

  if (!$conn){
    die("Could not connect:" . mysqli_error());
  };

    $sql = "SELECT * FROM residences WHERE Residence_address= '50 Auckland Avenue, Auckland Park' AND Room_Taken = 0";
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
