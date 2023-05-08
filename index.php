<?php
$captchaCharacters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
 
function secure_captcha($input, $strength = 5, $secure = true) {
    $inputLength = strlen($input);
    $randomString = '';
    for($i = 0; $i < $strength; $i++) {
        if($secure) {
            $randomCharacter = $input[random_int(0, $inputLength - 1)];
        } else {
            $randomCharacter = $input[mt_rand(0, $inputLength - 1)];
        }
        $randomString .= $randomCharacter;
    }
 
    return $randomString;
    
}

$stringLength = 6;
$captchaString = secure_captcha($captchaCharacters, $stringLength);

?>





<!DOCTYPE html>

<html>
<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Log in</title>
</head>
<body>
    <div class=" gencontainer">
    <h3 class="heading my-3" style="text-align: center;">Contact Here</h3>
    <form action="contact.php" method="post" id="contacting_form" class=" mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form-group my-3">   
                <label for="name">Name</label>
                <input type="text" id="name" name="visitor_name" placeholder="Timothy Dalton" pattern="[A-Za-z]{2,30}" required class="form-control">
            </div>

            <div class="form-group my-3">
                <label for="email">Email</label>
                <input type="email" name="visitor_email" id="email" required class="form-control">
            </div>

            <div class="form-group my-3">
                <label for="department_selection">Choose Department</label>
                <select name="department_selection" id="concerned_department" required class="form-control">
                    <option value="">Select Department</option>
                    <option value="marketing">Marketing</option>
                    <option value="billing">Billing</option>
                    <option value="technical_support">Technical support</option>
                    <option value="other_queries">Other queries</option>
                </select>
            </div>
            
            <div class="form-group my-3">
                <label for="title">Reason For Contacting Us</label>
                <input type="text" id="title" name="email_title" required placeholder="Unable to buy the voucher" pattern="[A-Za-z0-9\s]{8,60}" class="form-control">
            </div>

            <div class="form-group my-3">
                <label for="message">Write your message</label>
                <textarea id="message" name="visitor_message" placeholder="Say whatever you want." required class="form-control"></textarea>
            </div>

          
                <div class="form-group my-3">
                    <label for="captcha">Please enter the captcha to prove that you are not a robot.</label>
                    <div class="form-row row">
                        <div class="form-group col">
                            <input type="text" name="generated_captcha" class="form-control" id="capt" value="<?php echo $captchaString; ?>" readonly>
                        </div>
                        <div class="form-group col">
                            <input type="text" name="check_captcha" class="form-control" id="enterCap" >
                        </div> 

                    </div>
                </div>
    


            <button type="submit" class="btn btn-success">Send message</button>
        </div>
    </div>
</form>
    </div>

</body>
</html>











