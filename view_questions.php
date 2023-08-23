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
    <style>
        *{
            text-decoration: none;
            list-style-type: none;
            font-family: 'poppins',sans-serif;
        }
        h2{
            color:#03016c;
            font-size: 3em;
            text-align:center;
        }
        table{
            width: 95%;
            height: auto;
            border-collapse: collapse;
            margin: 10px;
            padding:5%;
        }
        th{
            background-color: rgb(255, 228, 196, 0.7);
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 15px;
        }

        a{
            background-color:red;
            color:white;
            padding: 7px;
            border-radius:5px;
            transition: all 300ms ease;
        }

        a:hover{
            background-color:transparent;
            border: 1px solid #03016c;
            color:#03016c;
            margin-left:10px;
        }

        .goto{
           margin: 5% 0% 0% 80%;
        }
    </style>

    <title>View Questions</title>
</head>
<body class="question-view-body">

        <h2>Question Record</h2>
    <?php if (!empty($questions)) : ?>
        <table class="questiontable">
                <tr>
                    <th>Course Code</th>
                    <th>Department</th>
                    <th>Level</th>
                    <th>Semester</th>
                    <th>Question Name</th>
                    <th>Upload Date</th>
                    <!-- <th>Uploaded By</th> -->
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
                    <!--<td><?php echo $question["user_upload"]; ?></td>-->
                    <td><a href="<?php echo $question["file_path"]; ?>" class="reg-btn" target="_blank">View File</a></td>
                </tr>

            <?php endforeach; ?>
        </table>
        <div class="goto" >
            <a href="javascript:history.go(-1)">Go to Dashboard</a>
        </div>
    <?php else : ?>
        <p>No questions found.</p>
    <?php endif; ?>
</body>
</html>
