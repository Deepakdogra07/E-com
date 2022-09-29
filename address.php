<?php
include 'db.php';
include 'navigation.php';
$id=$_SESSION['id'];
 $response['message'] = '';

if(empty($_SESSION['mail'])){
    header('location:login.php');
}
$username=$_POST['username'];
$address=$_POST['address1'];
$address1=$_POST['address'];
$country=$_POST['country'];
$state=$_POST['state'];
$city=$_POST['city'];
$number=$_POST['number'];
$pin=$_POST['pin'];
$shipping=0;
 if(empty($username)|| empty($address)||empty($address1)||empty($country)||empty($state)
||empty($city)||empty($number)||empty($pin))
 {
  // header('location:address.php');
  echo '<div class="container1 alert alert-danger">ALL Fields are required </div>';
 }
else{
$query = "INSERT INTO address( userid, username, adress,adress2, country, state, city, mobile, pin,defaultshipping ) VALUES
  ( '$id', '$username', '$address','$address1', '$country', '$state', '$city', '$number', '$pin','$shipping' )";
  // echo $query;
// // echo "<pre>";
//   exit();
$result=mysqli_query($con,$query);

echo '<div class="container1 alert alert-success">Success</div>';
     
     header('location:usercart.php');

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
          <a class="nav-link " href="showproduct.php">Show Products</a>
        </li>
       
        
         <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
        </li>
       
      </ul>
      <hr class="d-sm-none">
    </div>

    
  <div class="col-sm-10">
        <center><h1>Please Enter Your Address</h1></center>


      <form action="" method="POST">
  
     <div class="form-group">
    <label for="exampleFormControlInput3">Enter Your Name</label>
    <input type="name" class="form-control" id="exampleFormControlInput2" placeholder="Enter your name" name="username" maxlength="30">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Enter Your House Number</label>
    <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Enter your Address"name="address">
  </div>   
   <div class="form-group">
    <label for="exampleFormControlInput1">Enter Your Address</label>
    <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Enter your Full Address"name="address1">
  </div> 
  <div class="form-group">
    <label for="exampleFormControlInput3">Enter Your Number</label>
    <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Enter your number" name="number" maxlength="10" >
  </div>
   <div class="form-group">
                    <label for="country">Country</label>
                    <select class="form-control" name="country" id="country">
                         <option value="">Select Country</option>
                      <?php include'country.php';?>
            </select>
               </div>

               <div class="form-group">
                    <label for="state">State</label>
                    <select class="form-control" name="state" id="state">
                         <option value="">Select State</option>
                         
                    </select>
               </div>
              
               <div class="form-group">
                    <label for="city">City</label>
                    <select class="form-control" name="city" id="city">
                         <option value="">Select City</option>
                      
                    </select>
               </div>
               <div class="form-group">
    <label for="exampleFormControlInput3">Enter your PIN Code</label>
    <input type="pin" class="form-control" id="exampleFormControlInput2" placeholder="Enter your Pin Code" name="pin" maxlength="6">
  </div>

    
  <button type="submit" name="submit" class="btn btn-primary" style="margin-left:300px;">GO</button>
</form>
</div>
</div>
</div>

<?php

include'footer.php';

?>
<script type="text/javascript">
     // this  ajax query for state
    
$('#country').on('change', function() {
          var country = $(this).val();
          $.ajax({
               url: "state.php",
               type: "GET",
               data: {
                    cdropdown: country
               },
               success: function(data) {
                    $("#state").html(data);

               }
          });
     });

      // this  ajax query for city


     $('#state').on('change', function() {
          var state = $(this).val();
          $.ajax({
               url: "city.php",
               type: "GET",
               data: {
                    state_id: state
               },
               success: function(data) {
                    $("#city").html(data);

               }
          });
     });
</script>

</body>
</html>
