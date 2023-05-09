<?php
if($_POST){
    $visitor_name = "";
    $visitor_email = "";
    $email_title = "";
    $concerned_department = "";
    $visitor_message = "";
    $email_body = "<div>";
    $recipient = "";
    $generated_captcha = "";
    $entered_captcha = "";
 

    // CAPTCHA verification
    $generated_captcha = $_POST['generated_captcha'];
    $entered_captcha = $_POST['check_captcha'];

    if ($generated_captcha !== $entered_captcha) {
        echo "<p>Invalid captcha. Please try again.</p>";
        exit;
    }


    if(isset($_POST['visitor_name'])){
        $visitor_name = filter_var($_POST['visitor_name'], FILTER_SANITIZE_STRING);//The function filter_var() used to sanitize the input to avoid SQL injection attacks
        $email_body .= "<div> 
        <label><b>Visitor Name:</b></label>&nbsp;<span>".$visitor_name."</span> 
        </div>";
    }

    if(isset($_POST['visitor_email'])){
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']); //To replace the new line or carriage return to empty string
        $visitor_email = filter_var($_POST['visitor_email'], FILTER_SANITIZE_STRING);
        $email_body .= "<div> 
        <label><b>Visitor Email:</b></label>&nbsp;<span>".$visitor_email."</span> 
        </div>";
    }

    if(isset($_POST['email_title'])) {
        $email_title = filter_var($_POST['email_title'], FILTER_SANITIZE_STRING);
        $email_body .= "<div> 
        <label><b>Reason For Contacting Us:</b></label>&nbsp;<span>".$email_title."</span> 
        </div>";
    }

    if(isset($_POST['concerned_department'])) {
        $concerned_department = filter_var($_POST['concerned_department'], FILTER_SANITIZE_STRING);
        $email_body .= "<div> 
        <label><b>Concerned Department:</b></label>&nbsp;<span>".$concerned_department."</span> 
        </div>";
    }

    if(isset($_POST['visitor_message'])) {
        $visitor_message = htmlspecialchars($_POST['visitor_message']);
        $email_body .= "<div> 
        <label><b>Visitor Message:</b></label> 
        <div>".$visitor_message."</div> 
        </div>";

};

    if($concerned_department == "marketing"){
        $recipient = "cyberfactory1024@gmail.com";
    }
    elseif($concerned_department == "billing"){
        $recipient = "billing.cf.com";
    }
    elseif($concerned_department == "technical_support"){
        $recipient = "tech.support.cf.com";
    }
    elseif($concerned_department == "other_queries"){
        $recipient = "queries.cf.com";
    }

    $email_body .= "</div>";

    $headers = 'MIME-Version: 3.0.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8'."\r\n"
    .'From:'.$visitor_email."\r\n";

    if(mail($recipient, $email_title, $email_body, $headers)){
        echo "<p>Dear $visitor_name, Thank you for contacting us! You'll get a reply from us within two business days. </p>";
    }else{
        echo "<p>We are sorry for the inconvinience caused</p>";
    }

}else{
    echo "<p>Something went wrong!</p>";
}

?>

