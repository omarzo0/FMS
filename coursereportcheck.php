<?php
session_start();

if (isset($_SESSION["id"])) {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Include the connection file
        require_once __DIR__ . "/connect.php";

        $courseTitle = $_POST['course_title'];
        $courseCode = $_POST['course_code'];
        $specialty = $_POST['specialty'];
        $contactHours = $_POST['contact_hours'];
        $creditHours = $_POST['credit_hours'];
        $topicsTaught = $_POST['topics_taught'];
        $assessment = $_POST['assessment'];
        $constraints = $_POST['constraints'];
        $feedback = $_POST['feedback'];
        $proposal = $_POST['proposal'];
        $external = $_POST['external'];
        $progress = $_POST['progress'];
        $improvements = $_POST['improvements'];
        $actionPlan = $_POST['action_plan'];
        $director = $_POST['director'];
        $signature = $_POST['signature'];
        $dateOfApproval = $_POST['date_of_approval'];

        // Prepare the SQL query
        $tsql = "INSERT INTO Course_file_Checklist (CourseTitle, CourseCode, Specialty, ContactHoursPerWeek, CreditHours, TopicsTaught, StudentAssessmentAvailable, AdministrativeConstraints, StudentsFeedback, CourseImprovementProposals, ExternalReviewersComments, Previous_Years_Progress, Unimplemented_Improvements, ActionPlanForNextYear, CourseDirector, Signaturee, ApprovalDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Bind parameters
        $params = array(
            $courseTitle, $courseCode, $specialty, $contactHours, $creditHours, $topicsTaught, $assessment, $constraints, $feedback, $proposal, $external, $progress, $improvements, $actionPlan, $director, $signature, $dateOfApproval
        );

        // Execute the query
        $stmt = sqlsrv_query($conn, $tsql, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true)); // Print SQL Server errors
        } else {
            header('Location: coursereportcheck.php');
            exit();
        }

        sqlsrv_free_stmt($stmt);
        sqlsrv_close($conn);
    }
} else {
    header('Location: index.php');
    exit();
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
        <h2>Course Report Checklist</h2>
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
      <form method = "post">
        <table>
          <thead>
            <tr>
              <th scope="col">Items</th>
              <th scope="col">Check</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Course Title</th>
              <td><input type='text' id='last-name' name='course_title' required></td>
            </tr>
            <tr>
              <th scope="row">Course Code</th>
              <td><input type='text' id='last-name' name='course_code' required></td>
            </tr>
            <tr>
              <th scope="row">Specialty</th>
              <td><input type='text' id='last-name' name='specialty' required></td>
            </tr>
            <tr>
              <th scope="row">Number of contact hours/week</th>
              <td><input type='text' id='last-name' name='contact_hours' required></td>
            </tr>
            <tr>
              <th scope="row">Number of credit hours</th>
              <td><input type='text' id='last-name' name='credit_hours' required></td>
            </tr>
            <tr>
              <th scope="row">Topics actually taught</th>
              <td><input type='text' id='last-name' name='topics_taught' required></td>
            </tr>
            <tr>
              <th scope="row">Student assessment</th>
              <td><input type='text' id='last-name' name='assessment' required></td>
            </tr>
            <tr>
              <th scope="row">Administrative constraints</th>
              <td><input type='text' id='last-name' name='constraints' required></td>
            </tr>
            <tr>
              <th scope="row">Results of students feedback on the course</th>
              <td><input type='text' id='last-name' name='feedback' required></td>
            </tr>
            <tr>
              <th scope="row">Proposals for course improvements</th>
              <td><input type='text' id='last-name' name='proposal' required></td>
            </tr>
            <tr>
              <th scope="row">Comments of external reviewers</th>
              <td><input type='text' id='last-name' name='external' required></td>
            </tr>
            <tr>
              <th scope="row">
                Progress on actions identified in the previous year’s action plan
              </th>
              <td><input type='text' id='last-name' name='progress' required></td>
            </tr>
            <tr>
              <th scope="row">Improvements that were not implemented</th>
              <td><input type='text' id='last-name' name='improvements' required></td>
            </tr>
            <tr>
              <th scope="row">Action plan</th>
              <td><input type="text" id="action_plan" name="action_plan" required></td>
            </tr>
            <tr>
              <th scope="row">Course Director</th>
              <td><input type='text' id='last-name' name='director' required></td>
            </tr>
            <tr>
              <th scope="row">Signature:</th>
              <td><input type='text' id='last-name' name='signature' required></td>
            </tr>
            <tr>
              <th scope="row">Date of approval</th>
              <td><input type='date' id='birth-date-input' name='date_of_approval' placeholder='mm/dd/yyyy' pattern='\d{2}/\d{2}/\d{4}' title='Please enter a date in mm/dd/yyyy format' required></td>
            </tr>
          </tbody>
        </table>
        <div class="input-field">
          <input type="submit" class="submit" value="Submit" name = "submit" />
        </div>
      </div>
  </from>
    <!-- Vertical navbar section  -->
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
  </script>
</html>
