<?php
session_start();
include '../server/dbconnect_server.php';

    $sql = "SELECT * FROM residences WHERE Residence_address= '19 Rus Road, Vredepark' AND room_taken = 0";
    $run_query = mysqli_query($conn, $sql);
    print_r($run_query);

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
