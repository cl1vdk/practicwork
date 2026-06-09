<?php
require('bd.php');

$sql = $connect->prepare("SELECT `id`, `name`, `login`, `email` FROM `users`");
$sql->execute();
$data = $sql->get_result();
$data_array = [];

while ($string = $data->fetch_assoc()) {
    $data_array[] = $string; 
}
?>

<!DOCTYPE html>
<html lang="ru" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель администратора</title>
    <link href="bootstrap.css" rel="stylesheet" />
</head>
<body class="d-flex flex-column h-100 bg-light">
    
    <?php include('header.php'); ?> 

    <div class="text-end mb-3">
        <a href="index.php" class="btn btn-outline-primary btn-sm shadow-sm rounded-pill px-3">
            Перейти на главную &rarr;
        </a>
    </div>

    <section class="container my-5">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="m-0 text-primary">Список пользователей</h2>
                    <span class="badge bg-secondary p-2 fs-6">Всего: <?php echo count($data_array); ?></span>
                </div>
                
                <?php if (!empty($data_array)): ?>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle border">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 8%">ID</th>
                                    <th>Имя</th>
                                    <th>Логин</th>
                                    <th>Email</th>
                                    <th style="width: 25%" class="text-center">Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data_array as $user): ?>
                                    <tr>
                                        <td><strong>#<?php echo htmlspecialchars($user['id']); ?></strong></td>
                                        <td><?php echo htmlspecialchars($user['name']); ?></td>
                                        <td><span class="badge bg-light text-dark border"><?php echo htmlspecialchars($user['login']); ?></span></td>
                                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                                        <td class="text-center">
                                            <a href="edit.php?id=<?php echo $user['id']; ?>" class="btn btn-warning btn-sm mx-1 rounded-pill px-3 shadow-sm">
                                                Редактировать
                                            </a>
                                            <a href="delete.php?id=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm mx-1 rounded-pill px-3 shadow-sm" onclick="return confirm('Вы уверены?')">Удалить</a>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="alert alert-info border-0 shadow-sm text-center py-4" role="alert">
                        <p class="mb-0">В базе данных пока нет ни одного пользователя.</p>
                        <a href="index.php" class="btn btn-primary btn-sm mt-3">Добавить первого</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php include('footer.php'); ?> 
</body>
</html>