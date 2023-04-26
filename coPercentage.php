<?php
session_start();
if (isset($_SESSION['user_type'])) {
    // User is logged in, display appropriate menu
} else {
    // User is not logged in, display login/register options
}
?>

<!DOCTYPE html>
<html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Couse Outcome Graph</title>
    
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="spms.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <style>

        ::placeholder{
          color:white;
        }

        ::-ms-input-placeholder{
          color:white;
        }

        :-ms-input-placeholder{
          color:white;
        }

    </style>

  </head>


<body>

<div class="menu-bar">

<ul> 
    <li><a href="dashboard.php">Dashboard</a></li>

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


    <li><a class="pagePoint"  href="#">Enrollment Stats</a>

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

<div  class="row1">

<form method="POST">
		<input type="text" placeholder="Student ID" name="studentID">
		<input type="text" placeholder="course ID" name="courseID"><br><br>
		<input style="margin-left:710px;"  class= "button" type="submit" name="submit" value="Submit">
	</form>
    </div>


	<?php
	// include database connection code
	include('connect.php');

	if(isset($_POST['submit'])) {
		$studentID = $_POST['studentID'];
		$courseID = $_POST['courseID'];

		// fetch registrationID from registration_t table
		$query = "SELECT registrationID FROM registration_t WHERE studentID = $studentID AND courseID = '$courseID'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_assoc($result);
		$registrationID = $row['registrationID'];

		// fetch gradePoint from student_course_performance_t table
		$query = "SELECT gradePoint FROM student_course_performance_t WHERE registrationID = $registrationID";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_assoc($result);
		$gradePoint = $row['gradePoint'];

		// fetch coNum from co_t table
		$query = "SELECT coNum FROM co_t WHERE courseID = '$courseID'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_assoc($result);
		$coNum = $row['coNum'];

		// convert gradePoint to percentage
		$percentage = ($gradePoint / 4) * 100;

		// create array of CO percentages
		$coPercentages = array();
		for ($i=1; $i<=$coNum; $i++) {
			$coPercentages[] = $percentage;
		}

		// create data table for Google Graph API
		$dataTable = array();
		$dataTable[] = array('CO', 'Percentage');
		for ($i=1; $i<=$coNum; $i++) {
			$dataTable[] = array('CO' . $i, $percentage);
		}

		// draw bar chart using Google Graph API
		echo '<div id="chart_div" style="width: 700px; height: 400px; margin-top:40px; margin-left:400px;"></div>';
		echo '<script>';
		echo "google.charts.load('current', {'packages':['corechart']});";
		echo "google.charts.setOnLoadCallback(drawChart);";
		echo "function drawChart() {";
		echo "var data = google.visualization.arrayToDataTable(" . json_encode($dataTable) . ");";
		echo "var options = {title: 'CO Percentage Graph', bars: 'horizontal'};";
		echo "var chart = new google.visualization.BarChart(document.getElementById('chart_div'));";
		echo "chart.draw(data, options);";
		echo "}";
		echo '</script>';
	}
	?>

	

</body>
</html>
