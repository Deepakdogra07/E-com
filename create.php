<?php
include 'db.php';
include'navigation.php';
$name=$_POST['name'];
$password=$_POST['password'];
$mail=$_POST['mail'];


if(empty($name)|| empty($password)||empty($mail))
{
	echo'<script>alert("Please Enter All fields");</script>';
	header('location:form.php');
}


else{
$query="INSERT INTO user(name,mail,pass) values('$name','$mail','$password')";
$result=mysqli_query($con,$query);
header('location:login.php');
}

?>