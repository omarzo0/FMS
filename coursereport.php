<?php
// Include the connection file
require_once __DIR__ . "/connect.php";
session_start(); // Ensure the session is started

// Assessment methods array
$methods = ["Homework", "Lab Report", "Quiz", "Mid-term Exam", "Practical/Clinical Final", "Final Written Exam", "Oral Exam", "Total"];
$instructor_id = $_SESSION["id"];
$tsql = "SELECT Faculty, Department, Division FROM users WHERE Instructor_id = ?";
$params = array($instructor_id);
$stmt = sqlsrv_query($conn, $tsql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true)); // Print SQL Server errors
}

if (sqlsrv_has_rows($stmt)) {
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    if ($row !== null) { // Ensure $row is not null
        $Faculty = $row['Faculty'];
        $Department = $row['Department'];
        $Division = $row['Division'];
    }
} else {
    // Handle the case where no rows are returned
    echo "No rows found.";
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Extract form data
    $marks = $_POST['marks'];
    $assessments = $_POST['assessment'];
    $schedules = $_POST['schedule'];
    $ilos = $_POST['ilos'];
    $courseTitle = $_POST['course_title'];
    // Extracting data from the form
$resource_categories = ["References", "Teaching Aids" , "Equipment & materials"];
$totally_adequate = $_POST['TotallyAdequate'];
$adequate_to_some_extent = $_POST['AdequateToSomeExtent'];
$inadequate = $_POST['Inadequate'];
        
$enrolled_students = $_POST['enrolled_students'];
$completing_students_male = $_POST['completing_students_male'];
$passed_students_male = $_POST['passed_students_male'];
$failed_students_male = $_POST['failed_students_male'];
$excellent_students_male = $_POST['excellent_students_male'];
$excellent_students_female = $_POST['excellent_students_female'];
$very_good_students_male = $_POST['very_good_students_male'];
$very_good_students_female = $_POST['very_good_students_female'];
$good_students_male = $_POST['good_students_male'];
$good_students_female = $_POST['good_students_female'];
$pass_students_male = $_POST['pass_students_male'];
$pass_students_female = $_POST['pass_students_female'];
$topics_taught = $_POST['topics_taught'];
$learning_hours = $_POST['learning_hours'];
$teaching_instructor = $_POST['teaching_instructor'];
$topics_taught_percentage = $_POST['topics_taught_percentage'];
$reasons_for_not_teaching_any_topic = $_POST['Reasons_for_not_teaching_any_topic'];
$reasons_for_teaching_topics_not_planned = $_POST['Reasons_for_teaching_topics_not_planned'];
$difficulties_encountered = $_POST['admin_constraints'];
$main_points_feedback = $_POST['student_feedback'];
$response_of_course_team = $_POST['course_team_response'];
$comments_from_external_evaluators = $_POST['external_evaluator_comments'];

// Extracting data from the form
$completed = isset($_POST['actions_completed']) ? 1 : 0;
$not_completed = isset($_POST['actions_not_completed']) ? 1 : 0;
$reasons_for_non_completion = $_POST['reasons_non_completion'];

$programTitle = $_POST['course_program'];
$level = $_POST['level'];
$creditHoursPerWeek = $_POST['credit_hours'];
$instructor = $_POST['instructor'];
$courseDirector = $_POST['course_director'];
$externalEvaluator = $_POST['external_evaluator'];
// Prepare the SQL query
$sql = "INSERT INTO Course_basic_Information (Faculty, Department, Division, CourseTitle, ProgramTitle, Level, CreditHoursPerWeek, Instructor, CourseDirector, ExternalEvaluator) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Bind parameters
$params = array($Faculty, $Department, $Division, $courseTitle, $programTitle, $level, $creditHoursPerWeek, $instructor, $courseDirector, $externalEvaluator);

$stmt = sqlsrv_prepare($conn, $sql, $params);
if (!$stmt) {
    echo "Error in preparing SQL statement: " . print_r(sqlsrv_errors(), true);
} else {
    if (sqlsrv_execute($stmt)) {
    } else {
        echo "Error: " . $sql . "<br>" . print_r(sqlsrv_errors(), true);
    }
}

    // Prepare the SQL query

    // Loop through the data and insert each row
    for ($i = 0; $i < count($methods); $i++) {
        // Bind parameters
        $params = [
            $methods[$i],
            $marks[$i],
            $assessments[$i],
            $schedules[$i],
            $ilos[$i]
        ];
        $tsql = "INSERT INTO AssessmentPlan (AssessmentMethod, Marks, WeightOfAssessment, AssessmentSchedule, ILOsCovered) VALUES (?, ?, ?, ?, ?)";

        // Execute the query
        $stmt = sqlsrv_query($conn, $tsql, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true)); // Print SQL Server errors
        }

        // Free the statement resource
        sqlsrv_free_stmt($stmt);
    }

    

