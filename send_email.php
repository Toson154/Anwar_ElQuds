<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $to = "tosonaligadallah@gmail.com";
    $subject = "New Message from your website";

    // Set Gmail SMTP settings dynamically
    ini_set("SMTP", "smtp.gmail.com");
    ini_set("smtp_port", 587);

    $headers = "From: $name <$email>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";

    $mailBody = "Name: $name<br>Email: $email<br>Message: $message";

    // Check if the mail is sent successfully
    if (mail($to, $subject, $mailBody, $headers)) {
        // Redirect the user to a thank you page
        header("Location: index.html");
        exit;
    } else {
        // Handle mail sending failure
        echo "Error sending mail. Please try again later.";
    }
}
?>
