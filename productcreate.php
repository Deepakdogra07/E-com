<?php
include 'db.php';
$id=$_SESSION['id'];
    // echo "<pre>";
    // print_r($_FILES);
 if (isset($_FILES['image'])) {
   $imagename = time().$_FILES['image']['name'];
   $tmpname = $_FILES['image']['tmp_name'];

   move_uploaded_file($_FILES['image']['tmp_name'], "../images/" . $imagename).'<br>';
   }


if (isset($_POST['submit'])) {
	
   
$name=$_POST['name'];
$description=$_POST['description'];
$price=$_POST['price'];
$discount=$_POST['discount'];

// $image = $_POST['image'];
// $image=$_FILES["image"]["name"];
// $tmpname = $_FILES["image"]["tmp_name"];
$query="INSERT INTO products (admin_id,productname,description,price,imagename,discount) VALUES ('$id','$name','$description','$price','$imagename','$discount')";
					
$result=mysqli_query($con,$query);

if ($result) {
	header('location:showproduct.php');
}
else{
	echo "error";
}

}

?>