<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cinnamax";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
        $ContactName=mysqli_real_escape_string($conn,$_POST['Name']);
        $ContactEmail=mysqli_real_escape_string($conn,$_POST['Email']);
        $ContactTextbox=mysqli_real_escape_string($conn,$_POST['textboxC']);
        $sql = "INSERT INTO contact (Name,Email,textbox1) VALUES (' $ContactName','$ContactEmail', '$ContactTextbox')";
        if ($conn->query($sql) === TRUE) {
            echo "<p style='color: green;text-align:center;'>Your request was processed successfully. The new record has been created.</p>";
            echo '<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">';
            echo '<button style="padding: 10px 20px; background-color: #3498db; color: #fff; border: none; border-radius: 5px; cursor: pointer;" onclick="window.location.href=\'contact.html\'">Go back to the main page</button>';
            echo '</div>';
            sleep(3);
            //header("Location: contact.html");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    ?>