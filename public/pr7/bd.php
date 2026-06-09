<?php
$host = "localhost";
$user = "root";
$pass = "12345678";
$database = "user";

$connect = new mysqli($host, $user, $pass, $database);

if ($connect->connect_error) {
    die("Ошибка подключения: " . $connect->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name'])) {   
    $name = $_POST['name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password']; // В реальных проектах используйте password_hash()

    // Защита от SQL-инъекций через подготовленные выражения
    $stmt = $connect->prepare("INSERT INTO `users` (`id`, `name`, `login`, `email`, `password`) VALUES (NULL, ?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $login, $email, $password);
    $stmt->execute();
    $stmt->close();
} 
?>