# Portfolio README

Welcome to my portfolio repository. This repository contains the source code for my portfolio website. If you'd like to use the contact form feature, please follow the instructions below to configure the `contact_form.php` file.

## Configuring the Contact Form

1. **reCAPTCHA Keys**: You will need to set up your reCAPTCHA keys. If you don't have reCAPTCHA keys, you can obtain them from the [reCAPTCHA website](https://www.google.com/recaptcha). Once you have your keys, open `contact_form.php` and fill in the `captchaSiteKey` and `captchaSecretKey` variables.

    ```php
    // Add your reCAPTCHA Site Key and Secret Key here
    $captchaSiteKey = 'YOUR_SITE_KEY';
    $captchaSecretKey = 'YOUR_SECRET_KEY';
    ```

2. **Email Configuration**: Customize the email configuration by filling in your information. Update the sender, main contact email address, and "no-reply" email address.

    ```php
    // Add your informations here
    $php_author = "Your Name";
    $php_main_email = "contact@yourdomain.com";
    $php_from_email = 'no-reply@yourdomain.com';
    ```

3. **Email Subject**: You can change the email subject in the `$php_subject` variable if needed.

    ```php
    $php_subject = "Message from Website";
    ```

4. **Optional Email Template Customization**: The email template in the script can be customized to match your requirements. Feel free to modify the HTML structure and content as desired.

5. **Send and Test**: After making these changes, save the `contact_form.php` file. You can now deploy your portfolio website, and the contact form should work as configured.

## License

Please note that this project is provided under a specific [license](LICENSE.md). Be sure to review the license terms before using or modifying this code.

Feel free to explore and use the portfolio code as a starting point for your own portfolio. If you have any questions or encounter any issues, don't hesitate to reach out.

Enjoy exploring my portfolio!
