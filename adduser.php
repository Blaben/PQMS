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
    $fullname = $_POST["fullname"];
    $gender = $_POST["gender"];
    $telephone = $_POST["telnumer"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    // $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password
    $userrole = $_POST["userrole"];
    
    if ($result->num_rows > 0) {
        $usernameExists = true; // Set the flag
        $errorMessage = "Username already exists. Please choose a different username.";
    }

    else {

        // Prepare and execute SQL query
        $sql = "INSERT INTO `users` (`fullname`, `phone_number`, `gender`, `username`, `password`, `role`)
                                VALUES ('$fullname', '$telephone', '$gender', '$username', '$password', '$userrole')";
    
        if ($conn->query($sql) === TRUE) {
            echo '<script>';
            echo 'alert (""User added successfully!"")';
            echo '</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    


    $conn->close();
}
?>
