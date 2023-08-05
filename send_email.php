<?
header("Access-Control-Allow-Origin: *");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the JSON data sent from the JavaScript
    $json_data = file_get_contents("php://input");
    $data = json_decode($json_data, true);

    // Email address where you want to receive the form submissions
    $to = "meenaxibadola18@gmail.com,meenaxibadola1@gmail.com";

    // Subject of the email
    $subject = "Contact Form Submission";

    // Compose the email body
    $message = "Name: " . $data["name"] . "\n";
    $message .= "Email: " . $data["email"] . "\n";
    $message .= "Message: " . $data["message"];

    // Send the email
    $headers = "From: " . $data["email"] . "\r\n";
    if (mail($to, $subject, $message, $headers)) {
        // If email sent successfully, send a response to JavaScript
        $response = array("message" => "Message sent successfully!");
    } else {
        $response = array("message" => "Failed to send message.");
    }

    // Convert the response array to JSON and echo it
    echo json_encode($response);
}
?>
