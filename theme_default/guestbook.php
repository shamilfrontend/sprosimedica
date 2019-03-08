<!DOCTYPE html>
<html lang="ru">
<head>

    <meta name="description" content="описание страницы">
    <meta name="keywords" content="ключевое слово1, ключевое слово2">

    <?php require_once('template/head.php') ?>

    <title>Гостевая</title>

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

                    <h2 class="contentBox__title">Гостевая</h2>

                    <p class="contentBox__descr"></p>

                    <div class="guestbook">
                        <div class="guestbook-add-m">
                            <a href="" class="guestbook-add">Добавить отзыв</a>
                            <div class="guestbook-addforma">
                                <form action="">
                                    <textarea class="guestbook-addforma__text" name="" required placeholder="Ваш отзыв..."></textarea>
                                    <button class="guestbook-addforma__btn">Отправить</button>
                                </form>
                            </div>
                        </div>
                        <ul class="guestbook-list">

                            <li class="guestbook-list__li">
                                <div class="guestbook-card">
                                    <img class="guestbook-card__photo" src="static/media/1.jpg">
                                    <span class="commentBracket"></span>
                                    <div class="guestbook-card__content">
                                        <p class="guestbook-card__title">
                                            <a href="#" class="guestbook-card__name">Ася Магомедова</a>
                                            <span class="guestbook-card__date"> 20 Июля 2015 - 08:05:23</span>
                                        </p>
                                        <p class="guestbook-card__msg">Прекрасный сайт ! SmartMedia вы реально красавцы, делаете полезные для общества вещи.</p>
                                    </div>
                                </div>
                                <div class="guestbook-card guestbook-card_otvet">
                                    <img class="guestbook-card__photo guestbook-card__photo_otvet" src="static/media/777.jpg">
                                    <span class="commentBracket commentBracket_otvet"></span>
                                    <div class="guestbook-card__content guestbook-card__content_otvet">
                                        <p class="guestbook-card__title guestbook-card__title_otvet">
                                            <a href="#" class="guestbook-card__name guestbook-card__name_otvet">SmartMedia</a>
                                            <span class="guestbook-card__date guestbook-card__date_otvey"> 20 Июля 2015 - 08:05:23</span>
                                        </p>
                                        <p class="guestbook-card__msg guestbook-card__msg_otvet">Спасибо большое)))</p>
                                    </div>
                                </div>
                            </li>

                            <li class="guestbook-list__li">
                                <div class="guestbook-card">
                                    <img class="guestbook-card__photo" src="static/media/2.jpg">
                                    <span class="commentBracket"></span>
                                    <div class="guestbook-card__content">
                                        <p class="guestbook-card__title">
                                            <a href="#" class="guestbook-card__name">Владимир Баевский</a>
                                            <span class="guestbook-card__date"> 20 Июля 2015 - 08:05:23</span>
                                        </p>
                                        <p class="guestbook-card__msg">Прекрасный сайт ! SmartMedia вы реально красавцы, делаете полезные для общества вещи.</p>
                                    </div>
                                </div>
                                <div class="guestbook-card guestbook-card_otvet">
                                    <img class="guestbook-card__photo guestbook-card__photo_otvet" src="static/media/777.jpg">
                                    <span class="commentBracket commentBracket_otvet"></span>
                                    <div class="guestbook-card__content guestbook-card__content_otvet">
                                        <p class="guestbook-card__title guestbook-card__title_otvet">
                                            <a href="#" class="guestbook-card__name guestbook-card__name_otvet">SmartMedia</a>
                                            <span class="guestbook-card__date guestbook-card__date_otvey"> 20 Июля 2015 - 08:05:23</span>
                                        </p>
                                        <p class="guestbook-card__msg guestbook-card__msg_otvet">Спасибо большое)))</p>
                                    </div>
                                </div>
                            </li>

                            <li class="guestbook-list__li">
                                <div class="guestbook-card">
                                    <img class="guestbook-card__photo" src="static/media/3.jpg">
                                    <span class="commentBracket"></span>
                                    <div class="guestbook-card__content">
                                        <p class="guestbook-card__title">
                                            <a href="#" class="guestbook-card__name">Владимир Баевский</a>
                                            <span class="guestbook-card__date"> 20 Июля 2015 - 08:05:23</span>
                                        </p>
                                        <p class="guestbook-card__msg">Прекрасный сайт ! SmartMedia вы реально красавцы, делаете полезные для общества вещи.</p>
                                    </div>
                                </div>
                                <div class="guestbook-card guestbook-card_otvet">
                                    <img class="guestbook-card__photo guestbook-card__photo_otvet" src="static/media/777.jpg">
                                    <span class="commentBracket commentBracket_otvet"></span>
                                    <div class="guestbook-card__content guestbook-card__content_otvet">
                                        <p class="guestbook-card__title guestbook-card__title_otvet">
                                            <a href="#" class="guestbook-card__name guestbook-card__name_otvet">SmartMedia</a>
                                            <span class="guestbook-card__date guestbook-card__date_otvey"> 20 Июля 2015 - 08:05:23</span>
                                        </p>
                                        <p class="guestbook-card__msg guestbook-card__msg_otvet">Спасибо большое)))</p>
                                    </div>
                                </div>
                            </li>

                            <li class="guestbook-list__li">
                                <div class="guestbook-card">
                                    <img class="guestbook-card__photo" src="static/media/4.jpg">
                                    <span class="commentBracket"></span>
                                    <div class="guestbook-card__content">
                                        <p class="guestbook-card__title">
                                            <a href="#" class="guestbook-card__name">Владимир Баевский</a>
                                            <span class="guestbook-card__date"> 20 Июля 2015 - 08:05:23</span>
                                        </p>
                                        <p class="guestbook-card__msg">Прекрасный сайт ! SmartMedia вы реально красавцы, делаете полезные для общества вещи.</p>
                                    </div>
                                </div>
                                <div class="guestbook-card guestbook-card_otvet">
                                    <img class="guestbook-card__photo guestbook-card__photo_otvet" src="static/media/777.jpg">
                                    <span class="commentBracket commentBracket_otvet"></span>
                                    <div class="guestbook-card__content guestbook-card__content_otvet">
                                        <p class="guestbook-card__title guestbook-card__title_otvet">
                                            <a href="#" class="guestbook-card__name guestbook-card__name_otvet">SmartMedia</a>
                                            <span class="guestbook-card__date guestbook-card__date_otvey"> 20 Июля 2015 - 08:05:23</span>
                                        </p>
                                        <p class="guestbook-card__msg guestbook-card__msg_otvet">Спасибо большое)))</p>
                                    </div>
                                </div>
                            </li>

                            <li class="guestbook-list__li">
                                <div class="guestbook-card">
                                    <img class="guestbook-card__photo" src="static/media/5.jpg">
                                    <span class="commentBracket"></span>
                                    <div class="guestbook-card__content">
                                        <p class="guestbook-card__title">
                                            <a href="#" class="guestbook-card__name">Владимир Баевский</a>
                                            <span class="guestbook-card__date"> 20 Июля 2015 - 08:05:23</span>
                                        </p>
                                        <p class="guestbook-card__msg">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur culpa debitis ea odit, placeat veritatis! Accusantium ad, alias aliquid aperiam asperiores autem consectetur consequuntur cupiditate delectus deserunt dignissimos ea eos facere fugit id illum impedit incidunt iste laudantium libero magnam, minima molestias nam non, odit optio porro possimus praesentium quae repellendus reprehenderit similique tempore temporibus ut velit voluptatem voluptatum. Alias aperiam dolorum esse est excepturi iste minima omnis saepe sapiente temporibus. Autem dicta est, ex excepturi facilis iusto laudantium minima nemo pariatur possimus quo saepe voluptatum. Ad beatae dolorum id, magnam necessitatibus nemo neque non officia omnis placeat suscipit vero?
                                        </p>
                                    </div>
                                </div>
                                <div class="guestbook-card guestbook-card_otvet">
                                    <img class="guestbook-card__photo guestbook-card__photo_otvet" src="static/media/777.jpg">
                                    <span class="commentBracket commentBracket_otvet"></span>
                                    <div class="guestbook-card__content guestbook-card__content_otvet">
                                        <p class="guestbook-card__title guestbook-card__title_otvet">
                                            <a href="#" class="guestbook-card__name guestbook-card__name_otvet">SmartMedia</a>
                                            <span class="guestbook-card__date guestbook-card__date_otvey"> 20 Июля 2015 - 08:05:23</span>
                                        </p>
                                        <p class="guestbook-card__msg guestbook-card__msg_otvet">
                                            Спасибо большое)))
                                        </p>
                                    </div>
                                </div>
                            </li>



                        </ul>
                    </div>


                    <?php require_once('template/contentBox-pager.php') ?>

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