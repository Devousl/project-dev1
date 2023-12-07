<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cinnamax";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $SellerName = mysqli_real_escape_string($conn, $_POST['first_name']);
    $SellerPhoneNumber = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $SellerEmail = mysqli_real_escape_string($conn, $_POST['email']);
    $SellerAddress = mysqli_real_escape_string($conn, $_POST['address']);
    $SellerItemname = mysqli_real_escape_string($conn, $_POST['item_name']);

    // Function to generate a unique username
    function generateUniqueUsername($firstName, $lastName)
    {
        return strtolower($firstName . $lastName . rand(100, 999));
    }

    // Function to generate a random password
    function generateRandomPassword()
    {
        return substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 10);
    }

    // Generate unique username and random password
    $username = generateUniqueUsername($SellerName, ''); 
    $password = generateRandomPassword();


    $sql = "INSERT INTO sellerdetails (username, password, first_name, phone_number, email, address, ItemName) VALUES ('$username', '$password', '$SellerName', '$SellerPhoneNumber', '$SellerEmail', '$SellerAddress', '$SellerItemname')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: green;text-align:center;'>Your request was processed successfully.</p>";

        // Line break
        echo '<br>';

        // Apply additional CSS for the login details
        echo '<div style="display: flex; flex-direction: column; align-items: center;">';
        echo '<p class="login-detail">Login Details:</p>';
        echo '<p class="login-detail">Username: ' . $username . '</p>';
        echo '<p class="login-detail">Password: ' . $password . '</p>';
        echo '<button style="margin-top: 20px; padding: 10px 20px; background-color: #3498db; color: #fff; border: none; border-radius: 5px; cursor: pointer;" onclick="window.location.href=\'Home.html\'">Go back to the main page</button>';
        echo '</div>';
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
