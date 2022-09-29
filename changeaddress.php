<?php
include'db.php';
$id=$_SESSION['id'];
$shipping=1;
$addressid=$_POST['adressid'];
$sql="SELECT * FROM address where defaultshipping='$shipping' where userid='$id'";
echo $sql;
$result=mysqli_query($con,$sql);
echo "<pre>";
print_r($result);

// $row=mysqli_fetch_assoc($res);
// $addressid1=$row['addressid'];

// $sql1="UPDATE address SET defaultshipping='0' where addressid='$addressid'";
// $res1=mysqli_query($con,$sql1);
// $query="SELECT * FROM address where addressid='$addressid'";
// echo $query;
// $result=mysqli_query($con,$query);
// print_r($result);
// $query1="UPDATE address SET defaultshipping='$shipping' where addressid='$addressid'";
// echo $query1;
// $result1=mysqli_query($con,$query1);
// print_r($result1);



?>