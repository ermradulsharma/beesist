<?php
$to = "abaanoutsourcing@gmail.com";
$subject = "Test Email";
$message = "This is a test email sent using PHP's mail() function.";
$headers = "From: sender@forrentcentral.com\r\n";
$headers .= "Reply-To: sender@forrentcentral.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

// Send email
if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully.";
} else {
    echo "Failed to send email.";
}