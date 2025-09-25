<?php
$host = "localhost";
$user = "root"; // اسم مستخدم MySQL
$pass = "";     // كلمة السر (غالباً فاضية عند XAMPP)
$db   = "news_system";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}
?>
