<?php
include "db.php";
$state_id = $_GET["state_id"];
$sql="SELECT * FROM cities where state_id = $state_id";


$result = mysqli_query($con,$sql);

echo '<option value="">Select City</option>';
if($result){

    while($row = mysqli_fetch_array($result)) {
    ?>
    <option value="<?php echo $row["id"];?>"><?php echo $row["name"];?></option>
    <?php
    }

}


?>