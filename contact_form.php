<?php
// Include Functions file
require_once 'functions.php';

if (isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['message'])) {

    // Recaptcha variables
    $captchaSiteKey = '6LdvGZIhAAAAAL7nolEKdndBjb9MbWDC8EBm4Qtd';
    $captchaSecretKey = '6LdvGZIhAAAAAMHoJCE_07cqIDedno9XxMZtAg3g';

    // Recaptcha verification
    $createGoogleUrl = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $captchaSecretKey . '&response=' . $_POST['g-recaptcha-response'];
    $verifyRecaptcha = curlRequest($createGoogleUrl);
    $decodeGoogleResponse = json_decode($verifyRecaptcha, true);

    // Email Configuration
    $php_main_email = "contact@mimoudix.com";
    $php_from_email = 'no-reply@mimoudix.com';
    $php_email = $_POST['email'];
    
    //Fetching Values from URL
    $php_name = $_POST['name'];
    $php_author = "MimoudiX";
    $php_phone = $_POST['phone'];
    $php_message = $_POST['message'];
    $php_subject = "Message from Website";
    $user_ip = get_user_ip();
    $user_browser = get_user_browser();
    $user_os = get_user_os();
    $date = generate_date();

    // Set up email headers
    $php_headers = 'MIME-Version: 1.0' . "\r\n";
    $php_headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $php_headers .= "From: $php_author <$php_from_email>\r\n"; // Sender's Email
    $php_headers .= 'Reply-To: ' . $php_from_email . "\r\n"; // Reply-To set to no-reply email
    $php_headers .= 'Cc: ' . $php_email . "\r\n"; // Carbon copy to Sender
    $php_headers .= 'Bcc: ' . $php_main_email . "\r\n"; // Blind carbon copy to Contact

    // Email message template
    $php_template = '<div style="padding:50px;">Hello ' . $php_name . ',<br/>'
        . 'Thank you for contacting me.<br/><br/>'
        . '<strong style="color:#f00a77;">Name:</strong>  ' . $php_name . '<br/>'
        . '<strong style="color:#f00a77;">Email:</strong>  ' . $php_email . '<br/>'
        . '<strong style="color:#f00a77;">IP:</strong>  ' . $user_ip . '<br/>'
        . '<strong style="color:#f00a77;">Browser:</strong>  ' . $user_browser . '<br/>'
        . '<strong style="color:#f00a77;">OS:</strong>  ' . $user_os . '<br/>'
        . '<strong style="color:#f00a77;">Date:</strong>  ' . $date . '<br/>'
        . '<strong style="color:#f00a77;">Message:</strong>  ' . $php_message . '<br/><br/>'
        . 'This is a Contact Confirmation mail.'
        . '<br/>'
        . 'I will contact you as soon as possible.</div>';
    
    $php_sendmessage = "<div style=\"background-color:#f5f5f5; color:#333;\">" . $php_template . "</div>";

    // Ensure that lines do not exceed 70 characters (PHP rule)
    $php_sendmessage = wordwrap($php_sendmessage, 70);

    // Check Recaptcha response
    if ($decodeGoogleResponse['success'] == 1) {
        // Send mail using PHP Mail Function
        if (mail($php_main_email, $php_subject, $php_sendmessage, $php_headers)) {
            echo "success";
        } else {
            echo "error";
        }
    } else {
        echo "InvalidCaptcha";
    }
}
