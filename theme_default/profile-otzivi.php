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

                    <div class="profile-otzivi">

                        <h3 class="profile-otzivi__title">Мои отзывы</h3>

                        <ul class="profile-otzivi__list">
                            <li class="profile-otzivi__li">
                                <h4 class="profile-otzivi__h4">
                                    <span>Тема отзыва</span>
                                </h4>
                                <p class="profile-otzivi__author">
                                    <a href="#">Магомедрасул Магомедзагиров</a>
                                </p>
                                <p class="profile-otzivi__quest">
                                    Ассалам алейкум, у меня проблема.
                                    Я вчера упал со второго этажа и ударился плечом
                                    об камень, теперь оно жестко болит, че мне делать?)
                                </p>
                                <a href="#" class="profile-otzivi__otvetit">Ответить</a>
                            </li>
                            <li class="profile-otzivi__li profile-otzivi__li_you">
                                <img class="profile-otzivi__authorimg" src="static/media/3.jpg" alt="">
                                <h4 class="profile-otzivi__author_you">
                                    <span>Махмуд Магомедов</span>
                                </h4>
                                <p class="profile-otzivi__quest profile-otzivi__quest_you">
                                    Спс братишка))
                                </p>
                            </li>
                            <li class="profile-otzivi__li">
                                <h4 class="profile-otzivi__h4">
                                    <span>Тема отзыва</span>
                                </h4>
                                <p class="profile-otzivi__author">
                                    <a href="#">Магомедрасул Магомедзагиров</a>
                                </p>
                                <p class="profile-otzivi__quest">
                                    Ассалам алейкум, у меня проблема.
                                    Я вчера упал со второго этажа и ударился плечом
                                    об камень, теперь оно жестко болит, че мне делать?)
                                </p>
                                <a href="#" class="profile-otzivi__otvetit">Ответить</a>
                            </li>
                            <li class="profile-otzivi__li profile-otzivi__li_you">
                                <img class="profile-otzivi__authorimg" src="static/media/3.jpg" alt="">
                                <h4 class="profile-otzivi__author_you">
                                    <span>Махмуд Магомедов</span>
                                </h4>
                                <p class="profile-otzivi__quest profile-otzivi__quest_you">
                                    Спс братишка))
                                </p>
                            </li>
                            <li class="profile-otzivi__li">
                                <h4 class="profile-otzivi__h4">
                                    <span>Тема отзыва</span>
                                </h4>
                                <p class="profile-otzivi__author">
                                    <a href="#">Магомедрасул Магомедзагиров</a>
                                </p>
                                <p class="profile-otzivi__quest">
                                    Ассалам алейкум, у меня проблема.
                                    Я вчера упал со второго этажа и ударился плечом
                                    об камень, теперь оно жестко болит, че мне делать?)
                                </p>
                                <a href="#" class="profile-otzivi__otvetit">Ответить</a>
                            </li>
                            <li class="profile-otzivi__li profile-otzivi__li_you">
                                <img class="profile-otzivi__authorimg" src="static/media/3.jpg" alt="">
                                <h4 class="profile-otzivi__author_you">
                                    <span>Махмуд Магомедов</span>
                                </h4>
                                <p class="profile-otzivi__quest profile-otzivi__quest_you">
                                    Спс братишка))
                                </p>
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