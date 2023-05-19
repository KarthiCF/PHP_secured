<?php
if(isset($_POST['submit'])){
  // echo "<script>alert('completed')</script>";
  $secret = "6Le_hiEmAAAAAPxnFt6f2RV126n5HZZqzcE5q1QP";
  $response = $_POST['g-recaptcha-response'];
  $remoteIP = $_SERVER['REMOTE_ADDR'];
  $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteIP";
  $get_data = file_get_contents($url);
  $row = json_decode($get_data, true);

  if($row['success']=="true"){
    echo "<script>alert('you are human')</script>";
  }else{
    echo "<script>alert('you are robot')</script>";
  }
}

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Sign up</title>
    <!-- recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- <link rel="icon" href=""> -->
    <link rel="stylesheet" href="style.css">
    <script defer src="index.js"></script>
    


  </head>


  <body>
    <section class="main">
    <div class="container-sm py-4 px-5 ">

        <div class="text-center py-1 ">
           
            <p class="text-center text-secondary mt-2 mb-1 mx-4">Thank you for choosing HIPPO COMPUTERS</p>
            <h2 class="signup_head">Signup here...</h2>
            
        </div>
        
        <div class="p-1 container-sm">
            <form method="post" class="needs-validation mt-2 p-4 signup_form" novalidate  style="max-width: 600px; margin: auto;" id="form" action="">

              <div class="mt-3">
                <!--Name-->
                <label class="form-label" for="validationCustom01">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Name" required>
                <div class="invalid-feedback">
                  Name required
                </div>
              </div>
              


              <!--username-->
              <div class="mt-3">
                <label class="form-label " for="validationCustomUsername">Username</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-secondary" id="inputGroupPrepend">@</span>
                  </div>
                  <input type="text" class="form-control" id="userName" placeholder="Username" aria-describedby="inputGroupPrepend" required>
                  <div class="invalid-feedback">
                  Username required
                </div>
                </div>
              </div>

              <!--Phone number-->
              <div class="mt-3">
                <label class="form-label " for="validationCustom03">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone"  placeholder="91 1234567890" pattern="[0-9]{2} [0-9]{10}" required>
                <div class="invalid-feedback">
                  Phone number required
                </div>
              </div>

              <!--email-->
              <div class="mt-3">
                <label class="form-label " for="validationCustom03">Email address</label>
                <input type="email" class="form-control" id="emailSignin" placeholder="Your email address" required>
                <div class="invalid-feedback">
                  Email required
                </div>
              </div>

              
            
              <!--Password-->
              <div class="mt-3">
                <label class="form-label " for="validationCustom04">Password</label>
                <input type="password" class="form-control" id="passwordSignin" onkeyup="passLength()" placeholder="Set password"   required>
                <div class="invalid-feedback" >
                  Please enter a password.
                </div> 
                <div class="alert alert-danger mt-2 px-1"  id="e2" role="alert" style="display: none;" >
                  <p><small>Password must contain at least 8 or more characters</small></p>
                </div>

              </div>

              <!--Confirm password-->
              <div class="mt-3">
                <label class="form-label " for="validationCustom05">Confirm password</label>
                <input type="password" class="form-control" id="confirmPasswordSignin" onkeyup="passCheck()" placeholder="Confirm password" required>
                <div class="invalid-feedback">
                    Please confirm password.
                </div>
                <div class="alert alert-danger mt-2 px-1"  id="e1" role="alert" style="display: none;" >
                    <p><small>Password doesn't match</small></p>
                </div>

              </div>
              
                
              <div class="form-group">
                <div class="form-check py-4">
                  <input class="form-check-input " type="checkbox" value="" id="invalidCheck" required>
                  <label class="form-label text-secondary " class="form-check-label" for="invalidCheck">
                    Agree to <a class="text-secondary" href="#"><b>Terms and Conditions</b> </a>& <a class="text-secondary" href="#"><b>Privacy Policy</b></a>
                  </label>
                  <div class="invalid-feedback">
                      You must agree before submitting.
                    </div>
                </div>
              </div>

              <div class="container py-3">
                <div class="row">
                <div class="g-recaptcha" data-sitekey="6Le_hiEmAAAAAGh7hSaht5XBOzSW1LKP-PfXax5i"></div>
                </div>
              </div>

               

             
                 <!--button-->
                 <div class="text-center">
                    <button class="btn btn-primary text-center" name="submit" type="submit" id="signupButton" >Sign up</button>
                </div>

                
                <div class="form-group text-center ">                  
                    <hr style="color: rgb(153, 153, 153); height: 6px; opacity: 100%;">
                    <p class="text-secondary text-center mt-3 px-3">Already an user of &nbsp;<b>HIPPO COMPUTERS</b> ? <a class="text-secondary" href="login.php"><b>Login here</b></a></p> 
                    
                </div>
               
              </form>
              
              </div>
              
        </div> 

    </div>                    
    </section>

    

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script>
  
  //To clear the input fields on refreshing the page
  document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('form');
    form.reset();
  });



  
  
  
 
</script>



  </body>

  

</html>