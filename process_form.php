php
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    $errors = array();
    
    if (empty($name)) {
        $errors[] = "Name is required";
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
    
    if (empty($message)) {
        $errors[] = "Message is required";
    }
    
    if (empty($errors)) {
        $to = "your@email.com"; // Replace with your email address
        $subject = "New Contact Form Submission";
        $headers = "From: $email";
        
        if (mail($to, $subject, $message, $headers)) {
            echo "Thank you for contacting us!";
        } else {
            echo "Oops! Something went wrong.";
        }
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>
