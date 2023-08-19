<?php
// Database connection setup 
$servername = "localhost";
$username = "root";
$password = "";
$database = "pqms"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve uploaded question details from the database
$getQuestionsQuery = "SELECT * FROM `questions`";
$result = $conn->query($getQuestionsQuery);
$questions = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Questions</title>
</head>
<body>
    <h2>View Questions</h2>
    <?php if (!empty($questions)) : ?>
        <table>
            <tr>
                <th>Course Code</th>
                <th>Department</th>
                <th>Level</th>
                <th>Semester</th>
                <th>Question Name</th>
                <th>Upload Date</th>
                <th>Uploaded By</th>
                <th>File Path</th>
            </tr>
            <?php foreach ($questions as $question) : ?>
                <tr>
                    <td><?php echo $question["course_code"]; ?></td>
                    <td><?php echo $question["deptname"]; ?></td>
                    <td><?php echo $question["question_level"]; ?></td>
                    <td><?php echo $question["question_semester"]; ?></td>
                    <td><?php echo $question["question_name"]; ?></td>
                    <td><?php echo $question["upload_date"]; ?></td>
                    <td><?php echo $question["user_upload"]; ?></td>
                    <td><a href="<?php echo $question["file_path"]; ?>" target="_blank">View File</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <p>No questions found.</p>
    <?php endif; ?>
</body>
</html>
