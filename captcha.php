<?php
session_start();
// Create a blank image with a specified width and height
$width = 200;
$height = 60;
$image = imagecreatetruecolor($width, $height);

// Define the background color 
$backgroundColor = imagecolorallocate($image, 180, 180, 180);
imagefill($image, 0, 0, $backgroundColor);

// Generate a random string
$stringLength = 6;
$captchaCharacters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0987654321';
$randomString = secure_captcha($captchaCharacters, $stringLength);
$_SESSION['captcha'] = $randomString;



//lines
$line_color = imagecolorallocate($image, 64,64,64); 
for($i=0;$i<10;$i++) {
    imageline($image,0,rand()%90,200,rand()%90,$line_color);
}

// Set the font size and font path
$fontSize = 30;
$fontPath = 'fonts\evil-typewriter-font\EvilTypewriter-8MVBz.ttf';  // Update the font file path based on the directory structure

// Define the text color (here, black)
$textColor = imagecolorallocate($image, 60,60, 60);

// Position the text in the center of the image
$textX = ($width - ($fontSize * strlen($randomString))) / 0.7;
$textY = ($height - $fontSize) / 0.7;

// Add text to the image
imagettftext($image, $fontSize, 0, $textX, $textY, $textColor, $fontPath, $randomString);

// Add distortion (here, random dots)
$dotColor = imagecolorallocate($image, 0,0,0,);
for ($i = 0; $i < 4000; $i++) {
    imagesetpixel($image, mt_rand(0, $width), mt_rand(0, $height), $dotColor);
}

// Set the content type header and output the image
header('Content-type: image/png');
imagepng($image);


// Free up memory
imagedestroy($image);

// Function to generate a random string
function secure_captcha($input, $strength = 5, $secure = true) {
    $inputLength = strlen($input);
    $newCAPTCHA = '';
    for($i = 0; $i < $strength; $i++) {
        if($secure) {
            $randomCharacter = $input[random_int(0, $inputLength - 1)];
        } else {
            $randomCharacter = $input[mt_rand(0, $inputLength - 1)];
        }
        $newCAPTCHA .= $randomCharacter;
    }
 
    return $newCAPTCHA;
    
}




?>
