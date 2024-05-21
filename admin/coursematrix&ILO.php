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
    <link rel="stylesheet" href="/css/style.css" />
    <link rel="shortcut icon" type="x-icon" href="img/ImageHandler (1).png" />

    <title>Admin</title>
  </head>

  <body>
    <!-- main body section -->
    <div class="main-body">
      <div class="header">
        <h2>Course Matrix: Course Content and ILO’ s</h2>
      </div>
      <label for="dog-names">Choose Instructor Name</label>
      <select name="dog-names" id="dog-names">
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
        <option value="rigatoni">Advanced database</option>
        <option value="dave">machine learning</option>
        <option value="pumpernickel">system analysis and design</option>
        <option value="reeses">critical thinking</option>
      </select>
      <table>
        <thead>
          <tr>
            <th scope="col" rowspan="2">Week</th>
            <th scope="col" rowspan="2">Course topics</th>
            <th scope="col" colspan="2">Intended Learning Outcomes</th>
          </tr>
          <tr>
            <th scope="col">Knowledge & Understanding</th>
            <th scope="col">Intellectual Skills</th>
            <th scope="col">Professional & Practical Skills</th>
            <th scope="col">General & Transferable Skills</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <th>CSE123</th>
            <td>
              <table>
                <tr>
                  <th>a1</th>
                  <th>a2</th>
                  <th>a3</th>
                  <th>a4</th>
                  <th>a5</th>
                  <th>a6</th>
                  <th>a7</th>
                </tr>
              </table>
            </td>
            <td>
              <table>
                <tr>
                  <th>a1</th>
                  <th>a2</th>
                  <th>a3</th>
                  <th>a4</th>
                  <th>a5</th>
                  <th>a6</th>
                  <th>a7</th>
                </tr>
              </table>
            </td>
            <td>
              <table>
                <tr>
                  <th>a1</th>
                  <th>a2</th>
                  <th>a3</th>
                  <th>a4</th>
                  <th>a5</th>
                  <th>a6</th>
                  <th>a7</th>
                </tr>
              </table>
            </td>
            <td>
              <table>
                <tr>
                  <th>a1</th>
                  <th>a2</th>
                  <th>a3</th>
                  <th>a4</th>
                  <th>a5</th>
                  <th>a6</th>
                  <th>a7</th>
                </tr>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
      <div class="input-field">
        <input type="submit" class="submit" value="Submit" />
      </div>
      <div class="input-field">
        <input type="submit" class="submit" value="print" />
      </div>
    </div>
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
              src="/img/GU-Logo-Monochrome-White-1-300x97.png"
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
                <a href="coursematrix&ILO.html" class="sub-list"
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
                  src="/img/administrator.png"
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
