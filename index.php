<?php

include'db.php';
include 'navigation.php';
print_r($_SESSION['admin_mail']);
if (empty($_SESSION['admin_mail'])) {
  header('location:login.php');
  alert("Please Enter your Username");
}


?>


<div class="container" style="margin-top:30px">
  <div class="row">



    <div class="col-sm-2">
      
      
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">See Our Ecommerce Site</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="showproduct.php">Show Products</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="orders.php">Orders</a>
        </li>
     
        <li class="nav-item">
          <a class="nav-link" href="addproduct.php">Add Product</a>
        </li>
           <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
        
       
      </ul>
      <hr class="d-sm-none">
    </div>

<!-- Space For Slider -->
 




</div>
</div>

<?php

include'footer.php';

?>


</body>
</html>
