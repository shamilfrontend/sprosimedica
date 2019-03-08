<!DOCTYPE html>
<html lang="ru">
<head>

    <meta name="description" content="описание страницы">
    <meta name="keywords" content="ключевое слово1, ключевое слово2">

    <?php require_once('template/head.php') ?>

    <title>Восстановить пароль</title>

</head>
<body>

<div class="main">

    <?php require_once('template/header.php') ?>

    <div class="main-content">
        <div class="container">
            <div class="row">

                <!-- Подключение левого сайдбара-->
                <?php require_once('template/leftside.php') ?>
                <!-- Подключение левого сайдбара end-->

                <!-- Подключение правого сайдбара-->
                <?php require_once('template/rightside.php') ?>
                <!-- Подключение правого сайдбара end-->


                <div class="contentBox">

                    <div class="forget-pass">
                        <h3 class="forget-pass__title">Восстановить пароль</h3>

                        <form action="" method="post" class="forget-pass__form">

                            <p>
                                <input type="email" required placeholder="Введите ваш email адрес">
                                <button>Отправить</button>
                            </p>

                        </form>
                    </div>

                    <div class="contentBox-bottombanner">
                        <a href="">
                            <img src="static/img/bottom_banner.jpg" alt="">
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <?php require_once('template/footer.php') ?>

</div>




<?php require_once('template/bottom-scripts.php') ?>

</body>
</html>