// Prepare and execute the SQL statement within a loop to insert each row
for ($i = 0; $i < count($resource_categories); $i++) {
  $category = $resource_categories[$i];
  $totally_adequate_value = $totally_adequate[$i];
  $adequate_to_some_extent_value = $adequate_to_some_extent[$i];
  $inadequate_value = $inadequate[$i];

  // Prepare the SQL statement
  $sql = "INSERT INTO FacilitiesAndMaterials (ResourceCategory, TotallyAdequate, AdequateToSomeExtent, Inadequate) 
          VALUES (?, ?, ?, ?)";
  
  // Bind parameters
  $params = array($category, $totally_adequate_value, $adequate_to_some_extent_value, $inadequate_value);

  // Execute the query
  $stmt = sqlsrv_query($conn, $sql, $params);

  if ($stmt === false) {
      // Error handling
      die(print_r(sqlsrv_errors(), true)); // Print SQL Server errors
  } else {
  }
}

// Prepare and execute the SQL statement
$sql = "INSERT INTO course_statistical_informatiobn 
        (NOM_of_student_enrolled_in_the_course, NO_of_student_completing_in_the_course, 
        Passed, Failed, Excellent, VeryGood, Good, Pass) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$params = array($enrolled_students, $completing_students_male, 
                $passed_students_male, $failed_students_male, 
                $excellent_students_male, $very_good_students_male, 
                $good_students_male, $pass_students_male);

$stmt = sqlsrv_prepare($conn, $sql, $params);
if (!$stmt) {
    echo "Error in preparing SQL statement: " . print_r(sqlsrv_errors(), true);
} else {
    if (sqlsrv_execute($stmt)) {
    } else {
        echo "Error: " . $sql . "<br>" . print_r(sqlsrv_errors(), true);
    }
}

// Prepare and execute the SQL statement
$sql = "INSERT INTO Course_Teaching 
        (Topics_taught, Topics_taught_No_of_learning_hours_Instructor, Instructor, 
        Topics_Taught_Percentage, Reasons_for_not_teaching_any_topic, 
        Reasons_for_teaching_topics_not_planned_for_in_the_course_specification) 
        VALUES (?, ?, ?, ?, ?, ?)";

$params = array($topics_taught, $learning_hours, $teaching_instructor, 
                $topics_taught_percentage, $reasons_for_not_teaching_any_topic, 
                $reasons_for_teaching_topics_not_planned);

$stmt = sqlsrv_prepare($conn, $sql, $params);
if (!$stmt) {
    echo "Error in preparing SQL statement: " . print_r(sqlsrv_errors(), true);
} else {
    if (sqlsrv_execute($stmt)) {
    } else {
        echo "Error: " . $sql . "<br>" . print_r(sqlsrv_errors(), true);
    }
}

// Prepare and execute the SQL statement
$sql = "INSERT INTO StudentEvaluation 
        (DifficultiesEncountered, MainPointsFeedback, ResponseOfCourseTeam, Comments, ResponseOfCourseTeam_comments) 
        VALUES (?, ?, ?, ?, ?)";

$params = array($difficulties_encountered, $main_points_feedback, $response_of_course_team, 
                $comments_from_external_evaluators, $response_of_course_team);

$stmt = sqlsrv_prepare($conn, $sql, $params);
if (!$stmt) {
    echo "Error in preparing SQL statement: " . print_r(sqlsrv_errors(), true);
} else {
    if (sqlsrv_execute($stmt)) {
    } else {
        echo "Error: " . $sql . "<br>" . print_r(sqlsrv_errors(), true);
    }
}

// Prepare and execute the SQL statement
$sql = "INSERT INTO CourseEnhancement 
        (Completed, NotCompleted, ReasonsForNonCompletion) 
        VALUES (?, ?, ?)";

$params = array($completed, $not_completed, $reasons_for_non_completion);

$stmt = sqlsrv_prepare($conn, $sql, $params);
if (!$stmt) {
    echo "Error in preparing SQL statement: " . print_r(sqlsrv_errors(), true);
} else {
    if (sqlsrv_execute($stmt)) {
    } else {
        echo "Error: " . $sql . "<br>" . print_r(sqlsrv_errors(), true);
    }
}

