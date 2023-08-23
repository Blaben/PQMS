<?php
session_start();

if (!isset($_SESSION["pqms"]) || $_SESSION["user_role"] !== "lecturer") {
    header("Location: login.php"); // Redirect to login page
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="This site is made for University of Education, Winneba Past Question Management System" />
    <meta name="keywords" content="Database, UEW, University of Education, Winneba, Past Question, "/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="images/uew logo.png" sizes="32x32" />
    <link rel="stylesheet" href="style.css">

    <title>Lecturer Dashboard</title>
</head>
<body>

    <div class="dash-container">
        <aside class="dash-content">
            <div class="dash-top">
                <div class="dash-logo">
                    <img class="dash-logo-img" src="images/uew-logo.png" alt="">
                    <h2>Lecturer <br> Dashboard</h2>
                </div>
                <a href="#" class="dash-close">
                    <img class="dash-img" src="images/icons/close_FILL0_wght400_GRAD0_opsz48.svg">
                </a>
            </div>

            <div class="dash-sidebar">

                <div class="dash-menu-item">
                    <a href="#">
                    <img class="dash-img" src="images/icons/house_FILL0_wght400_GRAD0_opsz48.svg" alt="">
                    <h3>Department</h3>
                    <img class="dash-img" class="dash-arrow" src="images/icons/navigate_next_FILL0_wght400_GRAD0_opsz48.svg" alt="">
                    </a>

                    <!--Department Drop Down -->
                    <div class="dash-submenu">
                        <a href="#" class="sub-item">ICT</a> 
                        <a href="#" class="sub-item">French</a> 
                        <a href="#" class="sub-item">Mathematics</a> 
                        <a href="#" class="sub-item">Business Administration</a>
                        <a href="#" class="sub-item">Integrated Science</a></li> 
                        <a href="#" class="sub-item">Political Science</a> 
                        <a href="#" class="sub-item">Social Studies</a> 
                        <a href="#" class="sub-item">Music</a> 
                        <a href="#" class="sub-item">HESA</a></li> 
                        <a href="#" class="sub-item">Special Education</a> 
                        <a href="#" class="sub-item">Liberal Courses</a>
                    </div>
                </div>
                
                
                <div class="dash-menu-item">
                <a href="#">
                    <img src="images/icons/monitoring_FILL0_wght400_GRAD0_opsz48.svg" alt="" class="dash-img">
                    <h3>Analytics</h3>
                </a>
                </div>

                <div class="dash-menu-item">
                <a href="#">
                    <img src="images/icons/lab_profile_FILL0_wght400_GRAD0_opsz48.svg" alt="" class="dash-img">
                    <h3>Report</h3>
                </a>
                </div>

                <div class="dash-menu-item">
                <a href="#">
                    <img src="images/icons/settings_FILL0_wght400_GRAD0_opsz48.svg" alt="" class="dash-img">
                    <h3>Settings</h3>
                </a>
                </div>

                <div class="dash-menu-item">
                    <a href="#">
                        <img class="dash-img" class="dash-arrow" src="images/icons/folder_managed_FILL0_wght400_GRAD0_opsz48.svg" alt="">
                        <h3>Manage Data</h3>
                        <img class="dash-img" class="dash-arrow" src="images/icons/navigate_next_FILL0_wght400_GRAD0_opsz48.svg" alt="">
                    </a>

                    <!--Manage Data Drop Down -->
                    <div class="dash-submenu" >
                        <a href="#" class="sub-item" id="showUserForm"></a> 
                        <a href="#" class="sub-item" id="showViewForm"></a> 
                        <a href="#" class="sub-item" id="showDeleteForm"></a> 
                        <a href="#" class="sub-item" id="showQuestionForm">Add Question</a> 
                        <a href="view_questions.php" class="sub-item">View all Question</a> 
                    </div>
                </div>
                
                <div class="dash-menu-item">
                <a href="logout.php">
                    <img src="images/icons/logout_FILL0_wght400_GRAD0_opsz48.svg" alt="" class="dash-img">
                    <h3>Logout</h3>
                </a>
                </div>
               
            </div>
        </aside>



     <!-- ========================= Main Menu ======================= -->
     <div class="dash-main">




        <!--===================== View A User Pop Up here in future ============================-->
        


        <!--===================== Delelting A User Pop Up code incase of future adition ============================-->
        


            <!-- =================== Add User Pop up Form here incase in the future  =================================== -->
            

            <!--================== Question Pop Up form ===========================  -->
            <div id="QuestionForm" class="popup-form">
                

                <!-- Question form elements here -->
                <form action="add_question.php" method="post" enctype="multipart/form-data" >
                    <div class="form-wrapper">
        
                    <div class="add-user-form">
                        <h2>Add Question</h2>
        
                        <label for="course_code">Choose Question Course Code & title</label>
                        <select name="course_code" id="course_code" required>
                          <option value=""></option>
                          <option name="icte121" value="icte121">ICTE121 EMERGING TECHNOLOGIES</option>
                          <option name="icte122" value="icte122">ICTE122 PEDAGOGICAL INTEGRATION OF ICT IN EDUCATION</option>
                          <option name="icte123" value="icte123">ICTE123 INTRODUCTION TO INSTRUCTIONAL DESIGN</option>
                          <option name="icte124" value="icte124">ICTE124 ETHICAL AND SECURITY ISSUES IN TECHNOLOGY USE</option>
                          <option name="icte125n" value="icte125n">ICTE125N FUNDAMENTALS OF COMPUTER PROGRAMMING</option>
                        </select>

                        <label for="deptname">Choose Question Department</label>
                        <select name="deptname" id="deptname" required>
                          <option value=""></option>
                          <option name="ict" value="ict">ICT</option>
                          <option name="mathematics" value="mathematics">Mathematics</option>
                          <option name="french" value="french">French</option>
                          <option name="science" value="science">Science</option>
                          <option name="political_science" value="political_science">Political Science</option>
                          <option name="hesa" value="hesa">HESA</option>
                          <option name="music" value="music">Music</option>
                          <option name="business_admin" value="business_admin">Business Administration</option>
                          <option name="special_education" value="special_education">Special Education</option>
                        </select>

                        <label for="question_level">Choose Question Level</label>
                        <select name="question_level" id="question_level" required>
                          <option value=""></option>
                          <option name="l100" value="l100">Level 100</option>
                          <option name="l200" value="l200">Level 200</option>
                          <option name="l300" value="l300">Level 300</option>
                          <option name="l400" value="l400">Level 400</option>
                        </select>

                        <label for="question_semester">Choose Question Semester</label>
                        <select name="question_semester" id="question_semester" required>
                          <option value=""></option>
                          <option name="sem1" value="sem1">Semester 1</option>
                          <option name="sem2" value="sem2">Semester 2</option>
                        </select>
                        
                        <label for="dob">Upload Question</label><br />
                        <input type="file" name="upload_question" id="upload_question" required/>                        
                        
                        <!-- <label for="username">Question Upload Date</label>
                        <input type="date" id="upload_date" required> -->

                        <label for="user_upload">Question Uploaded By</label>
                        <input type="text" name="user_upload" id="user_upload" required>
                        
                        <div class="form-div">
                            <button type="submit" class="reg-btn">Add Question</button>
                            <a href="dashlecturer.php" id="closeQuestionForm" class="close-button reg-btn">Cancel</a>
                        </div>
                    </div>
                    
                </div>
                </form>
            </div>
        
        </div>

    </div>
    
    <script src="script.js" defer></script>
</body>

<footer class="dash-footer">
    <div class="left-items">

            <!-- ================= social media icons ==================== -->

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