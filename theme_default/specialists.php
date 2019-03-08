<!DOCTYPE html>
<html lang="ru">
<head>

    <meta name="description" content="описание страницы">
    <meta name="keywords" content="ключевое слово1, ключевое слово2">

    <?php require_once('template/head.php') ?>

    <title>Специалисты</title>

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

                        <h2 class="contentBox__title">Врачи</h2>

                        <div class="contentBox_page-topbar">

                            <div class="contentBox-adv-search">
                                <form method="post" action="">
                                    <input class="contentBox-adv-search__input" placeholder="ФИО">
                                    <input class="contentBox-adv-search__input" placeholder="Город">
                                    <select class="contentBox-adv-search__select">
                                        <option value="">Специализация</option>
                                        <option value="">Аллерголог-Иммунолог</option>
                                        <option value="">Беременность и роды</option>
                                        <option value="">Болезни волос</option>
                                        <option value="">Венеролог</option>
                                        <option value="">Гастроэнтеролог</option>
                                        <option value="">Гинеколог</option>
                                        <option value="">Дерматолог</option>
                                        <option value="">Диетолог</option>
                                        <option value="">Инфекционист</option>
                                        <option value="">Кардиолог</option>
                                        <option value="">Лечение бесплодия</option>
                                        <option value="">Нарколог</option>
                                        <option value="">Невропатолог</option>
                                        <option value="">Педиатр</option>
                                        <option value="">Психолог</option>
                                        <option value="">Сексолог</option>
                                        <option value="">Терапевт</option>
                                        <option value="">Травмотолог</option>
                                        <option value="">Уролог</option>
                                        <option value="">Хирург</option>
                                        <option value="">Эндокринолог</option>
                                    </select>
                                    <input class="contentBox-adv-search__input" placeholder="Стаж">
                                    <button class="contentBox-adv-search__btn">Найти специалиста</button>
                                </form>
                            </div>

                            <div class="contentBox-search contentBox-search_page">
                                <form>
                                    <input class="contentBox-search__pole" type="text" name="text" required placeholder="Введите имя специалиста">
                                    <input class="contentBox-search__btn" type="submit" value="НАЙТИ">
                                </form>
                            </div>

                            <div class="contentBox_page-rsearch-toggle">
                                <p class="contentBox_page-rsearch-toggle__text">Расширенный поиск</p>
                            </div>

                        </div>

                        <ul class="specialist-list">
                            <li class="specialist-list__li">

                                <div class="specialist-card">

                                    <div class="specialist-card__top">
                                        <a class="specialist-card__name" style="background: url('static/img/icon-online.png') no-repeat right 10px;" href="profile-specialist.php">
                                            Махмуд Раджабов
                                        </a>
                                        <div class="specialist-card__rating">
                                            <span class="">Рейтинг: 204</span>
                                        </div>
                                    </div>

                                    <div class="specialist-card__content">

                                        <a class="specialist-card__linkimg" href="">
                                            <img class="specialist-card__photo" src="static/media/6.jpg">
                                        </a>

                                        <p class="specialist-card__address">
                                            <span>Город</span>
                                            Махачкала
                                        </p>
                                        <p class="specialist-card__tel">
                                            <span>Телефон:</span>
                                            +7 964 882-89-86
                                        </p>
                                        <p class="specialist-card__job">
                                            <span>Место работы:</span>
                                            Медицинский центр Махмуда Раджабова
                                        </p>
                                        <p class="specialist-card__stazh">
                                            <span>Стаж работы:</span>
                                            8 лет
                                        </p>
                                        <p class="specialist-card__specializacia">
                                            <span>Специализация: </span>
                                            Аллерголог-Иммунолог,
                                            Болезни волос,
                                            Венеролог,
                                            Дерматолог,
                                            Косметолог,
                                            Мануальный терапевт,
                                            Психолог,
                                            Уролог
                                        </p>
                                        <div class="specialist-card__rightbtn">
                                            <p class="specialist-card__view">4040 просмотров</p>
                                            <a href="#modal-btns__addvopros" class="specialist-card__addvopros">Задать вопрос</a>
                                            <a href="#modal-btns__addotzivi" class="specialist-card__addotziv">Написать отзыв</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="specialist-list__li">

                                <div class="specialist-card">

                                    <div class="specialist-card__top">
                                        <a class="specialist-card__name" style="background: url('static/img/icon-online.png') no-repeat right 10px;" href="profile-specialist.php">
                                            Панигрибко Сергей
                                        </a>
                                        <div class="specialist-card__rating">
                                            <span class="">Рейтинг: 204</span>
                                        </div>
                                    </div>

                                    <div class="specialist-card__content">

                                        <a class="specialist-card__linkimg" href="">
                                            <img class="specialist-card__photo" src="static/img/photo.jpg">
                                        </a>

                                        <p class="specialist-card__address">
                                            <span>Город</span>
                                            Махачкала
                                        </p>
                                        <p class="specialist-card__tel">
                                            <span>Телефон:</span>
                                            89056148812
                                        </p>
                                        <p class="specialist-card__job">
                                            <span>Место работы:</span>
                                            Гипократ
                                        </p>
                                        <p class="specialist-card__stazh">
                                            <span>Стаж работы:</span>
                                            28 лет
                                        </p>
                                        <p class="specialist-card__specializacia">
                                            <span>Специализация: </span>
                                            Аллерголог-Иммунолог,
                                            Болезни волос,
                                            Венеролог,
                                            Дерматолог,
                                            Косметолог,
                                            Мануальный терапевт,
                                            Психолог,
                                            Уролог
                                        </p>
                                        <div class="specialist-card__rightbtn">
                                            <p class="specialist-card__view">4040 просмотров</p>
                                            <a href="#modal-btns__addvopros" class="specialist-card__addvopros">Задать вопрос</a>
                                            <a href="#modal-btns__addotzivi" class="specialist-card__addotziv">Написать отзыв</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="specialist-list__li">

                                <div class="specialist-card">

                                    <div class="specialist-card__top">
                                        <a class="specialist-card__name" style="background: url('static/img/icon-online.png') no-repeat right 10px;" href="profile-specialist.php">
                                            Панигрибко Сергей
                                        </a>
                                        <div class="specialist-card__rating">
                                            <span class="">Рейтинг: 204</span>
                                        </div>
                                    </div>

                                    <div class="specialist-card__content">

                                        <a class="specialist-card__linkimg" href="">
                                            <img class="specialist-card__photo" src="static/img/photo.jpg">
                                        </a>

                                        <p class="specialist-card__address">
                                            <span>Город</span>
                                            Махачкала
                                        </p>
                                        <p class="specialist-card__tel">
                                            <span>Телефон:</span>
                                            89056148812
                                        </p>
                                        <p class="specialist-card__job">
                                            <span>Место работы:</span>
                                            Гипократ
                                        </p>
                                        <p class="specialist-card__stazh">
                                            <span>Стаж работы:</span>
                                            28 лет
                                        </p>
                                        <p class="specialist-card__specializacia">
                                            <span>Специализация: </span>
                                            Аллерголог-Иммунолог,
                                            Болезни волос,
                                            Венеролог,
                                            Дерматолог,
                                            Косметолог,
                                            Мануальный терапевт,
                                            Психолог,
                                            Уролог
                                        </p>
                                        <div class="specialist-card__rightbtn">
                                            <p class="specialist-card__view">4040 просмотров</p>
                                            <a href="#modal-btns__addvopros" class="specialist-card__addvopros">Задать вопрос</a>
                                            <a href="#modal-btns__addotzivi" class="specialist-card__addotziv">Написать отзыв</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="specialist-list__li">

                                <div class="specialist-card">

                                    <div class="specialist-card__top">
                                        <a class="specialist-card__name" style="background: url('static/img/icon-online.png') no-repeat right 10px;" href="profile-specialist.php">
                                            Панигрибко Сергей
                                        </a>
                                        <div class="specialist-card__rating">
                                            <span class="">Рейтинг: 204</span>
                                        </div>
                                    </div>

                                    <div class="specialist-card__content">

                                        <a class="specialist-card__linkimg" href="">
                                            <img class="specialist-card__photo" src="static/img/photo.jpg">
                                        </a>

                                        <p class="specialist-card__address">
                                            <span>Город</span>
                                            Махачкала
                                        </p>
                                        <p class="specialist-card__tel">
                                            <span>Телефон:</span>
                                            89056148812
                                        </p>
                                        <p class="specialist-card__job">
                                            <span>Место работы:</span>
                                            Гипократ
                                        </p>
                                        <p class="specialist-card__stazh">
                                            <span>Стаж работы:</span>
                                            28 лет
                                        </p>
                                        <p class="specialist-card__specializacia">
                                            <span>Специализация: </span>
                                            Аллерголог-Иммунолог,
                                            Болезни волос,
                                            Венеролог,
                                            Дерматолог,
                                            Косметолог,
                                            Мануальный терапевт,
                                            Психолог,
                                            Уролог
                                        </p>
                                        <div class="specialist-card__rightbtn">
                                            <p class="specialist-card__view">4040 просмотров</p>
                                            <a href="#modal-btns__addvopros" class="specialist-card__addvopros">Задать вопрос</a>
                                            <a href="#modal-btns__addotzivi" class="specialist-card__addotziv">Написать отзыв</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="specialist-list__li">

                                <div class="specialist-card">

                                    <div class="specialist-card__top">
                                        <a class="specialist-card__name" style="background: url('static/img/icon-online.png') no-repeat right 10px;" href="profile-specialist.php">
                                            Панигрибко Сергей
                                        </a>
                                        <div class="specialist-card__rating">
                                            <span class="">Рейтинг: 204</span>
                                        </div>
                                    </div>

                                    <div class="specialist-card__content">

                                        <a class="specialist-card__linkimg" href="">
                                            <img class="specialist-card__photo" src="static/img/photo.jpg">
                                        </a>

                                        <p class="specialist-card__address">
                                            <span>Город</span>
                                            Махачкала
                                        </p>
                                        <p class="specialist-card__tel">
                                            <span>Телефон:</span>
                                            89056148812
                                        </p>
                                        <p class="specialist-card__job">
                                            <span>Место работы:</span>
                                            Гипократ
                                        </p>
                                        <p class="specialist-card__stazh">
                                            <span>Стаж работы:</span>
                                            28 лет
                                        </p>
                                        <p class="specialist-card__specializacia">
                                            <span>Специализация: </span>
                                            Аллерголог-Иммунолог,
                                            Болезни волос,
                                            Венеролог,
                                            Дерматолог,
                                            Косметолог,
                                            Мануальный терапевт,
                                            Психолог,
                                            Уролог
                                        </p>
                                        <div class="specialist-card__rightbtn">
                                            <p class="specialist-card__view">4040 просмотров</p>
                                            <a href="#modal-btns__addvopros" class="specialist-card__addvopros">Задать вопрос</a>
                                            <a href="#modal-btns__addotzivi" class="specialist-card__addotziv">Написать отзыв</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>


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


    <script src="static/libs/magnificpopup/jquery.magnific-popup.min.js"></script>
    <script>

        $(function () {

            // страница специалисты
            var btnAddvoprosSpecs = $('.specialist-card__addvopros');
            var btnAddotzivSpecs = $('.specialist-card__addotziv');

            // модальные окна
            var modalAddVopros = $('.modal-addvopros');
            var modalAddOtziv = $('.modal-addotzivi');

            // events
            btnAddvoprosSpecs.magnificPopup({
                callbacks: {
                    close: function() {
                        modalAddVopros.hide();
                    }
                }
            });
            btnAddvoprosSpecs.on('click', function(e){
                e.preventDefault();
                modalAddVopros.css({
                    'display': 'block'
                });
            });

            //
            btnAddotzivSpecs.magnificPopup({
                callbacks: {
                    close: function() {
                        modalAddOtziv.hide();
                    }
                }
            });
            btnAddotzivSpecs.on('click', function(e){
                e.preventDefault();
                modalAddOtziv.css({
                    'display': 'block'
                });
            });


        });

    </script>



</body>
</html>