<?php
include'db.php';

?>


<br>
<br>
<table class="table table-danger table-bordered border-primary table-striped table-sm align-content-center" > 
            <thead>
      <tr>
        <th>NAME</th>
        <th>PRODUCT</th>
        <th>QUANTITY</th>
        <th>PRICE</th>
        <th  style="text-align:center;">ADDRESS</th>
        <th>Date of Booking</th>
        <th>Expected Date of Delivery</th>
        <th>STATUS</th>
              </tr>
    </thead>
    <tbody>
        <?php
            $query="SELECT *from orders";

            $result=mysqli_query($con,$query);
            while($row=mysqli_fetch_assoc($result)){
                $productname=$row['productname'];
                $address=$row['adress'];
                $username=$row['username'];
                $mail=$row['usermail'];
                // $productprice=$row['price'];
                $price= $row['price'];
                $quantity=$row['quantity'];
                $ordertime=$row['orderdate'];
                
                

      
      
     echo' <tr>
      <td>'.$username.'</td>
        <td>'.$productname.'</td>
        <td>'.$quantity.'</td>
        <td >'.$price.'</td>
        <td>'.$address.'</td>
        <td>'.$ordertime.'</td>
        <td>15/09/2022</td>
         <td style="background-color:green;color:white;"><center>PAID</td>
';
            }

        ?>
        <!-- <td style="background-color:red;color:white;"><center>UNPAID</td> -->
      </tr>
    </tbody>
</table>