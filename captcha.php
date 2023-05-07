<!-- <?php
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