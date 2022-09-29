<?php
include'db.php';
                        $country_id = $_GET["country_id"];
                        $result = mysqli_query($con,"SELECT * FROM countries");

                        while($row = mysqli_fetch_array($result)) {
                      ?>
                        <option value="<?php echo $row["id"];?>"><?php echo $row["name"];?></option>
                      <?php
                        }
                      ?>