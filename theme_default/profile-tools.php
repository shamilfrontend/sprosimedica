<!DOCTYPE html>
<html lang="ru">
<head>

    <meta name="description" content="описание страницы">
    <meta name="keywords" content="ключевое слово1, ключевое слово2">

    <?php require_once('template/head.php') ?>

    <title>Профиль специалиста</title>

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


                <div class="contentBox contentBox_page">

                    <div class="profile-tools">

                        <h3 class="profile-tools__title">Мои настройки</h3>

                        <div class="profile-tools-tabs">
                            <ul class="profile-tools-tabs__list">
                                <li class="profile-tools-tabs__tab profile-tools-tabs__tab_active">Основые</li>
                                <li class="profile-tools-tabs__tab">УСЛУГИ</li>
                                <li class="profile-tools-tabs__tab">СЕРТИФИКАТЫ </li>
                                <li class="profile-tools-tabs__tab">СПЕЦИАЛИЗАЦИЯ</li>
                            </ul>
                            <div class="profile-tools-tabs__content">
                                <div class="profile-tools-tabs__item">
                                    <div class="tools-main">
                                        <form action="">
                                            <input type="text" placeholder="ФИО">
                                            <input type="text" placeholder="Город">
                                            <input type="text" placeholder="Образование">
                                            <input type="text" placeholder="Дата рождения">
                                            <input type="text" placeholder="Стаж работы">
                                            <input type="text" placeholder="Место работы">
                                            <input type="text" placeholder="Раб Тел">
                                            <input type="text" placeholder="Моб Тел">
                                            <button>Сохранить</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="profile-tools-tabs__item">УСЛУГИ</div>
                                <div class="profile-tools-tabs__item">СЕРТИФИКАТЫ </div>
                                <div class="profile-tools-tabs__item">СПЕЦИАЛИЗАЦИЯ</div>
                            </div>
                        </div>

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
<script src="static/libs/lightgallery/js/lightGallery.min.js"></script>
<script>
    $('.user-sertificate').lightGallery();
</script>

</body>
</html>