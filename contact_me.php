<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['company'])   ||
   empty($_POST['contactm'])   ||
   empty($_POST['enquiry'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$company = strip_tags(htmlspecialchars($_POST['company']));
$contactm = strip_tags(htmlspecialchars($_POST['contactm']));
$enquiry = strip_tags(htmlspecialchars($_POST['enquiry']));
   
// Create the email and send the message
$to = 'info@ecsg.com.au'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "Contact form | ECSG \n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nCompany:\n$company\n\nContact method:\n$contactm\n\nEnquiry:\n$enquiry";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true;         
?>
