<?php
include 'db.php';
$userid=$_SESSION['id'];
$id=$_POST['id'];
$cart_qty= $_POST['cart_qty'];
echo$cart_qty;
echo '<br>hi<br>';
// if($qty<=0)
// {
//     $query = "DELETE FROM productcart WHERE id ='$id'";
    
// }
// else{
$query="UPDATE productcart SET quantity='$cart_qty' WHERE userid='$userid'";
echo $query;
// }
 $result=mysqli_query($con,$query);
?>