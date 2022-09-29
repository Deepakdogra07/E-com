<?php
            include 'db.php';
                $cdropdown= $_GET["cdropdown"];
                $query="SELECT * FROM states WHERE country_id = $cdropdown";
                    $result = mysqli_query($con,$query);
                        echo '<option value="">Select State</option>';
                         while($row = mysqli_fetch_array($result)) {
?>
                            <option value="<?php echo $row["id"];?>"><?php echo $row["name"];?></option>


<?php
}
?>