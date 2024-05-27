<?php
session_start();
if (isset($_SESSION["id"])) {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Include the connection file
        require_once __DIR__ . "/connect.php";
        
        $name = $_POST['name'];
        $password = $_POST['password'];
        $instructor_id = $_POST['instructor_id'];
        $Faculty = $_POST['Faculty'];
        $Department = $_POST['Department'];
        $Division = $_POST['Division'];
        
        
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the SQL query
        $tsql = "INSERT INTO Users (Username,Instructor_id, Password, Faculty, Department, Division) VALUES (?, ?, ?, ?, ?, ?)";
        
        // Bind parameters
        $params = array($name,$instructor_id, $hashedPassword, $Faculty, $Department, $Division);
        
        // Execute the query
        $stmt = sqlsrv_query($conn, $tsql, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true)); // Print SQL Server errors
        } else {
            header('Location: addInstructor.php');
            exit();
        }

        sqlsrv_free_stmt($stmt);
        sqlsrv_close($conn);
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
    <link rel="stylesheet" href="../css/table.css" />
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
    <link rel="stylesheet" href="../css/form.css" />
    <link rel="shortcut icon" type="x-icon" href="../img/ImageHandler.png" />

    <title>Admin</title>
  </head>

  <body>
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
              src="../img/GU-Logo-Monochrome-White-1-300x97.png"
              width="150px"
              alt=""
          /></span>
        </div>
        <ul class="nav-links">
          <li>
            <div class="iocn-link">
              <a href="/admin/adminhome.html">
                <i class="bx bxs-user-plus bx-sm"></i>
                <span class="link_name">Home</span>
              </a>
              <i class="bx bxs-chevron-down arrow"></i>
            </div>
            <ul class="sub-menu">
              <li>
                <a href="/admin/profile.html" class="sub-list">Profile</a>
              </li>
              <li>
                <a href="/admin/passwordAdmin.html" class="sub-list"
                  >Change Password</a
                >
              </li>
            </ul>
          </li>
          <li>
            <div class="iocn-link">
              <a href="">
                <i class="bx bxs-user-plus bx-sm"></i>
                <span class="link_name">Instructors</span>
              </a>
              <i class="bx bxs-chevron-down arrow"></i>
            </div>
            <ul class="sub-menu">
              <li>
                <a href="/admin/addInstructor.html" class="sub-list"
                  >Add Instructor</a
                >
              </li>
              <li>
                <a href="coursematrix&ILO.php" class="sub-list"
                  >Remove Instructor</a
                >
              </li>
            </ul>
          </li>
          <li>
            <div class="iocn-link">
              <a href="/admin/coursefilecontent.html">
                <i class="bx bxs-user-plus bx-sm"></i>
                <span class="link_name">content of course</span>
              </a>
              <i class="bx bxs-chevron-down arrow"></i>
            </div>
            <ul class="sub-menu">
              <li>
                <a href="/admin/coursereportcheck.html" class="sub-list"
                  >course file checklist</a
                >
              </li>
              <li>
                <a href="/admin/coursematrix&ILO.html" class="sub-list"
                  >course matrix Topics</a
                >
              </li>
              <li>
                <a href="/admin/coursereport.html" class="sub-list"
                  >course report</a
                >
              </li>
            </ul>
          </li>
          <li>
            <div class="iocn-link">
              <a href="">
                <i class="bx bxs-user-plus bx-sm"></i>
                <span class="link_name">Questionnaires</span>
              </a>
              <i class="bx bxs-chevron-down arrow"></i>
            </div>
            <ul class="sub-menu">
              <li>
                <a href="/admin/Qforstudent.html" class="sub-list"
                  >Questionnaires for student</a
                >
              </li>
              <li>
                <a href="/admin/Qofvisionstaff.html" class="sub-list"
                  >Questionnaires for staff</a
                >
              </li>
            </ul>
          </li>
          <li>
            <div class="iocn-link">
              <a href="">
                <i class="bx bxs-user-plus bx-sm"></i>
                <span class="link_name">RelationShip</span>
              </a>
              <i class="bx bxs-chevron-down arrow"></i>
            </div>
            <ul class="sub-menu">
              <li>
                <a href="/admin/relationshipcourse.html" class="sub-list"
                  >RelationShip matrix for courses</a
                >
              </li>
              <li>
                <a href="/admin/relationshipNARS.html" class="sub-list"
                  >RelationShip matrix for NARS</a
                >
              </li>
            </ul>
          </li>
          <li>
            <a href="/admin/ass&ILOs.html">
              <i class="bx bx-comment-error"></i>
              <span class="link_name">Assessment & ILOs</span>
            </a>
          </li>
          <li>
            <a href="/admin/bluerpint.html">
              <i class="bx bx-comment-error"></i>
              <span class="link_name">Blueprint Written</span>
            </a>
          </li>
          <li>
            <a href="/admin/Lmetthod&ILOs.html">
              <i class="bx bx-comment-error"></i>
              <span class="link_name">Teaching & Learning Matrix</span>
            </a>
          </li>
          <li>
            <a href="/admin/coursespec.html">
              <i class="bx bx-comment-error"></i>
              <span class="link_name">Course Specification</span>
            </a>
          </li>
          <li>
            <a href="/admin/arsnars.html">
              <i class="bx bx-comment-error"></i>
              <span class="link_name">ARS / NARS</span>
            </a>
          </li>

          <br />
          <br />

          <li>
            <div class="profile-details">
              <div class="profile-content">
                <img
                  style="background-color: white"
                  src="../img/administrator.png"
                  alt="Administrator"
                />
              </div>
              <div class="name-job">
                <div class="profile_name">DR/ Moh Abdelaziz</div>
                <div class="job">professor</div>
              </div>
              <form action="logoutAdmin?_method=DELETE" method="POST">
                <button
                  type="submit"
                  class="logout"
                  onclick="event.preventDefault(); showConfirmation();"
                >
                  <i class="bx bx-log-out"></i>
                </button>
              </form>
            </div>
          </li>
        </ul>
      </div>
    </section>

    <!-- Javascript section -->
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
    <section class="form-body">
      <div class="form-container">
        <div class="row align-items-stretch no-gutters contact-wrap">
          <div class="col-md-12">
            <div class="form h-100">
              <h3>Add Instructor</h3>

              <form
                action=""
                method="post"
                class="mb-5"
                id="contactForm"
                name="contactForm"
                >
                <div class="col-lg-12 form-group mb-3">
                  <label for="New-Password" class="col-form-label"
                    >Faculty</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    name="Faculty"
                    id="instructor_id"
                    placeholder="Faculty"
                    required
                  />
                  <div id="pssd"></div>
                </div><div class="col-lg-12 form-group mb-3">
                  <label for="New-Password" class="col-form-label"
                    >Department</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    name="Department"
                    id="instructor_id"
                    placeholder="Department"
                    required
                  />
                  <div id="pssd"></div>
                </div><div class="col-lg-12 form-group mb-3">
                  <label for="New-Password" class="col-form-label"
                    >Enter Division</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    name="Division"
                    id="instructor_id"
                    placeholder="Division"
                    required
                  />
                  <div id="pssd"></div>
                </div>
                <div class="col-lg-12 form-group mb-3">
                  <label for="New-Password" class="col-form-label"
                    >Enter the professor name</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    name="name"
                    id="instructor_id"
                    placeholder="Name"
                    required
                  />
                  <div class="col-lg-12 form-group mb-3">
                  <label for="New-Password" class="col-form-label"
                    >Enter Instructor ID</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    name="instructor_id"
                    id="instructor_id"
                    placeholder="Instructor ID"
                    required
                  />
                  <div id="pssd"></div>
                </div>
                  <div id="pssd"></div>
                </div>
                <div class="col-lg-12 form-group mb-3">
                  <label for="Conform-new-Password" class="col-form-label"
                    >Enter password</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    name="password"
                    id="repassword"
                    placeholder="New password"
                    required
                  />
                  <div id="repssd"></div>
                </div>

                <div class="input-field">
                  <input type="submit" class="submit" value="Submit" />
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script>
      const passwordInput = document.getElementById("password");

      passwordInput.addEventListener("keyup", () => {
        const password = passwordInput.value;

        if (isValidPassword(password)) {
          document.getElementById("pssd").innerHTML =
            "<p style='color:green;' >Valid<p>";
        } else {
          document.getElementById("pssd").innerHTML =
            "<p style='color:red;' >Invalid<p>";
        }
      });

      function isValidPassword(password) {
        // for checking if password length is between 8 and 15
        if (!(password.length >= 8 && password.length <= 15)) {
          return false;
        }

        // to check space
        if (password.indexOf(" ") !== -1) {
          return false;
        }

        // for digits from 0 to 9
        let count = 0;
        for (let i = 0; i <= 9; i++) {
          if (password.indexOf(i) !== -1) {
            count = 1;
          }
        }
        if (count === 0) {
          return false;
        }

        // for special characters
        if (!/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password)) {
          return false;
        }

        // for capital letters
        count = 0;
        for (let i = 65; i <= 90; i++) {
          if (password.indexOf(String.fromCharCode(i)) !== -1) {
            count = 1;
          }
        }
        if (count === 0) {
          return false;
        }

        // for small letters
        count = 0;
        for (let i = 97; i <= 122; i++) {
          if (password.indexOf(String.fromCharCode(i)) !== -1) {
            count = 1;
          }
        }
        if (count === 0) {
          return false;
        }

        // if all conditions fail
        return true;
      }

      const passwordConfirm = document.getElementById("repassword");

      passwordConfirm.addEventListener("keyup", () => {
        const password = passwordInput.value;
        const repassword = passwordConfirm.value;

        if (password === repassword) {
          document.getElementById("repssd").innerHTML =
            "<p style='color:green;' >Password matching<p>";
        } else {
          document.getElementById("repssd").innerHTML =
            "<p style='color:red;' >Password does not match<p>";
        }
      });
    </script>
  </body>
</html>
