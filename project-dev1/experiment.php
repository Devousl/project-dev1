<?php
// Function to generate a unique username (you may want to implement a more robust method)
function generateUniqueUsername($firstName, $lastName) {
    // Concatenate first and last name and add a random number for uniqueness
    return strtolower($firstName . $lastName . rand(100, 999));
}

// Function to generate a random password (you may want to implement a more secure method)
function generateRandomPassword() {
    // Generate a random password, adjust length and characters as needed
    return substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 10);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Your existing form processing code...

    // After successfully registering the seller, provide login details
    $username = generateUniqueUsername($_POST['first_name'], $_POST['last_name']);
    $password = generateRandomPassword();

    // Store username and hashed password in the database (you should implement this)

    // Provide login details to the seller
    echo '<div class="login-details">';
    echo '<p>Thank you for registering! Your login details:</p>';
    echo '<p>Username: ' . $username . '</p>';
    echo '<p>Password: ' . $password . '</p>';
    echo '<p>Please keep these details secure.</p>';
    echo '</div>';
}

// Continue with the rest of your HTML content...
?>
