<?php
include'db.php';
 // echo 'deleted succesfully';
if (isset($_GET['deleteid'])) {
    
$id=$_GET['deleteid'];

$query="delete from products where id=$id";
 $result=mysqli_query($con,$query);
    if($result)
    {
       // echo 'deleted succesfully';
        header('location:showproduct.php');
    }


}







                 
?>