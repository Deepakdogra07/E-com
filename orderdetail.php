<?php
include 'db.php';
$id=$_SESSION['id'];


$sql="SELECT products.productname, 
        products.price, 
        productcart.quantity,
        products.discount
        FROM productcart 
        JOIN products ON productcart.productid = products.id
         WHERE userid = '$id'";
echo $sql;


    $result = mysqli_query($con, $sql);
    print_r($result);
    while ($row = mysqli_fetch_assoc($result)){

        $productname = $row['productname'];
        $price = $row['price'];
        $quantity = $row['quantity'];
        $discount=$row['discount'];
        $price= $price*$quantity;
        $newprice=$price*((100-$discount)/100);
        // echo $productname;
        // echo$price;
        // echo $quantity;

        $query1 = "INSERT INTO OrderDetails ( userid , productname , productprice , orderquantity ,offerprice) VALUES ('$id','$productname','$price','$quantity','$newprice')";
        echo"<pre>";
        print_r($query1);
        $result1 = mysqli_query($con, $query1);
        // print_r($result1);
       
 

if ($result1) {
	header('location:showorder.php');
}
}

?>
