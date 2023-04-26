<?php
session_start();
$ID = $_SESSION['ID'];
if (isset($_SESSION['user_type'])) {
    // User is logged in, display appropriate menu
} else {
    // User is not logged in, display login/register options
}
?>

<!DOCTYPE html>
<html>
<head>
	 <!-- Required meta tags -->
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Grade Upload CSV file</title>
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="spms.css">

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

<style>
		table {
			border-collapse: collapse;
			width: 20%;
		}

		th, td {
			text-align: left;
			padding: 8px;
			border-bottom: 1px solid #164b99;
		}

		th {
			background-color: #164b99;
			color: white;
		}

		input[type="submit"] {
			background:#40179f; 
    border-radius:10px; 
    border:none; 
    outline:none; color:#fff; 
    font-size:14px;
    letter-spacing:2px; 
    text-transform:uppercase; 
    cursor:pointer; 
    font-weight:bold; 
    margin-left:5px; 
    height: 36px; 
    width: 100px;
		}
		input[type="submit"]:hover{
    background:linear-gradient(90deg,#34166e,#40179f);
    
   }
	</style>


</head>


<body>
<body>
    
	<div class="menu-bar">
  
  <ul> 
	  <li><a  href="dashboard.php">Dashboard</a></li>
  
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
  
	  <li><a class="pagePoint" href="#">Data Entry</a>
  
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







<!-- 
	<div class="row1">
	<form method="post" action="<?php/* echo htmlspecialchars($_SERVER["PHP_SELF"]);  */?>">

		<input type="text" placeholder="Course ID" id="courseID" name="courseID"><br>
		<input type="text" placeholder="Section ID" id="sectionID" name="sectionID"><br>
		<input style="margin-top:20px; width:180px; margin-left:670px;" type="submit" class="button" name="submit" value="View Students">
	</form>
	</div>
_-->

	<div class="row1" style=" margin-left:670px;" >
	<p style="font-weight: bold; color: white;">Upload CSV File</p>
		<form method="POST" enctype="multipart/form-data">
			<label for="file"style="font-weight: bold; color: white;">Select file:</label>
			<input type="file" name="file" id="file" style="background-color: #4a7678; border: none; font-size: 16px; color: #333;"><br><br>
			<input type="submit" name="submitt" value="Upload">
		</form>
	</div>

	<?php

	include 'connect.php';

	?>
	<?php
	/*
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// database connection details
		include 'connect.php';

		// retrieve student information from registration_t table
		$courseID = $_POST['courseID'];
		$sectionID = $_POST['sectionID'];
		$sql = "SELECT * FROM registration_t WHERE courseID='$courseID' AND sectionID='$sectionID'";
		$result = mysqli_query($con, $sql);

		// display student information in a table
		if (mysqli_num_rows($result) > 0) {
			$tableHTML = "<table><tr><th>Student ID</th><th>Grade</th></tr>";
			while($row = mysqli_fetch_assoc($result)) {
				$registrationID = $row['registrationID'];
				$studentID = $row['studentID'];
				$tableHTML .= "<tr><td>".$studentID."</td><td><input type='number' step='0.01' name='grade[$studentID]' required></td></tr>";
			}
			$tableHTML .= "</table>";
			echo "<form method='post' action=''>";
			echo $tableHTML;
			echo "<input type='hidden' name='courseID' value='$courseID'>";
			echo "<input type='hidden' name='sectionID' value='$sectionID'>";
			echo "<input type='submit' name='submit_grades' value='Submit'>";
			echo "</form>";
		} else {
			echo "0 results";
		}

		// close connection
		mysqli_close($con);
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_grades'])) {
		// database connection details
		include 'connect.php';

		// retrieve student grades and insert into student_course_performance table
		$courseID = $_POST['courseID'];
		$sectionID = $_POST['sectionID'];
		foreach($_POST['grade'] as $studentID => $grade) {
			$sql = "SELECT registrationID FROM registration_t WHERE courseID='$courseID' AND sectionID='$sectionID' AND studentID='$studentID'";
			$result = mysqli_query($con, $sql);
			if (mysqli_num_rows($result) > 0) {
				$row = mysqli_fetch_assoc($result);
				$registrationID = $row['registrationID'];
				$sql = "UPDATE student_course_performance_t SET gradePoint = '$grade' WHERE registrationID = '$registrationID'";
				mysqli_query($con, $sql);
			}
		}

		// close connection
		mysqli_close($con);
		echo "Grades have been successfully submitted.";
	}
	*/
	?>


<?php
		if(isset($_POST["submitt"])) {
			$filename = $_FILES["file"]["tmp_name"];
			if($_FILES["file"]["size"] > 0) {
				
				// Read CSV file
				$file = fopen($filename, "r");
				fgetcsv($file); // Skip header row
				$sections = array();
				$registrations = array();
				$questions = array();
				$grade_marks = array();
				while(($data = fgetcsv($file, 1000, ",")) !== false) {
					$student_id = $data[0];
					$edu_semester = $data[2];
					$edu_year = $data[1];
					$enrolled_course = $data[3];
					$enrolled_section = $data[4];

					$grade_mapping = [
						"A"  => 4.0,
						"A-" => 3.7,
						"B+" => 3.3,
						"B"  => 3.0,
						"B-" => 2.7,
						"C+" => 2.3,
						"C"  => 2.0,
						"C-" => 1.7,
						"D+" => 1.3,
						"D"  => 1.0,
						"F"  => 0.0,
					];
					
					$grade_letter = $data[5];
					$grade_point = $grade_mapping[$grade_letter];
					
					// Insert data into section_t table
					if(!array_key_exists($enrolled_section, $sections)) {
						$query = "INSERT INTO section_t (sectionNum, semester,courseID, year) VALUES ($enrolled_section, '$edu_semester','$enrolled_course', $edu_year)";
						mysqli_query($con, $query);
						$section_id = mysqli_insert_id($con);
						$sections[$enrolled_section] = $section_id;
					} else {
						$section_id = $sections[$enrolled_section];
					}
				

					
					// Insert data into registration_t table
					$query = "SELECT sectionID FROM section_t WHERE sectionNum=$enrolled_section AND semester='$edu_semester' AND year=$edu_year";
					$result = mysqli_query($con, $query);
					$row = mysqli_fetch_assoc($result);
					$section_id = $row["sectionID"];
					$query = "INSERT INTO registration_t (sectionID, studentID) VALUES ($section_id, $student_id)";
					mysqli_query($con, $query);
					$registration_id = mysqli_insert_id($con);
					


					// Insert data into question_t table


					if (!in_array($enrolled_course, $questions)) {
						// Fetch examId from exam_t table
						$exam_name = $enrolled_course . "Final";
						$query = "SELECT examID FROM exam_t WHERE examName='$exam_name'";
						$result = mysqli_query($con, $query);
						$row = mysqli_fetch_assoc($result);
						$exam_id = $row["examID"];
						
						// Fetch coNum from co_t table
						$query = "SELECT coNum FROM co_t WHERE courseID='$enrolled_course'";
						$result = mysqli_query($con, $query);
						$row = mysqli_fetch_assoc($result);
						$co_num = $row["coNum"];
						

						// Loop through each question and add mark to answer table
						for ($i = 1; $i <= 3; $i++) {
							// Insert data into question table
							$query = "INSERT INTO question_t (markPerQuestion, courseID, coNum, examID, questionNUm) VALUES (100, '$enrolled_course', $i, $exam_id, 1)";
							mysqli_query($con, $query);
						}
						
						$questions[] = $enrolled_course; // Add the course to questions array
					}

					// Grade to mark mapping
					$grade_marks = array(
						"4" => 90,
						"3.7" => 85,
						"3.3" => 80,
						"3" => 75,
						"2.7" => 70,
						"2.3" => 65,
						"2" => 60,
						"1.7" => 55,
						"1.3" =>50,
						"1" => 45,
						"0" => 40
					);

					$mark_obtained = $grade_marks[$grade_point];

					// Loop through each question and add mark to answer table
					for ($i = 1; $i <= $co_num; $i++) {

						// Insert data into answer table and set mark obtained based on grade
						
						$query = "INSERT INTO answer_t(answerNum, examID, registrationID, markObtained) VALUES(1, $exam_id, $registration_id, $mark_obtained)";
						mysqli_query($con, $query);
					}
					
					

					/*
					$query = "SELECT coNum FROM co_t WHERE courseID='$enrolled_course'";
					$result = mysqli_query($con, $query);
					$row = mysqli_fetch_assoc($result);
					$co_num = $row["coNum"];
					$query = "INSERT INTO question_t (markPerQuestion, courseID, coNum) VALUES (100, '$enrolled_course', $co_num)";
					mysqli_query($con, $query);

					*/

					// Grade to mark mapping
					$grade_marks = array(
						"4" => 90,
						"3.7" => 85,
						"3.3" => 80,
						"3" => 75,
						"2.7" => 70,
						"2.3" => 65,
						"2" => 60,
						"1.7" => 55,
						"1.3" =>50,
						"1" => 45,
						"0" => 40
					);
					

					 // Replace with the actual grade obtained by the student
					$mark_obtained = $grade_marks[$grade_point];
					
					// Insert data into student_course_performance_t table
					$query = "INSERT INTO student_course_performance_t (registrationID, gradePoint, totalMarksObtained) VALUES ($registration_id, $grade_point, $mark_obtained)";
					mysqli_query($con, $query);


					// Insert data into answer table
					/*
					//fetch data of questionID from question Table
					$query= "SELECT questionID FROM question_t WHERE courseID='$enrolled_course' and examID= $exam_id";
					$result = mysqli_query($con, $query);
					$row = mysqli_fetch_assoc($result);
					$question_ID = $row["questionID"];

					*/



					$query="INSERT INTO back_log_t (studentID, year, semester, courseID, sectionNum, gradePoint, employeeID)
					VALUES ('$student_id', '$edu_year', '$edu_semester', '$enrolled_course', '$enrolled_section', '$grade_point', '$ID')";
					mysqli_query($con, $query);

					


				}
				fclose($file);
				mysqli_close($con);
				echo "Data uploaded successfully!";
			} else {
				echo "Invalid file!";
			}
		}
	?>



</body>
</html>
