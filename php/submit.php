<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Process form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // You can perform additional processing here, such as saving the data to a database or sending an email notification.

    // Echo "Message received" text
    echo "Message received. Thank you for contacting us!";

    // Redirect back to the contact.html file in the parent folder after a short delay
    header("refresh:3;url=../contact.html");
    exit();
} else {
    // If someone tries to access the submit.php file directly, redirect them back to the contact form
    header("Location: ../contact.html");
    exit();
}
?>