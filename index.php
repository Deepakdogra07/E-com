<?php
include'db.php';

include 'navigation.php';


  if(empty($_SESSION['mail']))
  {
   
      $id=$_COOKIE[$cookie_name];
      echo $id;
      
  }

 // print_r($_SESSION);
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
     
        <!-- <li class="nav-item">
          <a class="nav-link" href="form.php">Register Now</a>
        </li> -->
           <li class="nav-item">
          <a class="nav-link" href="showorder.php">My Orders</a>
        </li>
         <!-- <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li> -->
      </ul>
      <hr class="d-sm-none">
    </div>

<!-- Space For Slider -->
<div class="col-sm-10"> 

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../images/1662355399c.jpeg" class="d-block w-100" style="height:300px;"/>
    </div>
    <div class="carousel-item">
      <img src="../images/2.jpg" class="d-block w-100" style="height:300px;"/>
    </div>
    <div class="carousel-item">
      <img src="../images/1662355399c.jpeg" class="d-block w-100" style="height:300px;"/>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- Shopping For Mobiles  -->
 <div class="row">
<div class="col-md-4">
        <div class="card " style="width: 18rem;">
        <img src="../images/2.jpg" class="card-img-top mx-auto d-block" style="width: 10rem ;height: 15rem  ">
        <div class="card-body">
            <h5 class="card-title">mobiles</h5>
           <p class="card-text">We give best quality of mobiles cilck here to see mobiles.</p>
            <a href="mobiles.php" class="btn btn-info">SEE MORE</a>
            
        </div>
        </div>
    </div>
    <div class="col-md-4" style="margin-left: 80px;">
        <div class="card " style="width: 18rem;">
        <img src="../images/2.jpg" class="card-img-top mx-auto d-block" style="width: 10rem ;height: 15rem  ">
        <div class="card-body">
            <h5 class="card-title">Laptops</h5>
           <p class="card-text">We give best quality of Laptops cilck here to see Laptops.</p>
            <a href="laptop.php" class="btn btn-info">SEE MORE</a>
            
        </div>
        </div>
    </div>
  </div>

</div>


</div>
</div>

<?php

include'footer.php';

?>


</body>
</html>
