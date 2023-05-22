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
    <link rel="icon" href="images/icon.png">
  



    
</head>
<body>
<div class=" gencontainer" style="background-image: linear-gradient(rgba(4, 9, 30, 0.9), rgba(4, 9, 30, 0.9)),url(images/c.jpg); height: 100vh; background-size:cover; width: 100%; background-position: 50% 50%; background-attachment: fixed;">

<div class="text-center py-1 ">
           
           <p class="text-center text-secondary mt-2 mb-1 mx-4">Thank you for choosing <strong>TRESPASS</strong></p>
           <h2 class="contact_head text-danger">Contact here...</h2>
           
       </div>
    <form action="back.php" method="post" id="contacting_form" class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group row py-2"> 
                     <!--Name  -->
                    <div class="form-group col py-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text"  class="form-control" id="name" name="visitor_name" placeholder="Timothy Dalton" pattern="[A-Za-z]{2,30}" required class="form-control">
                    </div> 
                    
                    <!-- Email -->
                    <div class="form-group col py-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" placeholder="Timothy.dalton@mail.com" class="form-control" name="visitor_email" id="email" required class="form-control">
                    </div>
                </div>


                <div class="form-group row py-2">
                    <!-- Department -->
                    <div class="form-group col py-2">
                        <label for="department_selection" class="form-label">Choose Department</label>
                        <select name="department_selection"  class="form-control" id="concerned_department" required class="form-control">
                            <option value="">Select Department</option>
                            <option value="marketing">Marketing</option>
                            <option value="billing">Billing</option>
                            <option value="technical_support">Technical support</option>
                            <option value="other_queries">Other queries</option>
                        </select>
                    </div>

                    <!-- Reason -->
                    <div class="form-group col py-2">
                        <label for="title" class="form-label">Reason For Contacting</label>
                        <input type="text"  class="form-control" id="title" name="email_title" required placeholder="Unable to buy the voucher" pattern="[A-Za-z0-9\s]{8,60}" class="form-control">
                    </div>
                </div>
                
                <!-- Message -->
                <div class="form-group py-2">
                    <label for="message" class="form-label">Write your message</label>
                    <textarea id="message"  class="form-control" name="visitor_message" placeholder="Say whatever you want." required class="form-control"></textarea>
                </div>

            
                
                <div class="form-group row py-2">
                    <!-- CAPTCHA input -->
                    <div class="form-group col py-2">
                        <label for="captcha" class="form-label">Enter CAPTCHA</label>
                        <input type="text"  class="form-control" name="check_captcha" class="form-control" id="enterCap"> 
                    </div> 

                    <!-- Displaying CAPTCHA image-->
                    <div class="form-group col py-2 mt-2 ">
                        <img id="captchaImage" src="captcha.php" alt="CAPTCHA Image">
                    </div>

                    <!-- Refresh icon -->
                    <div class="form-group col py-2 mt-4">
                        <button class="refresh-icon" id="refresh-captcha"style=" cursor: pointer; background-color: rgb(32,32,32); border-color: rgb(32,32,32);" type="button"><i class="fa-sharp fa-solid fa-arrow-rotate-right fa-xl" style="color: #1db9d4;"  style=" cursor: pointer;"></i></button>
                    </div> 
                </div>
                
                <!-- Submit button -->
                <div class="submit-button">
                    <button type="submit" class="btn btn-info mt-4">Send message</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    //using ajax to refresh captcha
    $('#refresh-captcha').click(function() {
        $.ajax({
            url: 'captcha.php',
            cache: false,
            success: function(data){
                $('#captchaImage').attr('src', 'captcha.php?' + Date.now());
            }
        })
    })

    //Clearing the input fields on refreshing the page
    window.onload = function() {
        var form = document.getElementById("contacting_form");
        form.reset();   
    };


    
</script>
</body>
</html>











