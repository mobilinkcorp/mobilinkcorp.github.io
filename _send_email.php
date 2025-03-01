<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars(strip_tags($_POST['name']));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(strip_tags($_POST['message']));

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Recipient email address
    $to = "alex.bazin@mobilink-media.com"; // Replace with your actual email address
    $subject = "New Contact Form Submission from $name";

    // Email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $email_content, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
