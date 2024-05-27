<?php
require_once __DIR__ . "/connect.php";

if (!empty($_POST["password"])) {
    $password = strtoupper($_POST["password"]);

    $sql = "SELECT Username FROM Users WHERE Instructor_id = ?";
    $params = array($password);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if (sqlsrv_has_rows($stmt)) {
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        echo $row['Username'];
    } else {
        echo "Instructor ID not found";
    }

    sqlsrv_free_stmt($stmt);
}
?>
