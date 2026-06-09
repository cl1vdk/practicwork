<?php
// Включаем отображение ошибок, чтобы сразу увидеть, если что-то пойдет не так
ini_set('display_errors', 1);
error_reporting(E_ALL);

include('bd.php');

// Проверяем GET-параметр id
if (isset($_GET['id'])) {
    $user_id = (int)$_GET['id'];

    // Подготавливаем запрос на удаление
    $stmt = $connect->prepare("DELETE FROM `users` WHERE `id` = ?");
    
    if ($stmt) {
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->close();
    }
}

// Перенаправляем обратно в админку
header("Location: admin.php");
exit();