<?php
$serverName = "MOHAMED\\MSSQLSERVER01"; // Double backslashes in the server name
$database = "fieldtraning";
$connectionInfo = [
    "Database" => $database,
    "UID" => "", // Windows Authentication does not need UID and PWD
    "PWD" => ""
];

// Establish the connection
$conn = sqlsrv_connect($serverName, $connectionInfo);

// Check if the connection is successful
if ($conn === false) {
    die("Connection failed: " . print_r(sqlsrv_errors(), true)); // Print SQL Server errors
}

return $conn;
?>
