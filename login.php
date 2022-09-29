<?php
include 'db.php';
include'navigation.php';

if (isset($_POST['submit'])) {
   
}
$mail=$_POST['mail'];
$password=$_POST['password'];

    $query="SELECT *
            FROM user
          WHERE mail='$mail' and pass='$password'
          ";

 // echo $query;
$result=mysqli_query($con,$query);
// echo "<pre>";

// print_r($_POST);
// print_r($result);
$num=mysqli_num_rows($result);
while ($row=mysqli_fetch_array($result))

 {
 $id=$row['id'];
$name=$row['name'];
echo $name;
echo $id;
 if ($num==1) {
  $_SESSION['id']=$id;
  $_SESSION['mail']=$mail;
 $_SESSION['pass']= $password;
 $_SESSION['name']=$name;
 $id=$_SESSION['id'];
// echo $id;
$id1=$_COOKIE[$cookie_name];
// echo $id1;
// $sql="SELECT * FROM productcart WHERE userid='$id1'";
// $result1=mysqli_query($con,$sql);
// $row1=mysqli_fetch_assoc($result1);

// $quantity=$row1['quantity'];
// echo $quantity;
$query1="UPDATE productcart SET userid='$id' WHERE userid='$id1'";
$result2=mysqli_query($con,$query1);

 
  header('location:welcome.php');
}
else
{
    header('location:login.php');
} 
}

?>


<div class="container" style="margin-top:30px">
  <div class="row">



    <div class="col-sm-2">
      
      
         <ul class="nav nav-pills flex-column">
       
         
        <li class="nav-item">
          <a class="nav-link" href="form.php">Register Now</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="login.php">Login</a>
        </li>
       
      </ul>
      <hr class="d-sm-none">
    </div>

   



  <div class="col-sm-10">

  
      <form action="" method="post" >
  <div class="form-group">
    <?php if(empty($mail)){

      echo '<div class="alert alert-danger"> <strong>Danger!</strong>. Email is missing</div>';
    }?>
    <label for="exampleFormControlInput1" name="id"></label>
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="name@example.com" name="mail">
  </div>
    <div class="form-group">
      <?php if(empty($mail)){

      echo '<div class="alert alert-danger"> <strong>Danger!</strong>. Password is missing</div>';
    }?>
    <label for="exampleFormControlInput2">Password</label>
    <input type="Password" class="form-control" id="exampleFormControlInput2" placeholder="Enter your password" name="password">
  </div>
  <button type="submit" class="btn btn-primary" style="margin-left:300px;" onclick="abc()">Login</button>
</form>
</div>
</div>
</div>
<?php
include'footer.php';

?>
<script type="text/javascript">
  
// function abc(){
//   $.ajax({
//     url:"updatecookie.php",
//     type: "",
//     success: function(){
//       location:reload();
//     }
//   });
// }


</script>
</body>
</html>
