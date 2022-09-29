<?php
include 'db.php';
session_start();
include'navigation.php';

  
   
?>


<div class="container" style="margin-top:30px">
  <div class="row">



    <div class="col-sm-2">
      
      
         <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <li class="nav-item">
          <a class="nav-link " href="index.php">See Our Ecommerce Site</a>
        </li>
          <a class="nav-link" href="showproduct.php">Show Products</a>
        </li>
<!--         <li class="nav-item">
          <a class="nav-link" href="form.php">Register Now</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link active" href="logout.php">Logout</a>
        </li>
       
      </ul>
      <hr class="d-sm-none">
    </div>

   



  <div class="col-sm-10">
  	<center>
   <h1> welcome</h1>
   <?php
   
   	echo $_SESSION['name'];

   ?>
   <a href="logout.php" class="btn-btn-danger">Logout</a>
</center>
</div>
</div>
<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Footer</p>
</div>

</body>
</html>
