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
    <link rel="shortcut icon" type="x-icon" href="img/ImageHandler(1).png" />

    <title>teaching-stuff</title>
  </head>

  <body>
    <!-- main body section -->
    <div class="main-body">
      <h1>ARS/NARS Document Review Form</h1>
      <div>
        <h2>first: Basic information</h2>
        <div>
          <label for="name">college:</label>

          <input type="text" id="name" name="name" required size="10" />
        </div>
        <div>
          <label for="name">Undergraduate level: :</label>

          <input type="text" id="name" name="name" required size="10" />
        </div>
        <div>
          <label for="name">Program name: :</label>

          <input type="text" id="name" name="name" required size="10" />
        </div>
        <div>
          <label for="name">Nature of the program :</label>

          <input type="text" id="name" name="name" required size="10" />
        </div>
        <div>
          <label for="name"
            >he scientific department responsible for the program::</label
          >

          <input type="text" id="name" name="name" required size="10" />
        </div>
        <div>
          <label for="name">Program approval date::</label>

          <input type="text" id="name" name="name" required size="10" />
        </div>
        <h2>Specialized information:</h2>

        <span>The program has academic benchmarks:</span>
        <form action="" method="post">
          <input type="radio" name="joke" value="bed" /> Yes
          <input type="radio" name="joke" value="clock" /> NO
        </form>
        <span>Standards used within the program</span>
        <form action="" method="post">
          <input type="radio" name="joke" value="bed" /> NARS
          <input type="radio" name="joke" value="clock" /> ARS
        </form>
        <h2>
          If the program adopts the standards of the National Authority for
          Educational Quality Assurance and Accreditation (NARS):
        </h2>
        <span
          >The program adopts the standards of the National Authority for
          Educational Quality Assurance and Accreditation:</span
        >
        <form action="" method="post">
          <input type="radio" name="joke" value="bed" /> YES
          <input type="radio" name="joke" value="clock" /> NO
        </form>
        <span
          >The criteria adopted were reviewed by the scientific department:
        </span>
        <form action="" method="post">
          <input type="radio" name="joke" value="bed" /> YES
          <input type="radio" name="joke" value="clock" /> NO
        </form>
        <span>Academic standards were reviewed by an external reviewer: </span>
        <form action="" method="post">
          <input type="radio" name="joke" value="bed" /> YES
          <input type="radio" name="joke" value="clock" /> NO
        </form>
        <span
          >Corrective actions were taken based on the criteria review:
        </span>
        <form action="" method="post">
          <input type="radio" name="joke" value="bed" /> YES
          <input type="radio" name="joke" value="clock" /> NO
        </form>
        <span
          >The Scientific Department Council approved the adoption of the
          standards:</span
        >
        <form action="" method="post">
          <input type="radio" name="joke" value="bed" /> YES
          <input type="radio" name="joke" value="clock" /> NO
        </form>
        <span>The College Council approved the adoption of the standards:</span>
        <form action="" method="post">
          <input type="radio" name="joke" value="bed" /> YES
          <input type="radio" name="joke" value="clock" /> NO
        </form>
        <span>The University Council approved the academic standards: </span>
        <form action="" method="post">
          <input type="radio" name="joke" value="bed" /> YES
          <input type="radio" name="joke" value="clock" /> NO
        </form>
      </div>
      <h2>
        If the program does not adopt the standards of the National Authority
        for Educational Quality Assurance and Accreditation, the program has
        ARS:
      </h2>
      <span>The ARS criteria were reviewed by the scientific department: </span>
      <form action="" method="post">
        <input type="radio" name="joke" value="bed" /> YES
        <input type="radio" name="joke" value="clock" /> NO
      </form>
      <span>Academic standards were reviewed by an external reviewer: </span>
      <form action="" method="post">
        <input type="radio" name="joke" value="bed" /> YES
        <input type="radio" name="joke" value="clock" /> NO
      </form>
      <span>Corrective action was taken based on review of criteria: </span>
      <form action="" method="post">
        <input type="radio" name="joke" value="bed" /> YES
        <input type="radio" name="joke" value="clock" /> NO
      </form>
      <span
        >TThe Scientific Department Council approved the adoption of the
        standards:
      </span>
      <form action="" method="post">
        <input type="radio" name="joke" value="bed" /> YES
        <input type="radio" name="joke" value="clock" /> NO
      </form>
      <span
        >The College Council has approved the adoption of the standards:
      </span>
      <form action="" method="post">
        <input type="radio" name="joke" value="bed" /> YES
        <input type="radio" name="joke" value="clock" /> NO
      </form>
      <span
        >The University Council was informed of the academic standards:</span
      >
      <form action="" method="post">
        <input type="radio" name="joke" value="bed" /> YES
        <input type="radio" name="joke" value="clock" /> NO
      </form>
      <span
        >Presenting the adopted standards to the National Authority for Review
        and Accreditation:
      </span>
      <form action="" method="post">
        <input type="radio" name="joke" value="bed" /> YES
        <input type="radio" name="joke" value="clock" /> NO
      </form>
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
  </body>
</html>
