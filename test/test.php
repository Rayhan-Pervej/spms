<!DOCTYPE html>
<html>
<head>
	<title>Student Form</title>
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
input[type="submit"] {
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

input[type="submit"]:hover {
  background: linear-gradient(90deg, #34166e, #40179f);
}



    
</style>
	
</head>
<body>

<form method="post">
  <label for="num_students">How many students' grades do you want to upload?</label>
  <input type="text" id="num_students" name="num_students">
  <br>
  <input type="submit" name="submit_button" value="Submit">
</form>



    <?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit_button'])) {
        $num_students = $_POST['num_students'];

        // loop through the number of students entered and create the form inputs
        for ($i = 1; $i <= $num_students; $i++) {
          echo '<h3>Student ' . $i . '</h3>';
      
          echo '<label for="student_id_' . $i . '">Student ID:</label>';
          echo '<input type="text" id="student_id_' . $i . '" name="student_id_' . $i . '">';
      
          echo '<label for="edu_semester_' . $i . '">Education Semester:</label>';
          echo '<input type="text" id="edu_semester_' . $i . '" name="edu_semester_' . $i . '">';
      
          echo '<label for="edu_year_' . $i . '">Education Year:</label>';
          echo '<input type="text" id="edu_year_' . $i . '" name="edu_year_' . $i . '">';
      
          echo '<label for="enrolled_course_' . $i . '">Enrolled Course:</label>';
          echo '<input type="text" id="enrolled_course_' . $i . '" name="enrolled_course_' . $i . '">';
      
          echo '<label for="enrolled_section_' . $i . '">Enrolled Section:</label>';
          echo '<input type="text" id="enrolled_section_' . $i . '" name="enrolled_section_' . $i . '">';
      
          echo '<label for="grade_point_' . $i . '">Grade Point:</label>';
          echo '<input type="text" id="grade_point_' . $i . '" name="grade_point_' . $i . '">';
        }
      
        echo '<br><input type="submit" name="upload_grades_button" value="Submit">
        ';
    }
  }

?>








<?php
		if(isset($_POST["upload_grades_button"])) {
			$num_students = $_POST['num_students'];
    $students = array();

    // loop through the number of students entered and store the data in an array
    for ($i = 1; $i <= $num_students; $i++) {
      $student_id = $_POST['student_id_' . $i];
      $edu_semester = $_POST['edu_semester_' . $i];
      $edu_year = $_POST['edu_year_' . $i];
      $enrolled_course = $_POST['enrolled_course_' . $i];
      $enrolled_section = $_POST['enrolled_section_' . $i];
      $grade_point = $_POST['grade_point_' . $i];
					
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
						$exam_name = $enrolled_course . "FinalSummer2021";
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
					

					


				}
				fclose($file);
				mysqli_close($con);
				echo "Data uploaded successfully!";
			} 
		
	?>



</body>
</html>
