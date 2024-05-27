<?php
session_start(); // Start or resume the current session
if(isset($_SESSION['id']))
{
    $id = $_SESSION['id'];
}else{
    header('Location: index.php');
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
    <link rel="shortcut icon" type="x-icon" href="img/ImageHandler(1).png" />

    <title>teaching-stuff</title>
  </head>

  <body>
    <!-- main body section -->
    <div class="main-body">
      <h1>Galala quality assurance unit</h1>
      <h1></h1>
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
        <?php include 'footer.php'?>
      </div>
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
            window.location.href = "logout.php";
          }
        });
      }
    </script>
  </body>
</html>