<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Sign up</title>
    <!-- <link rel="icon" href=""> -->
    <link rel="stylesheet" href="style.css">

    <!-- <style>
      body{
        background-color: rgb(32,32,32);
      }
    

    </style> -->
  </head>


  <body>
    <section class="main">
    <div class="container-sm py-4 px-5 ">

        <div class="text-center py-1 ">
           
            <p class="text-center text-secondary mt-2 mb-1 mx-4">Thank you for choosing HIPPO COMPUTERS</p>
            <h2 class="signup_head">Signup here...</h2>
            
        </div>
        
        <div class="p-1 container-sm">
            <form class="needs-validation mt-2 p-4 signup_form"   style="max-width: 600px; margin: auto;" id="form" action="">

              <div class="mt-3">
                <!--First name-->
                <label class="form-label " for="validationCustom01">First name</label>
                <input type="text" class="form-control" id="firstName" placeholder="First name" required>
              </div>
              
              <!--Last name-->
              <div class="mt-3">
                <label class="form-label " for="validationCustom02">Last name</label>
                <input type="text" class="form-control" id="lastName" placeholder="Last name"  required>
               
              </div>

              <!--username-->
              <div class="mt-3">
                <label class="form-label " for="validationCustomUsername">Username</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-secondary" id="inputGroupPrepend">@</span>
                  </div>
                  <input type="text" class="form-control" id="userName" placeholder="Username" aria-describedby="inputGroupPrepend" required>
                </div>
              </div>

              <!--Phone number-->
              <div class="mt-3">
                <label class="form-label " for="validationCustom03">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone"  placeholder="91 1234567890" pattern="[0-9]{2} [0-9]{10}" required>
              </div>

              <!--email-->
              <div class="mt-3">
                <label class="form-label " for="validationCustom03">Email address</label>
                <input type="email" class="form-control" id="emailSignin" placeholder="Your email address" required>
              </div>

              
            
              <!--Password-->
              <div class="mt-3">
                <label class="form-label " for="validationCustom04">Password</label>
                <input type="password" class="form-control" id="passwordSignin" placeholder="Set password"   required>

              </div>

              <!--Confirm password-->
              <div class="mt-3">
                <label class="form-label " for="validationCustom05">Confirm password</label>
                <input type="password" class="form-control" id="confirmPasswordSignin" placeholder="Confirm password" required>

              </div>
              
                
              <div class="form-group">
                <div class="form-check py-4">
                  <input class="form-check-input " type="checkbox" value="" id="invalidCheck" required>
                  <label class="form-label text-secondary " class="form-check-label" for="invalidCheck">
                    Agree to <a class="text-secondary" href="#"><b>Terms and Conditions</b> </a>& <a class="text-secondary" href="#"><b>Privacy Policy</b></a>
                  </label>
                  
                </div>
              </div>

               

                <!--button-->
                <div class="text-center">
                    <button class="btn btn-danger text-center" onclick="signupAlert()" type="submit" id="signupButton" ><B>Signup</B></button>
                    
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
      function signupAlert(){
        alert("You have successsfully created your account")
      }
   
    //To clear the input fields on refreshing the page
        window.onload = function() {
        var form = document.getElementById("signup_form");
        form.reset();
    };
</script>
  </body>

  

</html>