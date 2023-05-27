<?php include('connect.php') ?>

<?php
if(isset($_POST['submit'])){
  //only if the CAPTCHA is completed and verified, the user details will be stored to database
  if(isset($_POST['g-recaptcha-response'])){
    $secret = "6Le_hiEmAAAAAPxnFt6f2RV126n5HZZqzcE5q1QP";
    $remoteIP = $_SERVER['REMOTE_ADDR'];
    $response = $_POST['g-recaptcha-response'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteIP";
    $get_data = file_get_contents($url);
    $data= json_decode($get_data);
    //if CAPTCHA is completed and verified the database operations starts
    if($data->success==true){
      $companyName = htmlspecialchars($_POST['company_name'], ENT_QUOTES, 'UTF-8');
      $companyEmail = htmlspecialchars($_POST['company_email'], ENT_QUOTES, 'UTF-8');
      $companyPassword = $_POST['company_password'];
      $hashedPassword = password_hash($companyPassword, PASSWORD_DEFAULT);
      $confirmPassword = $_POST['confirm_password'];

      //To avoid SQL injection and XSS attacks
      if(!preg_match("/^[a-zA-Z\s]+$/", $companyName)){
        echo "<script>alert('Invalid name')</script>";
      } else {
        // Check for existing email id
        $checkQuery = "SELECT * FROM `register_details` WHERE email_id = ?";
        $stmt = $con->prepare($checkQuery);
        $stmt->bind_param("s", $companyEmail);
        $stmt->execute();
        $resultQuery = $stmt->get_result();
        $rowCount = $resultQuery->num_rows;
        
        if($rowCount > 0){
          echo "<script>alert('Email already exists')</script>";
        } else if($companyPassword != $confirmPassword){
          echo "<script>alert('Password does not match')</script>";
        } else {
          // Insert data into database
          $insertQuery = "INSERT INTO `register_details`(`company_name`, `email_id`, `company_password`) VALUES (?, ?, ?)";
          $stmt = $con->prepare($insertQuery);
          $stmt->bind_param("sss", $companyName, $companyEmail, $hashedPassword);
          $stmt->execute();
          $stmt->close();
          echo "<script>alert('Account created successfully')</script>";
          echo "<script>window.open('login.php', '_self')</script>";
        }
    }
      }else{
        echo "<script>alert('Complete CAPTCHA')</script>";
    }
    
  }else{
    echo "Recaptcha error";
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
    <link rel="icon" href="images/icon.png">

    
    


  </head>


  <body>
    <section class="sign_up" style="background-image: linear-gradient(rgba(4, 9, 30, 0.9), rgba(4, 9, 30, 0.9)),
    url(images/f.jpg); height: 100vh; background-size:cover; width: 100%; background-position: 50% 50%; background-attachment: fixed;">
    <div class="container-sm py-2 ">

        <div class="text-center py-1 ">
           
            <p class="text-center text-secondary mt-2 mb-1 mx-4">Thank you for choosing <strong>TRESPASS</strong></p>
            <h2 class="signup_head text-danger">Signup here...</h2>
            
        </div>
        
        <div class="p-1 container-sm">
            <form method="post" class="needs-validation mt-2 p-4 signup_form" novalidate  style="max-width: 600px; margin: auto;" id="form" action="">

              <div class="form-group row py-1">
                <div class="form-group col ">
                  <!--Company-->
                  <label class="form-label text-info" for="validationCustom01">Company name</label>
                  <input type="text" class="form-control" id="name" placeholder="Company" required name="company_name">
                  <div class="invalid-feedback">
                    Company name required
                  </div>
                </div>

                
                <!--email-->
                <div class="form-group col ">
                  <label class="form-label text-info" for="validationCustom03">Email address</label>
                  <input type="email" class="form-control" id="emailSignin" placeholder="Your email address" required name="company_email">
                  <div class="invalid-feedback">
                    Email required
                  </div>
                </div>
              </div>
                




              

              <div class="form-gropu row py-1">
                <!--Password-->
                <div class="form-group col">
                  <label class="form-label text-info" for="validationCustom04">Password</label>
                  <input type="password" name="company_password" class="form-control" id="passwordSignin" onkeyup="passLength()" placeholder="Set password"   required   >
                  <div class="invalid-feedback" >
                    Please enter a password.
                  </div> 
                  <div class="alert alert-danger mt-2 px-1"  id="e2" role="alert" style="display: none;" >
                    <p><small>Password must contain at least 8 characters</small></p>
                  </div>

                </div>

                <!--Confirm password-->
                <div class="form-group col">
                  <label class="form-label text-info" for="validationCustom05">Confirm password</label>
                  <input type="password" name="confirm_password" class="form-control" id="confirmPasswordSignin" onkeyup="passCheck()" placeholder="Confirm password" required>
                  <div class="invalid-feedback">
                      Please confirm password.
                  </div>
                  <div class="alert alert-danger mt-2 px-1"  id="e1" role="alert" style="display: none;" >
                      <p><small>Password doesn't match</small></p>
                  </div>

                </div>
              </div>
              
                
              <div class="form-group py-1">
                <div class="form-check ">
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
                    <button class="btn btn-info text-center" name="submit" type="submit" id="signupButton" >Sign up</button>
                </div>

                
                <div class="form-group text-center ">                  
                    <hr style="color: rgb(153, 153, 153); height: 6px; opacity: 100%;">
                    <p class="text-secondary text-center mt-3 px-3">Already an user of &nbsp;<b>TRESPASS</b> ? <a class="text-secondary" href="login.php"><b>Login here</b></a></p> 
                    
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



