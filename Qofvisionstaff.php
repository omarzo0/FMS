<?php
session_start();

if (isset($_SESSION['id'])) {
    require_once __DIR__ . "/connect.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        if ($conn) {
            $instructor_id = $_SESSION["id"];

            // Get form data
            $name = isset($_POST['name']) ? $_POST['name'] : null;
            $position = isset($_POST['position']) ? $_POST['position'] : null;
            $statement = isset($_POST['statement']) ? $_POST['statement'] : null;
            $response = isset($_POST['response']) ? $_POST['response'] : null;
            $comments = isset($_POST['comments']) ? $_POST['comments'] : null;

            // Check that required fields are not null
            if ($name && $position && $statement && $response) {
                // Insert data into database
                $sql = "INSERT INTO questionnaire_student (name, instructor_id, position, statement, response, comments, submission_date)
                        VALUES (?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)";
                $params = array($name, $instructor_id, $position, $statement, $response, $comments);

                $stmt = sqlsrv_query($conn, $sql, $params);

                if ($stmt) {
                } else {
                    echo "Error: " . print_r(sqlsrv_errors(), true);
                }

            } else {
                echo "All fields are required except comments.";
            }
        } else {
            echo "Database connection error.";
        }
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
        <h2>
          Questionnaire on the Vision & Mission Statements for Galala University
          and our Field/Program Mission
        </h2>
        <div>
          <h3>Dear Drs.</h3>
          <span
            >The following are the vision and mission statements for both GU and
            our field/program. Kindly check in the table accordingly. Your
            contribution is highly appreciated.
          </span>
          <h3>Vision Of GU</h3>
          <span
            >An internationally recognized and excellent innovative learning and
            research community committed to making the world a better
            place.</span
          >
          <h3>Mission of GU</h3>
          <span
            >Our mission is to build a welcoming, inspiring and stimulating
            academic environment which acts as a development hub for the
            community and enriches wider society through the quality of its
            graduates and the impact of its research.</span
          >
          <h3>Field/Program Mission:</h3>
          <span>Insert your Field/Program Mission statement here.</span>
          <form method="post">
    <fieldset>
        <legend>Name:</legend>
        <input type="text" id="name" name="name" required size="10" placeholder="Full Name" />
        <h3>Position:</h3>
        <div>
            <input type="checkbox" id="prof" value="Prof" name="position[]" />
            <label for="prof">Prof</label>
        </div>
        <div>
            <input type="checkbox" id="assistant_prof" value="Assistant Prof" name="position[]" />
            <label for="assistant_prof">Assistant Prof</label>
        </div>
        <div>
            <input type="checkbox" id="lecturer" value="Lecturer" name="position[]" />
            <label for="lecturer">Lecturer</label>
        </div>
        <div>
            <input type="checkbox" id="assistant_lecturer" value="Assistant Lecturer" name="position[]" />
            <label for="assistant_lecturer">Assistant Lecturer</label>
        </div>
        <div>
            <input type="checkbox" id="ta" value="TA" name="position[]" />
            <label for="ta">TA</label>
        </div>
    </fieldset>
    <table>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Statement</th>
                <th scope="col">Strongly agree</th>
                <th scope="col">Agree</th>
                <th scope="col">Neutral</th>
                <th scope="col">Disagree</th>
                <th scope="col">Strongly disagree</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <th><input type="text" name="statement" /></th>
                <th><input type="checkbox" value="Strongly agree" name="response" /></th>
                <th><input type="checkbox" value="Agree" name="response" /></th>
                <th><input type="checkbox" value="Neutral" name="response" /></th>
                <th><input type="checkbox" value="Disagree" name="response" /></th>
                <th><input type="checkbox" value="Strongly disagree" name="response" /></th>
            </tr>
        </tbody>
    </table>
    <div>
        <label for="comments">Other suggestions/comments</label>
        <input type="text" id="comments" name="comments" required size="10" />
    </div>
    <div class="input-field">
        <input type="submit" class="submit" name="submit" value="Submit" />
    </div>
</form>
<?php include 'footer.php' ?>

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
          window.location.href = "index.php";
        }
      });
    }
  </script>
</html>
