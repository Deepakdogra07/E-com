<?php
include "db.php";
$state_id = $_POST["state_id"];
$query="SELECT * FROM cities where state_id = $state_id";


$result = mysqli_query($con,$query);

echo '<option value="">Select City</option>';
if($result){

    while($row = mysqli_fetch_array($result)) {
    ?>
    <option value="<?php echo $row["id"];?>"><?php echo $row["name"];?></option>
    <?php
    }

}


?>