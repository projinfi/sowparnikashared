<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $subject = htmlspecialchars($_POST['subject']);
        $message = htmlspecialchars($_POST['message']);

        ini_set('display_errors', 1);
        error_reporting(E_ALL);

        $to = "itssanathsb@gmail.com"; // Updated recipient email

        $email_subject = $subject;
        $txt = "You have a new message from your website contact form\n=============================\n" . 
               "Name: " . $name . "\nPhone: " . $phone . "\nEmail: " . $email . "\nMessage:\n" . $message;

        $headers = 'From: email@mywebsite.com' . "\r\n" .
                   "Reply-To: " . $email . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();

        if (mail($to, $email_subject, $txt, $headers)) {
            echo "Mail Sent Successfully";
            // Optionally, redirect to a thank you page
            // header("Location: thank_you.html");
            // exit();
        } else {
            echo "Mail Sending Failed";
        }
    }
?>
