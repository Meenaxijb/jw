<?php
 // Get Data 
 $name = strip_tags($_POST['name']);
 $email = strip_tags($_POST['email']);
 $phone = strip_tags($_POST['phone']);
 $url = strip_tags($_POST['url']);
 $message = strip_tags($_POST['message']);

 $headers .="From: Forms <forms@example.net>";
 $headers .="CC: Mail1 <Mail1@example.net>";
 $headers .=", Mail2 <Mail2@example.net>";

 // Send Message
 mail( "meenaxibadola1@gmail.com.com", "Contact Form Submission",
 "Name: $name\nEmail: $email\nPhone: $phone\nWebsite: $url\nMessage: $message\n",
  $headers );
 ?>