$action_required = $_POST['action_required'];
$responsibility = $_POST['responsibility'];
$completion_date = $_POST['completion_date'];
$course_director_name = $_POST['course_director_name'];
$head_department_name = $_POST['head_department_name'];
$date_approval = $_POST['date_approval'];
$signature = $_POST['signature'];

$sql = "INSERT INTO CourseActionPlan 
        (ActionsRequired, Responsibility, CompletionDate, Course_Director, Head_of_Department, Date_of_Approval, Signaturee) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$params = array($action_required, $responsibility, $completion_date, $course_director_name, $head_department_name, $date_approval, $signature);

$stmt = sqlsrv_prepare($conn, $sql, $params);
if ($stmt) {
    if (sqlsrv_execute($stmt)) {
    } else {
        echo "Error executing statement: " . print_r(sqlsrv_errors(), true);
    }
} else {
    echo "Error preparing statement: " . print_r(sqlsrv_errors(), true);
}
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />

    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Oleo+Script&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="shortcut icon" type="x-icon" href="img/ImageHandler (1).png" />

    <title>teaching-stuff</title>
  </head>

  <body>
    <!-- main body section -->
    <div class="main-body">
      <div class="header">
        <h2>Course Report</h2>
      </div>
      <div class="dropdown">
        <ul class="menu">
          <li>
            <div class="dropdown-header">
              <a href="#">
                <span class="dropdown-text">select year</span>
              </a>
              <i class="bx bxs-chevron-down arrow"></i>
            </div>
            <ul class="sub-menu" id="teaching-dropdown">
              <!-- Dropdown options will be added dynamically here -->
            </ul>
          </li>
        </ul>
      </div>

      <table>
        <thead>
          <tr>
            <th scope="col">Faculty</th>
            <th><?php echo $Faculty; ?></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Department</th>
            <th><?php echo $Department; ?></th>
          </tr>
          <tr>
            <th scope="row">Division</th>
            <th><?php echo $Division; ?></th>
          </tr>
        </tbody>
      </table>
      <div class="header1">
        <h2>A- basic information</h2>
      </div>
      <form method="post">
    <table>
        <thead>
            <tr></tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">Course Title:</th>
                <th><input type='text' id='course-title' name='course_title' required></th>
            </tr>
            <tr>
                <th scope="row">Course ID:</th>
                <th><input type='text' id='course-title' name='CourseID' required></th>
            </tr>
            <tr>
                <th scope="row">Program Title:</th>
                <th><input type='text' id='program-title' name='course_program' required></th>
            </tr>
            <tr>
                <th scope="row">Level</th>
                <th><input type='text' id='level' name='level' required></th>
            </tr>
            <tr>
                <th scope="row">Credit hours(Hours/Week)</th>
                <th><input type='text' id='credit-hours' name='credit_hours' required></th>
            </tr>
            <tr>
                <th scope="row">Instructor</th>
                <th><input type='text' id='instructor' name='instructor' required></th>
            </tr>
            <tr>
                <th scope="row">Course Director</th>
                <th><input type='text' id='course-director' name='course_director' required></th>
            </tr>
            <tr>
                <th scope="row">External Evaluator</th>
                <th><input type='text' id='external-evaluator' name='external_evaluator' required></th>
            </tr>
        </tbody>
    </table>
      </table>
      <div class="header1">
        <h2>B- Statistical Information</h2>
      </div>
      <table>
        <thead>
            <tr></tr>
        </thead>
        <tbody>
        <tr>
                <th scope="row">NO. of student enrolled in the course:</th>
                <th><input type='text' id='enrolled_students' name='enrolled_students' required></th>
            </tr>
            <tr>
                <th scope="row">NO. of student completing in the course:</th>
                <th><input type='text' id='completing_students_male' name='completing_students_male' required oninput="calculatePassedPercentage()"></th>
            </tr>
            <tr>
                <td>results</td>
            </tr>
            <tr>
            <th scope="row">passed</th>
            <th><input type='text' id='passed_students_male' name='passed_students_male' required oninput="calculatePassedPercentage()"></th>
            <th><input type='text' id='passed_students_female' name='passed_students_female' required readonly></th>
            <th scope="row">Failed</th>
            <th><input type='text' id='failed_students_male' name='failed_students_male' required readonly></th>
            <th><input type='text' id='failed_students_female' name='failed_students_female' required readonly></th>
        </tr>
            <tr>
                <td>Grading of students</td>
            </tr>
            <tr>
                <th scope="row">Excellent</th>
                <th><input type='text' id='excellent-students-male' name='excellent_students_male' required></th>
                <th><input type='text' id='excellent-students-female' name='excellent_students_female' required></th>
                <th scope="row">Very Good:</th>
                <th><input type='text' id='very-good-students-male' name='very_good_students_male' required></th>
                <th><input type='text' id='very-good-students-female' name='very_good_students_female' required></th>
            </tr>
            <tr>
                <th scope="row">Good</th>
                <th><input type='text' id='good-students-male' name='good_students_male' required></th>
                <th><input type='text' id='good-students-female' name='good_students_female' required></th>
                <th scope="row">Pass</th>
                <th><input type='text' id='pass-students-male' name='pass_students_male' required></th>
                <th><input type='text' id='pass-students-female' name='pass_students_female' required></th>
            </tr>
        </tbody>
    </table>

      <div class="header1">
        <h2>C- Professional Information:</h2>
        <span>1- Course Teaching</span>
      </div>
      <table>
        <thead>
            <tr></tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">Topics taught</th>
                <th>No. of learning hours</th>
                <th>Instructor</th>
            </tr>
            <tr>
                <th><input type='text' id='topics-taught' name='topics_taught' required></th>
                <th><input type='text' id='learning-hours' name='learning_hours' required></th>
                <th><input type='text' id='teaching-instructor' name='teaching_instructor' required></th>
            </tr>
        </tbody>
      </table>
      <fieldset>
        <legend>Topics taught as a percentage of the content specified:</legend>

        <div>
          <input type="checkbox" id="scales" name="topics_taught_percentage" checked value = ">90%"/>
          <label for="scales">> 90% </label>
        </div>

        <div>
          <input type="checkbox" id="horns" name="topics_taught_percentage" value = "> 70% - 90%"/>
          <label for="horns">> 70 - 90% </label>
        </div>
        <div>
          <input type="checkbox" id="horns" name="topics_taught_percentage" value = "> 70%"/>
          <label for="horns">> 70% </label>
        </div>
      </fieldset>
      <div>
        <label for="name">- Reasons for not teaching any topic (if any):</label>

        <input type="text" id="name" name="Reasons_for_not_teaching_any_topic" required size="10" />
      </div>
      <div>
        <label for="name"
          >-Reasons for teaching topics not planned for in the course
          specification (if any):
        </label>

        <input type="text" id="name" name="Reasons_for_teaching_topics_not_planned" required size="10" />
      </div>
      <span> 2. Teaching and Learning Methods:</span>
      <table>
        <tbody>
            <tr>
                <th scope="row">Method</th>
                <th>ILOs covered</th>
            </tr>
            <tr>
                <th scope="row">Traditional Lectures</th>
                <th><input type='text' id='traditional-lectures' name='traditional_lectures_ilos' required></th>
            </tr>
            <tr>
                <th scope="row">Blended</th>
                <th><input type='text' id='blended' name='blended_ilos' required></th>
            </tr>
            <tr>
                <th scope="row">e-learning</th>
                <th><input type='text' id='e-learning' name='e_learning_ilos' required></th>
            </tr>
            <tr>
                <th scope="row">Distance learning</th>
                <th><input type='text' id='distance-learning' name='distance_learning_ilos' required></th>
            </tr>
            <tr>
                <th scope="row">Practical Training</th>
                <th><input type='text' id='practical-training' name='practical_training_ilos' required></th>
            </tr>
            <tr>
                <th scope="row">Clinical Training</th>
                <th><input type='text' id='clinical-training' name='clinical_training_ilos' required></th>
            </tr>
            <tr>
                <th scope="row">Others (please mention other teaching and learning methods used):</th>
                <th><input type='text' id='other-methods' name='other_methods_ilos' required></th>
            </tr>
        </tbody>
    </table>
      <span> 3- Student Assessment:</span>
      <br />
      <span> a- Methods of Assessment </span>
      <form method="POST">
    <table>
        <tbody>
            <tr>
                <th scope="row">Assessment Method</th>
                <th>Marks</th>
                <th>Weight of Assessment</th>
                <th>Assessment Schedule</th>
                <th>ILOs covered</th>
            </tr>
            <tr>
                <th scope="row" name="Method">Homework</th>
                <th><input type='text' name='marks[]' required></th>
                <th><input type='text' name='assessment[]' required></th>
                <th><input type='text' name='schedule[]' required></th>
                <th><input type='text' name='ilos[]' required></th>
            </tr>
            <tr>
                <th scope="row" name="Method">Lab Report</th>
                <th><input type='text' name='marks[]' required></th>
                <th><input type='text' name='assessment[]' required></th>
                <th><input type='text' name='schedule[]' required></th>
                <th><input type='text' name='ilos[]' required></th>
            </tr>
            <tr>
                <th scope="row" name="Method">Quiz</th>
                <th><input type='text' name='marks[]' required></th>
                <th><input type='text' name='assessment[]' required></th>
                <th><input type='text' name='schedule[]' required></th>
                <th><input type='text' name='ilos[]' required></th>
            </tr>
            <tr>
                <th scope="row" name="Method">Mid-term Exam</th>
                <th><input type='text' name='marks[]' required></th>
                <th><input type='text' name='assessment[]' required></th>
                <th><input type='text' name='schedule[]' required></th>
                <th><input type='text' name='ilos[]' required></th>
            </tr>
            <tr>
                <th scope="row" name="Method">Practical/Clinical Final</th>
                <th><input type='text' name='marks[]' required></th>
                <th><input type='text' name='assessment[]' required></th>
                <th><input type='text' name='schedule[]' required></th>
                <th><input type='text' name='ilos[]' required></th>
            </tr>
            <tr>
                <th scope="row" name="Method">Final Written Exam</th>
                <th><input type='text' name='marks[]' required></th>
                <th><input type='text' name='assessment[]' required></th>
                <th><input type='text' name='schedule[]' required></th>
                <th><input type='text' name='ilos[]' required></th>
            </tr>
            <tr>
                <th scope="row" name="Method">Oral Exam</th>
                <th><input type='text' name='marks[]' required></th>
                <th><input type='text' name='assessment[]' required></th>
                <th><input type='text' name='schedule[]' required></th>
                <th><input type='text' name='ilos[]' required></th>
            </tr>
            <tr>
                <th scope="row" name="Method">Total</th>
                <th><input type='text' name='marks[]' required></th>
                <th><input type='text' name='assessment[]' required></th>
                <th><input type='text' name='schedule[]' required></th>
                <th><input type='text' name='ilos[]' required></th>
            </tr>
        </tbody>
    </table>

      <table>
        <tbody>
          <tr>
            <th>Members of Examination committee</th>
          </tr>
          <tr>
            <th>omar khaled</th>
          </tr>
          <tr>
            <th>mohamed yasser</th>
          </tr>
        </tbody>
      </table>
      <span>4- Facilities and Teaching Materials:</span>
      <table>
        <tbody>
          <tr>
            <th>Teaching resources</th>
            <th>Totally adequate</th>
            <th>Adequate to some extent</th>
            <th>Inadequate</th>
          </tr>
          <tr>
            <th scope="row" name="ResourceCategory">a.References</th>
            <th><input type='text' id='last-name' name='TotallyAdequate[]' required></th>
            <th><input type='text' id='last-name' name='AdequateToSomeExtent[]' required></th>
            <th><input type='text' id='last-name' name='Inadequate[]' required></th>
          </tr>
          <tr>
            <th scope="row" name="ResourceCategory">b.Teaching Aids</th>
            <th><input type='text' id='last-name' name='TotallyAdequate[]' required></th>
            <th><input type='text' id='last-name' name='AdequateToSomeExtent[]' required></th>
            <th><input type='text' id='last-name' name='Inadequate[]' required></th>
          </tr>
          <tr>
            <th scope="row" name="ResourceCategory">c. Equipment & materials</th>
            <th><input type='text' id='last-name' name='TotallyAdequate[]' required></th>
            <th><input type='text' id='last-name' name='AdequateToSomeExtent[]' required></th>
            <th><input type='text' id='last-name' name='Inadequate[]' required></th>
          </tr>
        </tbody>
      </table>
      <span>5- Administrative constraints</span>
    <div>
        <label for="admin-constraints">-List any difficulties encountered:</label>
        <input type="text" id="admin-constraints" name="admin_constraints" required size="10" />
    </div>
    <span>6- Student Evaluation of the course:</span>
    <div>
        <label for="student-feedback">List the main points in students’ feedback:</label>
        <input type="text" id="student-feedback" name="student_feedback" required size="10" />
    </div>
    <div>
        <label for="course-team-response">Response of Course Team:</label>
        <input type="text" id="course-team-response" name="course_team_response" required size="10" />
    </div>
    <span>7- Comments from external evaluator(s):</span>
    <div>
        <label for="external-evaluator-comments">Comments:</label>
        <input type="text" id="external-evaluator-comments" name="external_evaluator_comments" required size="10" />
    </div>
    <div>
        <label for="course-team-response-evaluator">Response of Course Team:</label>
        <input type="text" id="course-team-response-evaluator" name="course_team_response_evaluator" required size="10" />
    </div>
    <span>8- Course Enhancement:</span>
    <table>
        <tbody>
            <tr>
                <th colspan = "3">a. Progress achieved over the last year:</th>
                
            </tr>
            <tr>
                <th>Actions required in the previous year’s action plan</th>
                <td>Completed</td>
                <td>Not completed</td>
          </tr>
          <tr>
          <th><input type="text" id="actions-completed" name="actions_completed"></th>
                <th><input type="checkbox" id="actions-completed" name="actions_completed"></th>
                <th><input type="checkbox" id="actions-not-completed" name="actions_not_completed"></th>
            </tr>
            <tr>
              
                <td>b. Reasons for non-completion (if any):</td>
            </tr>
            <tr>
                <td><input type="text" id="reasons-non-completion" name="reasons_non_completion" required size="10" /></td>
            </tr>
        </tbody>
    </table>
      <span>9- Action plan for academic year
        <span>(insert next academic year)</span>
      </span>
      <table>
        <tbody>
            <tr>
                <th>Actions Required</th>
                <th>Responsibility</th>
                <th>Completion Date</th>
            </tr>
            <tr>
                <th><input type='text' id='action-required' name='action_required' required></th>
                <th><input type='text' id='responsibility' name='responsibility' required></th>
                <th><input type='date' id='completion-date' name='completion_date' required></th>
            </tr>
        </tbody>
    </table>
    <div>
        <label for="course-director">Course Director:</label>
        <input type="text" id="course-director-name" name="course_director_name" required size="10" />
    </div>
    <div>
        <label for="head-department">Head of Department:</label>
        <input type="text" id="head-department-name" name="head_department_name" required size="10" />
    </div>
    <div>
        <label for="date-approval">Date of Approval:</label>
        <input type="date" id="date-approval" name="date_approval" required size="10" />
    </div>
    <div>
        <label for="signature">Signature:</label>
        <input type="text" id="signature" name="signature" required size="10" />
    </div>
    <div class="input-field">
        <input type="submit" class="submit" value="Submit" />
    </div>
