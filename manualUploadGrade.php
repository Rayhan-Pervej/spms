<?php
  include 'connect.php';
?>
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

<!--Google Font-->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="spms.css">
	<title>Student Grade Upload Manual</title>
    <style>

body{
    background-image:url('background.png');
    background-repeat:no-repeat;
    background-attachment:fixed;
    background-size:50% 50%;
    background-position:center;
    background-color:#1c96ca;
}
    form {
  display: inline-flex;
  flex-wrap: wrap;
  margin-top: 20px;

}

label {
  display: inline-block;
  width: 150px;
  text-align: right;
  margin-right: 10px;
  font-weight: bold;
  color:white;
}

input[type="text"] {
  display: inline-block;
  width: 80px;
  margin-bottom: 10px;
  background-color:#4a7678;
  border: 1px solid;
  border-radius:5px;
    font-size: 14px;
    color:white;
    font-weight: bold; 
  
}
input[type="button"] {
  background: #40179f;
  border-radius: 10px;
  border: none;
  outline: none;
  color: #fff;
  font-size: 14px;
  letter-spacing: 2px;
  text-transform: uppercase;
  cursor: pointer;
  font-weight: bold;
  margin-left: 5px;
  height: 36px;
  width: 100px;
}


input[type="button"]:hover {
  background: linear-gradient(90deg, #34166e, #40179f);
}





    
</style>
	
</head>
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


















<form method="post">
  <label for="num_students">How many students' grade do you want to upload?</label>
  <input type="text" id="num_students" name="num_students">
  <br>
  <input  type="button" value="Submit" onclick="createForm()">
</form>






<script>
  function createForm() {
    let numStudents = document.getElementById('num_students').value;

    let form = document.createElement('form');
    form.method = 'POST';

    for (let i = 1; i <= numStudents; i++) {
      let studentDiv = document.createElement('div');
      studentDiv.innerHTML = '<h3>Student ' + i + '</h3>' +
        '<label for="student_id_' + i + '">Student ID:</label>' +
        '<input type="text" id="student_id_' + i + '" name="student_id_' + i + '">' +
        '<label for="edu_semester_' + i + '">Education Semester:</label>' +
        '<input type="text" id="edu_semester_' + i + '" name="edu_semester_' + i + '">' +
        '<label for="edu_year_' + i + '">Education Year:</label>' +
        '<input type="text" id="edu_year_' + i + '" name="edu_year_' + i + '">' +
        '<label for="enrolled_course_' + i + '">Enrolled Course:</label>' +
        '<input type="text" id="enrolled_course_' + i + '" name="enrolled_course_' + i + '">' +
        '<label for="enrolled_section_' + i + '">Enrolled Section:</label>' +
        '<input type="text" id="enrolled_section_' + i + '" name="enrolled_section_' + i + '">' +
        '<label for="grade_point_' + i + '">Grade:</label>' +
        '<input type="text" id="grade_point_' + i + '" name="grade_point_' + i + '"><br>';

      form.appendChild(studentDiv);
    }

    let submitButton = document.createElement('input');
    submitButton.type = 'submit';
    submitButton.name = 'submit2';
    submitButton.value = 'Upload';
    form.appendChild(submitButton);

    document.body.appendChild(form);
  }
</script>

<?php


  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit2'])) {
		//$num_students = intval($_POST['num_students']);
      //$num_students = 3;
      $students = array();
      $sections = array();
        $registrations = array();
        $questions = array();
        $grade_marks = array();

    // loop through the number of students entered and store the data in an array
    for ($i = 1; $i <= 2; $i++) {
      $student_id = $_POST['student_id_' . $i];
      $edu_semester = $_POST['edu_semester_' . $i];
      $edu_year = $_POST['edu_year_' . $i];
      $enrolled_course = $_POST['enrolled_course_' . $i];
      $enrolled_section = $_POST['enrolled_section_' . $i];
      $grade_letter = $_POST['grade_point_' . $i];
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
				mysqli_close($con);
				echo "Data uploaded successfully!";
			} else {
				echo "Invalid file!";
			}
        }
		
	?>



</body>
</html>
