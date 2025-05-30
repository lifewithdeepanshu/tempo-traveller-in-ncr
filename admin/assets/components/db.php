<?php
$host = 'localhost';
$user = 'admin'; // your DB username
$pass = 'Tiger@1281';     // your DB password
$db   = 'blog_db';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
