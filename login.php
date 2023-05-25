<?php include('connect.php') ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/icon.png">
<!-- recaptcha -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Login</title>
    
  </head>
  <body>
    <section class="login_section mt-5" style="background-image: linear-gradient(rgba(4, 9, 30, 0.9), rgba(4, 9, 30, 0.9)),
    url(images/a.jpg); height: 100vh; background-size:cover; width: 100%; background-position: 50% 50%; background-attachment: fixed;">
        <div class="text-center py-1 ">
           
           <p class="text-center text-secondary mt-2 mb-1 mx-4">Welcome back to<strong>TRESPASS</strong></p>
           <h2 class="login_head text-danger">Login here...</h2>
           
       </div>
    <form method="post" class=" needs-validation mt-2 mb-4 p-4 " novalidate style="max-width: 480px; margin: auto;" id="form" action="">

      <div class="mb-3 p-3">
        <label for="exampleInputEmail1" class="form-label text-info" id="login_texts">Email address</label>
        <input type="email" name="login_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      
        <div class="invalid-feedback">Email should not be empty!</div>
      </div>
      <div class="mb-3 p-3">
        <label for="exampleInputPassword1" class="form-label text-info" id="login_texts">Password</label>
        <input type="password" name="login_password" class="form-control" id="exampleInputPassword1">
      </div>

      <!-- google reCAPTCHA -->
      <div class="container py-3">
        <div class="row">
           <div class="g-recaptcha" data-sitekey="6Le_hiEmAAAAAGh7hSaht5XBOzSW1LKP-PfXax5i"></div>
        </div>
      </div>
      <div class="submit-button p-4">
      <button type="submit" name="login_button" class="btn btn-info "><b>Login</b></button>
       
      
      </div>

                      
      <div class="form-group text-center ">                  

        <p class="text-secondary text-center mt-3 px-3">New to &nbsp;<b>TRESPASS</b> ? <a class="text-secondary" href="signup.php"><b>Signup here</b></a></p> 
    </div>  
      
    </form>
    </section>
 
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>




  </body>
</html>

<?php

if(isset($_POST['login_button'])){

  $loginEmail =filter_var( $_POST['login_email'], FILTER_VALIDATE_EMAIL);
  $loginPassword = filter_var($_POST['login_password'], FILTER_VALIDATE_EMAIL);

  $selectQuery = "SELECT * FROM `register_details` WHERE email_id='$loginEmail'";
  $result = mysqli_query($con, $selectQuery);
  $rowCount = mysqli_num_rows($result);
 
  if($rowCount >0){
    $rowData = mysqli_fetch_assoc($result);
    $storedPassword = $rowData['company_password'];
    if(password_verify($loginPassword, $storedPassword)){


      echo "<script>alert('Login successful')</script>";

      if($rowCount ==1){
        echo "<script>window.open('index.php','_self')</script>";
      }
    }else{
      echo "<script>alert('Invalid password')</script>";
    }
  }else{
    echo "<script>alert('No account found')</script>";
  }
}



?>