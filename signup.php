<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Process the form data (e.g., save it to a database)

    // Redirect to a thank you page
    header("Location: thank_you.php");
    exit();
}
?>