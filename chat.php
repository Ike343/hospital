<?php
$conn = new mysqli("localhost", "root", "", "hospital_db");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$user_name = $_POST['user_name'] ?? '';
$message = $_POST['message'] ?? '';

$stmt = $conn->prepare("INSERT INTO chats (user_name, message) VALUES (?, ?)");
$stmt->bind_param("ss", $user_name, $message);
$stmt->execute();
$stmt->close();
$conn->close();
echo "Message sent to doctor!";
?>
