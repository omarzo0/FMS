<?php
session_start();
if (isset($_SESSION["id"])) {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Include the connection file
        require_once __DIR__ . "/connect.php";

        // Fetch data from users table
        $tsql_users = "SELECT Name FROM users";
        $stmt_users = sqlsrv_query($conn, $tsql_users);
        if ($stmt_users === false) {
            die(print_r(sqlsrv_errors(), true)); // Print SQL Server errors
        }

        $instructors = [];
        while ($row = sqlsrv_fetch_array($stmt_users, SQLSRV_FETCH_ASSOC)) {
            $instructors[] = $row;
        }

        sqlsrv_free_stmt($stmt_users);

        // Fetch data from Course_file_Checklist table
        $tsql_courses = "SELECT Course_id, Course_name FROM Course_file_Checklist";
        $stmt_courses = sqlsrv_query($conn, $tsql_courses);
        if ($stmt_courses === false) {
            die(print_r(sqlsrv_errors(), true)); // Print SQL Server errors
        }

        $courses = [];
        while ($row = sqlsrv_fetch_array($stmt_courses, SQLSRV_FETCH_ASSOC)) {
            $courses[] = $row;
        }

        sqlsrv_free_stmt($stmt_courses);
        sqlsrv_close($conn);

        // Render the form with fetched data
        include 'removeinstructor_form.php'; // Create a separate PHP file for the form
    } 
} else {
    echo "Unauthorized access.";
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
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="shortcut icon" type="x-icon" href="../img/ImageHandler (1).png" />

    <title>Admin</title>
  </head>

  <body>
  <?php include'footer.php';?>
    <!-- main body section -->
    <div class="main-body">
      <div class="header">
        <h2>Course Report Checklist</h2>
      </div>
      <label for="dog-names">Choose Instructor Name</label>
      <select name="dog-names" id="dog-names">
      <option value="">Instructor Name</option>
        <?php
        $conn = require __DIR__ . "/connect.php";
        // Prepare and execute the database query
        $tsql = "SELECT Username, Instructor_id FROM Users ORDER BY UserID ASC";
        $results = sqlsrv_query($conn, $tsql);

        if ($results && sqlsrv_has_rows($results) > 0) {
            // Loop through the rows to generate options
            while ($row = sqlsrv_fetch_array($results)) {
                $name = $row['Username'];
                $Instructor_id = $row['Instructor_id'];
                echo "<option value=\"\">$name $Instructor_id</option>";
            }
        } else {
            echo "<option value=\"\">No Instructors Yet</option>";
        }

        // Close the database connection
        sqlsrv_close($conn);
        ?>
    </select>
      <label for="dog-names">Choose Course Name</label>
      
      <select name="dog-names" id="dog-names">
      <option value="">Course Name</option>
        <?php
        $conn = require __DIR__ . "/connect.php";
        // Prepare and execute the database query
        $tsql = "SELECT CourseTitle FROM Course_file_Checklist";
        $results = sqlsrv_query($conn, $tsql);

        if ($results && sqlsrv_has_rows($results) > 0) {
            // Loop through the rows to generate options
            while ($row = sqlsrv_fetch_array($results)) {
                $CourseTitle = $row['CourseTitle'];
                echo "<option value=\"\">$CourseTitle</option>";
            }
        } else {
            echo "<option value=\"\">No Instructors Yet</option>";
        }

        // Close the database connection
        sqlsrv_close($conn);
        ?>
    </select>

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
            <th></th>
          </tr>
          <tr>
            <th scope="row">Code</th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">Specialty</th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">Number of contact hours/week</th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">Number of credit hours</th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">Topics actually taught</th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">Student assessment</th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">Administrative constraints</th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">Results of students feedback on the course</th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">Proposals for course improvements</th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">Comments of external reviewers</th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">
              Progress on actions identified in the previous year’s action plan
            </th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">Improvements that were not implemented</th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">Action plan</th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">Course Director</th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">Signature:</th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">Date of approval</th>
            <th></th>
          </tr>
        </tbody>
      </table>
      <div class="input-field">
        <input type="submit" class="submit" value="print" />
      </div>
    </div>
    <!-- Vertical navbar section  -->
    
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
          window.location.href = "/index.html";
        }
      });
    }
  </script>
</html>
