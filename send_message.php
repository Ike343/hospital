<?php
$conn = new mysqli("localhost", "root", "", "hospital_db");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

$stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);
$stmt->execute();
$stmt->close();
$conn->close();
echo "Message sent!";
?>
