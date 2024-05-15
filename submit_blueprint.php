<?php
// Establish database connection
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$topic = $_POST['topic'];
$ILOs = $_POST['ILOs'];
$numberOfLectures = $_POST['numberOfLectures'];
// Retrieve other form fields in a similar manner

// SQL query to insert data into database
$sql = "INSERT INTO Blueprint_for_Written_Exams (Topic, ILOs, NumberOfLectures, ...) 
        VALUES ('$topic', '$ILOs', $numberOfLectures, ...)";
        
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
