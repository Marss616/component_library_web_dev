<?php

$from = "Demo contact form <demo@main.com>";
$sendTo = "Demo contact form <demo@main.com>";
$subject = "New message from contact form";

// Field mapping
$fields = array(
    'name' => 'Name',
    'surname' => 'Surname',
    'phone' => 'Phone',
    'email' => 'Email',
    'message' => 'Message'
);

$okMessage = "Contact form successfully submitted. I will get back to you.";
$errorMessage = "There were errors while sending the email.";

error_reporting(E_ALL & ~E_NOTICE);

try {
    if (count($_POST) == 0) throw new \Exception('Form is empty.');

    $emailText = "You have a new message from your contact form:\n\n";

    foreach ($_POST as $key => $value) {
        if (isset($fields[$key])) {
            $emailText .= "{$fields[$key]}: $value\n";
        }
    }

    // Email headers
    $headers = array(
        "Content-Type: text/plain; charset=\"UTF-8\"",
        "From: $from",
        "Reply-To: $from",
        "Return-Path: $from"
    );

    // Send the email
    mail($sendTo, $subject, $emailText, implode("\n", $headers));

    $responseArray = array("type" => "success", "message" => $okMessage);

} catch (\Exception $e) {
    $responseArray = array("type" => "danger", "message" => $errorMessage);
}

// Return JSON response for AJAX requests
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
    strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

    $encoded = json_encode($responseArray);
    header('Content-Type: application/json');
    echo $encoded;

} else {
    // For non-AJAX requests
    echo $responseArray["message"];
}
?>
