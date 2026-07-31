<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Change this to your email
    $to = "1993gargidas@gmail.com";

    $mail_subject = "Portfolio Contact: " . $subject;

    $mail_body = "
You have received a new message from your portfolio website.

Name: $name

Email: $email

Subject: $subject

Message:
$message
";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if(mail($to, $mail_subject, $mail_body, $headers)){
        echo "<script>
                alert('Thank you! Your message has been sent.');
                window.location='index.html';
              </script>";
    } else {
        echo "<script>
                alert('Sorry! Message could not be sent.');
                history.back();
              </script>";
    }

} else {
    header("Location: index.html");
    exit();
}
?>