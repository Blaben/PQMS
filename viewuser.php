<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection setup 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "pqms";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize and validate form data
    $usernameToView = $_POST["usernameToView"];

    // Retrieve user details
    $getUserQuery = "SELECT * FROM `users` WHERE `username` = '$usernameToView'";
    $result = $conn->query($getUserQuery);

    if ($result->num_rows > 0) {
        $userDetails = $result->fetch_assoc();
    } else {
        echo '<script>';
        echo 'alert("User not found. Please enter a valid username.")';
        echo '</script>';
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
</head>
<body>
    <?php if(isset($userDetails)) : ?>
        <h2>User Details</h2>
        <p>Full Name: <?php echo $userDetails["fullname"]; ?></p>
        <p>Gender: <?php echo $userDetails["gender"]; ?></p>
        <p>Phone Number: <?php echo $userDetails["phone_number"]; ?></p>
        <p>Username: <?php echo $userDetails["username"]; ?></p>
        <p>Role: <?php echo $userDetails["role"]; ?></p>
        
    <?php endif; ?>

    <a href="javascript:history.go(-1)">Back to View User Form</a>
</body>
</html>
