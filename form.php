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
         <!--  <a class="nav-link " href="showproduct.php">Show Products</a>
        </li> -->
       
        <li class="nav-item">
          <a class="nav-link active" href="form.php">Register Now</a>
        </li>
         <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
        </li>
       
      </ul>
      <hr class="d-sm-none">
    </div>
  <div class="col-sm-10">
        <center><h1>Add Account</h1></center>
      <form action="create.php" method="post" >
  <div class="form-group">
    <label for="exampleFormControlInput1">Name</label>
    <input type="name" class="form-control" id="exampleFormControlInput2" placeholder="Enter your name"name="name">
  </div>
    <div class="form-group">
    <label for="exampleFormControlInput2">Password</label>
    <input type="Password" class="form-control" id="exampleFormControlInput2" placeholder="Enter your password" name="password">
  </div>
      
  <div class="form-group">
    <label for="exampleFormControlInput3">Email address</label>
    <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="Enter your Email" name="mail">
  </div>
  

    
  <button type="submit" class="btn btn-primary" style="margin-left:300px;" name="submit">Create new account</button>
</form>
</div>
</div>

<?php

include'footer.php';

?>
<script type="text/javascript">
  
 
</script>
</body>
</html>
