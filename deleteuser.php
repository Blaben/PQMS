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
    $usernameToDelete = $_POST["usernameToDelete"];

    // Check if the user with the given username exists
    $checkUsernameQuery = "SELECT * FROM `users` WHERE `username` = '$usernameToDelete'";
    $result = $conn->query($checkUsernameQuery);

    if ($result->num_rows > 0) {
        // Delete the user
        $deleteQuery = "DELETE FROM `users` WHERE `username` = '$usernameToDelete'";
        if ($conn->query($deleteQuery) === TRUE) {
            echo '<script>';
            echo 'alert("User deleted successfully!")';
            echo '</script>';
            echo '<script> window.location.href ="dashmin.php"</script>';
        } else {
            echo "Error deleting user: " . $conn->error;
        }
    } else {
        echo '<script>';
        echo 'alert("User not found. Please enter a valid username.")';
        echo '</script>';
        echo '<script>window.location.href = "dashmin.php"</script>';
    }

    $conn->close();
}
?>