</form>

<section class="nav-bar">
      <div class="menu-toggle">
        <div class="hamburger">
          <span></span>
        </div>
      </div>
      <div class="sidebar close">
        <div class="logo-details">
          <span class="logo_name"
            ><img
              src="img/GU-Logo-Monochrome-White-1-300x97.png"
              width="150px"
              alt=""
          /></span>
        </div>
        <?php include 'footer.php'?>
      </div>
    </section>
  </body>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"
  ></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
      arrow[i].addEventListener("click", (e) => {
        let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
        arrowParent.classList.toggle("showMenu");
      });
    }
    const menu_toggle = document.querySelector(".menu-toggle");
    const sidebar = document.querySelector(".sidebar");

    menu_toggle.addEventListener("click", () => {
      menu_toggle.classList.toggle("is-active");
      sidebar.classList.toggle("is-active");
    });

    function showConfirmation() {
      Swal.fire({
        title: "Sign out?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
      }).then((result) => {
        if (result.isConfirmed) {
          // Submit the form
          window.location.href = "index.html";
        }
      });
    }

    function calculatePassedPercentage() {
        // Get the input values
        let completingStudentsMale = parseInt(document.getElementById('completing_students_male').value);
        let passedStudentsMale = parseInt(document.getElementById('passed_students_male').value);

        // Calculate the number of failed male students
        let failedStudentsMale = completingStudentsMale - passedStudentsMale;

        // Set the number of failed male students
        document.getElementById('failed_students_male').value = failedStudentsMale;

        // Calculate the percentage of passed female students
        let completedPercentage = (passedStudentsMale / completingStudentsMale) * 100;
        let passedStudentsFemalePercentage = completedPercentage.toFixed(2);
        document.getElementById('passed_students_female').value = passedStudentsFemalePercentage + '%';

        // Calculate the percentage of failed female students
        let failedStudentsFemalePercentage = (100 - completedPercentage).toFixed(2);
        document.getElementById('failed_students_female').value = failedStudentsFemalePercentage + '%';
    }
</script>
</html>
