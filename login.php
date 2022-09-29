<?php
include 'navigation.php';
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
          <a class="nav-link active" href="login.php">Login</a>
        </li>
       
      </ul>
      <hr class="d-sm-none">
    </div>

   



  <div class="col-sm-10">
      <form action="login1.php" method="post">
  <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="name@example.com" name="mail">
  </div>
    <div class="form-group">
    <label for="exampleFormControlInput2">Password</label>
    <input type="Password" class="form-control" id="exampleFormControlInput2" placeholder="Enter your password" name="password">
  </div>
  <button type="submit" class="btn btn-primary" style="margin-left:300px;">Login</button>
</form>
</div>
</div>
<?php
include'footer.php';

?>

</body>
</html>
