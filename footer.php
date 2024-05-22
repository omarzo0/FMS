<?php 
        require_once __DIR__ . "/connect.php";

$instructor_id = $_SESSION["id"];
        $tsql = "SELECT Username FROM Users WHERE Instructor_id = ?";
        $params = array($instructor_id);
        $stmt = sqlsrv_query($conn, $tsql, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true)); // Print SQL Server errors
        }

        $row_count = sqlsrv_has_rows($stmt);
        if ($row_count === true) {
            $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
            $Username = $row['Username'];
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
        <ul class="nav-links">
          <li>
            <div class="iocn-link">
              <a href="instructorhome.php">
                <i class="bx bxs-user-plus bx-sm"></i>
                <span class="link_name">Home</span>
              </a>
              <i class="bx bxs-chevron-down arrow"></i>
            </div>
            <ul class="sub-menu">
              <li><a href="profile.php" class="sub-list">Profile</a></li>
              <li>
                <a href="passwordAdmin.php" class="sub-list">Change Password</a>
              </li>
            </ul>
          </li>
          <li>
            <div class="iocn-link">
              <a href="coursefilecontent.php">
                <i class="bx bxs-user-plus bx-sm"></i>
                <span class="link_name">content of course</span>
              </a>
              <i class="bx bxs-chevron-down arrow"></i>
            </div>
            <ul class="sub-menu">
              <li>
                <a href="coursespec.php" class="sub-list"
                  >course Specification</a
                >
              </li>
              <li>
                <a href="coursematrix&ILO.php" class="sub-list"
                  >ILOs versus course content</a
                >
              </li>

              <li>
                <a href="Lmetthod&ILOs.php" class="sub-list">
                  ILOs versus teaching & learning methods
                </a>
              </li>

              <li>
                <a href="ass&ILOs.php" class="sub-list">
                  ILOs verses assessment methods
                </a>
              </li>

              <li>
                <a href="instructordata.html" class="sub-list"
                  >instructor data</a
                >
              </li>
              <li>
                <a href="" class="sub-list">semester schedule</a>
              </li>
              <li>
                <a href="bluerpint.php" class="sub-list"
                  >Bluerpint for Written exams</a
                >
              </li>
              <li>
                <a href="" class="sub-list">Rubrics for practical exam</a>
              </li>
              <li>
                <a
                  href="student&coursedata"
                  class="sub-list"
                  student&coursedata
                ></a>
              </li>

              <li>
                <a href="coursereportcheck.php" class="sub-list"
                  >course file checklist</a
                >
              </li>

              <li>
                <a href="coursereport.php" class="sub-list">course report</a>
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
                <a href="Qforstudent.php" class="sub-list"
                  >Questionnaires for student</a
                >
              </li>
              <li>
                <a href="Qofvisionstaff.php" class="sub-list"
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
                <a href="relationshipcourse.php" class="sub-list"
                  >RelationShip matrix for courses</a
                >
              </li>
              <li>
                <a href="relationshipNARS.php" class="sub-list"
                  >RelationShip matrix for NARS</a
                >
              </li>
            </ul>
          </li>
          <li></li>

          <li>
            <a href="arsnars.php">
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
                  src="img/administrator.png"
                  alt="Administrator"
                />
              </div>
              <div class="name-job">
                <div class="profile_name">
                  DR/
                  <?php echo $Username;?>
                </div>
                <div class="job">professor</div>
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
            </div>
          </li>
        </ul>
      </div>
    </section>
  </body>
</html>
<?php 
    sqlsrv_close($conn);
    ?>
