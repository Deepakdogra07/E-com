<?php

include 'db.php';
$mail=$_POST['mail'];
$password=$_POST['password'];
  if(empty($name) && empty($mail))
{
   echo'Please Enter All fields';
   header('location:login.php');
}
		$query="SELECT * FROM admin WHERE admin_mail='$mail' and admin_pass='$password'";


$result=mysqli_query($con,$query);

$num=mysqli_num_rows($result);
while ($row=mysqli_fetch_array($result))
// echo '<pre>';
// print_r($result);
 {
 $id=$row['id'];

 if ($num==1) {
  $_SESSION['id']=$id;
  $_SESSION['admin_mail']=$mail;
 $_SESSION['admin_pass']= $password;
  header('location:welcome.php');
}
else
{
   header('location:login.php');
} 
}





?>