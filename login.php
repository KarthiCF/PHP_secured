<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <title>Login</title>
    
  </head>
  <body>
    <section class="login_section mt-5">
    <div class="mb-5">
        <h1 class="form-heading">Welcome back to &nbsp;  <strong> HIPPO COMPUTERS</strong> </h1>
      </div>
    <form class=" needs-validation mt-2 mb-4 p-4 " novalidate style="max-width: 480px; margin: auto;" id="form">
      <div class="mb-5">
        <h2 class="form-head">Login here...</h2>
      </div>
      <div class="mb-3 p-3">
        <label for="exampleInputEmail1" class="form-label" id="login_texts">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      
        <div class="invalid-feedback">Email should not be empty!</div>
      </div>
      <div class="mb-3 p-3">
        <label for="exampleInputPassword1" class="form-label" id="login_texts">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="submit-button p-4">
        <button type="submit" onclick="loginAlert()" class="btn btn-danger "><b>Login</b></button>
      </div>

                      
      <div class="form-group text-center ">                  

        <p class="text-secondary text-center mt-3 px-3">New to &nbsp;<b>HIPPO COMPUTERS</b> ? <a class="text-secondary" href="signup.php"><b>Signup here</b></a></p> 
    </div>  
      
    </form>
    </section>
 
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
      function loginAlert(){
        alert("You have been successfully logged in")
      }
    </script>


  </body>
</html>