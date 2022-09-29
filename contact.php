<?php
include'navigation.php';

  ?>
<!DOCTYPE html>
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
          <a class="nav-link" href="form.php">Register Now</a>
        </li>
           <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
       
      </ul>
      <hr class="d-sm-none">
    </div>

  <div class="col-sm-10">
<!-- Space For contact form  -->
 		<!--Section: Contact v.2-->


    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto d-block">Do you have any questions? Please do not hesitate to contact us directly.<br> Our team will come back to you within
        a matter of hours to help you.</p>

    <div class="row">

        <!--Grid column-->
        <div class="col-md-12 mb-md-0 mb-12">
            <form id="contact-form" name="contact-form" action="" method="POST">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0 mx-auto d-block">
                        	<label for="name" class="">Your name</label>
                            <input type="text" id="name" name="name" class="form-control mx-auto d-block">
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6 mx-auto d-block">
                        <div class="md-form mb-0">
                        	 <label for="email" class="">Your email</label>
                            <input type="text" id="email" name="email" class="form-control mx-auto d-block">
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                        	<label for="subject" class="">Subject</label>
                            <input type="text" id="subject" name="subject" class="form-control">
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                        	<label for="message">Your reviews (min 100 words )</label>
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                            
                        </div>

                    </div>
                </div>
                <!--Grid row-->

            </form>

            <div class="text-center text-md-auto">
                <a class="btn btn-success" style="margin-top:20px;">Send </a>
            </div>
            <div class="status"></div>
        </div>
        <!--Grid column-->

</div>
    </div>







</div>
</div>

  <?php
include'footer.php';

?>