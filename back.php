<?php
session_start();


use PHPMailer\PHPMailer\PHPMailer;

//localhost location
require 'C:\xampp\htdocs\PHP_secured\phpmailer\src\Exception.php'; //replace correct path location
require 'C:\xampp\htdocs\PHP_secured\phpmailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\PHP_secured\phpmailer\src\SMTP.php';


//When uploading to the internet, use forward slash for path specification. Eg:
// require 'phpmailer/src/Exception.php';
// require 'phpmailer/src/PHPMailer.php';
// require 'phpmailer/src/SMTP.php';


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

    // // CAPTCHA verification
    $generated_captcha = $_SESSION['captcha'];
    $entered_captcha = $_POST['check_captcha']; //user entered captcha

    if ($generated_captcha === $entered_captcha) {
        // echo "<p>Captcha correct.</p>";
        
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

    if(isset($_POST['department_selection'])) {
        $concerned_department = filter_var($_POST['department_selection'], FILTER_SANITIZE_STRING);
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

}
$email_body .= "</div>";


//Sending customer's query as mail to the concerned departments 
if($concerned_department == "redTeam"){
    
        $recipient = "marketing@gmail.com";//recepient mail ID
        $redTeamMail = new PHPMailer(true);
        $redTeamMail->isSMTP();
        $redTeamMail->Host = 'smtp.gmail.com';
        $redTeamMail->SMTPAuth = true;
        $redTeamMail->Username = 'xyz@gmail.com';//replace the mail with the host email
        $redTeamMail->Password = 'asdfghjklqwertyuiop';//replace the password with App password
        $redTeamMail->SMTPSecure = 'tls';
        $redTeamMail->Port = 587;
    
        $redTeamMail->setFrom('xyz@mail.com');//set the sending email
    
        $redTeamMail->addAddress($recipient);//recipient mail ID
    
        $redTeamMail->isHTML(true);
    
        $redTeamMail->Subject = $_POST['email_title'];
        $redTeamMail->Body = $email_body;
        $redTeamMail->send();

      
    }
    elseif($concerned_department == "blueTeam"){
        $recipient = "marketing@gmail.com";//recepient mail ID
        $blueTeamMail = new PHPMailer(true);
        $blueTeamMail->isSMTP();
        $blueTeamMail->Host = 'smtp.gmail.com';
        $blueTeamMail->SMTPAuth = true;
        $blueTeamMail->Username = 'xyz@gmail.com';//replace the mail with the host email
        $blueTeamMail->Password = 'asdfghjklqwertyuiop';//replace the password with App password
        $blueTeamMail->SMTPSecure = 'tls';
        $blueTeamMail->Port = 587;
    
        $blueTeamMail->setFrom('xyz@mail.com');//set the sending email
    
        $blueTeamMail->addAddress($recipient);//recipient mail ID
    
        $blueTeamMail->isHTML(true);
    
        $blueTeamMail->Subject = $_POST['email_title'];
        $blueTeamMail->Body = $email_body;
        $blueTeamMail->send();
    }
    elseif($concerned_department == "billing"){
        $recipient = "marketing@gmail.com";//recepient mail ID
        $billingMail = new PHPMailer(true);
        $billingMail->isSMTP();
        $billingMail->Host = 'smtp.gmail.com';
        $billingMail->SMTPAuth = true;
        $billingMail->Username = 'xyz@gmail.com';//replace the mail with the host email
        $billingMail->Password = 'asdfghjklqwertyuiop';//replace the password with App password
        $billingMail->SMTPSecure = 'tls';
        $billingMail->Port = 587;
    
        $billingMail->setFrom('xyz@mail.com');//set the sending email
    
        $billingMail->addAddress($recipient);//recipient mail ID
    
        $billingMail->isHTML(true);
    
        $billingMail->Subject = $_POST['email_title'];
        $billingMail->Body = $email_body;
        $billingMail->send();
    }

    elseif($concerned_department == "other_queries"){
        $recipient = "marketing@gmail.com";//recepient mail ID
        $otherQueriesMail = new PHPMailer(true);
        $otherQueriesMail->isSMTP();
        $otherQueriesMail->Host = 'smtp.gmail.com';
        $otherQueriesMail->SMTPAuth = true;
        $otherQueriesMail->Username = 'xyz@gmail.com';//replace the mail with the host email
        $otherQueriesMail->Password = 'asdfghjklqwertyuiop';//replace the password with App password
        $otherQueriesMail->SMTPSecure = 'tls';
        $otherQueriesMail->Port = 587;
    
        $otherQueriesMail->setFrom('xyz@mail.com');//set the sending email
    
        $otherQueriesMail->addAddress($recipient);//recipient mail ID
    
        $otherQueriesMail->isHTML(true);
    
        $otherQueriesMail->Subject = $_POST['email_title'];
        $otherQueriesMail->Body = $email_body;
        $otherQueriesMail->send();
    }




    //Sending mail to the customer who submitted the contact form
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'xyz@gmail.com';//replace the mail with the host email
    $mail->Password = 'asdfghjklqwertyuiop';//replace the password with App password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('xyz@mail.com');//set the sending email

    $mail->addAddress($_POST['visitor_email']);//Visitor email from contacts form

    $mail->isHTML(true);

    $mail->Subject = "Contacting Trespass Red Team Service ";
    $mail->Body = "Dear $visitor_name, Thank you for contacting us! You'll get a reply from us within two business days.";
    $mail->send();


    //if the mail was successfully sent to the customer and concerned department
    if($mail->send()){
        $success_message = urlencode("Dear $visitor_name, Thank you for contacting us! Your query was submitted to the respective department of TRESPASS. Now you will be redirected to Home page of our website.");//Pass the message to the next redirecting page
        header("Location: index.php?success_message=$success_message"); // Redirect to index.php
        exit(); // Terminate the script execution after redirection
    }else{
        echo "<p>We are sorry for the inconvinience caused</p>";
    }
        
    }else{
        echo "<p>Invalid captcha. Please try again.</p>";
        exit;
    }



}else{
    echo "<p>Something went wrong!</p>";
}

?>

