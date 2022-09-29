<?php
include'db.php';
include 'navigation.php';
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

<div class="container" style="margin-top:30px">
  <div class="row">



    <div class="col-sm-2">
      
      
         <ul class="nav nav-pills flex-column">
        <li class="nav-item">
           <li class="nav-item">
          <a class="nav-link " href="index.php">See Our Ecommerce Site</a>
        </li>
                <li class="nav-item">
        <a class="nav-link" href="showproduct.php">Show Products</a>
        </li>
       
         <li class="nav-item">
        <a class="nav-link active" href="addproduct.php">Add Product</a>
        </li>
        
         <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
        </li>
       
      </ul>
      <hr class="d-sm-none">
    </div>
  <div class="col-sm-10">
    <center><h1>Add Product</h1></center>
      <form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlInput1">Product Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Enter your Product name"name="name">
  </div>
  
    <div class="form-group">
    <label for="exampleFormControlInput2">Product Description</label>
    <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Enter your Product Description" name="description">
  </div>
      
  <div class="form-group">
    <label for="exampleFormControlInput3">Product Price</label>
    <input type="float" class="form-control" id="exampleFormControlInput2" placeholder="Enter your Product Price" name="price">
  </div>
    <div class="form-group">
    <label for="exampleFormControlInput3">Product image</label>
    <input type="file" class="form-control" id="exampleFormControlInput2"  name="image">
  </div>
   <div class="form-group">
    <label for="exampleFormControlInput3">Discount</label>
    <input type="number" class="form-control" id="exampleFormControlInput2"  name="discount" max="40">
  </div>

  <button type="submit" name="submit" class="btn btn-success" style="margin-left:300px;">Add New Product</button>
</form>

</div>
</div>
</div>

<?php

include'footer.php';

?>

</body>
</html>
