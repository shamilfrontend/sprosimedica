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

                        <div class="profile-user">
                            <div class="profile-userbar">
                                <span class="profile-user__name" style="background: url('static/img/icon-online.png') no-repeat right 10px;">
                                    Панигрибко Сергей
                                </span>
                                <span  class="profile-user__rating">Рейтинг: 204</span>
                            </div>

                            <div class="profile-usercontent">
                                <div class="profile-usercontent__photo">
                                    <img src="static/img/photo.jpg" alt="" >
                                </div>
                                <p class="profile-usercontent__address">
                                    <span>Город</span>
                                    Махачкала
                                </p>
                                <p class="profile-usercontent__obr">
                                    <span>Образование:</span>
                                    высшее медицинское
                                </p>
                                <p class="profile-usercontent__age">
                                    <span>Возраст:</span>
                                    55
                                </p>
                                <p class="profile-usercontent__stazh">
                                    <span>Стаж работы:</span>
                                    28 лет
                                </p>
                                <p class="profile-usercontent__job">
                                    <span>Место работы:</span>
                                    Частный медицинский центр
                                </p>
                                <p class="profile-usercontent__tel">
                                    <span>Раб Тел.:</span>
                                    89056148812
                                </p>
                                <p class="profile-usercontent__tel">
                                    <span>Моб Тел.:</span>
                                    89056148812
                                </p>
                                <p class="profile-usercontent__nasayte">
                                    <span>На сайте с</span>
                                    11.07.2014
                                </p>

                                <p class="profile-usercontent__role profile-usercontent__role_vrach">
                                    <span>Специалист</span>
                                </p>

                                <div class="profile-userbtns">
                                    <a href="#modal-btns__addvopros" class="profile-userbtns__addvop">Задать вопрос</a>
                                    <a href="#modal-btns__addotzivi" class="profile-userbtns__addotz">Написать отзыв</a>
                                </div>
                            </div>


                            <div class="profile-userbot">
                                <ul class="profile-userbottab__list">
                                    <li class="profile-userbottab__li profile-userbottab__li_active">УСЛУГИ</li>
                                    <li class="profile-userbottab__li">СЕРТИФИКАТЫ</li>
                                    <li class="profile-userbottab__li">СПЕЦИАЛИЗАЦИЯ</li>
                                </ul>
                                <div class="profile-userbottab__content">
                                    <div class="profile-userbottab__contitem">
                                        <div class="user-services">
                                            <p>
                                                <span>Видеоконсультация</span>
                                                700 руб./час
                                            </p>
                                            <p>
                                                <span>Запись на прием</span>
                                                Бесплатно
                                            </p>
                                        </div>
                                    </div>
                                    <div class="profile-userbottab__contitem">
                                        <ul class="user-sertificate">
                                            <li data-src="static/media/1.jpg" class="user-sertificate__li">
                                                <a href="" class="user-sertificate__link">
                                                    <img src="static/media/1.jpg" alt="" class="user-sertificate__img">
                                                </a>
                                            </li>
                                            <li data-src="static/media/2.jpg" class="user-sertificate__li">
                                                <a href="" class="user-sertificate__link">
                                                    <img src="static/media/2.jpg" alt="" class="user-sertificate__img">
                                                </a>
                                            </li>
                                            <li data-src="static/media/3.jpg" class="user-sertificate__li">
                                                <a href="" class="user-sertificate__link">
                                                    <img src="static/media/3.jpg" alt="" class="user-sertificate__img">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="profile-userbottab__contitem">
                                        <div class="user-specialize">
                                            <ul>
                                                <li>
                                                    <a href="voprosy-cat.php">Аллерголог-Иммунолог</a>
                                                </li>
                                                <li>
                                                    <a href="voprosy-cat.php">Болезни волос</a>
                                                </li>
                                                <li>
                                                    <a href="voprosy-cat.php">Венеролог</a>
                                                </li>
                                                <li>
                                                    <a href="voprosy-cat.php">Дерматолог</a>
                                                </li>
                                                <li>
                                                    <a href="voprosy-cat.php">Косметолог</a>
                                                </li>
                                                <li>
                                                    <a href="voprosy-cat.php">Мануальный терапевт</a>
                                                </li>
                                                <li>
                                                    <a href="voprosy-cat.php">Психолог</a>
                                                </li>
                                                <li>
                                                    <a href="voprosy-cat.php">Уролог</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
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

    <div class="modal-btn">
        <div id="modal-btns__addvopros" class="modal-addvopros">
            <h5 class="modal-addvopros__title">Задать вопрос</h5>
            <form action="">
                <input class="modal-addvopros__input" type="text" placeholder="Тема вопроса" required>
                <textarea class="modal-addvopros__text" placeholder="Текст вопроса.." required></textarea>
                <p class="modal-addvopros__anonim">
                    <label>
                        Анонимно
                        <input type="checkbox">
                    </label>
                </p>
                <button class="modal-addvopros__btn">Отправить</button>
            </form>
        </div>
        <div id="modal-btns__addotzivi" class="modal-addotzivi">
            <h5 class="modal-addotzivi__title">Написать отзыв</h5>
            <form action="">
                <input class="modal-addotzivi__input" type="text" placeholder="Заголовок отзыва" required>
                <textarea class="modal-addotzivi__text" placeholder="Текст отзыва.." required></textarea>
                <button class="modal-addotzivi__btn">Отправить</button>
            </form>
        </div>
    </div>




    <?php require_once('template/bottom-scripts.php') ?>
    <script src="static/libs/lightgallery/js/lightGallery.min.js"></script>
    <script src="static/libs/magnificpopup/jquery.magnific-popup.min.js"></script>
    <script>
        $(function () {
            $('.user-sertificate').lightGallery();

            // страница специалисты
            var btnAddvoprosSpecs = $('.specialist-card__addvopros');
            var btnAddotzivSpecs = $('.specialist-card__addotziv');

            // страница профиля
            var btnAddvoprosProf = $('.profile-userbtns__addvop');
            var btnAddotzivProf = $('.profile-userbtns__addotz');

            // модальные окна
            var modalAddVopros = $('.modal-addvopros');
            var modalAddOtziv = $('.modal-addotzivi');

            // events
            btnAddvoprosProf.magnificPopup();
            btnAddvoprosProf.on('click', function(e){
                e.preventDefault();
                modalAddVopros.css({
                    'display': 'block'
                });
            });

            btnAddotzivProf.magnificPopup();
            btnAddotzivProf.on('click', function(e){
                e.preventDefault();
                modalAddOtziv.css({
                    'display': 'block'
                });
            });


        });

    </script>

</body>
</html>