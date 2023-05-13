<!DOCTYPE html>

<html>
<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Contact</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <style>
        body{
            background-color: rgb(32,32,32);
        }
        .form-label{
            color: #DC4C64;
        }
        .form-control{
            background-color: #9FA6B2;
        }
        .submit-button{
        text-align: center;
        margin: 0 auto;
        display: flex;
        justify-content: center;

      }
      
      .form-head{
        color: #DC4C64;
        display: flex;
        justify-content: center;
    }

    </style>

    
</head>
<body>
    <div class=" gencontainer">
    <h1 class="form-head py-2" style="text-align: center;">Contact Here</h1>
    <form action="back.php" method="post" id="contacting_form" class="container-sm mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form-group py-2">   
                <label for="name" class="form-label">Name</label>
                <input type="text"  class="form-control" id="name" name="visitor_name" placeholder="Timothy Dalton" pattern="[A-Za-z]{2,30}" required class="form-control">
            </div>

            <div class="form-group py-2">
                <label for="email" class="form-label">Email</label>
                <input type="email" placeholder="Timothy.dalton@mail.com" class="form-control" name="visitor_email" id="email" required class="form-control">
            </div>

            <div class="form-group py-2">
                <label for="department_selection" class="form-label">Choose Department</label>
                <select name="department_selection"  class="form-control" id="concerned_department" required class="form-control">
                    <option value="">Select Department</option>
                    <option value="marketing">Marketing</option>
                    <option value="billing">Billing</option>
                    <option value="technical_support">Technical support</option>
                    <option value="other_queries">Other queries</option>
                </select>
            </div>
            
            <div class="form-group py-2">
                <label for="title" class="form-label">Reason For Contacting Us</label>
                <input type="text"  class="form-control" id="title" name="email_title" required placeholder="Unable to buy the voucher" pattern="[A-Za-z0-9\s]{8,60}" class="form-control">
            </div>

            <div class="form-group py-2">
                <label for="message" class="form-label">Write your message</label>
                <textarea id="message"  class="form-control" name="visitor_message" placeholder="Say whatever you want." required class="form-control"></textarea>
            </div>

          
                <div class="form-group py-2">
                    <label for="captcha" class="form-label">Please enter the captcha to prove that you are not a robot.</label>
                    <div class="form-row row">
                        <div class="form-group col ">
                            <!-- Since the captcha php outputs distorted captcha text, it is used as the source of img below -->
                            <img id="captchaImage" src="captcha.php" alt="CAPTCHA Image">
                        </div>
                        <div class="form-group col">
                        <button class="refresh-icon" id="refresh-captcha"style=" cursor: pointer; background-color: rgb(32,32,32); border-color: rgb(32,32,32);" onclick=""><i class="fa-sharp fa-solid fa-arrow-rotate-right fa-xl" style="color: #e64747;"  style=" cursor: pointer;"></i></button>

                        </div>
                        <div class="form-group col">
                        <input type="text"  class="form-control" name="check_captcha" class="form-control" id="enterCap"> 
                        </div> 
                       
                    </div>
         
                </div>
    
            <div class="submit-button">
            <button type="submit" class="btn btn-danger">Send message</button>
            </div>
    
           

    


           
        </div>
    </div>
</form>

    </div>
    <script>
        $('#refresh-captcha').click(function() {
            $.ajax({
                url: 'captcha.php',
                cache: false,
                success: function(data){
                    $('#captchaImage').attr('src', 'captcha.php?' + Date.now());
                }
            })
            
        })
    </script>
<script>
    
    //To clear the input fields on refreshing the page
        window.onload = function() {
        var form = document.getElementById("contacting_form");
        form.reset();
    };
    var refreshButton = document.querySelector(".refresh-captcha");
    refreshButton.onclick = function() {
        document.querySelector(".captcha-image").src = 'captcha.php?' + Date.now();
}
</script>
</body>
</html>











