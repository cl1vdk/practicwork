<?php
include('bd.php');
include('header.php');
$Error = ""; 
?>

<!DOCTYPE html>
<html lang="ru" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link href="bootstrap.css" rel="stylesheet" />
</head>
<body class="d-flex flex-column h-100 bg-light">

    <section class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                
                <div class="text-end mb-3">
                    <a href="admin.php" class="btn btn-outline-primary btn-sm shadow-sm rounded-pill px-3">
                        Перейти в Админку &rarr;
                    </a>
                </div>

                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h2 class="text-center mb-4 text-primary">Регистрация</h2>
                        
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="exampleInputName1" class="form-label text-secondary fw-semibold">Имя</label>
                                <input name="name" type="text" class="form-control rounded-pill shadow-sm px-3" id="exampleInputName1" placeholder="Иван" required>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputLogin1" class="form-label text-secondary fw-semibold">Логин</label>
                                <input name="login" type="text" class="form-control rounded-pill shadow-sm px-3" id="exampleInputLogin1" placeholder="ivan_ivanov" required>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label text-secondary fw-semibold">Почта</label>
                                <input name="email" type="email" class="form-control rounded-pill shadow-sm px-3" id="exampleInputEmail1" placeholder="ivan@example.com" required>
                                <div id="emailHelp" class="form-text px-2">Мы не передаем вашу почту третьим лицам.</div>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label text-secondary fw-semibold">Пароль</label>
                                <input name="password" type="password" class="form-control rounded-pill shadow-sm px-3" id="exampleInputPassword1" placeholder="••••••••" required>
                            </div>

                            <?php if(!empty($Error)): ?>
                                <div class="alert alert-danger rounded-pill py-2 px-3 text-center small mb-3">
                                    <?= htmlspecialchars($Error) ?>
                                </div>
                            <?php endif; ?>

                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow-sm fs-6 fw-bold">Зарегистрироваться</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php include('footer.php'); ?> 
</body>
</html>