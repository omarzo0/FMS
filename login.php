<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login_button"])) {
    require __DIR__ . "/connect.php";
    // Check if connection to database is established
    if ($conn) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Prepare and execute the database query for Admins
        $tsql = "SELECT * FROM Admin WHERE Username = ? AND Password = ?";
        $params = array($email, $password);
        $stmt = sqlsrv_query($conn, $tsql, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true)); // Print SQL Server errors
        }

        $row_count = sqlsrv_has_rows($stmt);
        if ($row_count === true) {
            $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
            session_start();
            $_SESSION['id'] = $row['AdminID'];
            header('Location: ./admin/adminhome.php');
            exit();
        } else {
            // No matching admin found, check Users table
            $tsql = "SELECT * FROM Users WHERE Instructor_id = ?";
            $params = array($email); // Only username is needed for Users table lookup
            $stmt = sqlsrv_query($conn, $tsql, $params);

            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true)); // Print SQL Server errors
            }

            $row_count = sqlsrv_has_rows($stmt);
            if ($row_count === true) {
                $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
                $hashedPassword = $row['Password'];
                if (password_verify($password, $hashedPassword)) {
                    session_start();
                    $_SESSION['id'] = $row['Instructor_id'];
                    header("Location: instructorhome.php");
                    exit();
                } else {
                    echo '<script>alert("Wrong ID or Password"); window.location.href = "index.php";</script>';
                }
            } else {
                echo '<script>alert("Wrong ID or Password"); window.location.href = "index.php";</script>';
            }
        }
    } else {
        echo "Connection could not be established.<br />";
        die(print_r(sqlsrv_errors(), true));
    }
} else {
    // Redirect or display appropriate message if accessed directly without form submission
    header("Location: index.php"); // Redirect to login page
}
?>

