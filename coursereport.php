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
            <th scope="col">Computer science and Engineering</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Department</th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">Division</th>
            <th></th>
          </tr>
        </tbody>
      </table>
      <div class="header1">
        <h2>A- basic information</h2>
      </div>
      <table>
        <thead>
          <tr></tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Course Title:</th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">Program Title:</th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">Level</th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">Credit hours(Hours/Week)</th>
            <th></th>
          </tr>

          <tr>
            <th scope="row">Instructor</th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">Course Director</th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">External Evaluator</th>
            <th></th>
          </tr>
        </tbody>
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
            <th>No</th>
            <th>--%</th>
          </tr>
          <tr>
            <th scope="row">NO. of student completing in the course:</th>
            <th>No</th>
            <th>--%</th>
          </tr>
          <tr>
            <td>results</td>
          </tr>
          <tr>
            <th scope="row">passed</th>
            <th scope="row">12</th>
            <th scope="row">--%</th>
            <th scope="row">Failed</th>
            <th scope="row">NO</th>
            <th scope="row">--%</th>
          </tr>
          <tr>
            <td>Grading of students</td>
          </tr>
          <tr>
            <th scope="row">Excellent</th>
            <th scope="row">12</th>
            <th scope="row">--%</th>
            <th scope="row">Very Good:</th>
            <th scope="row">NO</th>
            <th scope="row">--%</th>
          </tr>
          <tr>
            <th scope="row">Good</th>
            <th scope="row">12</th>
            <th scope="row">--%</th>
            <th scope="row">Pass</th>
            <th scope="row">NO</th>
            <th scope="row">--%</th>
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
            <th>Topics taught No. of learning hours Instructor</th>
            <th>Instructor</th>
          </tr>
          <tr>
            <th scope="row"></th>
            <th></th>
            <th></th>
          </tr>
        </tbody>
      </table>
      <fieldset>
        <legend>Topics taught as a percentage of the content specified:</legend>

        <div>
          <input type="checkbox" id="scales" name="scales" checked />
          <label for="scales">> 90% </label>
        </div>

        <div>
          <input type="checkbox" id="horns" name="horns" />
          <label for="horns">> 70 - 90% </label>
        </div>
        <div>
          <input type="checkbox" id="horns" name="horns" />
          <label for="horns">> 70% </label>
        </div>
      </fieldset>
      <div>
        <label for="name">- Reasons for not teaching any topic (if any):</label>

        <input type="text" id="name" name="name" required size="10" />
      </div>
      <div>
        <label for="name"
          >-Reasons for teaching topics not planned for in the course
          specification (if any):
        </label>

        <input type="text" id="name" name="name" required size="10" />
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
            <th></th>
          </tr>
          <tr>
            <th scope="row">Blended</th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">e-learning</th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">Distance learning</th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">Practical Training</th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">Clinical Training</th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">
              Others (please mention other teaching and learning methods used):
            </th>
            <th></th>
          </tr>
        </tbody>
      </table>
      <span> 3- Student Assessment:</span>
      <br />
      <span> a- Methods of Assessment </span>
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
            <th scope="row">Homework</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">Lab Report</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">Quiz</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">Mid-term Exam</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">Practical/Clinical Final</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">Final Written Exam</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">Oral Exam</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
          <tr>
            <th scope="row">Total</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </tbody>
      </table>
      <table>
        <tbody>
          <tr>
            <th>Members of Examination committee</th>
          </tr>
          <tr>
            <th></th>
          </tr>
          <tr>
            <th></th>
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
            <th>a.References</th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
          <tr>
            <th>b.Teaching Aids</th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
          <tr>
            <th>c. Equipment & materials</th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </tbody>
      </table>
      <span>5- Administrative constraints</span>
      <div>
        <label for="name">-List any difficulties encountered: </label>

        <input type="text" id="name" name="name" required size="10" />
      </div>
      <span>6- Student Evaluation of the course: </span>
      <div>
        <label for="name"> List the main points in students’ feedback </label>

        <input type="text" id="name" name="name" required size="10" /><br />
        <label for="name"> Response of Course Team </label>

        <input type="text" id="name" name="name" required size="10" />
      </div>
      <span>7- Comments from external evaluator(s): </span>
      <div>
        <label for="name"> Response of Course Team</label>

        <input type="text" id="name" name="name" required size="10" />
      </div>
      <span>8- Course Enhancement:</span>
      <table>
        <tbody>
          <tr>
            <th>a. Progress achieved over the last year:</th>
          </tr>
          <tr>
            <th>
              Actions required in the previous year’s action plan Completed Not
              completed
            </th>
            <th>Completed</th>
            <th>Not completed</th>
          </tr>
          <tr>
            <th></th>
            <th></th>
            <th></th>
          </tr>
          <tr>
            <th>b. Reasons for non-completion (if any):</th>
          </tr>
          <th></th>
        </tbody>
      </table>
      <span
        >9- Action plan for academic year
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
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </tbody>
      </table>
      <div>
        <label for="name"> Course Director: </label>

        <input type="text" id="name" name="name" required size="10" />
      </div>
      <div>
        <label for="name"> Head of Department: </label>

        <input type="text" id="name" name="name" required size="10" />
      </div>
      <div>
        <label for="name"> Date of Approval: </label>

        <input type="text" id="name" name="name" required size="10" />
      </div>
      <div>
        <label for="name"> Signature: </label>

        <input type="text" id="name" name="name" required size="10" />
      </div>
      <div class="input-field">
        <input type="submit" class="submit" value="Submit" />
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
              src="img/GU-Logo-Monochrome-White-1-300x97.png"
              width="150px"
              alt=""
          /></span>
        </div>
        <ul class="nav-links">
          <li>
            <div class="iocn-link">
              <a href="adminhome.html">
                <i class="bx bxs-user-plus bx-sm"></i>
                <span class="link_name">Home</span>
              </a>
              <i class="bx bxs-chevron-down arrow"></i>
            </div>
            <ul class="sub-menu">
              <li><a href="profile.html" class="sub-list">Profile</a></li>
              <li>
                <a href="passwordAdmin.html" class="sub-list"
                  >Change Password</a
                >
              </li>
            </ul>
          </li>
          <li>
            <div class="iocn-link">
              <a href="coursefilecontent.html">
                <i class="bx bxs-user-plus bx-sm"></i>
                <span class="link_name">content of course</span>
              </a>
              <i class="bx bxs-chevron-down arrow"></i>
            </div>
            <ul class="sub-menu">
              <li>
                <a href="coursereportcheck.html" class="sub-list"
                  >course file checklist</a
                >
              </li>
              <li>
                <a href="coursematrix&ILO.html" class="sub-list"
                  >course matrix Topics</a
                >
              </li>
              <li>
                <a href="coursereport.html" class="sub-list">course report</a>
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
                <a href="Qforstudent.html" class="sub-list"
                  >Questionnaires for student</a
                >
              </li>
              <li>
                <a href="Qofvisionstaff.html" class="sub-list"
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
                <a href="relationshipcourse.html.html" class="sub-list"
                  >RelationShip matrix for courses</a
                >
              </li>
              <li>
                <a href="relationshipNARS.html.html" class="sub-list"
                  >RelationShip matrix for NARS</a
                >
              </li>
            </ul>
          </li>
          <li>
            <a href="ass&ILOs.html">
              <i class="bx bx-comment-error"></i>
              <span class="link_name">Assessment & ILOs</span>
            </a>
          </li>
          <li>
            <a href="bluerpint.html">
              <i class="bx bx-comment-error"></i>
              <span class="link_name">Blueprint Written</span>
            </a>
          </li>
          <li>
            <a href="Lmetthod&ILOs.html">
              <i class="bx bx-comment-error"></i>
              <span class="link_name">Teaching & Learning Matrix</span>
            </a>
          </li>
          <li>
            <a href="coursespec.html">
              <i class="bx bx-comment-error"></i>
              <span class="link_name">Course Specification</span>
            </a>
          </li>
          <li>
            <a href="arsnars.html">
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
          window.location.href = "index.html";
        }
      });
    }
  </script>
</html>
