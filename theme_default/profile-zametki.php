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

                    <div class="profile-zametki">

                        <h3 class="profile-voprosi__title">Мои заметки</h3>

                        <a href="" class="profile-zametki__add">Добавить заметку</a>

                        <ul class="profile-zametki__list">
                            <li class="profile-zametki__li">
                                <a href="" class="profile-zametki__link">Удаление камней из желчного пузыря</a>
                                <span class="profile-zametki__comments">Комментариев 201</span>
                                <span class="profile-zametki__views">Просмотров 201</span>
                            </li>
                            <li class="profile-zametki__li">
                                <a href="" class="profile-zametki__link">Удаление камней из желчного пузыря</a>
                                <span class="profile-zametki__comments">Комментариев 201</span>
                                <span class="profile-zametki__views">Просмотров 201</span>
                            </li>
                            <li class="profile-zametki__li">
                                <a href="" class="profile-zametki__link">Удаление камней из желчного пузыря</a>
                                <span class="profile-zametki__comments">Комментариев 201</span>
                                <span class="profile-zametki__views">Просмотров 201</span>
                            </li>
                            <li class="profile-zametki__li">
                                <a href="" class="profile-zametki__link">Удаление камней из желчного пузыря</a>
                                <span class="profile-zametki__comments">Комментариев 201</span>
                                <span class="profile-zametki__views">Просмотров 201</span>
                            </li>
                            <li class="profile-zametki__li">
                                <a href="" class="profile-zametki__link">Удаление камней из желчного пузыря</a>
                                <span class="profile-zametki__comments">Комментариев 201</span>
                                <span class="profile-zametki__views">Просмотров 201</span>
                            </li>
                        </ul>

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