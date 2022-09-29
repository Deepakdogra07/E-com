<?php
include "db.php";
$quantity=1;
$pid=$_POST['pid'];
if (empty($_SESSION['mail'])){
    $id=$_COOKIE[$cookie_name];
}
else{
$id = $_SESSION['id'];
}
// $qty=$_POST['qty'];
// if($qty==0){
$sqli="SELECT * from productcart where productid='$pid' and userid='$id'";
echo $sqli;

$res = mysqli_query($con,$sqli);
$num = mysqli_num_rows($res);
// echo $num;

if($num==0){
	$sql="INSERT into productcart(productid,userid,quantity)values('$pid','$id','$quantity')";
	$result=mysqli_query($con,$sql);
    echo "<script>alert('Product added Succesfully')</script>";
}


else
{

 $select="SELECT * from productcart where productid='$pid'";
 $result1=mysqli_query($con,$select);
 $row=mysqli_fetch_assoc($result1);
 $q=$row['quantity'];
 $productid=$row['productid'];
 $quantity+=$q;
 $query="UPDATE productcart SET quantity='$quantity' WHERE productid='$productid' ";
 $reto=mysqli_query($con,$query);
}
// $qntity=$_POST['qty'];
// $query10="UPDATE productcart SET quantity='$qntity' WHERE productid='$z' ";

 



?>  