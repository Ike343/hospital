<?php
$conn = new mysqli("localhost", "root", "", "hospital_db");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$date = $_POST['date'] ?? '';
$time = $_POST['time'] ?? '';
$reason = $_POST['reason'] ?? '';

$stmt = $conn->prepare("INSERT INTO appointments (name, email, appointment_date, appointment_time, reason) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $email, $date, $time, $reason);
$stmt->execute();
$stmt->close();
$conn->close();
echo "Appointment booked!";
?>
