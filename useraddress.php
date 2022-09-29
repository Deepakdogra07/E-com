<?php
include 'db.php';
$id=$_SESSION['id'];
 $response['message'] = '';


$username=$_POST['username'];
$address=$_POST['address1'];
$address1=$_POST['address'];
$country=$_POST['country'];
$state=$_POST['state'];
$city=$_POST['city'];
$number=$_POST['number'];
$pin=$_POST['pin'];
$shipping=0;
 if(empty($username)|| empty($address)||empty($address1)||empty($country)||empty($state)
||empty($city)||empty($number)||empty($pin))
 {
  header('location:address.php');
  echo '<div class="container1 alert alert-danger">ALL Fields are required </div>';
 }
else{
$query = "INSERT INTO address( userid, username, adress,adress2, country, state, city, mobile, pin,defaultshipping ) VALUES
  ( '$id', '$username', '$address','$address1', '$country', '$state', '$city', '$number', '$pin','$shipping' )";
  echo $query;
// // echo "<pre>";
//   exit();
$result=mysqli_query($con,$query);


	
	header('location:usercart.php');

}
?>

