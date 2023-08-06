<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Replace these values with your SMTP server details
    $smtpServer = "your-smtp-server.com";
    $smtpUsername = "your-smtp-username";
    $smtpPassword = "your-smtp-password";
    $smtpPort = 587;

    // Compose the email
    $to = "recipient@example.com"; // Replace with the email address you want to send the message to
    $subject = "New Contact Form Submission";
    $headers = "From: $name <$email>";

    // Send the email using PHPMailer (requires PHPMailer library)
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->Host       = $smtpServer;
    $mail->SMTPAuth   = true;
    $mail->Username   = $smtpUsername;
    $mail->Password   = $smtpPassword;
    $mail->SMTPSecure = 'tls';
    $mail->Port       = $smtpPort;

    $mail->setFrom($email, $name);
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->Body    = $message;

    if ($mail->send()) {
        $response = array("status" => "success", "message" => "Message sent successfully!");
    } else {
        $response = array("status" => "error", "message" => "Failed to send message.");
    }

    echo json_encode($response);
}
?>
