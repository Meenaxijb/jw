<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = json_decode(file_get_contents('php://input'), true);

  // Replace this with your email address to receive the form data
  $to = 'meenaxibadola18@gmail.com';
  $subject = $data['subject'];
  $message = "Name: {$data['name']}\nEmail: {$data['email']}\n\n{$data['message']}";
  $headers = "From: {$data['email']}";

  if (mail($to, $subject, $message, $headers)) {
    echo json_encode(['success' => true]);
  } else {
    echo json_encode(['success' => false]);
  }
}
?>
