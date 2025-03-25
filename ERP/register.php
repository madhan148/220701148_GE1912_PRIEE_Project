<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $dept = trim($_POST['dept']);
    $year = trim($_POST['year']);
    $regno = trim($_POST['regno']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $event = trim($_POST['event']);
    $club = trim($_POST['club']);

    $sql = "INSERT INTO registrations (name, dept, year, regno, email, mobile, event, club) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisssss", $name, $dept, $year, $regno, $email, $mobile, $event, $club);

    if ($stmt->execute()) {
        header("Location:success.php"); 
        exit(); // IMPORTANT: Stop script execution
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
