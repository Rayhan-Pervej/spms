<?php

?>

<?php
  include 'connect.php';
?>

<?php
session_start();
if (isset($_SESSION['user_type'])) {
    // User is logged in, display appropriate menu
} else {
    // User is not logged in, display login/register options
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <?php if ($_SESSION['user_type'] == 'employee'){ ?>
    <title>Employee Dashboard</title>
    <?php } else { ?>
    <title>Student Dashboard</title>
    <?php } ?>
    
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="spms.css">

  </head>

  <body>

  <div class="menu-bar">

<ul> 
    <li><a class="pagePoint" href="">Dashboard</a></li>

    <li><a  href="#">PlO Analysis</a>

       <div class="menu1">
        <ul>
            <li><a href="ploAnalysisDepartmentProgramSchoolAverage.php"> PLO Analysis (Department/Program/School/Average) </a> </li>
            <li><a href="ploAnalysisOverall.php"> PLO Analysis(Overall, CO wise, Course wise) </a> </li>
        </ul>
       </div>

    </li>

    <li><a href="#">PLO Achievement Stats</a>

        <div class="menu1">
            <ul>
                <li><a href="ploComparisonStudent.php"> PLO Comparison(Student) </a> </li>
                <li><a href="ploComparisonCourse.php"> PLO Comparison(Course) </a> </li>
                <li><a href="ploComparisonProgram.php"> PLO Comparison(Program) </a> </li>
                <li><a href="ploComparisonSchool.php"> PLO Comparison(School) </a> </li>
                <li><a href="ploComparisonDepartment.php"> PLO Comparison(Departement)</a> </li>
            </ul>
           </div>
    
    
    </li>


    <li><a href="spiderChart.php">Spider Chart Analysis</a></li>
    

    <?php if ($_SESSION['user_type'] == 'employee'){ ?>

    <li><a href="#">Data Entry</a>

        <div class="menu1">
            <ul>
              <li><a href="addExam.php">Add Exam </a> </li>
              <li><a href="viewExam.php">View Exam </a> </li>
              <li><a href="viewStudentAnswerScript.php"> Evaluate Exam Script</a> </li>
              <li><a href="createCourseOutlinePage1.php"> Create Course Outline </a> </li>
              <li><a href="viewCourseOutline.php"> View Course Outline </a> </li>
              <li><a href="Uploadgrade.php"> Upload Grade </a> </li>
              <li><a href="manualUploadGrade.php"> Manual Upload Grade </a> </li>
                
            </ul>
           </div>
    
    </li>

    <?php } ?>


    <li><a href="viewCourseOutline.php">View course Outline</a></li>


    <li><a href="#">Enrollment Stats</a>

        <div class="menu1">
            <ul>
                <li><a href="ploAnalysis.php"> Student Wise PLO Analysis </a> </li>
                <li><a href="ploAchieveStats.php"> PLO Achievement Statistics </a> </li>
                <li><a href="enrollmentStatistics.php"> Student Enrollment Statistics</a> </li>
                <li><a href="performanceStats.php"> Student Performance Stats</a> </li>
                <li><a href="coPercentage.php">Student Co-Percentage</a> </li>
            </ul>
           </div>
    
    </li>

    <li><a href="">GPA Analysis</a>


        <div class="menu1">
            <ul>
                <li><a href="school_department_program_stats.php"> School/Department/Program-wise</a> </li>
                <li><a href="courseWiseperformance.php"> Course-wise</a> </li>
                <li><a href="instructorWisePerformance.php"> Instructor-wise </a> </li>
                <li><a href="instructorWiseChosenCourse.php"> Instructor-wise(Chosen Course) </a> </li>
                <li><a href="enrollmentStatisitis.php"> VC/Dean/Head-wise</a> </li>
            </ul>
           </div>
    
    
    </li>



    <li><a href="logout.php">Logout</a></li>  
</ul>

</div>



<?php include('D:\APPS\Xamp\htdocs\spms\test\test.php'); ?>




    

   



    <!--
    <div class="container" id="logoutbutton">
    <a href="logout.php" class="btn btn-primary mb-5">Logout</a>
    </div>
    

    <div class="nav">
        <input type="checkbox" id="nav-check">
        <div class="nav-header">
          <div class="nav-title">
            SPMS 3.0
          </div>
        </div>
        <div class="nav-btn">
          <label for="nav-check">
            <span></span>
            <span></span>
            <span></span>
          </label>
        </div>
        
        <div class="nav-links">
            <ul>
          <li><a href="#" target="_self">Dashboard</a></li>


          <div class="dropdown">
            <a href="ploAnalysis.php" class="dropbutton">PLO Analysis</a>
            <div class="dropdown-content">
                <a href="ploAnalysisDepartmentProgramSchoolAverage.php">PLO Analysis With Department/Program/School Average</a>
                <a href="ploAnalysisOverall.php">Plo Analysis (overall, CO Wise, Course Wise)</a>
            </div>
          </div>



          <li><a href="ploAchieveStats.php" target="_self">PLO Achievement Stats</a></li>
          <li><a href="spiderChart.php" target="_self">Spider Chart Analysis</a></li>
          <li><a href="dataEntry.php" target="_self">Data Entry</a></li>
          <li><a href="viewCourseOutline.php" target="_self">View course Outline</a></li>
          <li><a href="enrollmentStatistics.php" target="_self">Enrollment Stats</a></li>
          <li><a href="performanceStats.php" target="_self">GPA Analysis</a></li>
          <li><a href="logout.php" target="_self">Logout</a></li>
            </ul>
        </div>
      </div>

    -->

  </body>

</html>