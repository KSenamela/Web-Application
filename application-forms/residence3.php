<?php
session_start();
include '../server/dbconnect_server.php';

    $sql = "SELECT * FROM residences WHERE Residence_address= '43/45 Aandbloom Street, Jan Hofmeyer' AND Room_Taken = 0";
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
