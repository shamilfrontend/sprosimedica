<!DOCTYPE html>
<html lang="ru">
<head>

    <meta name="description" content="описание страницы">
    <meta name="keywords" content="бесплатная медицинская консультация, медицинская консультация">

    <?php require_once('template/head.php') ?>

    <title>Sprosimedica.ru - бесплатная медицинская консультация</title>

</head>
<body>

    <div class="main">

        <?php require_once('template/header.php') ?>

        <div class="main-content">
            <div class="container">
                <div class="row">

                    <!-- Подключение левого сайдбара-->
                    <?php include('template/leftside.php') ?>
                    <!-- Подключение левого сайдбара end-->

                    <!-- Подключение правого сайдбара-->
                    <?php if ($_GET['type'] != 'guestbook') require_once('template/rightside.php') ?>
                    <!-- Подключение правого сайдбара end-->

                    <?php include($tmpl); ?>

                </div>
            </div>
        </div>

        <?php require_once('template/footer.php') ?>

    </div>

	<?php require_once('template/bottom-scripts.php') ?>

</body>
</html>