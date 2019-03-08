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

                    <div class="profile-voprosi">

                        <h3 class="profile-voprosi__title">Вопросы мне</h3>


                        <ul class="profile-voprosi__list">
                            <li class="profile-voprosi__li">
                                <h4 class="profile-voprosi__h4">
                                    <span>Упал с турника ударился плечом об камень </span>
                                </h4>
                                <p class="profile-voprosi__author">
                                    <a href="#">Махмуд Магомедов</a>
                                </p>
                                <p class="profile-voprosi__quest">
                                    Ассалам алейкум, у меня проблема.
                                    Я вчера упал со второго этажа и ударился плечом
                                    об камень, теперь оно жестко болит, че мне делать?)
                                </p>
                                <a href="#" class="profile-voprosi__otvetit">Ответить</a>
                            </li>
                            <li class="profile-voprosi__li profile-voprosi__li_you">
                                <img class="profile-voprosi__authorimg" src="static/media/3.jpg" alt="">
                                <h4 class="profile-voprosi__author_you">
                                    <span>Махмуд Магомедов</span>
                                </h4>
                                <p class="profile-voprosi__quest profile-voprosi__quest_you">
                                    Ваалейкум ассалам, отвечаю жить будешь братишка))
                                </p>
                                <a href="" class="profile-voprosi__like">Поблагодарить</a>
                            </li>
                            <li class="profile-voprosi__li">
                                <h4 class="profile-voprosi__h4">
                                    <span>Возможно трихомониаз</span>
                                </h4>
                                <p class="profile-voprosi__author">
                                    <a href="#">Махмуд Магомедов</a>
                                </p>
                                <p class="profile-voprosi__quest">
                                    Ассалам алейкум, у меня проблема.
                                    Я вчера упал со второго этажа и ударился плечом
                                    об камень, теперь оно жестко болит, че мне делать?)
                                </p>
                                <a href="#" class="profile-voprosi__otvetit">Ответить</a>
                            </li>
                            <li class="profile-voprosi__li profile-voprosi__li_you">
                                <img class="profile-voprosi__authorimg" src="static/media/3.jpg" alt="">
                                <h4 class="profile-voprosi__author_you">
                                    <span>Махмуд Магомедов</span>
                                </h4>
                                <p class="profile-voprosi__quest profile-voprosi__quest_you">
                                    Ваалейкум ассалам, отвечаю жить будешь братишка))
                                </p>
                                <a href="" class="profile-voprosi__like">Поблагодарить</a>
                            </li>
                            <li class="profile-voprosi__li">
                                <h4 class="profile-voprosi__h4">
                                    <span>Возможно трихомониаз</span>
                                </h4>
                                <p class="profile-voprosi__author">
                                    <a href="#">Махмуд Магомедов</a>
                                </p>
                                <p class="profile-voprosi__quest">
                                    Ассалам алейкум, у меня проблема.
                                    Я вчера упал со второго этажа и ударился плечом
                                    об камень, теперь оно жестко болит, че мне делать?)
                                </p>
                                <a href="#" class="profile-voprosi__otvetit">Ответить</a>
                            </li>
                            <li class="profile-voprosi__li profile-voprosi__li_you">
                                <img class="profile-voprosi__authorimg" src="static/media/3.jpg" alt="">
                                <h4 class="profile-voprosi__author_you">
                                    <span>Махмуд Магомедов</span>
                                </h4>
                                <p class="profile-voprosi__quest profile-voprosi__quest_you">
                                    Ваалейкум ассалам, отвечаю жить будешь братишка))
                                    Ваалейкум ассалам, отвечаю жить будешь братишка))
                                    Ваалейкум ассалам, отвечаю жить будешь братишка))
                                    Ваалейкум ассалам, отвечаю жить будешь братишка))
                                    Ваалейкум ассалам, отвечаю жить будешь братишка))
                                    Ваалейкум ассалам, отвечаю жить будешь братишка))
                                    Ваалейкум ассалам, отвечаю жить будешь братишка))
                                    Ваалейкум ассалам, отвечаю жить будешь братишка))
                                    Ваалейкум ассалам, отвечаю жить будешь братишка))
                                </p>
                                <a href="" class="profile-voprosi__like">Поблагодарить</a>
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