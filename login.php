<?php

$host = "localhost";
$username = "root";
$password = ""; // Enter your MySQL password here
$database = "pqms";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = ""; // Initialize a message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM `users` WHERE `username` = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $userDetails = mysqli_fetch_assoc($result);
        if ($userDetails["password"] == $password) {
            session_start();
            $_SESSION['pqms'] = 'true';
            $_SESSION['user_role'] = $userDetails['role']; // Store the user's role

            // Redirect users based on their roles
            if ($userDetails["role"] == "admin") {
                header('location: dashmin.php');
                exit();
            } elseif ($userDetails["role"] == "lecturer") {
                header('location: dashlecturer.php');
                exit();
            } elseif ($userDetails["role"] == "student") {
                header('location: student_dashboard.php');
                exit();
            } else {
                // Handle other roles or provide a default redirect
                header('location: index.html');
                exit();
            }
        } else {
            $message = "Incorrect Password!";
        }
    } else {
        $message = "User not found!";
    }
}

mysqli_close($conn);
?>


<!-- ================= My HTML form code ================= -->

<!Doctype html>
<html lang="en-us">
    <head>
        <meta name="description" content="This site is made for University of Education, Winneba Past Question Management System" />
        <meta name="keywords" content="Database, UEW, University of Education, Winneba, Past Question, "/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" type="image/png" href="images/uew logo.png" sizes="32x32" />
        <link rel="stylesheet" href="style.css">

        <title>Login</title>
    </head>    

    <body>
        <div class="container">
            <div class="head-stuffs">
                <div>
                        <a href="index.html"><img class="logo-img" src="images/logopqms.png" alt="brand logo" /></a>
                </div>

                <div class="nav-items">
                    <ul class="common-styling">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="https://uew.edu.gh/">UEW</a></li>
                    </ul>
                    <ul class="common-styling">
                        <li><a href="login.php">Login</a></li>
                    </ul>
                </div>

                <div class="nav-items">
                    <!-- <ul class="common-styling"> -->
                        <button class="reg-btn"> <a href="index.html#sayhello">Say Hello</a></button>
                    
                </div>


            </div>


            <div class="heading1">
                <h2>Login Here</h2>
                <p class="para"> As a Student, Use Your index number as Username and your applicant ID as your password <br> As a Lecturer use your Staff ID and password to login</p>
            </div>

            <form action="" method="POST">
                <div class="contact-details">
                
                    <div class="login-input">
                        <label for="username">Username</label><br />
                        <input type="text" name="username" id="uname" required/><br />
            
                        <label for="password">password</label><br />
                        <input type="password" name="password" id="password" required /><br />
    
                        <button type="submit" class="reg-btn">Log In</button>
                    </div>
                </div>
            </form>

            <?php
            if (!empty($message)) {
                echo '<script>alert("' . $message . '");</script>';
            }
            ?>

        </div>
    </body>

    <footer class="reg-footer">
        <div class="left-items">
                <!-- social media icons -->
            <ul class="common-styling"> Follow Us
                <li>
                    <a href="https://www.facebook.com/official.uew">
                       <img src="images/icons/baseline-facebook.svg" alt="">
                    </a></li>
                <li>
                    <a href="https://www.instagram.com/uew_official">
                        <img src="images/icons/instagram.svg" alt="">
                    </a></li>
                <li>
                    <a href="https://www.twitter.com/@voice_of_uew">
                        <img src="images/icons/twitter.svg" alt="">
                    </a></li>
                <li>
                    <a href="https://www.youtube.com/@UEWTV">
                        <img src="images/icons/youtube.svg" alt="">
                    </a></li>
            </ul>
        </div> 
        
        <div class="copy-footer">
            <p >&copy;2023 Copyright Reserved | University of Education, Winneba</p>
        </div>

</footer>
</html>