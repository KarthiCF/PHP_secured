
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
    <style>
      body{
        background-color: rgb(32,32,32);
      }
      .login-form-label{
        color: #DC4C64;
      }
      .login-send-button{
        text-align: center;
        margin: 0 auto;
      }
      .login_submit{
        display: flex;
        justify-content: center;
      }
      .login-form-head{
     
        
        color: #DC4C64;
        display: flex;
        justify-content: center;
      }
      .login-form-heading{

        color: white;
        display: flex;
        justify-content: center;
      }
      .form-control{
        background-color: #9FA6B2;
      }

    </style>
  </head>
  <body>
    <section class="login_section mt-5">
    <div class="mb-5">
        <h1 class="login-form-heading">Welcome back to &nbsp;  <strong> HIPPO COMPUTERS</strong> </h1>
      </div>
    <form class=" needs-validation mt-2 mb-4 p-4 " novalidate style="max-width: 480px; margin: auto;" id="form">
      <div class="mb-5">
        <h2 class="login-form-head">Login here...</h2>
      </div>
      <div class="mb-3 p-3">
        <label for="exampleInputEmail1" class="login-form-label" id="login_texts">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      
        <div class="invalid-feedback">Email should not be empty!</div>
      </div>
      <div class="mb-3 p-3">
        <label for="exampleInputPassword1" class="login-form-label" id="login_texts">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="login_submit p-4">
        <button type="submit" class="btn btn-danger login-send-button"><b>Login</b></button>
      </div>

                      
      <div class="form-group text-center ">                  

        <p class="text-secondary text-center mt-3 px-3">New to &nbsp;<b>HIPPO COMPUTERS</b> ? <a class="text-secondary" href="signup.php"><b>Signup here</b></a></p> 
    </div>  
      
    </form>
    </section>
 
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>
