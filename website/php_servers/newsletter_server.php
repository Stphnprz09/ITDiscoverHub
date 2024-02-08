<?php

include_once 'rules.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$subscribers = getSubscribers();

    // Get the latest news using fetch API
    $newsAPI = "https://newsapi.org/v2/top-headlines?country=us&category=technology&apiKey=2cc204642c1c4b42b1171b82e8e25286";
    $newsResponse = file_get_contents($newsAPI);
    $newsData = json_decode($newsResponse);

    // Preparing the email content
    $emailSubject = "Latest News from IT Discover Hub";
    $emailMessage = "Hello Subscribers!<br>Here are the latest news:\n";

    foreach ($newsData->articles as $article) {
        $emailMessage .= "<br><br><b>Title:</b> {$article->title}<br><br><b>Description:</b> {$article->description}\<br><br><b>URL:</b> {$article->url}\n\n<hr>";
    }

    // Create a PHPMailer instance
    $mail = new PHPMailer(true);

    foreach ($subscribers as $subscriber) {
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'itdiscoverhub@gmail.com';
            $mail->Password   = 'gajb qcyi hgtn scau';   // created via google app password
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;
    
            // Recipients
            $mail->setFrom('itdiscoverhub@gmail.com', 'IT Discover Hub');
            $mail->addAddress($subscriber);
    
            // Content
            $mail->isHTML(true);
            $mail->Subject = $emailSubject;
            $mail->Body    = $emailMessage;
    
            // Send email
            $mail->send();
    
            // echo "Thank you for subscribing! You will receive an email with the latest news shortly.";
            echo "<script>alert('Newsletter successfully sent to subscribers!');</script>";
            header("Location: ../html/adminHome.php");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            header("Location: ../html/adminHome.php");
        }
    }
