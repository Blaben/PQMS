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
    $courseCode = $_POST["course_code"];
    $deptName = $_POST["deptname"];
    $questionLevel = $_POST["question_level"];
    $questionSemester = $_POST["question_semester"];
    $questionName = $_FILES["upload_question"]["name"];
    $uploadDate = date("Y-m-d");
    $userUpload = $_POST["user_upload"];

    // Check if the question name already exists
    $checkQuestionQuery = "SELECT * FROM `questions` WHERE `question_name` = '$questionName'";
    $result = $conn->query($checkQuestionQuery);

    if ($result->num_rows > 0) {
        echo '<script>';
        echo 'alert("Question name already exists. Please choose a different name.")';
        echo '</script>';
        echo '<script> window.location.href = "dashmin.php"</script>';
    } else {
        // Handle file upload
        $uploadDir = 'uploads/'; // Folder where files will be stored
        $uploadedFile = $uploadDir . basename($_FILES['upload_question']['name']);
        
        if (move_uploaded_file($_FILES['upload_question']['tmp_name'], $uploadedFile)) {
            // File uploaded successfully, insert data into the database
            $insertQuery = "INSERT INTO `questions` (`course_code`, `deptname`, `question_level`, `question_semester`, `question_name`, `upload_date`, `user_upload`, `file_path`)
                            VALUES ('$courseCode', '$deptName', '$questionLevel', '$questionSemester', '$questionName', '$uploadDate', '$userUpload', '$uploadedFile')";

            if ($conn->query($insertQuery) === TRUE) {
                echo '<script>';
                echo 'alert("Question added successfully!")';
                echo '</script>';
                echo '<script> window.location.href = "dashmin.php"</script>';
            } else {
                echo "Error: " . $insertQuery . "<br>" . $conn->error;
            }
        } else {
            echo "Error uploading file.";
        }
    }

    $conn->close();
}
?>
