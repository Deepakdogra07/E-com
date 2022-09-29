<?php
include'db.php';
if (isset($_POST['deleteid'])) {
    
$id=$_POST['deleteid'];

$query="delete from productcart where id=".$id."";
 $result=mysqli_query($con,$query);
 /*   if($result)
    {
       // echo 'deleted succesfully';
        header('location:usercart.php');
    }

*/
}







                 
?>