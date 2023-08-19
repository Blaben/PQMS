<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection setup (modify with your database credentials)
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
        echo '<script>window.location.href ="dashmin.php" </script>';
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>User Details</title>
</head>
<body class="user-view-body">

    <div class="ulink">
        <a href="javascript:history.go(-1)" class="reg-btn">Go to Dashboard</a>
    </div>
    
    <?php if(isset($userDetails)) : ?>
        <div class="userview">
            <h2>User Records</h2>
            <p>Full Name: <?php echo $userDetails["fullname"]; ?></p>
            <p>Phone Number:  <?php echo $userDetails["phone_number"]; ?></p>
            <p>Username: <?php echo $userDetails["username"]; ?></p>
            <p>Role:  <?php echo $userDetails["role"]; ?></p>
        </div>
      
    <?php endif; ?>



</body>
</html>
