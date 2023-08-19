<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "pqms";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitizing and validation of form data
    $fullname = $_POST["fullname"];
    $gender = $_POST["gender"];
    $telephone = $_POST["telnumer"];
    $newUsername = $_POST["username"];
    $password = $_POST["password"];
    // $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password
    $userrole = $_POST["userrole"];

    // Checks if username already exists
    $checkUsernameQuery = "SELECT * FROM `users` WHERE `username` = '$newUsername'";
    $result = $conn->query($checkUsernameQuery);

    if ($result->num_rows > 0) {
        echo '<script>';
        echo 'alert("Username already exists. Please choose a different username.")';
        echo '</script>';
        echo '<script>window.location.href = "dashmin.php";</script>'; // Redirect to dashmin.php
    } else {
        // Preparing to insert input fields into the database
        $sql = "INSERT INTO `users` (`fullname`, `phone_number`, `gender`, `username`, `password`, `role`)
                                VALUES ('$fullname', '$telephone', '$gender', '$newUsername', '$password', '$userrole')";

        if ($conn->query($sql) === TRUE) {
            echo '<script>';
            echo 'alert("User added successfully!")';
            echo '</script>';
            echo '<script>window.location.href = "dashmin.php";</script>'; // Redirect to dashmin.php
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>
