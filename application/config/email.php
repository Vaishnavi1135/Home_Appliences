<?php
$mail = $this->phpmailer_lib->load();

try {
    // SMTP Configuration
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'arctractors9762@gmail.com'; // Gmail address
    $mail->Password   = 'xpfavclsslxkudqa'; // App Password
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    // Sender and Recipients
    $mail->setFrom('ruturajsarnobat21@gmail.com', 'A.R.C. BIKE SERVICES');
    $mail->addAddress('webisoftech@gmail.com');
    $mail->addAddress($application_details->email); // Ensure this is sanitized
    $mail->addAddress('arctractors9762@gmail.com');

    // Email Content
    $body = 'Thank you for applying at A.R.C. Services. We will go through all your information and connect you shortly. We attached your applied form details at the bottom of this mail. For more details or if you have any questions, feel free to reach at our contact details.';
    $mail->isHTML(true);
    $mail->Subject = 'Thank you for applying the services at A.R.C.';
    $mail->Body    = $body;
    $mail->AltBody = 'Thank you for applying at A.R.C. Services. We will review your application and get back to you soon.';

    // Send Email
    if ($mail->send()) {
        echo 'Email sent successfully.';
    } else {
        echo 'Failed to send email.';
    }
} catch (Exception $e) {
    echo 'Message could not be sent. Error: ', $mail->ErrorInfo;
}
?>
