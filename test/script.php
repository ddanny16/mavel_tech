<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $to = "recipient@example.com"; // Replace with the recipient's email address
    $subject = "Contact Form Submission from $name";
    $headers = "From: $email";

    if (mail($to, $subject, $message, $headers)) {
        $response = ["success" => true, "message" => "Email sent successfully."];
    } else {
        $response = ["success" => false, "message" => "Email sending failed."];
    }

    header("Content-type: application/json");
    echo json_encode($response);
} else {
    // Handle invalid request method
    http_response_code(405);
    echo "Method Not Allowed";
}
?>
