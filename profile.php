<?php
session_start();
require_once __DIR__ . "/connect.php";
$instructor_id = $_SESSION["id"];
$firstName = $middleName = $lastName = $dob = $gender = $email = $phoneNumber = $guEmail = $address = '';
function fetchData($instructor_id) {
  global $conn;
  $sql = "SELECT * FROM doctors WHERE Instructor_id = ?";
  $stmt = sqlsrv_prepare($conn, $sql, array(&$instructor_id));
  if ($stmt) {
      sqlsrv_execute($stmt);
      $data = array();
      while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
          $data[] = $row;
      }
      if (!empty($data)) {
          return $data; // Data found
      } else {
          return false; // No data found
      }
  } else {
      return false; // Error preparing statement
  }
}
$fun = fetchData($instructor_id);

// Function to insert data into the database
function insertData($firstName, $middleName, $lastName, $dob, $gender, $email, $phoneNumber, $guEmail, $address, $instructor_id) {
  global $conn;
  $sql = "INSERT INTO doctors (Fname, Mname, Lname, Instructor_id, B_date, gender, email, phone_number, gu_email, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = sqlsrv_prepare($conn, $sql, array(&$firstName, &$middleName, &$lastName, &$instructor_id, &$dob, &$gender, &$email, &$phoneNumber, &$guEmail, &$address));
  if ($stmt) {
      if (sqlsrv_execute($stmt)) {
          // Redirect to the current page to reload it
          header("Location: " . $_SERVER['PHP_SELF']);
          exit(); // Ensure that subsequent code is not executed after redirection
      } else {
          return false;
      }
  } else {
      return false;
  }
}


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST['first_name'];
    $middleName = $_POST['middle_name'];
    $lastName = $_POST['last_name'];
    $dob = $_POST['b_date'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['number'];
    $guEmail = $_POST['guemail'];
    $address = $_POST['address'];

    // Insert data into the database
    if (insertData($firstName, $middleName, $lastName, $dob, $gender, $email, $phoneNumber, $guEmail, $address, $instructor_id)) {
        echo "Data inserted successfully.";
    } else {
        echo "Error inserting data.";
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
    <?php include'footer.php';?>
    <div class="main-body">
     
                <div class="st-right">
                    <p class="field1"><strong>General Information</strong></p>
                    <?php
    if ($fun == false) {
        echo "
            <form action='' method='post'>
                <table class='profile-table'>
                    <tr>
                        <th><label for='first-name'><strong>First Name</strong></label></th>
                        <td><input type='text' id='first-name' name='first_name' required></td>
                    </tr>
                    <tr>
                        <th><label for='middle-name'><strong>Middle Name</strong></label></th>
                        <td><input type='text' id='middle-name' name='middle_name' required></td>
                    </tr>
                    <tr>
                        <th><label for='last-name'><strong>Last Name</strong></label></th>
                        <td><input type='text' id='last-name' name='last_name' required></td>
                    </tr>
                    <tr>
                        <th><label for='b-date'><strong>Birth Date</strong></label></th>
                        <td><input type='text' id='birth-date-input' name='b_date' placeholder='mm/dd/yyyy' pattern='\d{2}/\d{2}/\d{4}' title='Please enter a date in mm/dd/yyyy format' required></td>
                    </tr>
                    <tr>
                        <th><label for='gender'><strong>Gender</strong></label></th>
                        <td>
                            <select id='gender' name='gender' required>
                                <option value='Male'>Male</option>
                                <option value='Female'>Female</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><label for='email'><strong>Email</strong></label></th>
                        <td><input type='email' id='email' name='email' required></td>
                    </tr>
                    <tr>
                        <th><label for='number'><strong>Contact Number</strong></label></th>
                        <td><input type='text' id='number' name='number' required></td>
                    </tr>
                    <tr>
                        <th><label for='guemail'><strong>GU Email</strong></label></th>
                        <td><input type='email' id='guemail' name='guemail' required></td>
                    </tr>
                    <tr>
                        <th><label for='address'><strong>Address</strong></label></th>
                        <td><input type='text' id='address' name='address' required></td>
                    </tr>
                </table>
                <input type='submit' class='submit btn btn-primary' value='Submit'>
            </form>";
            
    } else {
        foreach ($fun as $data) {
            echo "<table class='profile-table'>
            <tr>
                <th><p><strong>professor Id:</strong></p></th>
                <td>" . htmlspecialchars($instructor_id) . "</td>
                 </tr>
                <tr>
                    <th><strong>First Name</strong></th>
                    <td>" . htmlspecialchars($data['Fname'] ?? '') . "</td>
                </tr>
                <tr>
                    <th><strong>Middle Name</strong></th>
                    <td>" . htmlspecialchars($data['Mname'] ?? '') . "</td>
                </tr>
                <tr>
                    <th><strong>Last Name</strong></th>
                    <td>" . htmlspecialchars($data['Lname'] ?? '') . "</td>
                </tr>
                <tr>
                    <th><strong>Birth Date</strong></th>
                    <td>" . htmlspecialchars($data['B_date'] ?? '') . "</td>
                </tr>
                <tr>
                    <th><strong>Gender</strong></th>
                    <td>" . htmlspecialchars($data['gender'] ?? '') . "</td>
                </tr>
                <tr>
                    <th><strong>Email</strong></th>
                    <td>" . htmlspecialchars($data['email'] ?? '') . "</td>
                </tr>
                <tr>
                    <th><strong>Contact Number</strong></th>
                    <td>" . htmlspecialchars($data['phone_number'] ?? '') . "</td>
                </tr>
                <tr>
                    <th><strong>GU Email</strong></th>
                    <td>" . htmlspecialchars($data['gu_email'] ?? '') . "</td>
                </tr>
                <tr>
                    <th><strong>Address</strong></th>
                    <td>" . htmlspecialchars($data['address'] ?? '') . "</td>
                </tr>
            </table>
            <input type='submit' class='submit btn btn-primary' value='Edit'>";

        }
    }
?>



                </div>
            </div>
           
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
